#!/usr/local/bin/perl
#-
# tinycart v0.0
#-
# 
# 10-20-99 - Created DLL
# 
# This is my half assed cart for DS Sewing. It was written with haste but works. 
#
#-
# 20130601 - seby changed ESTES to LTL, put in dropdown us states and canada, charge CT sales tax cu CT freight 

use CGI::Carp qw(fatalsToBrowser set_message);

BEGIN {
  ($_=$0)=~s![\\/][^\\/]+$!!;
  push@INC,$_;
  

 sub handle_errors {
  my $msg = shift;
  print "<h1>Internal Error</h1>";
  print "The following error(s) ocurred:<BR>$msg";
 }
 set_message(\&handle_errors);
}

use CGI qw/:standard/;
use DBI;

# includes
require 'tinyconfig.pl';
require 'estes2.pl';
require 'american.pl';
require 'ups.pl';
require 'support.pl';


# 'constants'
@maxdays = (31,28,31,30,31,30,31,31,30,31,30,31);

# -- #
$spBrowseCatalogLetter = "SELECT pid,price,description,image FROM catalog WHERE catalog.description LIKE ? ORDER BY description";
$spSearchCatalog = "SELECT pid,price,description,image FROM catalog WHERE catalog.description LIKE ?";
$spNewSession="INSERT INTO sessionID (timestamp,referer,remote_addr,user_agent,sessionID) VALUES(?,?,?,?,?)";
$spAddItemCart="INSERT INTO cart (sessionID,pid,price,qty,weight) VALUES (?,?,?,?,?)";
$spDelItemCart="DELETE FROM cart WHERE id=?";
$spUpdateItemCart="UPDATE cart SET qty=? WHERE id=?";
#$spGetCartContents="SELECT pid,price,qty,weight FROM cart WHERE sessionID=?";
#$spGetCartContentsDetail="SELECT cart.pid,cart.price,qty,description,image,cart.weight,id FROM cart LEFT JOIN catalog ON cart.pid = catalog.pid WHERE sessionID=?";


$spGetCartContents="select C.pid, C.price, C.qty, C.weight, C.price - (isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0) * C.price) as discountprice  from cart C left join promo P on P.code = C.code where sessionID=?";
$spGetCartContentsDetail = "select C.pid, C.price, C.qty, description, image, C.weight, id, C.price - (isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0) * C.price) as discountprice from cart C LEFT JOIN catalog ON C.pid = catalog.pid where sessionid = ?";
$spPromoApply = "exec Promo_Apply ?,?";
$spGetCartSubTotal="SELECT SUM(qty*price) FROM cart WHERE sessionID=?";
$spGetCartWeight = "SELECT SUM(qty*weight),MAX(weight) FROM cart WHERE sessionID=?";
$spGetUPSRate = "select sum(z2*qty) from cart left join ups_ground_rate on ups_ground_rate.weight = floor(cart.weight+0.5) where sessionID = ?";
#$spCreateOrder = "INSERT INTO orders VALUES(getdate(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CONVERT(money,?),?,?,CONVERT(money,?),0)";
###LAST USED $spCreateOrder = "INSERT INTO orders VALUES(getdate(),?, /* acct */?,?,?,?,?,?,?,?,?,?/* bill */,?,?,?,?,?,?,?,?,/* ship */?,?,?,?,?,?,?,?,/**/?,?,?,?,?,CONVERT(money,?),?,?,CONVERT(money,?),0)";
$spCreateOrder = "INSERT INTO orders VALUES(getdate(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CONVERT(money,?),?,?,CONVERT(money,?),0)";
$spCreateOrderDet = "INSERT INTO order_detail VALUES (?,?,?,?,?)";

# global options
my($cgih,$dbh,$sid);


sub go_back {   
	print $cgih->redirect('tinycart.pl?'.$cgih->param('last_action'));
}

sub include_header {
	open file,$__HEADER_PATH__;	 
 	print  <file>;
 	close file;

	print qq {
	<SCRIPT LANGUAGE="JavaScript">
	<!-- Begin
	function popUp(URL) {
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=420,height=600');");
	}
	// End -->
	</script> };
 
}

sub redirect_hack_fix {
	#moved from 'main' sub
	if (!$cgih->cookie('sessionID')) {
		##	$cookie = $cgih->cookie(-name=>'sessionID',-value=>"$sid",-path=>'/',-expires=>'+6h',-domain=>'ds-sewing.com');
		$cookie = $cgih->cookie(-name=>'sessionID',-value=>"$sid",-path=>'/',-expires=>'+6h');
  		print $cgih->header(-cookie=>[$cookie],-expires=>'-1d');
	} else {
    	print $cgih->header(-expires=>'-1d');
	}
}

sub browse_catalog_byletter {
 my ($pid,$image,$letter,$description,$price,$sth,$result,@row,@letters,$i,$counter);

 $letter = $cgih->param('letter');
 $sth = $dbh->prepare($spBrowseCatalogLetter);
 $sth->bind_param(1,$letter.'%');
 $result = $sth->execute;
 $counter = 0;

 print $cgih->start_html(-title=>"Results for letter $letter.");
 include_header();
	print qq {<TABLE BORDER="1"><TR>};
	for ($i=1; $i<=26; $i=$i+1) {
		print qq{<TD><A HREF="tinycart.pl?action=Browse&letter=},
		pack('C',$i+64),qq{">},pack('C',$i+64),qq{</A></TD>};
	}

	print qq{</TR></TABLE><TABLE BORDER="1">};
	
 if ($result) {
	while (@row=$sth->fetchrow_array) {
		$pid = $row[0];
		$price = $row[1];
		$description = $row[2];
		$image = $row[3];
		print qq{<TR><TD><A HREF="tinycart.pl?action=incart&pid=$pid">Buy Now</A>},
			qq{</TD><TD>$description</TD></TR>};
		$counter++;
	}

	if ($counter==0) {
	 print qq{<TR><TD>No results.</TD></TR>};
	}

 print "</TABLE>",$cgih->end_html;
 } else {
	print "bleh",$sth->errstr;
  # error, fail, crash, burn, death
 }

 return;
}

sub search_catalog {
 my($sth,$result,$search,$pid,$price,$description,$image,@row);
 $search = $cgih->param('search');
 if (length($search)>3) {
  $sth=$dbh->prepare($spSearchCatalog);
  $sth->bind_param(1,'%'.$search.'%');
  $result = $sth->execute;
  if ($result) {
   print $cgih->start_html(-title=>'Search Results');
   print qq{<TABLE BORDER="1">};
   while (@row=$sth->fetchrow_array) {
	$pid = $row[0];
	$price = $row[1];
	$description = $row[2];
	$image = $row[3];
	print qq {<TR><TD>$pid</TD><TD>$price</TD><TD>$description</TD>},
		qq{<TD>$__VCAT_IMAGE_PATH__$image</TD></TR>};
   }
   print qq{</TABLE>};
  } else {
   # error, bleh!
  }


 } else {
  # too short, bite me :)
 }
 $sth->finish;
 return;
}

# display cart, with shipping cost

sub display_cart {

my($sth,$result,$pid,$price,$extprice, $discount, $qty,$description,$weight,$image,$id,$counter,$subtotal,$sum_weight,$shipcost,$shipstate);
 
 $shipcost = $_[0];
 $shipstate = $_[1];


 $sth=$dbh->prepare($spGetCartContentsDetail);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;

 # build display of items
 $counter=0;
 $subtotal = 0;

 if ($result) {
  print qq{<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#f0f0f0">};
#  print qq{<TR BGCOLOR="#c0c0c0"><TD COLSPAN="5" ALIGN="CENTER"><B>Shopping Cart</B></TD></TR>},
print qq{<TR BGCOLOR="#c0c0c0"><TD><B>Qty</B></TD>},
	qq{<TD ALIGN="CENTER"><B>Description</B></TD>},
	qq{<TD ALIGN="CENTER"><B>Part</B></TD>},
	qq{<TD ALIGN="CENTER"><B>Unit Price</B></TD>},
	qq{<TD ALIGN="CENTER"><B>Ext. Price</B></TD></TR>};


  while (@row=$sth->fetchrow_array) {
	$pid = $row[0];
	$price = $row[1];
	$qty = $row[2];
	$description = $row[3];
	$image = $row[4];
	$weight = $row[5];
	$sum_weight+=($qty*$weight);
	$id = $row[6];
	$discount = $row[7];

	if ($counter % 2 == 0) { print qq{<TR BGCOLOR="#ffffff">}; } else { print qq{<TR BGCOLOR="#F0F0F0">}; }
		print qq{<TD valign="top" width="5%">$qty</TD>
			<TD width="60%">$description</TD><TD valign="top" width="15%">$pid</TD>
			<TD align="right" valign="top" width="10%">\$};
			
		if ($price!=$discount) {		
			print sprintf("%0.2f", $discount),
				qq{<font size="-1" color="red"> (You saved \$},
					sprintf("%0.2f", $qty * ($price - $discount)),
				qq{)</font>};
				
			$subtotal += ($discount * $qty);
			$extprice = ($discount * $qty);
			
			print qq{</TD><TD align="right" valign="top" width="10%">\$},
				sprintf("%0.2f", $extprice),
				qq{</TD></TR>};			
		} else {
			print sprintf("%0.2f",$price);
			
			$subtotal += ($price * $qty);
			$extprice = ($price * $qty);
			
			print qq{</TD><TD align="right" valign="top" width="10%">\$},
				sprintf("%0.2f", $extprice),
				qq{</TD></TR>};			
		}
		

	$counter=$counter+1;
  }

 } else {
  # some error, log it, fix it, etc :)
  $sth->finish;
  return 0;
 }

 # fetch and display subtotal for order
 # $sth=$dbh->prepare($spGetCartSubTotal);
 # $sth->bind_param(1,$sid);
 # $result = $sth->execute;

 #if ($result) {
 # $subtotal=$sth->fetchrow_array;

  print qq{<TR BGCOLOR="#C0C0C0"><TD COLSPAN="5" ALIGN="CENTER"><B>Final Details</B></TD></TR>};

  print qq{<TR>
					<TD COLSPAN="2" ALIGN="LEFT">
						<b>Terms of Sale Agreement</b><br>
						<a href="/legal.htm" target="_blank">/legal.htm</a>
					</TD>
  	<TD BGCOLOR="#decfde" COLSPAN="2" ALIGN="RIGHT">Sub Total:</TD><TD COLSPAN="1"
ALIGN="RIGHT" BGCOLOR="#F0F0F0">\$},sprintf("%0.2f",$subtotal),qq{</TD></TR>
  <TR>
					<TD COLSPAN="2" ALIGN="LEFT">
						<b>Ordering, Freight and Payment Agreement</b><br>						
						<a href="/forms/payment.html" target="_blank">/forms/payment.html</a>
					</TD>  
  <TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Shipping Cost:</TD><TD COLSPAN="1"
ALIGN="RIGHT">\$},sprintf("%0.2f",$shipcost),qq{</TD></TR>};

  if ($__TAX_STATES__{uc($shipstate)}) {
   print qq{<TR>
   						<TD COLSPAN="2" ALIGN="LEFT"></TD>
   	<TD COLSPAN="2" BGCOLOR="#decfde" ALIGN="RIGHT">$shipstate sales tax
</TD><TD COLSPAN="1" ALIGN="RIGHT">\$},sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)),qq{</TD></TR>
  <TR><TD COLSPAN="4"><HR></TD></TR>};
  }

   print qq{<TR>
					<TD COLSPAN="2" ALIGN="LEFT">[<A HREF="javascript:window.print()">Print This Page for your Records</a>]</TD>
  <TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Total</TD><TD
COLSPAN="1" ALIGN="RIGHT"><B><FONT COLOR="Blue">\$},
sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)+$subtotal+$shipcost),qq{</B></FONT></TD></TR>};

 #} else {
 # print "sad", $sth->errstr;
  # boom, sad, die, fuck
 #}

 print qq{</TABLE>};


 $sth->finish;

 return (sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)+$subtotal+$shipcost),sprintf("%0.2f",$subtotal),sprintf("%0.2f",$shipcost),sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)));
}


sub display_cart_detail {
 my($sth,$result,$pid,$price,$extprice, $discount, $qty,$description,$weight,$image,$id,$counter,$subtotal,$sum_weight);

 $sth=$dbh->prepare($spGetCartContentsDetail);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;

 # build display of items
 $counter=0;
 
 $subtotal = 0;

 if ($result) {
  print qq{<TABLE CELLSPACING="1" CELLPADDING="2" BORDER="1"
BGCOLOR="#ffcc66">
  <TR BGCOLOR="#ffaa00" ALIGN="CENTER"><TD><B>Qty</B></TD>
  <TD ALIGN="CENTER"><B>Description</B></TD>
  <TD ALIGN="CENTER"><B>SKU</B></TD>
  <TD ALIGN="CENTER"><B>Unit Price</B></TD>
  <TD ALIGN="CENTER"><B>Ext. Price</B></TD>
  <TR>};

  while (@row=$sth->fetchrow_array) {
	$pid = $row[0];
	$price = $row[1];
	$qty = $row[2];
	$description = $row[3];
	$image = $row[4];
	$weight = $row[5];
	$sum_weight+=($qty*$weight);
	$id = $row[6];
	$discount = $row[7];
	print $cgih->start_form;
	print qq{<TR><TD><INPUT NAME="qty" VALUE="$qty" SIZE=4 MAXLENGTH=4></TD>},
		qq{<TD>$description</TD><TD>$pid<INPUT TYPE=HIDDEN NAME="pid" VALUE="$pid"></TD>},
		qq{<TD align="right">\$};

	if ($discount!=$price) {
		print sprintf("%0.2f", $discount), qq {<br /> },
			qq{<font size="-1" color="red"> (You saved \$},
			sprintf("%0.2f", $price - $discount),
			qq{)</font>};
			
		$subtotal += ($qty * $discount);
		$extprice = ($qty * $discount);
		
		print qq{</TD><TD align="right">\$},
			sprintf("%0.2f", $extprice), qq {<br />};	
			
			print qq{<font size="-1" color="red"> (You saved \$},
			sprintf("%0.2f", $qty * ($price - $discount)),
			qq{)</font>};
		

	} else {
		print sprintf("%0.2f", $price);
		$subtotal += ($qty * $price);
		$extprice = ($qty * $price);
		
		print qq{</TD><TD align="right">\$},
			sprintf("%0.2f", $extprice);		
	}
		
	print qq{</TD>},
		qq{<TD><INPUT TYPE="SUBMIT" NAME="action" value="Update Qty"><TD>},
		qq{<TD><INPUT TYPE="SUBMIT" NAME="action" value="Remove Item">},
		qq{<INPUT TYPE="HIDDEN" NAME="id" VALUE="$id">},
		qq{<INPUT TYPE="HIDDEN" NAME="last_action" value="},
		$cgih->param('last_action'),
		qq{"></TD></TR>};
	print $cgih->end_form;
	$counter=$counter+1;
  }
  print qq{</TABLE>};
 } else {
  # some error, log it, fix it, etc :)
 print qq{<TR><TD><TD><TD><TD><TD><TD><br><br><font color="red"><b>Invalid Promo Code.</b></font> <br> Please try again or call (800) 789-8143.<br><br> 
Please <a href="tinycart.pl?action=View Cart">Click Here</a> to go back to the cart to try again.<TD><TD><TD><TD><TD><TD><TR>};
  $sth->finish;
  return 0;
 }


 # fetch and display subtotal for order  
 # $sth=$dbh->prepare($spGetCartSubTotal);
 # $sth->bind_param(1,$sid);
 # $result = $sth->execute;
 
 #if ($result) {
 # $subtotal=$sth->fetchrow_array;
  
  print qq{<TABLE BORDER="0" CELLSPACING="4" CELLPADDING="0"><TR><TD>};   
  print qq{<TABLE BORDER="0" CELLSPACING="4" CELLPADDING="0">};
  print qq{<TR><TD><B>Sub Total</B></TD><TD>\$},sprintf("%0.2f",$subtotal),qq{</TD></TR>
		<TR><TD><B>Estimated Weight</B></TD><TD>},sprintf("%0.2f",$sum_weight),qq{ lbs.</TD></TR>
	</TABLE>};
  print qq{</TD><TD>};
  #discount entry box
   
  print qq{
		<!-- <TABLE BORDER="0" CELLSPACING="4" CELLPADDING="0" style="padding: 3px 3px 3px 3px; border: dashed 1px black;"> -->
		};
	print $cgih->start_form;
	print qq{		
		<!-- <TR>		
		<TD><input name="promo" size="10" />&nbsp;<input type="submit" value="Promo" /><input type="hidden" name="action" value="Promo" /><input type="hidden" name="last_action" value="" />
		Please enter your <span style="color:red;">promotional code</span> to receive your instant discount.
		</TR> -->
	};
	
	print $cgih->end_form;		
	print qq{<!-- </TABLE></TD></TR></TABLE> -->};
	
	
 # } else {
 #	  print "sad", $sth->errstr;
 # }

 
 $sth->finish;
 return $counter;
}

sub incart {
	redirect_hack_fix;
 	my ($sth,$pid,$result,$price,$weight,$qty);
 	$pid = $cgih->param('pid');
 	$qty = 0 + $cgih->param('qty');

 	if ($qty == 0) { $qty = 1 }
 
 	# discover if this item already exists in the cart
 	$sth=$dbh->prepare("SELECT COUNT(*) FROM cart WHERE pid=? AND sessionID=?");
 	$sth->bind_param(1,$pid);
 	$sth->bind_param(2,$sid);

 	$result = $sth->execute;
 	if ($sth->fetchrow_array>0) {view_cart(); return;};

 	# discover price, if item exists, etc
 	$sth=$dbh->prepare("SELECT price,isnull(weight,10.0) FROM catalog WHERE pid=?");
 	$sth->bind_param(1,$pid);
 	$result=$sth->execute;

 	if ($result && (($price,$weight)=$sth->fetchrow_array)) {
  		#we're good to go, insert item into cart
  		$sth=$dbh->prepare($spAddItemCart);
  		$sth->bind_param(1,$sid);
  		$sth->bind_param(2,$pid);
  		$sth->bind_param(3,$price);
  		$sth->bind_param(4,$qty);
  		$sth->bind_param(5,$weight);
  
  		$result=$sth->execute;
  		
		if ($result) {
			# success, display carts contents 
			$cgih->param(-name=>'last_action',-value=>"action=View+Cart");
			view_cart();
  		} else {
   			# notify user of error, log error, bleh!
   			print 'Error!';
  		}
		
		$sth->finish;
 	} else {
  		# notify item is no longer available, log error, bleh!
 	}

 	return;
}

# view cart

sub view_cart {	
	print $cgih->start_html(-title=>'Contents of Cart');
	include_header();
	if (display_cart_detail==0) {
		print $cgih->h1('<!-- empty cart -->');
	} else {
		# do extra stuff ??

		print $cgih->start_form; 
		print qq{<INPUT TYPE="HIDDEN" NAME="action" VALUE="Account Form">};
		print qq{<INPUT style="width:120" TYPE="SUBMIT" VALUE="Checkout">};
		print $cgih->end_form;
		print qq{<INPUT style="width:120" TYPE="BUTTON" VALUE="Continue Shopping" onclick="javascript:window.history.back();">};
		print $cgih->end_html;
	}
}


# update the qty of an item
sub update_qty_item {
	redirect_hack_fix;
	my($sth,$id,$pid,$result,$qty);

	$id = $cgih->param('id');
	$pid = $cgih->param('pid');
	$qty = $cgih->param('qty');
	
	# remove that item from the cart
	if ($qty==0) { remove_cart_item(); return;}

	# change qty of item in cart
	$sth = $dbh->prepare($spUpdateItemCart);
	$sth->bind_param(1,$qty);
	$sth->bind_param(2,$id);
	$result = $sth->execute;

	print $dbh->err;
	print $sth->err;
	
	if ($result) {
	if ($cgih->param('last_action')) {  
		##go_back(); 
		view_cart();
	} else { view_cart(); }

	} else {
	# bogus
	}

	$sth->finish;
	return;
}


# remove an item from the cart
sub remove_cart_item {
	redirect_hack_fix;
	my($sth,$id,$pid,$result);

	$pid = $cgih->param('pid');
	$id = $cgih->param('id');

	$sth=$dbh->prepare($spDelItemCart);
	$sth->bind_param(1,$id);

	$result = $sth->execute;

	if ($result) {
		if ($cgih->param('last_action')) { 
		##o_back(); 
		view_cart();
		} else { view_cart(); }
	} else {
		print "here!",$sth->errstr," ",$result;
	# boom
	}

	$sth->finish;
	return;
}

# apply promo 
sub promo {
	redirect_hack_fix;
	my ($sth,$result,$promo,@row, $code);
	$promo = $cgih->param('promo');
	
# apply this promo if it exists 
	$sth = $dbh->prepare($spPromoApply);
	$sth->bind_param(1,$sid);
	$sth->bind_param(2,$promo);
	$result = $sth->execute;
	
	if ($result) {		
		@row=$sth->fetchrow_array;
		
		if (@row) {
			$code = $row[0];
						
			if ($code == -1) {
					print "";
			} else {
				if ($code == -2) {
					print "expired code";
				} else {					
					print "previously applied";			
				}
			}
		} else {
			print "promo was applied";
		}
	} else {
		# error?
	}
	
	view_cart();
	
	$sth->finish;
	return;
}


# find/return/set session
sub sessionID {

 	my($sth,$sid);
	print $cgih->cookie('sessionID');
 	
	if ($cgih->cookie('sessionID')) { return $cgih->cookie('sessionID'); }
 	else {
	
		##$sth = $dbh->prepare("LOCK TABLES sessionCounter WRITE");
		##$sth->execute;

		$sth = $dbh->prepare("UPDATE sessionCounter SET ID=ID+1");
		$sth->execute;

		$sth = $dbh->prepare("SELECT ID FROM sessionCounter");
		$sth->execute;

		$sid = $sth->fetchrow_array;

		##$sth = $dbh->prepare("UNLOCK TABLES");
		##$sth->execute;

		# -- insert into session table, good stuff :)
		$sth = $dbh->prepare($spNewSession);
		$sth->bind_param(1,time()); # unix timestamp
		$sth->bind_param(2,$cgih->referer);
		$sth->bind_param(3,$cgih->remote_addr);
		$sth->bind_param(4,$cgih->user_agent);
		$sth->bind_param(5,$sid);
		$sth->execute;
		$sth->finish;

		return $sid;
	}
}


sub error {
 print $cgih->start_html(-title=>'Cart Error');
 print $cgih->h1('Error');
 print $_;
 print $cgih->end_html;
}

# returns nothing if all requireds are there in query string
sub requireds {

my @required = @_;
my ($req,@missing_fields);

foreach $req (@required) {
 if ($cgih->param($req) eq '') {
  push @missing_fields,$req;
 }
}

return @missing_fields;
}


# working
sub step_list {

	my $sl = $_[0]; # number of steps
 	my $cs = $_[$sl+1]; # current step

 	print qq{<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#F0F0F0"><TR BGCOLOR="#C0C0C0">
	<TD ALIGN="CENTER" COLSPAN="2"><B>Step</B></TD></TR>};

 	for ($i=1;$i<=$sl;$i++) {
  		$step = $_[$i];
  		if ($i==$cs) {
    		print qq{<TR><TD><B>$i.</B></TD><TD><B><U><FONT COLOR="Red">$step</FONT></U></B></TD></TR>}; 
   		} else { 
			print qq{<TR><TD><B>$i.</B></TD><TD>$step</TD></TR>};
		}
 	}
 
 	print qq{</TABLE>};
 	return $cs;
}


#- support function
sub generic_message {
 my $header = $_[0];
 my $msg = $_[1];

 print $cgih->start_html(-title=>"$header");
 include_header();
  print qq{<TABLE BORDER="0" CELPADDING="1" CELLSPACING="2" BGCOLOR="#ffcc66" WIDTH="590">
	<TR BGCOLOR="#ffaa00"><TD ALIGN="CENTER" COLSPAN="2"><FONT SIZE="+3">$header
	</FONT></TD></TR><TR><TD><FONT VALIGN="TOP" ALIGN="CENTER" COLOR="Red">
	$msg</FONT><BR><BR>
	Please click <B><U>BACK</U></B> in your browser.</TD></TR></TABLE>},
	$cgih->end_html;
 exit;
}

#- support function
sub missing_fields {

 	my $missed;
 	my @missed = requireds(@_);

 	if (@missed) {
  		print $cgih->start_html(-title=>'Missing Fields');

  		include_header();

		print qq{
			<TABLE BORDER="0" CELPADDING="1" CELLSPACING="2" BGCOLOR="#ffcc66">
				<TR BGCOLOR="#ffaa00">
					<TD ALIGN="CENTER" COLSPAN="2"><FONT SIZE="+3">Missing Required Fields</FONT></TD>
				</TR>
				<TR>
					<TD><FONT VALIGN="TOP" ALIGN="CENTER" COLOR="Red">We can not complete your order without the following information.<BR>
						Please click <B><U>BACK</U></B> in your browser and fill in the required fields.</FONT></TD>
					<TD	ALIGN="LEFT">
						<OL>};

  		foreach $missed (@missed) {
   			print qq{<LI>$missed</LI>};
  		}
  		print qq{</OL></TD></TR></TABLE>},$cgih->end_html;
  		exit;
 	}
}

sub shipping_form  {
 my($code);
 $code = $_[0];  # code we're using

 my ($shipcompanyname,$shipcontactname,$shipad1,$shipad2,$shipcity,$shipstate,$shipzip, $shipphone);
 my ($billcompanyname,$billcontactname,$billad1,$billad2,$billcity,$billstate,$billzip);
 my ($acctcompanyname,$acctcontactname, $acctfax, $acctcell, $acctad1,$acctad2,$acctcity,$acctstate,$acctzip); 
 my ($shipmethod,$shipcost);
 my ($creditcardnumber,$expmonth,$expyear,$paymentmethod,$contactphone,$emailaddress);

 my @required_ship = ('ShipContactName','ShipAddress1','ShipCity','ShipState','ShipZip', 'AddressType');
 my @required_acct = ('AcctContactName','AcctAddress1', 'AcctCity', 'AcctState', 'AcctZip');
 my @required_bill = ('ContactPhone','BillAddress1','BillCity','BillState','BillZip','EmailAddress');
 
 # shipping info
 $shipcompanyname = $cgih->param('ShipCompanyName');
 $shipcontactname = $cgih->param('ShipContactName');
 $shipad1 = $cgih->param('ShipAddress1');
 $shipad2 = $cgih->param('ShipAddress2');
 $shipcity = $cgih->param('ShipCity');
 $shipstate = $cgih->param('ShipState');
 $shipzip = $cgih->param('ShipZip');
 $shipphone = $cgih->param('ShipPhone');
 
 # billing info
 $billcompanyname = $cgih->param('BillCompanyName');
 $billcontactname = $cgih->param('BillContactName');
 $billad1 = $cgih->param('BillAddress1');
 $billad2 = $cgih->param('BillAddress2');
 $billcity = $cgih->param('BillCity');
 $billstate = $cgih->param('BillState');
 $billzip = $cgih->param('BillZip');

 # account info
 $acctcompanyname = $cgih->param('AcctCompanyName');
 $acctcontactname = $cgih->param('AcctContactName');
 $acctad1 = $cgih->param('AcctAddress1');
 $acctad2 = $cgih->param('AcctAddress2');
 $acctcity= $cgih->param('AcctCity');
 $acctstate = $cgih->param('AcctState');
 $acctzip = $cgih->param('AcctZip');
 $acctphone = $cgih->param('AcctPhone');
 $acctfax = $cgih->param('AcctFax');
 $acctcell = $cgih->param('AcctCell');
 
 # misc dangerous globals :)
 $emailaddress = $cgih->param('EmailAddress');
 $contactphone = $cgih->param('ContactPhone');
 $shipmethod = $cgih->param('ShipMethod');
 $shipcost = $cgih->param('ShipCost');
 $total = $cgih->param('Total'); 
 $subtotal = $cgih->param('SubTotal');
 $tax = $cgih->param('Tax'); 
 $creditcardnumber = $cgih->param('CreditCardNumber');
 $creditcardnumber =~s/\D//g;
 $paymentmethod = $cgih->param('PaymentMethod');
 $expmonth = $cgih->param('ExpMonth');
 $expyear = $cgih->param('ExpYear'); 
 $cvv2 = $cgih->param('CVV2');
 $addresstype = $cgih->param('AddressType');
 @steps = ('Account Information', 'Shipping Address','Shipping Method','Billing Info','Confirmation','Finished');

#----------------------------
# Account  Information Header
#----------------------------
 if ($code==0) {
 	redirect_hack_fix;
 	print $cgih->start_html(-title=>'Account Information');
 	include_header();
  
 	print $cgih->start_form;
 
	print qq{<TABLE BORDER="0" CELLSPACING="6"><TR><TD VALIGN="TOP">}; 
	step_list(6,@steps,$code + 1);
	print qq{</TD><TD>}; 
	#---------------------
 	print qq{
 	<table BORDER="0" CELLPADDING="2" CELLSPACING="1" BGCOLOR="#ffcc66">
		<tr bgcolor="#ffaa00"><td ALIGN="CENTER" COLSPAN="3"><b>Account/Company Information</b></td></tr>
		<tr><td nowrap><b>Company Name</b></td><td><input SIZE=25 MAXLENGTH=60 NAME="AcctCompanyName">&nbsp;Optional</td><td>&nbsp;</td></tr>
		<tr><td nowrap><b>Contact Name</b></td><td><input SIZE=25 MAXLENGTH=60 NAME="AcctContactName"><font color="red">*</font></td><td>&nbsp;</td></tr>
		<tr><td nowrap><b>Address 1</b></td><td><input SIZE=30 MAXLENGTH=60 NAME="AcctAddress1"><font color="red">*</font></td><td>&nbsp;</td></tr>
		<tr><td nowrap><b>Address 2</b></td><td><input SIZE=30 MAXLENGTH=60 NAME="AcctAddress2"></td><td>&nbsp;</td></tr>
		<tr><td nowrap><b>City</b></td><td><input SIZE=30 MAXLENGTH=40 NAME="AcctCity"><font color="red">*</font></td><td>&nbsp;</td></tr>
		<tr><td nowrap><b>State/Province</b></td>
			<td><!-- <input SIZE=4 MAXLENGTH=4 NAME="AcctState"> -->
				<select name="AcctState"> 
					<option value="">Select A State</option> 
					<option value="AL">Alabama</option> 
					<option value="AK">Alaska</option> 
					<option value="AZ">Arizona</option> 
					<option value="AR">Arkansas</option> 
					<option value="CA">California</option> 
					<option value="CO">Colorado</option> 
					<option value="CT">Connecticut</option> 
					<option value="DE">Delaware</option> 
					<option value="DC">District Of Columbia</option> 
					<option value="FL">Florida</option> 
					<option value="GA">Georgia</option> 
					<option value="HI">Hawaii</option> 
					<option value="ID">Idaho</option> 
					<option value="IL">Illinois</option> 
					<option value="IN">Indiana</option> 
					<option value="IA">Iowa</option> 
					<option value="KS">Kansas</option> 
					<option value="KY">Kentucky</option> 
					<option value="LA">Louisiana</option> 
					<option value="ME">Maine</option> 
					<option value="MD">Maryland</option> 
					<option value="MA">Massachusetts</option> 
					<option value="MI">Michigan</option> 
					<option value="MN">Minnesota</option> 
					<option value="MS">Mississippi</option> 
					<option value="MO">Missouri</option> 
					<option value="MT">Montana</option> 
					<option value="NE">Nebraska</option> 
					<option value="NV">Nevada</option> 
					<option value="NH">New Hampshire</option> 
					<option value="NJ">New Jersey</option> 
					<option value="NM">New Mexico</option> 
					<option value="NY">New York</option> 
					<option value="NC">North Carolina</option> 
					<option value="ND">North Dakota</option> 
					<option value="OH">Ohio</option> 
					<option value="OK">Oklahoma</option> 
					<option value="OR">Oregon</option> 
					<option value="PA">Pennsylvania</option> 
					<option value="RI">Rhode Island</option> 
					<option value="SC">South Carolina</option> 
					<option value="SD">South Dakota</option> 
					<option value="TN">Tennessee</option> 
					<option value="TX">Texas</option> 
					<option value="UT">Utah</option> 
					<option value="VT">Vermont</option> 
					<option value="VA">Virginia</option> 
					<option value="WA">Washington</option> 
					<option value="WV">West Virginia</option> 
					<option value="WI">Wisconsin</option> 
					<option value="WY">Wyoming</option>
					<option value="PR">Puerto Rico</option>
					<option value="AB">Alberta</option>
					<option value="BC">British Columbia</option>
					<option value="MB">Manitoba</option>
					<option value="NB">New Brunswick</option>
					<option value="NL">Newfoundland and Labrador</option>
					<option value="NS">Nova Scotia</option>
					<option value="ON">Ontario</option>
					<option value="PE">Prince Edward Island</option>
					<option value="QC">Quebec</option>
					<option value="SK">Saskatchewan</option>
					<option value="NT">Northwest Territories</option>
					<option value="NU">Nunavut</option>
					<option value="YT">Yukon</option>
				</select>		
				<font color="red">*</font></td><td>&nbsp;
			</td>
		</tr>
		<tr><td nowrap><b>Zip</b></td><td><input SIZE=5 MAXLENGTH=5 NAME="AcctZip"><font color="red">*</font></td><td>&nbsp;</td></tr>
		<tr><td nowrap><b>Phone #</b></td><td><input SIZE=15 MAXLENGTH=15 NAME="AcctPhone"><font color="red">*</font></td><td>Phone # of business address.</td></tr>
		<tr><td nowrap><b>Fax #</b></td><td><input SIZE=15 MAXLENGTH=15 NAME="AcctFax"></td><td>&nbsp;</td></tr>	
		<tr><td nowrap><b>Cell #</b></td><td><input SIZE=15 MAXLENGTH=15 NAME="AcctCell"></td><td>&nbsp;</td></tr>
	</table>
	<input type="hidden" name="action" value="Shipping Form">
	};

	print qq{
		</TD></TR><TR><TD>&nbsp;</TD><TD ALIGN="CENTER">
		<INPUT TYPE="SUBMIT" VALUE="Enter Shipping Address">
		</TD></TR></TABLE>
	};

	print $cgih->end_form;

#-----------------------
# Select Shipping Method
#-----------------------
} elsif ($code==1) {
	redirect_hack_fix;
	missing_fields(@required_acct);

 print $cgih->start_html(-title=>'Shipping Information');
 include_header();
  
 print $cgih->start_form;
 
 print qq{<TABLE BORDER="0" CELLSPACING="6"><TR><TD VALIGN="TOP">}; 
 step_list(6,@steps,$code + 1);
 print qq{</TD><TD>}; 
#---------------------
 print qq{
 <table BORDER="0" CELLPADDING="2" CELLSPACING="1" BGCOLOR="#ffcc66">
	<tr bgcolor="#ffaa00"><td ALIGN="CENTER" COLSPAN="3"><b>Shipping Information</b></td></tr>
	<tr><td nowrap><b>Company Name</b></td><td><input SIZE=25 MAXLENGTH=60 NAME="ShipCompanyName"></td><td>&nbsp;</td></tr>
	<tr><td nowrap><b>Contact Name</b></td><td><input SIZE=25 MAXLENGTH=60 NAME="ShipContactName"><font color="red">*</font></td><td>&nbsp;</td></tr>
	<tr><td nowrap><b>Address 1</b></td><td><input SIZE=30 MAXLENGTH=60 NAME="ShipAddress1"><font color="red">*</font></td><td>&nbsp;</td></tr>
	<tr><td nowrap><b>Address 2</b></td><td><input SIZE=30 MAXLENGTH=60 NAME="ShipAddress2"></td><td>&nbsp;</td></tr>
	<tr><td nowrap><b>City</b></td><td><input SIZE=30 MAXLENGTH=40 NAME="ShipCity"><font color="red">*</font></td><td>&nbsp;</td></tr>
	<tr><td nowrap><b>State/Province</b></td>
		<td><!-- <input SIZE=4 MAXLENGTH=4 NAME="ShipState"> -->
			<select name="ShipState"> 
				<option value="">Select A State</option> 
				<option value="AL">Alabama</option> 
				<option value="AK">Alaska</option> 
				<option value="AZ">Arizona</option> 
				<option value="AR">Arkansas</option> 
				<option value="CA">California</option> 
				<option value="CO">Colorado</option> 
				<option value="CT">Connecticut</option> 
				<option value="DE">Delaware</option> 
				<option value="DC">District Of Columbia</option> 
				<option value="FL">Florida</option> 
				<option value="GA">Georgia</option> 
				<option value="HI">Hawaii</option> 
				<option value="ID">Idaho</option> 
				<option value="IL">Illinois</option> 
				<option value="IN">Indiana</option> 
				<option value="IA">Iowa</option> 
				<option value="KS">Kansas</option> 
				<option value="KY">Kentucky</option> 
				<option value="LA">Louisiana</option> 
				<option value="ME">Maine</option> 
				<option value="MD">Maryland</option> 
				<option value="MA">Massachusetts</option> 
				<option value="MI">Michigan</option> 
				<option value="MN">Minnesota</option> 
				<option value="MS">Mississippi</option> 
				<option value="MO">Missouri</option> 
				<option value="MT">Montana</option> 
				<option value="NE">Nebraska</option> 
				<option value="NV">Nevada</option> 
				<option value="NH">New Hampshire</option> 
				<option value="NJ">New Jersey</option> 
				<option value="NM">New Mexico</option> 
				<option value="NY">New York</option> 
				<option value="NC">North Carolina</option> 
				<option value="ND">North Dakota</option> 
				<option value="OH">Ohio</option> 
				<option value="OK">Oklahoma</option> 
				<option value="OR">Oregon</option> 
				<option value="PA">Pennsylvania</option> 
				<option value="RI">Rhode Island</option> 
				<option value="SC">South Carolina</option> 
				<option value="SD">South Dakota</option> 
				<option value="TN">Tennessee</option> 
				<option value="TX">Texas</option> 
				<option value="UT">Utah</option> 
				<option value="VT">Vermont</option> 
				<option value="VA">Virginia</option> 
				<option value="WA">Washington</option> 
				<option value="WV">West Virginia</option> 
				<option value="WI">Wisconsin</option> 
				<option value="WY">Wyoming</option>
				<option value="PR">Puerto Rico</option>
				<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NL">Newfoundland and Labrador</option>
				<option value="NS">Nova Scotia</option>
				<option value="ON">Ontario</option>
				<option value="PE">Prince Edward Island</option>
				<option value="QC">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="NT">Northwest Territories</option>
				<option value="NU">Nunavut</option>
				<option value="YT">Yukon</option>
			</select>		
			<font color="red">*</font></td><td>&nbsp;
		</td>
	</tr>
	<tr><td nowrap><b>Zip</b></td><td><input SIZE=5 MAXLENGTH=5 NAME="ShipZip"><font color="red">*</font></td><td>&nbsp;</td></tr>
	<tr><td nowrap><b>Phone #</b></td><td><input SIZE=15 MAXLENGTH=15 NAME="ShipPhone"><font color="red">*</font></td><td>Phone # of shipping address.</td></tr>
	<tr><td nowrap><b>Address Type</b></td>
    <td>
        <select name="AddressType">
            <option value="">Select A Type</option>
            <option value="Residential">Residential</option>
            <option value="Commercial">Commercial</option>
            <option value="Farm">Farm</option>
        </select>
		<font color="red">*</font></td><td>&nbsp;
    </td>
</tr>
 </table>
 <input type="hidden" name="action" value="Shipping Info">
};

 print qq{
	 <input type="hidden" name="AcctCompanyName" value="$acctcompanyname">
	 <input type="hidden" name="AcctContactName" value="$acctcontactname">
	 <input type="hidden" name="AcctAddress1" value="$acctad1">
	 <input type="hidden" name="AcctAddress2" value="$acctad2">
	 <input type="hidden" name="AcctCity" value="$acctcity">
	 <input type="hidden" name="AcctState" value="$acctstate">
	 <input type="hidden" name="AcctZip" value="$acctzip">
	 <input type="hidden" name="AcctPhone" value="$acctphone">
	 <input type="hidden" name="AcctFax" value="$acctfax">
	 <input type="hidden" name="AcctCell" value="$acctcell">
 };
 
 print qq{
</TD></TR><TR><TD>&nbsp;</TD><TD ALIGN="CENTER">
<INPUT TYPE="SUBMIT" VALUE="Select Shipping Method">
</TD></TR></TABLE>
};

 print $cgih->end_form;

} elsif ($code==2) {
	redirect_hack_fix;

	#-- look for missing fields
 	missing_fields(@required_ship);

#-- actually work next pages magic

 my ($shipments,$sth,$total_weight,$temp_weight,$max_weight,$oversized, $result,@row,$estes_total,$ups,$amer,$qty);

 $sth = $dbh->prepare("SELECT cart.weight,cart.qty,catalog.oversized,catalog.class FROM cart,catalog WHERE sessionID = $sid and catalog.pid = cart.pid");
 $result = $sth->execute;
  
 if (!$result) {
   die($sth->errstr);
  }

 $total_items = 0;
 $total_weight = 0; $max_weight=0;
 $ups = 0;
 $shipments = 1;
 $temp_weight = 0;
 $oversized = 0;
 my %classes = ();
 my %estes_rates = ();
 $estes_total = 0;

while (@row=$sth->fetchrow_array) {  
  $total_weight += $row[0] * $row[1];

  $qty = $row[1]; 
  while($qty>0)
  {
	$temp_weight += $row[0];		

 	if ($temp_weight + $row[0]>70)
	{
		# this is one shipment								
		
		$ups += ups_ground_rate($shipzip,$temp_weight);			
		$shipments += 1;
		$temp_weight = 0;
	}

	$qty = $qty - 1;
  }

  $oversized += $row[2];

  $classes{$row[3]} += $row[0] * $row[1];
  	
  if ($row[0]>$max_weight) { $max_weight = $row[0]; }
  $total_items += $row[1]; 
}

if ($temp_weight>0) 
{
	$ups += ups_ground_rate($shipzip,$temp_weight);			
}
 
 $ups = sprintf("%0.2f",$ups) + ($shipments * $__SHIP_INCREASE__);

 if ($max_weight > 150 || $oversized!=0 ) { $ups = undef; $shipmethod='LTL';} else { $shipmethod='UPSGROUND'; }

 #$estes = estes_rate($shipzip,$total_weight,55) + ($shipments * $__SHIP_INCREASE__);

while( ($class, $weight) = each(%classes) ){
	$estes_rate = estes_rate($shipzip,$weight,$class) ;
	$estes_total += $estes_rate;
	$estes_rates{$class} = $estes_rate;
}
$estes_total = $estes_total + ($shipments * $__SHIP_INCREASE__);

# $amer = american_ship_rate($shipzip,$total_weight);
 $sth->finish;
#ALEX
     get_estes_total($shipzip, $sid, %classes);

     print $cgih->start_html(-title=>'Shipping Options');
 include_header();

 print qq{<TABLE BORDER="0" CELLSPACING="6"><TR><TD>};
 step_list(6,@steps,$code + 1);
 print qq{</TD>};

 print $cgih->start_form;
 
print qq{
	 <input type="hidden" name="AcctCompanyName" value="$acctcompanyname">
	 <input type="hidden" name="AcctContactName" value="$acctcontactname">
	 <input type="hidden" name="AcctAddress1" value="$acctad1">
	 <input type="hidden" name="AcctAddress2" value="$acctad2">
	 <input type="hidden" name="AcctCity" value="$acctcity">
	 <input type="hidden" name="AcctState" value="$acctstate">
	 <input type="hidden" name="AcctZip" value="$acctzip">
	 <input type="hidden" name="AcctPhone" value="$acctphone">
	 <input type="hidden" name="AcctFax" value="$acctfax">
	 <input type="hidden" name="AcctCell" value="$acctcell">
	 <!--[]-->
	 <input type="hidden" name="ShipCompanyName" value="$shipcompanyname">
	 <input type="hidden" name="ShipContactName" value="$shipcontactname">
	 <input type="hidden" name="ShipAddress1" value="$shipad1">
	 <input type="hidden" name="ShipAddress2" value="$shipad2">
	 <input type="hidden" name="ShipCity" value="$shipcity">
	 <input type="hidden" name="ShipState" value="$shipstate">
	 <input type="hidden" name="ShipZip" value="$shipzip">
	 <input type="hidden" name="ShipPhone" value="$shipphone">
	 <input type="hidden" name="ShipMethod" value="$shipmethod">
	 <input type="hidden" name="AddressType" value="$addresstype">

 };
 
 print qq{</TD><TD VALIGN="TOP">};
 
 #- display shipping table
 print qq{<TABLE BORDER="0" CELLSPACING="1" CELPADDING="2" BGCOLOR="#ffcc66"><TR><TD>};

 print qq{<TR BGCOLOR="#ffaa00"><TD COLSPAN="3" ALIGN="CENTER"><B>Shipping Methods Available</B></TD></TR>};
 print qq{<TR><TD><B>Carrier</B></TD><TD><B>Price</B></TD><TD>&nbsp;</TD></TR>};
 print qq{<TR><TD>LTL Freight</TD><TD>};
 if ($estes_total>($shipments * $__SHIP_INCREASE__)) {
  print '$',sprintf("%0.2f",$estes_total),qq{</TD><TD> <INPUT TYPE="RADIO" NAME="ShipMethod" VALUE="LTL"};
  if ($shipmethod eq 'LTL') { print "CHECKED"; };
  print qq{></TD></TR>};
 } else {
  print qq{Not Avail</TD><TD>&nbsp;</TD>};
 }

 print qq{<TR><TD>UPS Ground</TD><TD>};
 if ($ups>0) {
  print '$',$ups,qq{</TD><TD><INPUT TYPE="RADIO" NAME="ShipMethod" VALUE="UPSGROUND"};
  if ($shipmethod eq 'UPSGROUND') { print "CHECKED"; }
  print qq{></TD></TR>};
 } else {
  print qq{Not Avail</TD><TD>&nbsp;</TD>};
 }
 
# print qq{<TR><TD>Pickup</TD><TD>Call</TD><TD><INPUT TYPE="RADIO"
#NAME="ShipMethod" VALUE="PICKUP"};

# if ($shipmethod eq 'PICKUP') { print "PICKUP"; }
#print qq{</TD>};
 

# print qq{<TR><TD>By Arrangement</TD><TD>Call</TD><TD><INPUT TYPE="RADIO" NAME="ShipMethod" VALUE="SPECIAL"};
# if ($shipmethod eq 'SPECIAL') { print "CHECKED"; }
# print qq{></TD>};
 print qq{</TABLE>};

 print qq{</TD><TD VALIGN="TOP"><TABLE BORDER="0" CELLPADDING="1" CELLPADDING="2" BGCOLOR="#F0F0F0">
	<TR BGCOLOR="#C0C0C0">
	<TD ALIGN="CENTER"><B>ShipTo: </B></TD></TR><TR>
	<TD VALIGN="TOP"><NOBR>$shipcompanyname $shipcontactname</NOBR><BR>
	<NOBR>$shipad1</NOBR><BR><NOBR>$shipad2</NOBR><BR>
	<NOBR>$shipcity, $shipstate $shipzip</NOBR><BR>
	 </TD></TR></TABLE></TD>

 </TR>
 <TR><TD>&nbsp;</TD><TD ALIGN="CENTER" VALIGN="TOP"><INPUT TYPE="SUBMIT" VALUE="Enter Billing Info">
 <INPUT TYPE="HIDDEN" NAME="action" VALUE="Billing Form">
 </TD>
 <TD>&nbsp;</TD>
 </TR>
</TABLE>};

 print $cgih->end_form;

} elsif ($code==3) {
	redirect_hack_fix;
	#-----------------------------
	# Billing Information Header
	#-----------------------------

 	missing_fields('ShipMethod',@required_ship);
	print $cgih->start_html(-title=>'Billing/Credit Card Information');

	include_header();
 	print $cgih->start_form;

	print qq{<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF"><TR><TD VALIGN="TOP">}; 
	step_list(6,@steps,$code + 1);
	print qq{</TD><TD>};

 print qq{
 <TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#ffcc66" width="550">
	<tr bgcolor="#ffaa00"><td align="center" colspan="3"><b>Billing/Credit Card Information</b></td></tr>
	<tr><td nowrap><b>Name On Card</b></td><td><INPUT SIZE=25 MAXLENGTH=60 NAME="BillContactName" VALUE="$billcontactname"><font color="red">*</font></td><td>&nbsp;</td></tr>	
	<tr><td nowrap><b>Company Name</b></td><td><INPUT SIZE=25 MAXLENGTH=60 NAME="BillCompanyName" VALUE="$billcompanyname"></td><td>&nbsp;</td></tr>	
	<tr><td><b>Address 1</b></td><td nowrap><INPUT SIZE=30 MAXLENGTH=60 NAME="BillAddress1" VALUE="$billad1"><font color="red">*</font></td><td rowspan="3">Address where credit card statement is mailed to.</td></tr>
	<tr><td><b>Address 2</b></td><td nowrap><INPUT SIZE=30 MAXLENGTH=60 NAME="BillAddress2" VALUE="$billad2"></td></tr>
	<tr><td><b>City</b></td><td nowrap><INPUT SIZE=30 MAXLENGTH=40 NAME="BillCity" VALUE="$billcity"><font color="red">*</font></td></tr>
	<tr><td><b>State/Province</b></td>
		<td nowrap><!-- <INPUT SIZE=4 MAXLENGTH=4 NAME="BillState" VALUE="$billstate"> -->
			<select name="BillState"> 
				<option value="">Select A State</option> 
				<option value="AL">Alabama</option> 
				<option value="AK">Alaska</option> 
				<option value="AZ">Arizona</option> 
				<option value="AR">Arkansas</option> 
				<option value="CA">California</option> 
				<option value="CO">Colorado</option> 
				<option value="CT">Connecticut</option> 
				<option value="DE">Delaware</option> 
				<option value="DC">District Of Columbia</option> 
				<option value="FL">Florida</option> 
				<option value="GA">Georgia</option> 
				<option value="HI">Hawaii</option> 
				<option value="ID">Idaho</option> 
				<option value="IL">Illinois</option> 
				<option value="IN">Indiana</option> 
				<option value="IA">Iowa</option> 
				<option value="KS">Kansas</option> 
				<option value="KY">Kentucky</option> 
				<option value="LA">Louisiana</option> 
				<option value="ME">Maine</option> 
				<option value="MD">Maryland</option> 
				<option value="MA">Massachusetts</option> 
				<option value="MI">Michigan</option> 
				<option value="MN">Minnesota</option> 
				<option value="MS">Mississippi</option> 
				<option value="MO">Missouri</option> 
				<option value="MT">Montana</option> 
				<option value="NE">Nebraska</option> 
				<option value="NV">Nevada</option> 
				<option value="NH">New Hampshire</option> 
				<option value="NJ">New Jersey</option> 
				<option value="NM">New Mexico</option> 
				<option value="NY">New York</option> 
				<option value="NC">North Carolina</option> 
				<option value="ND">North Dakota</option> 
				<option value="OH">Ohio</option> 
				<option value="OK">Oklahoma</option> 
				<option value="OR">Oregon</option> 
				<option value="PA">Pennsylvania</option> 
				<option value="RI">Rhode Island</option> 
				<option value="SC">South Carolina</option> 
				<option value="SD">South Dakota</option> 
				<option value="TN">Tennessee</option> 
				<option value="TX">Texas</option> 
				<option value="UT">Utah</option> 
				<option value="VT">Vermont</option> 
				<option value="VA">Virginia</option> 
				<option value="WA">Washington</option> 
				<option value="WV">West Virginia</option> 
				<option value="WI">Wisconsin</option> 
				<option value="WY">Wyoming</option>
				<option value="PR">Puerto Rico</option>
				<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NL">Newfoundland and Labrador</option>
				<option value="NS">Nova Scotia</option>
				<option value="ON">Ontario</option>
				<option value="PE">Prince Edward Island</option>
				<option value="QC">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="NT">Northwest Territories</option>
				<option value="NU">Nunavut</option>
				<option value="YT">Yukon</option>
			</select>		
			<font color="red">*</font>
		</td><td>&nbsp;</td>
	</tr>
	<tr><td><b>Zip/Postal Code</b></td><td nowrap><INPUT SIZE=5 MAXLENGTH=5 NAME="BillZip" VALUE="$billzip"><font color="red">*</font></td><td>&nbsp;</td></tr>
	<tr><td><b>Contact Phone #</b></td><td nowrap><INPUT SIZE=32 MAXLENGTH=32 NAME="ContactPhone" VALUE="$contactphone"><font color="red">*</font></td><td>&nbsp;</td></tr>
	<tr><td><b>Email Address</b></td><td nowrap><INPUT SIZE=32 MAXLENGTH=255 NAME="EmailAddress" VALUE="$emailaddress"><font color="red">*</font></td><td>&nbsp;</td></tr>
 </TABLE>
 };

 print qq{</TD><TD VALIGN="TOP" ALIGN="RIGHT">};

print qq{<TABLE BORDER="0" CELLPADDING="1" CELLPADDING="2" BGCOLOR="#F0F0F0">
	<TR BGCOLOR="#C0C0C0">
	<TD ALIGN="CENTER"><B>ShipTo: </B></TD></TR><TR>
	<TD VALIGN="TOP"><NOBR>$shipcompanyname $shipcontactname</NOBR><BR>
	<NOBR>$shipad1</NOBR><BR><NOBR>$shipad2</NOBR><BR>
	<NOBR>$shipcity, $shipstate $shipzip</NOBR><BR>
	 </TD></TR><TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER"><B>Via:</B></TD></TR><TR><TD>$shipmethod</TD></TR></TABLE>}; 
 print qq{</TD></TR>

<TR><TD>&nbsp;</TD><TD COLSPAN="2" ALIGN="LEFT">
<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR=#ffcc66>
 <TR BGCOLOR="#ffaa00"><TD COLSPAN="4" ALIGN="CENTER"><B>By Entering Payment Info Customer agrees to Terms of Sales and Ordering Agreements</B></TD></TR>
 <TR>
 <TD>Payment Method</TD><TD>
 <SELECT NAME="PaymentMethod">
  <OPTION>VISA
  <OPTION>MASTERCARD
  <OPTION>AMEX
  <OPTION>CHECK/MO
 </SELECT>
 </TD>
 <TD>Expiration Date</TD><TD>
 <NOBR>
 <SELECT NAME="ExpMonth">
  <OPTION>01
  <OPTION>02
  <OPTION>03
  <OPTION>04
  <OPTION>05
  <OPTION>06
  <OPTION>07
  <OPTION>08
  <OPTION>09
  <OPTION>10
  <OPTION>11
  <OPTION>12
 </SELECT>/<SELECT NAME="ExpYear">
  <OPTION>2020
  <OPTION>2021
  <OPTION>2022
  <OPTION>2023
  <OPTION>2024
  <OPTION>2025
  <OPTION>2026
  <OPTION>2027
  <OPTION>2028
  <OPTION>2029
  <OPTION>2030
</SELECT>
 </NOBR>
 </TD>
 </TR>
 <TR>
  <TD>Credit Card Number</TD><TD><INPUT SIZE=19 MAXLENGTH=19 NAME="CreditCardNumber" VALUE=$creditcardnumber></TD>
 </TR>
 <TR>
  <TD>Last 3 Digits On Back of Cart (CVV2)</TD><TD><INPUT SIZE=3 MAXLENGTH=4 NAME="CVV2" VALUE="$cvv2">
  <font size=-1>
  <A HREF="javascript:popUp('https://www.ds-sewing.com/cvv2.html')">Click here for explanation.</A>
  </TD>
 </TR>
 </TABLE>
 </TD></TR>

 <TR>
   <TD>&nbsp;</TD><TD COLSPAN="2" ALIGN="CENTER">
   <INPUT TYPE="HIDDEN" NAME="action" VALUE="Billing Confirm"><INPUT TYPE="SUBMIT" VALUE="Confirm Input"></TD>
 </TR>
 </TABLE>};
print qq{
	 <input type="hidden" name="AcctCompanyName" value="$acctcompanyname">
	 <input type="hidden" name="AcctContactName" value="$acctcontactname">
	 <input type="hidden" name="AcctAddress1" value="$acctad1">
	 <input type="hidden" name="AcctAddress2" value="$acctad2">
	 <input type="hidden" name="AcctCity" value="$acctcity">
	 <input type="hidden" name="AcctState" value="$acctstate">
	 <input type="hidden" name="AcctZip" value="$acctzip">
	 <input type="hidden" name="AcctPhone" value="$acctphone">
	 <input type="hidden" name="AcctFax" value="$acctfax">
	 <input type="hidden" name="AcctCell" value="$acctcell">
	 <!--[]-->
	 <input type="hidden" name="ShipCompanyName" value="$shipcompanyname">
	 <input type="hidden" name="ShipContactName" value="$shipcontactname">
	 <input type="hidden" name="ShipAddress1" value="$shipad1">
	 <input type="hidden" name="ShipAddress2" value="$shipad2">
	 <input type="hidden" name="ShipCity" value="$shipcity">
	 <input type="hidden" name="ShipState" value="$shipstate">
	 <input type="hidden" name="ShipZip" value="$shipzip">
	 <input type="hidden" name="ShipPhone" value="$shipphone">
	 <input type="hidden" name="ShipMethod" value="$shipmethod">
	 <!--[]-->
	 <input type="hidden" name="BillCompanyName" value="$billcompanyname">
	 <input type="hidden" name="BillContactName" value="$billcontactname">
	 <input type="hidden" name="BillAddress1" value="$billad1">
	 <input type="hidden" name="BillAddress2" value="$billad2">
	 <input type="hidden" name="BillCity" value="$billcity">
	 <input type="hidden" name="BillState" value="$billstate">
	 <input type="hidden" name="BillZip" value="$billzip">
	 <input type="hidden" name="BillPhone" value="$billphone">
	 <input type="hidden" name="AddressType" value="$addresstype">
};

 print $cgih->end_form;

} elsif ($code==4) {
	redirect_hack_fix;
	#-----------------------------
	# Display Summary Information
	#-----------------------------

	#- find missing fields
	missing_fields(@required_bill);
	#- check validity of credit card

 if (!($paymentmethod eq 'CHECK/MO')) {

  if (!valid_creditcard($creditcardnumber,$expmonth,$expyear))
  {
		generic_message("Invalid Credit Card","Your credit card appears to be invalid. Either the card has epxired or the number was entered incorrectly.");
  }

  if ( (length($cvv2)<3) || (length($cvv2)>4) )
  {
    generic_message("Invalid CVV2", "The provided CVV2 code is invalid.");
  }
  
  
  if ( (index($emailaddress,"@")==-1) || (index($emailaddress,".")==-1))
  {
    generic_message("Invalid Email", "Your email appears to be invalid.");
  }
  
  
 }

 my ($shipments,$sth,$total_weight,$temp_weight,$max_weight,$result,@row,$estes_total,$ups,$qty);

 $sth = $dbh->prepare("SELECT weight,qty FROM cart WHERE sessionID = $sid");
 $result = $sth->execute;

 
 $total_items = 0;
 $total_weight = 0; $max_weight=0;
 $ups = 0;
 $shipments = 1;
 $temp_weight = 0;
 my %classes = ();
 my %estes_rates = ();
 $estes_total = 0;

while (@row=$sth->fetchrow_array) {
  $total_weight += $row[0] * $row[1];
  $this_weight = $row[0] * $row[1];

  $qty = $row[1]; 
  while($qty>0)
  {
	$temp_weight += $row[0];		

 	if ($temp_weight + $row[0]>70)
	{
		# this is one shipment								
		
		$ups += ups_ground_rate($shipzip,$temp_weight);			
		$shipments += 1;
		$temp_weight = 0;
	}

	$qty = $qty - 1;
  }

  $classes{$row[3]} += $this_weight;
	
  if ($row[0]>$max_weight) { $max_weight = $row[0]; }
  $total_items += $row[1]; 
}


if ($temp_weight>0) 
{
	$ups += ups_ground_rate($shipzip,$temp_weight);			
}
 
 $ups = sprintf("%0.2f",$ups) + ($shipments * $__SHIP_INCREASE__); 
 
 if ($shipmethod eq 'UPSGROUND') {
  $shipcost = $ups;  #+ ($shipments * $__SHIP_INCREASE__);
 }
 elsif ($shipmethod eq 'LTL') {
  #$shipcost = estes_rate("06512",$shipzip,$total_weight,55,55) + ($shipments * $__SHIP_INCREASE__);

  while( ($class, $weight) = each(%classes) ){
	$estes_rate = estes_rate($shipzip,$weight,$class) ;
	$estes_total += $estes_rate;
	$estes_rates{$class} = $estes_rate;
  }
  $shipcost = $estes_total + ($shipments * $__SHIP_INCREASE__);

 }
 elsif ($shipmethod eq 'AMER') {
  $shipcost = american_ship_rate($shipzip,$total_weight);
 }
else {
  $shipcost = 0.0;
}
 
 $sth->finish;
 
 print $cgih->start_html(-title=>'Review Order');
 include_header();

 print qq{<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF"><TR><TD VALIGN="TOP">}; 
 step_list(6,@steps,$code + 1);
 print qq{</TD><TD VALIGN="TOP">};

	($total,$subtotal,$shipcost,$tax) = display_cart($shipcost,$shipstate);

	print qq{</TD>
	
	<TD VALIGN="TOP" ALIGN="LEFT">
		<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#F0F0F0">
		<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">Acct</TD></TR>
		<TR><TD>
			<NOBR>$acctcompanyname $acctcontactname</NOBR><BR>
			<NOBR>$acctad1</NOBR><BR>
			<NOBR>$acctad2</NOBR><BR>
			<NOBR>$acctcity, $acctstate $acctzip</NOBR><BR>
		</TD></TR>		
		<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">BillTo</TD></TR>
		<TR><TD>
			<NOBR>$billcompanyname $billcontactname</NOBR><BR>
			<NOBR>$billad1</NOBR><BR>
			<NOBR>$billad2</NOBR><BR>
			<NOBR>$billcity, $billstate $billzip</NOBR><BR>
		</TD></TR>
		<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">ShipTo</TD></TR>
		<TR><TD>
			<NOBR>$shipcompanyname $shipcontactname</NOBR><BR>
			<NOBR>$shipad1</NOBR><BR>
			<NOBR>$shipad2</NOBR><BR>
			<NOBR>$shipcity, $shipstate $shipzip</NOBR><BR>
		</TD></TR>
		<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">Ship Via</TD></TR>
		<TR><TD>$shipmethod</TD></TR>
		</TABLE></TD></TR>
	</TABLE>};
##      print
##qq{$shipmethod,$shipcost,$creditcardnumber,$paymentmethod,$expmonth,$expyear};

 print $cgih->start_form;
 
print qq{
	 <input type="hidden" name="AcctCompanyName" value="$acctcompanyname">
	 <input type="hidden" name="AcctContactName" value="$acctcontactname">
	 <input type="hidden" name="AcctAddress1" value="$acctad1">
	 <input type="hidden" name="AcctAddress2" value="$acctad2">
	 <input type="hidden" name="AcctCity" value="$acctcity">
	 <input type="hidden" name="AcctState" value="$acctstate">
	 <input type="hidden" name="AcctZip" value="$acctzip">
	 <input type="hidden" name="AcctPhone" value="$acctphone">
	 <input type="hidden" name="AcctFax" value="$acctfax">
	 <input type="hidden" name="AcctCell" value="$acctcell">
	 <!--[]-->
	 <input type="hidden" name="ShipCompanyName" value="$shipcompanyname">
	 <input type="hidden" name="ShipContactName" value="$shipcontactname">
	 <input type="hidden" name="ShipAddress1" value="$shipad1">
	 <input type="hidden" name="ShipAddress2" value="$shipad2">
	 <input type="hidden" name="ShipCity" value="$shipcity">
	 <input type="hidden" name="ShipState" value="$shipstate">
	 <input type="hidden" name="ShipZip" value="$shipzip">
	 <input type="hidden" name="ShipPhone" value="$shipphone">
	 <input type="hidden" name="ShipMethod" value="$shipmethod">
	 <!--[]-->
	 <input type="hidden" name="BillCompanyName" value="$billcompanyname">
	 <input type="hidden" name="BillContactName" value="$billcontactname">
	 <input type="hidden" name="BillAddress1" value="$billad1">
	 <input type="hidden" name="BillAddress2" value="$billad2">
	 <input type="hidden" name="BillCity" value="$billcity">
	 <input type="hidden" name="BillState" value="$billstate">
	 <input type="hidden" name="BillZip" value="$billzip">
	 <input type="hidden" name="BillPhone" value="$billphone">
	 <!--[]-->
	<input type="hidden" name="ContactPhone" value="$contactphone">
	<input type="hidden" name="EmailAddress" value="$emailaddress">
  
	<input type="hidden" name="ShipMethod" value="$shipmethod">
	<input type="hidden" name="ExpMonth" value="$expmonth">
	<input type="hidden" name="ExpYear" value="$expyear">
	<input type="hidden" name="PaymentMethod" value="$paymentmethod">
	<input type="hidden" name="CreditCardNumber" value="$creditcardnumber">
	<input type="hidden" name="CVV2" value="$cvv2">
	<input type="hidden" name="ShipCost" value="$shipcost">
	<input type="hidden" name="Total" value="$total">
	<input type="hidden" name="Tax" value="$tax">
	<input type="hidden" name="SubTotal" value="$subtotal">
	<input type="hidden" name="action" value="Finalize">
	<input type="hidden" name="AddressType" value="$addresstype">
	<input type="SUBMIT" value="Place Order">
 },$cgih->end_form;


} elsif ($code==5) {
	
	#---
	# finalize order of doom!
	#---

	#-- local variables if you will :)
	my ($isth,$orderid);


	# $sth = $dbh->prepare($spCreateOrder);

	# $sth->bind_param(1,$sid);
 	# $sth->bind_param(2,$acctcompanyname);
	# $sth->bind_param(3,$acctcontactname);
	# $sth->bind_param(4,$acctad1);
	# $sth->bind_param(5,$acctad2);
	# $sth->bind_param(6,$acctcity);
	# $sth->bind_param(7,$acctstate);
	# $sth->bind_param(8,$acctzip);
	# $sth->bind_param(9,$acctphone);
	# $sth->bind_param(10,$acctfax);
	# $sth->bind_param(11,$acctcell);
	# $sth->bind_param(12,$billcompanyname);
	# $sth->bind_param(13,$billcontactname);
	# $sth->bind_param(14,$billad1);
	# $sth->bind_param(15,$billad2);
	# $sth->bind_param(16,$billcity);
	# $sth->bind_param(17,$billstate);
	# $sth->bind_param(18,$billzip);
	# $sth->bind_param(19,$billphone);
	# $sth->bind_param(20,$shipcompanyname);
	# $sth->bind_param(21,$shipcontactname);
	# $sth->bind_param(22,$shipad1);
	# $sth->bind_param(23,$shipad2);
	# $sth->bind_param(24,$shipcity);
	# $sth->bind_param(25,$shipstate);
	# $sth->bind_param(26,$shipzip);
	# $sth->bind_param(27,$shipphone);
	# $sth->bind_param(28,$paymentmethod);
	# $sth->bind_param(29,$creditcardnumber);
	# $sth->bind_param(30,$expyear.'-'.$expmonth.'-'.$maxdays[$expmonth-1]);
	# $sth->bind_param(31,$cvv2);
	# $sth->bind_param(32,$shipmethod);
	# $sth->bind_param(33,$shipcost);
	# $sth->bind_param(34,$contactphone);
	# $sth->bind_param(35,$emailaddress);
	# $sth->bind_param(36,$tax);

	$exp_date = $expmonth.'-'.$maxdays[$expmonth-1].'-'.$expyear.' 12:00:00 AM'; 

	$insert_into_orders_sql = "
	INSERT 
	INTO 
	orders 
	VALUES(GETDATE(),
	'$sid', 
	'$acctcompanyname','$acctcontactname','$acctad1','$acctad2','$acctcity','$acctstate','$acctzip','$acctphone','$acctfax','$acctcell',
	'$billcompanyname','$billcontactname','$billad1','$billad2','$billcity','$billstate','$billzip','$billphone',
	'$shipcompanyname','$shipcontactname','$shipad1','$shipad2','$shipcity','$shipstate','$shipzip','$shipphone',
	'$paymentmethod','$creditcardnumber','$exp_date','$cvv2','$shipmethod',CONVERT(money,'$shipcost'),'$contactphone','$emailaddress',CONVERT(money,'$tax'),'0', '$addresstype')
	";
	# print "<br> insert sql<br> ".$insert_into_orders_sql."<br>end sql <br>";

	$sth = $dbh->prepare($insert_into_orders_sql);
	$result = $sth->execute;

	if (!$result) {
		die($sth->errstr);
	}

	# prevent DBI strangeness
	$dbh->commit;

 	$sth = $dbh->prepare("SELECT MAX(ID) FROM orders WHERE sessionID=$sid");
 	$result = $sth->execute;
 	if (!$result) { die($sth->errstr); }
 	$orderid = $sth->fetchrow_array;
 	if (!$result) { die($sth->errstr); }
 	$sth->finish;


	$insert_into_order_detail_sql = "
	insert order_detail select $orderid,pid,price,(isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0)), weight,qty, 
	(select top 1 P.code from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid)
	from cart C where sessionid=$sid
	";
	# print "<br> order_detail sql<br> ".$insert_into_order_detail_sql."<br>end order detail sql <br>";
	$sth = $dbh->prepare($insert_into_order_detail_sql);
	$result = $sth->execute; 

	if (!$result) { die($sth->errstr); }
	$sth->finish;

	$last4ccdigits = substr($creditcardnumber, -4);

#-- Start --
#print $cgih->start_html(-title=>'Thanks For Your Order');
#print qq{
#	<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF" width="800">
#	<TR>
#		<TD VALIGN="TOP" align="center">
#	};	
#include_header();
#print qq{
#		</TD>
#	</TR>
#</TABLE>	
#	};	

#print qq{
#<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF" width="800">
#	<TR>
#		<TD VALIGN="TOP" align="center">
#			<H1>D.S. Sewing Inc<br>Merritt</H1>
#		</TD>
#	</TR>
#	<TR>
#		<TD VALIGN="TOP" align="center">
#			<b>(800) 789-8143</b><br>
#			<font color="green" size="4"><b>Order Receipt:</b></font> <b>\# $orderid</b> <br>
#			[<A HREF="javascript:window.print()">Print This Page</a>]<br><br>			
#		</TD>
#	</TR>
#</TABLE>
#<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF" width="800">
#	<TR BGCOLOR="#c0c0c0">
#		<TD VALIGN="TOP" width="50%">
#			<B>Account Information:</B>
#		</TD>
#		<TD VALIGN="TOP" width="50%">
#			<B>Ship To Information:</B>  <br>
#		</TD>
#	</TR>
#	<TR>
#		<TD VALIGN="TOP" width="50%">
#			<B>Company Name:</B> $acctcompanyname <br>
#			<B>Name:</B>$acctcontactname <br>
#			<B>Address 1:</B> $acctad1<br>
#			<B>Address 2:</B>  $acctad2<br>
#			<B>City:</B> $acctcity<br>
#			<B>State:</B> $acctstate<br>
#			<B>Zip:</B> $acctzip<br>
#			<B>Phone:</B> $acctphone<br>
#			<B>Fax:</B> $acctfax<br>
#			<B>Cell:</B> $acctcell<br>
#		</TD>
#		<TD VALIGN="TOP" width="50%">
#			<B>Company Name:</B>$shipcompanyname <br>
#			<B>Name:</B>  $shipcontactname <br>
#			<B>Address 1:</B>  $shipad1<br>
#			<B>Address 2:</B>  $shipad2<br>
#			<B>City:</B> $shipcity<br>
#			<B>State:</B> $shipstate<br>
#			<B>Zip:</B> $shipzip<br>
#			<B>Phone:</B> $shipphone <br>
#			<B>Ship Via</B>:  $shipmethod<br><br>
#		</TD>
#	</TR>
#	<TR BGCOLOR="#c0c0c0">
#		<TD VALIGN="TOP" width="50%">
#			<B>Bill To Information:</B>
#			</TD>
#		<TD VALIGN="TOP" width="50%">
#			<B>Payment Information:</B>
#		</TD>
#	</TR>
#	<TR>
#		<TD VALIGN="TOP" width="50%">
#			<B>Name:</B> $billcontactname <br>
#			<B>Address:</B> $billad1<br>
#			<B>City:</B> $billcity<br>
#			<B>State:</B> $billstate<br>
#			<B>Zip:</B> $billzip<br>
#			<B>Phone:</B> $billphone <br><br>
#		</TD>
#		<TD VALIGN="TOP" width="50%">
#			<B>Payment Method</B>: $paymentmethod <br>
#			Last Digits: $last4ccdigits <br>
#		</TD>
#	</TR>
#</TABLE>
	
#};
## put the items in

#print qq{<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF"  WIDTH="800"><TR><TD VALIGN="TOP">}; 
#print qq{</TD><TD VALIGN="TOP">};
#($total,$subtotal,$shipcost,$tax) = display_cart($shipcost,$shipstate);
#print qq{
#	</TD>
#	</TR>
#	<TR BGCOLOR="#C0C0C0">
#		<TD VALIGN="TOP" COLSPAN="5" ALIGN="CENTER"><b>D.S. Sewing Inc - Custom Industrial Sewing and Heat Sealing. If you can imagine it, we can sew it !</b></TD>
#	</TR>
#</TABLE>};
##      print
##qq{$shipmethod,$shipcost,$creditcardnumber,$paymentmethod,$expmonth,$expyear};
## end items


#-- END --

 
	## send mail, please dave, hahahaha =)
	use Mail::Sendmail;

  	%mail = ( To      => 'dsteinhardt@ds-sewing.com',
            From    => 'dsteinhardt@ds-sewing.com',
            Message => "Order ".$orderid." has been placed. You should go check it out!"
            
    );
           
  	##$mail{smtp} = 'smtp.mags.net';
 	sendmail(%mail);
 
  	## START send confirmation email 
 	use Mail::Sendmail;

	#my($sth,$result,$pid,$price,$extprice, $discount, $qty,$description,$weight,$image,$id,$counter,$subtotal,$sum_weight,$shipcost,$shipstate);
	# $shipcost = $_[0];
	# $shipstate = $_[1];


	$sth=$dbh->prepare($spGetCartContentsDetail);
	$sth->bind_param(1,$sid);
	$result = $sth->execute;

	# build display of items
	$counter=0;
	$subtotal = 0;

	if ($result) {
		$cart_content = '<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#f0f0f0" WIDTH="800">';
		#  $cart_content =  $cart_content.'<TR BGCOLOR="#c0c0c0"><TD COLSPAN="5" ALIGN="CENTER"><B>Shopping Cart</B></TD></TR>';
		$cart_content = $cart_content.'<TR BGCOLOR="#c0c0c0"><TD><B>Qty</B></TD>';
		$cart_content = $cart_content.'<TD ALIGN="CENTER"><B>Description</B></TD>';
		$cart_content = $cart_content.'<TD ALIGN="CENTER"><B>Part</B></TD>';
		$cart_content = $cart_content.'<TD ALIGN="CENTER"><B>Unit Price</B></TD>';
		$cart_content = $cart_content.'<TD ALIGN="CENTER"><B>Ext. Price</B></TD></TR>';


		while (@row=$sth->fetchrow_array) {
			$pid = $row[0];
			$price = $row[1];
			$qty = $row[2];
			$description = $row[3];
			$image = $row[4];
			$weight = $row[5];
			$sum_weight+=($qty*$weight);
			$id = $row[6];
			$discount = $row[7];

			if ($counter % 2 == 0) {   $cart_content = $cart_content.'<TR BGCOLOR="#ffffff">'; } else {  $cart_content = $cart_content.'<TR BGCOLOR="#F0F0F0">'; }
  			$cart_content = $cart_content.'<TD>'.$qty.'</TD>
				<TD width="60%">'.$description.'</TD><TD valign="top" width="15%">'.$pid.'</TD>
				<TD align="right" valign="top" width="10%">$';
			
			if ($price!=$discount) {		
	 			$cart_content = $cart_content.sprintf("%0.2f", $discount).'<font size="-1" color="red"> (You saved \$'.sprintf("%0.2f", $qty * ($price - $discount)).')</font>';
				
				$subtotal += ($discount * $qty);
				$extprice = ($discount * $qty);
			
  				$cart_content = $cart_content.'</TD><TD align="right" valign="top" width="10%">\$'.sprintf("%0.2f", $extprice).'</TD></TR>';
			} else {
	 			$cart_content = $cart_content.sprintf("%0.2f", $price);
			
				$subtotal += ($price * $qty);
				$extprice = ($price * $qty);
			
  				$cart_content = $cart_content.'</TD><TD align="right" valign="top" width="10%">$'.
				sprintf("%0.2f", $extprice).'</TD></TR>';	
			}

			$counter=$counter+1;
  		}

 	} else {
  		# some error, log it, fix it, etc :)
  		$sth->finish;
  		return 0;
	}

		# fetch and display subtotal for order
		# $sth=$dbh->prepare($spGetCartSubTotal);
		# $sth->bind_param(1,$sid);
		# $result = $sth->execute;

		#if ($result) {
		# $subtotal=$sth->fetchrow_array;

  		$cart_content = $cart_content.'<TR BGCOLOR="#C0C0C0"><TD COLSPAN="5" ALIGN="CENTER"><B>Final Details</B></TD></TR>';

		$cart_content = $cart_content.'<TR>
							<TD COLSPAN="2" ALIGN="LEFT">
								<b>Terms of Sale Agreement</b><br>
								<a href="/legal.htm" target="_blank">/legal.htm</a>
							</TD>
			<TD BGCOLOR="#decfde" COLSPAN="2" ALIGN="RIGHT">Sub Total:</TD><TD COLSPAN="1"
		ALIGN="RIGHT" BGCOLOR="#F0F0F0">$'.sprintf("%0.2f",$subtotal).'</TD></TR>
		<TR>
							<TD COLSPAN="2" ALIGN="LEFT">
								<b>Ordering, Freight and Payment Agreement</b><br>						
								<a href="/forms/payment.html" target="_blank">/forms/payment.html</a>
							</TD>  
		<TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Shipping Cost:</TD><TD COLSPAN="1"
		ALIGN="RIGHT">$'.sprintf("%0.2f",$shipcost).'</TD></TR>';

		if ($__TAX_STATES__{uc($shipstate)}) {
			$cart_content = $cart_content.'<TR>
				<TD COLSPAN="2" ALIGN="LEFT"></TD>
				<TD COLSPAN="2" BGCOLOR="#decfde" ALIGN="RIGHT">'.$shipstate.' sales tax</TD>
				<TD COLSPAN="1" ALIGN="RIGHT">$'.sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)).'</TD>
			</TR>
			<TR>
				<TD COLSPAN="4"><HR></TD>
			</TR>';
		}

		$cart_content = $cart_content.'<TR>
			<TD COLSPAN="2" ALIGN="LEFT"></TD>
			<TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Total</TD>
			<TD COLSPAN="1" ALIGN="RIGHT"><B><FONT COLOR="Blue">$'.sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)+$subtotal+$shipcost).'</B></FONT></TD>
			</TR>';


		#} else {
		# print "sad", $sth->errstr;
		# boom, sad, die, fuck
		#}

  		$cart_content = $cart_content.'</TABLE>';


 		$sth->finish;


		#  print $cart_content; 
  
  		%mail = ( 
			To      => $emailaddress,
            From    => 'dsteinhardt@ds-sewing.com',
            Bcc	    => 'dsteinhardt@ds-sewing.com',
            Subject => 'Thank you for your order',
						'content-type'    => 'text/html; charset=ISO-8859-1',
            Message => 	"
		<TABLE BORDER=\"0\" CELLSPACING=\"0\" BGCOLOR=\"#FFFFFF\" width=\"800\">
			<TR>
				<TD VALIGN=\"TOP\" align=\"center\">
					<H1>D.S. Sewing Inc<br>Merritt</H1>
				</TD>
			</TR>
			<TR>
				<TD VALIGN=\"TOP\" align=\"center\">
					<b>(800) 789-8143</b><br>
					<font color=\"green\" size=\"4\"><b>Order Receipt:</b></font> <b>\# ".$orderid."</b> <br><br>
					
				</TD>
			</TR>
		</TABLE>

		<TABLE BORDER=\"0\" CELLSPACING=\"0\" BGCOLOR=\"#FFFFFF\" width=\"800\">

			<TR BGCOLOR=\"#c0c0c0\">
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Account Information:</B>
					</TD>
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Ship To Information:</B>  <br>
				</TD>
			</TR>
			<TR>
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Company Name:</B> ".$acctcompanyname." <br>
					<B>Name:</B> ".$acctcontactname." <br>
					<B>Address 1:</B> ".$acctad1."<br>
					<B>Address 2:</B> ".$acctad2."<br>
					<B>City:</B> ".$acctcity."<br>
					<B>State:</B> ".$acctstate."<br>
					<B>Zip:</B> ".$acctzip."<br>
					<B>Phone:</B> ".$acctphone."<br>
					<B>Fax:</B> ".$acctfax."<br>
					<B>Cell:</B> ".$acctcell."<br><br>
				</TD>
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Company Name:</B> ".$shipcompanyname." <br>
					<B>Name:</B> ".$shipcontactname." <br>
					<B>Address 1:</B> ".$shipad1."<br>
					<B>Address 2:</B> ".$shipad2."<br>
					<B>City:</B> ".$shipcity."<br>
					<B>State:</B> ".$shipstate."<br>
					<B>Zip:</B> ".$shipzip."<br>
					<B>Phone:</B> ".$shipphone." <br>
					<B>Ship Via</B>:  ".$shipmethod."<br><br>
				</TD>
			</TR>
			<TR BGCOLOR=\"#c0c0c0\">
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Bill To Information:</B>
					</TD>
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Payment Information:</B>
				</TD>
			</TR>
			<TR>
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Name:</B> ".$billcontactname." <br>
					<B>Address:</B> ".$billad1."<br>
					<B>City:</B> ".$billcity."<br>
					<B>State:</B> ".$billstate."<br>
					<B>Zip:</B> ".$billzip."<br>
					<B>Phone:</B> ".$billphone." <br><br>
				</TD>
				<TD VALIGN=\"TOP\" width=\"50%\">
					<B>Payment Method</B>: ".$paymentmethod." <br>
					Last Digits: ".$last4ccdigits." <br>
				</TD>
			</TR>
		</TABLE>            

		".$cart_content."	

		<TABLE BORDER=\"0\" CELLSPACING=\"0\" BGCOLOR=\"#FFFFFF\" width=\"800\">
			<TR BGCOLOR=\"#C0C0C0\">
				<TD VALIGN=\"TOP\" COLSPAN=\"5\" ALIGN=\"CENTER\"><b>D.S. Sewing Inc - Custom Industrial Sewing and Heat Sealing. If you can imagine it, we can sew it !</b></TD>
			</TR>
		</TABLE>"
            
        );

 		sendmail(%mail);
 
  		## END send confirmation email 
            

		#-------------------NEW-----------------
		#  REDIRECT HERE
		#print $cgih->redirect('/don/thanks.pl?action=order&order_id='.$orderid);

		$url = "https://www.ds-sewing.com/don/thanks.pl?action=order&order_id=".$orderid;
		print $cgih->redirect($url);
		#print "Location: https://www.ds-sewing.com/don/thanks.pl?action=order&order_id=4484", "\n\n";
		#thanks.pl?action=order&order_id=4484
	}

	#--end of world
	print $cgih->end_html;
}



sub main {
	$cgih = new CGI;
 	$dbh = DBI->connect('DBI:ODBC:DSSEWING','dssewing_www_service','!g0ttal3arnt0s3w') or die $DBI::errstr;
	
	# or error('unable to connect');
 	$dbh->{'AutoCommit'} = 1;
 	$dbh->{LongReadLen} = 10000;
	 
	# this will always kill off every page
 	$sid=sessionID;


 	# this is a hack to fix the redirect
	### hack moved to individual pages ###
	
 
	#------------
	# actions
	#------------
	#
	# insert item into cart
	# modify cart
	# billing info
	# purchase
	#
	#

	# perl has no switch  :(
	for ($cgih->param('action')) {
		/emptycart/ && do {  last; };
		/incart/ && do { incart; last; };
		/Remove Item/ && do { remove_cart_item; last; };
		/Update Qty/ && do { update_qty_item; last; };
		/View Cart/ && do { redirect_hack_fix;view_cart; last; };
		/Promo/ && do { promo; last; };
		/Search/ && do {search_catalog; last; };
		/Browse/ && do {browse_catalog_byletter; last;};

		/Account Form/ && do {shipping_form(0); last;};	
		/Shipping Form/ && do {shipping_form(1); last;};
		/Shipping Info/ && do {shipping_form(2); last;};
		/Billing Form/ && do {shipping_form(3); last;};	
		/Billing Confirm/ && do {shipping_form(4); last;};
		/Finalize/ && do {shipping_form(5); last;};

		print $cgih->param('action');
	}


$dbh->disconnect;
}

     
sub get_estes_total {
    $spCartClass="INSERT INTO cart_classes (sessionID, class, cost, weight) VALUES(?,?,?,?)";
    my ($shipzip, $sid, %classes) = @_;

    $sth=$dbh->prepare("DELETE FROM cart_classes WHERE sessionID=?");
    $sth->bind_param(1,$sid);
    $sth->execute;


    while( ($class, $weight) = each(%classes) ){
        $estes_rate = estes_rate($shipzip,$weight,$class) ;
        $estes_total += $estes_rate;
        #$estes_rates{$class} = $estes_rate;

        $sth=$dbh->prepare($spCartClass);
        $sth->bind_param(1,$sid);
        $sth->bind_param(2,$class);
        $sth->bind_param(3,$estes_rate);
        $sth->bind_param(4,$weight);

        $sth->execute;
    }

    return $estes_total;
}

# kick off program
main();

