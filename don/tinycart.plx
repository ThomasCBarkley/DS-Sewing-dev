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
require 'odfl.pl';
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
$spGetCartContents="SELECT pid,price,qty,weight FROM cart WHERE sessionID=?";
$spGetCartContentsDetail="SELECT cart.pid,cart.price,qty,description,image,cart.weight,id FROM cart LEFT JOIN catalog ON cart.pid = catalog.pid WHERE sessionID=?";
$spGetCartSubTotal="SELECT SUM(qty*price) FROM cart WHERE sessionID=?";
$spGetCartWeight = "SELECT SUM(qty*weight),MAX(weight) FROM cart WHERE sessionID=?";
$spGetUPSRate = "select sum(z2*qty) from cart left join ups_ground_rate on ups_ground_rate.weight = floor(cart.weight+0.5) where sessionID = ?";

$spCreateOrder = "INSERT INTO orders VALUES(0,now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$spCreateOrderDet = "INSERT INTO order_detail VALUES (?,?,?,?,?)";


# global options
my($cgih,$dbh,$sid);


sub go_back {   
     print $cgih->redirect('tinycart.pl?'.$cgih->param('last_action'));
}

sub include_header {
my ($fh);

 if (!$cgih->https()) {
	 open file,$__HEADER_PATH__;
 } else
 {
	 open file,$__HEADER_PATH_SECURE__;     
 }
 
 print  <file>;

 close file;
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

my($sth,$result,$pid,$price,$qty,$description,$weight,$image,$id,$counter,$subtotal,$sum_weight,$shipcost,$shipstate);
 
 $shipcost = $_[0];
 $shipstate = $_[1];


 $sth=$dbh->prepare($spGetCartContentsDetail);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;

 # build display of items
 $counter=0;

 if ($result) {
  print qq{<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#f0f0f0">};
  print qq{<TR BGCOLOR="#c0c0c0"><TD COLSPAN="4" ALIGN="CENTER"><B>Shopping Cart</B></TD></TR>},
	qq{<TR BGCOLOR="#decfde"><TD><B>Qty</B></TD>},
	qq{<TD ALIGN="CENTER"><B>Description</B></TD>},
	qq{<TD ALIGN="CENTER"><B>SKU</B></TD>},
	qq{<TD ALIGN="CENTER"><B>Price</B></TD></TR>};


  while (@row=$sth->fetchrow_array) {
	$pid = $row[0];
	$price = $row[1];
	$qty = $row[2];
	$description = $row[3];
	$image = $row[4];
	$weight = $row[5];
	$sum_weight+=($qty*$weight);
	$id = $row[6];

	if ($counter % 2 == 0) { print qq{<TR BGCOLOR="#ffffff">}; } else { print qq{<TR BGCOLOR="#F0F0F0">}; }
 
	print qq{<TD>$qty</TD>
		<TD>$description</TD><TD>$pid</TD>
		<TD>},sprintf("%0.2f",$price*$qty),qq{</TD><TR>};

	$counter=$counter+1;
  }

 } else {
  # some error, log it, fix it, etc :)
  $sth->finish;
  return 0;
 }


 # fetch and display subtotal for order
 $sth=$dbh->prepare($spGetCartSubTotal);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;

 if ($result) {
  $subtotal=$sth->fetchrow_array;
 

  print qq{<TR BGCOLOR="#C0C0C0"><TD COLSPAN="4" ALIGN="CENTER"><B>Details</B></TD></TR>};

  print qq{<TR><TD BGCOLOR="#decfde" COLSPAN="2" ALIGN="RIGHT">Sub Total:</TD><TD COLSPAN="2"
ALIGN="RIGHT" BGCOLOR="#F0F0F0">},sprintf("%0.2f",$subtotal),qq{</TD></TR>
  <TR><TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Shipping Cost:</TD><TD COLSPAN="2"
ALIGN="RIGHT">},sprintf("%0.2f",$shipcost),qq{</TD></TR>};

  if ($__TAX_STATES__{$shipstate}) {
   print qq{<TR><TD COLSPAN="2" BGCOLOR="#decfde" ALIGN="RIGHT">$shipstate sales tax
</TD><TD COLSPAN="2" ALIGN="RIGHT">},sprintf("%0.2f",$__TAX_STATES__{$shipstate}*$subtotal),qq{</TD></TR>
  <TR><TD COLSPAN="4"><HR></TD></TR>
  <TR><TD COLSPAN="2" ALIGN="RIGHT">Total</TD><TD
COLSPAN="2" ALIGN="RIGHT"><B><FONT COLOR="Blue">},
sprintf("%0.2f",$__TAX_STATES__{$shipstate}*$subtotal+$subtotal+$shipcost),qq{</B></FONT></TD></TR>};
  }



 } else {
  print "sad", $sth->errstr;
  # boom, sad, die, fuck
 }

 print qq{</TABLE>};


 $sth->finish;
 return $counter;


}


sub display_cart_detail {
 my($sth,$result,$pid,$price,$qty,$description,$weight,$image,$id,$counter,$subtotal,$sum_weight);

 $sth=$dbh->prepare($spGetCartContentsDetail);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;

 # build display of items
 $counter=0;

 if ($result) {
  print qq{<TABLE CELLSPACING="1" CELLPADDING="2" BORDER="1"
BGCOLOR="#ffcc66">
  <TR BGCOLOR="#ffaa00" ALIGN="CENTER"><TD><B>Qty</B></TD>
  <TD ALIGN="CENTER"><B>Description</B></TD>
  <TD ALIGN="CENTER"><B>SKU</B></TD>
  <TD ALIGN="CENTER"><B>Price</B></TD><TR>};

  while (@row=$sth->fetchrow_array) {
	$pid = $row[0];
	$price = $row[1];
	$qty = $row[2];
	$description = $row[3];
	$image = $row[4];
	$weight = $row[5];
	$sum_weight+=($qty*$weight);
	$id = $row[6];
	print $cgih->start_form;
	print qq{<TR><TD><INPUT NAME="qty" VALUE="$qty" SIZE=4 MAXLENGTH=4></TD>},
		qq{<TD>$description</TD><TD>$pid<INPUT TYPE=HIDDEN NAME="pid" VALUE="$pid"></TD>},
		qq{<TD>$price</TD>},
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
  $sth->finish;
  return 0;
 }


 # fetch and display subtotal for order  
 $sth=$dbh->prepare($spGetCartSubTotal);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;
 
 if ($result) {
  $subtotal=$sth->fetchrow_array;
  print qq{<TABLE BORDER="0" CELLSPACING="4" CELLPADDING="0">
		<TR><TD><B>Sub Total</B></TD><TD>\$},sprintf("%0.2f",$subtotal),qq{</TD></TR>
		<TR><TD><B>Estimate Weight</B></TD><TD>},sprintf("%0.2f",$sum_weight),qq{ lbs.</TD></TR>
	</TABLE>};
 } else {
  print "sad", $sth->errstr;
  # boom, sad, die, fuck
 }

 
 $sth->finish;
 return $counter;
}

sub incart {
 my ($sth,$pid,$result,$price,$weight);
 $pid = $cgih->param('pid');

 # discover if this item already exists in the cart
 $sth=$dbh->prepare("SELECT COUNT(*) FROM cart WHERE pid=? AND sessionID=?");
 $sth->bind_param(1,$pid);
 $sth->bind_param(2,$sid);

 $result = $sth->execute;
 if ($sth->fetchrow_array>0) {view_cart(); return;};

 # discover price, if item exists, etc
 $sth=$dbh->prepare("SELECT price,weight FROM catalog WHERE pid=?");
 $sth->bind_param(1,$pid);
 $result=$sth->execute;
 
 if ($result && (($price,$weight)=$sth->fetchrow_array)) {
  #we're good to go, insert item into cart
  $sth=$dbh->prepare($spAddItemCart);
  $sth->bind_param(1,$sid);
  $sth->bind_param(2,$pid);
  $sth->bind_param(3,$price);
  $sth->bind_param(4,1);
  $sth->bind_param(5,$weight);
  
  $result=$sth->execute;
  
  if ($result) {
	# success, display carts contents 
	$cgih->param(-name=>'last_action',-value=>"action=View+Cart");
	view_cart();
  } else
  
  {
   # notify user of error, log error, bleh!
  }

  $sth->finish;
 } else
 {
  # notify item is no longer available, log error, bleh!
 }

 return;
}

# view cart

sub view_cart {
 print $cgih->start_html(-title=>'Contents of Cart');
 include_header();
 if (display_cart_detail==0) {
  print $cgih->h1('empty cart');
 } else {
  # do extra stuff ??

 print $cgih->start_form;
 print qq{<INPUT TYPE="HIDDEN" NAME="action" VALUE="Shipping Form">};
 print qq{<INPUT TYPE="SUBMIT" VALUE="CHECKOUT">};

 print $cgih->end_form;

 }
 print $cgih->end_html;
}


# update the qty of an item
sub update_qty_item {
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


# find/return/set session
sub sessionID {

 my($sth,$sid);

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

 print qq{<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#F0F0F0"><TR
BGCOLOR="#C0C0C0">
	<TD ALIGN="CENTER" COLSPAN="2"><B>Step</B></TD></TR>};

 for ($i=1;$i<=$sl;$i++) {
  $step = $_[$i];
  if ($i==$cs) {
    print qq{<TR><TD><B>$i.</B></TD><TD><B><U><FONT COLOR="Red">$step</FONT></U></B></TD></TR>}; 
   } else { print qq{<TR><TD><B>$i.</B></TD><TD>$step</TD></TR>};}
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
  print qq{<TABLE BORDER="0" CELPADDING="1" CELLSPACING="2" BGCOLOR="#ffcc66">
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

  print qq{<TABLE BORDER="0" CELPADDING="1" CELLSPACING="2" BGCOLOR="#ffcc66">
	<TR BGCOLOR="#ffaa00"><TD ALIGN="CENTER" COLSPAN="2"><FONT SIZE="+3">Missing Required 
	Fields</FONT></TD></TR><TR><TD><FONT VALIGN="TOP" ALIGN="CENTER" COLOR="Red">
   We can not complete your order without the following information.<BR>
	Please click <B><U>BACK</U></B> in your browser and fill in the required fields.</FONT></TD><TD
	ALIGN="LEFT"><OL>};

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


 my ($shipfirstname,$shiplastname,$shipad1,$shipad2,$shipcity,$shipstate,$shipzip);
 my ($billfirstname,$billlastname,$billad1,$billad2,$billcity,$billstate,$billzip);
 my ($shipmethod,$shipcost);
 my ($creditcardnumber,$expmonth,$expyear,$paymentmethod,$contactphone);

 my @required_ship = ('ShipFirstName','ShipAddress1','ShipCity','ShipState','ShipZip');
 my @required_bill = ('ContactPhone','BillFirstName','BillAddress1','BillCity','BillState','BillZip');


 # shipping info
 $shipfirstname = $cgih->param('ShipFirstName');
 $shiplastname = $cgih->param('ShipLastName');
 $shipad1 = $cgih->param('ShipAddress1');
 $shipad2 = $cgih->param('ShipAddress2');
 $shipcity = $cgih->param('ShipCity');
 $shipstate = $cgih->param('ShipState');
 $shipzip = $cgih->param('ShipZip');

 # billing info
 $billfirstname = $cgih->param('BillFirstName');
 $billlastname = $cgih->param('BillLastName');
 $billad1 = $cgih->param('BillAddress1');
 $billad2 = $cgih->param('BillAddress2');
 $billcity = $cgih->param('BillCity');
 $billstate = $cgih->param('BillState');
 $billzip = $cgih->param('BillZip');

 # misc

 $contactphone = $cgih->param('ContactPhone');
 $shipmethod = $cgih->param('ShipMethod');
 $shipcost = $cgih->param('ShipCost');
 $creditcardnumber = $cgih->param('CreditCardNumber');
 $creditcardnumber =~s/\D//g;
 $paymentmethod = $cgih->param('PaymentMethod');
 $expmonth = $cgih->param('ExpMonth');
 $expyear = $cgih->param('ExpYear'); 
 @steps = ('Shipping Address','Shipping Method','Billing Info','Confirmation','Finished');


#----------------------------
# Shipping Information Header
#----------------------------
 if ($code==0) {

 print $cgih->start_html(-title=>'Shipping Information');

 include_header();


 print $cgih->start_form;


 print qq{<TABLE BORDER="0" CELLSPACING="6"><TR><TD VALIGN="TOP">};
 
 step_list(5,@steps,1);
 
 print qq{</TD>
 <TD>};

#--
 print qq{<TABLE BORDER="0" CELLPADDING="2" CELLSPACING="1" BGCOLOR="#ffcc66">
 <TR BGCOLOR="#ffaa00"><TD ALIGN="CENTER" COLSPAN="2"><B>Shipping Information</B></TD></TR>
 <TR><TD><B>First Name</B></TD><TD><INPUT SIZE=25 MAXLENGTH=40 NAME="ShipFirstName" VALUE="$shipfirstname"></TD></TR>
 <TR><TD><B>Last Name</B></TD><TD><INPUT SIZE=25 MAXLENGTH=40 NAME="ShipLastName" VALUE="$shiplastname"></TD></TR>
 <TR><TD><B>Address 1</B></TD><TD><INPUT SIZE=30 MAXLENGTH=60 NAME="ShipAddress1" VALUE="$shipad1"></TD></TR>
 <TR><TD><B>Address 2</B></TD><TD><INPUT SIZE=30 MAXLENGTH=60 NAME="ShipAddress2" VALUE="$shipad2"></TD></TR>
 <TR><TD><B>City</B></TD><TD><INPUT SIZE=30 MAXLENGTH=40 NAME="ShipCity" VALUE="$shipcity"></TD></TR>
 <TR><TD><B>State/Province</B></TD><TD><INPUT SIZE=4 MAXLENGTH=4 NAME="ShipState" VALUE="$shipstate"></TD></TR>
 <TR><TD><B>Zip/Postal Code</B></TD><TD><INPUT SIZE=15 MAXLENGTH=15 NAME="ShipZip" VALUE="$shipzip"></TD></TR>

 <INPUT TYPE="HIDDEN" NAME="BillFirstName" VALUE="$billfirstname">
 <INPUT TYPE="HIDDEN" NAME="BillLastName" VALUE="$billlastname">
 <INPUT TYPE="HIDDEN" NAME="BillAddress1" VALUE="$billad1">
 <INPUT TYPE="HIDDEN" NAME="BillAddress2" VALUE="$billad2">
 <INPUT TYPE="HIDDEN" NAME="BillCity" VALUE="$billcity">
 <INPUT TYPE="HIDDEN" NAME="BillState" VALUE="$billstate">
 <INPUT TYPE="HIDDEN" NAME="BillZip" VALUE="$billzip">
 <INPUT TYPE="HIDDEN" NAME="ShipMethod" VALUE="$shipmethod">

 </TABLE> 
 <INPUT TYPE="HIDDEN" NAME="action" VALUE="Shipping Info">
};


 print qq{</TD></TR><TR><TD>&nbsp;</TD><TD ALIGN="CENTER">
  <INPUT TYPE="SUBMIT" VALUE="Select Shipping Method">
</TD></TR>


</TABLE>};

 print $cgih->end_form;

#-----------------------
# Select Shipping Method
#-----------------------
} elsif ($code==1) {


#-- look for missing fields
 missing_fields(@required_ship);

#-- actually work next pages magic

 my ($sth,$total_weight,$max_weight,$result,@row,$odfl,$ups);

 $sth = $dbh->prepare("SELECT weight,qty FROM cart WHERE sessionID = $sid");
 $result = $sth->execute;

 $total_items = 0;
 $total_weight = 0; $max_weight=0;
 $ups = 0;
 while (@row=$sth->fetchrow_array) {
  $total_weight += $row[0] * $row[1];
  if ($row[0]>$max_weight) { $max_weight = $row[0]; }
  $ups += $row[1] * ups_ground_rate($shipzip,$row[0]);
  $total_items += $row[1]; 
}
 
 $ups = sprintf("%0.2f",$ups) + ($total_items * $__SHIP_INCREASE__);

 if ($max_weight > 150) { $ups = undef; $shipmethod='ODFL';} else { $shipmethod='UPSGROUND'; }

 $odfl = odfl_ship_rate("06512",$shipzip,$total_weight,55,55) + ($total_items * $__SHIP_INCREASE__);
 $sth->finish;

 print $cgih->start_html(-title=>'Shipping Options');
 include_header();

 #print "total odfl";
 #print $odfl;
 #print "shipzip";
 #print $shipzip;
 #print "$cgih->param('ShipZip')";
 #print "total weight";
 #print $total_weight;

 #print "$total_weight<BR>$shipzip<BR>";
 #print odfl_ship_rate("06512","06040",150,55,55);
 #print "<BR>";



 print qq{<TABLE BORDER="0" CELLSPACING="6"><TR><TD>};
 step_list(5,@steps,2);
 print qq{</TD>};

 print $cgih->start_form,qq{

 <INPUT TYPE="HIDDEN" NAME="ShipFirstName" VALUE="$shipfirstname">
 <INPUT TYPE="HIDDEN" NAME="ShipLastName" VALUE="$shiplastname">
 <INPUT TYPE="HIDDEN" NAME="ShipAddress1" VALUE="$shipad1">
 <INPUT TYPE="HIDDEN" NAME="ShipAddress2" VALUE="$shipad2">
 <INPUT TYPE="HIDDEN" NAME="ShipCity" VALUE="$shipcity">
 <INPUT TYPE="HIDDEN" NAME="ShipState" VALUE="$shipstate">
 <INPUT TYPE="HIDDEN" NAME="ShipZip" VALUE="$shipzip">
 <INPUT TYPE="HIDDEN" NAME="BillFirstName" VALUE="$billfirstname">
 <INPUT TYPE="HIDDEN" NAME="BillLastName" VALUE="$billlastname">
 <INPUT TYPE="HIDDEN" NAME="BillAddress1" VALUE="$billad1">
 <INPUT TYPE="HIDDEN" NAME="BillAddress2" VALUE="$billad2">
 <INPUT TYPE="HIDDEN" NAME="BillCity" VALUE="$billcity">
 <INPUT TYPE="HIDDEN" NAME="BillState" VALUE="$billstate">
 <INPUT TYPE="HIDDEN" NAME="BillZip" VALUE="$billzip">
 };

 print qq{</TD><TD VALIGN="TOP">};

 #- display shipping table


 print qq{<TABLE BORDER="0" CELLSPACING="1" CELPADDING="2" BGCOLOR="#ffcc66"><TR><TD>};

 print qq{<TR BGCOLOR="#ffaa00"><TD COLSPAN="3" ALIGN="CENTER"><B>Shipping Methods Available</B></TD></TR>};
 print qq{<TR><TD><B>Carrier</B></TD><TD><B>Price</B></TD><TD>&nbsp;</TD></TR>};
 print qq{<TR><TD>Old Dominion Freight Lines</TD><TD>};
 if ($odfl>$__SHIP_INCREASE__) {
  print '$',$odfl,qq{</TD><TD> <INPUT TYPE="RADIO" NAME="ShipMethod" VALUE="ODFL"};
  if ($shipmethod eq 'ODFL') { print "CHECKED"; };
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

 
 print qq{<TR><TD>Pickup</TD><TD>Call</TD><TD><INPUT TYPE="RADIO"
NAME="ShipMethod" VALUE="PICKUP"};

 if ($shipmethod eq 'PICKUP') { print "PICKUP"; }
print qq{</TD>};
 

 print qq{<TR><TD>By Arrangement</TD><TD>Call</TD><TD><INPUT TYPE="RADIO" NAME="ShipMethod" VALUE="SPECIAL"};
 if ($shipmethod eq 'SPECIAL') { print "CHECKED"; }
 print qq{></TD>};
 print qq{</TABLE>};

 print qq{</TD><TD VALIGN="TOP"><TABLE BORDER="0" CELLPADDING="1" CELLPADDING="2" BGCOLOR="#F0F0F0">
	<TR BGCOLOR="#C0C0C0">
	<TD ALIGN="CENTER"><B>ShipTo: </B></TD></TR><TR>
	<TD VALIGN="TOP"><NOBR>$shipfirstname $shiplastname</NOBR><BR>
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

} elsif ($code==2) {

#-----------------------------
# Billing Information Header
#-----------------------------

 missing_fields('ShipMethod',@required_ship);

 print $cgih->start_html(-title=>'Billing Information');


 include_header();
 print $cgih->start_form;

 print qq{<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF"><TR><TD VALIGN="TOP">}; 
step_list(5,@steps,3);
print qq{</TD><TD>};

 print qq{<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#ffcc66">
 <TR BGCOLOR="#ffaa00"><TD ALIGN="CENTER" COLSPAN="2"><B>Billing Information</B></TD></TR>
 <TR><TD><B>First Name</B></TD><TD><INPUT SIZE=25 MAXLENGTH=40 NAME="BillFirstName"
VALUE="$billfirstname"></TD></TR>
 <TR><TD><B>Last Name</B></TD><TD><INPUT SIZE=25 MAXLENGTH=40 NAME="BillLastName"
VALUE="$billlastname"></TD></TR>
 <TR><TD><B>Address 1</B></TD><TD><INPUT SIZE=30 MAXLENGTH=60 NAME="BillAddress1"
VALUE="$billad1"></TD></TR>
 <TR><TD><B>Address 2</B></TD><TD><INPUT SIZE=30 MAXLENGTH=60 NAME="BillAddress2" VALUE="$billad2"></TD></TR>
 <TR><TD><B>City</B></TD><TD><INPUT SIZE=30 MAXLENGTH=40 NAME="BillCity" VALUE="$billcity"></TD></TR>
 <TR><TD><B>State/Province</B></TD><TD><INPUT SIZE=4 MAXLENGTH=4 NAME="BillState" VALUE="$billstate"></TD></TR>
 <TR><TD><B>Zip/Postal Code</B></TD><TD><INPUT SIZE=15 MAXLENGTH=15 NAME="BillZip" VALUE="$billzip"></TD></TR>
 <TR><TD><B>Contact Phone #</B></TD><TD><INPUT SIZE=32 MAXLENGTH=32 NAME="ContactPhone" VALUE="$contactphone"></TD></TR>
 </TABLE>
};

 print qq{</TD><TD VALIGN="TOP" ALIGN="RIGHT">};

print qq{<TABLE BORDER="0" CELLPADDING="1" CELLPADDING="2" BGCOLOR="#F0F0F0">
	<TR BGCOLOR="#C0C0C0">
	<TD ALIGN="CENTER"><B>ShipTo: </B></TD></TR><TR>
	<TD VALIGN="TOP"><NOBR>$shipfirstname $shiplastname</NOBR><BR>
	<NOBR>$shipad1</NOBR><BR><NOBR>$shipad2</NOBR><BR>
	<NOBR>$shipcity, $shipstate $shipzip</NOBR><BR>
	 </TD></TR><TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER"><B>Via:</B></TD></TR><TR><TD>$shipmethod</TD></TR></TABLE>}; 
 print qq{</TD></TR>

<TR><TD>&nbsp;</TD><TD COLSPAN="2" ALIGN="LEFT">
<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR=#ffcc66>
 <TR BGCOLOR="#ffaa00"><TD COLSPAN="4" ALIGN="CENTER"><B>Payment Info</B></TD></TR>
 <TR>
 <TD>Payment Method</TD><TD>
 <SELECT NAME="PaymentMethod">
  <OPTION>VISA
  <OPTION>MASTERCARD
  <OPTION>CHECK/MO
 </SELECT>
 </TD>
 <TD>Credit Card Number</TD><TD><INPUT SIZE=19 MAXLENGTH=19 NAME="CreditCardNumber" VALUE=$creditcardnumber></TD>
 
 </TR>
 <TR>
 <TD COLSPAN="2">&nbsp;</TD>
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
  <OPTION>2000
  <OPTION>2001
  <OPTION>2002
  <OPTION>2003
  <OPTION>2004
  <OPTION>2005
 </SELECT>
 </NOBR>
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
 <INPUT TYPE="HIDDEN" NAME="ShipFirstName" VALUE="$shipfirstname">
 <INPUT TYPE="HIDDEN" NAME="ShipLastName" VALUE="$shiplastname">
 <INPUT TYPE="HIDDEN" NAME="ShipAddress1" VALUE="$shipad1">
 <INPUT TYPE="HIDDEN" NAME="ShipAddress2" VALUE="$shipad2">
 <INPUT TYPE="HIDDEN" NAME="ShipCity" VALUE="$shipcity">
 <INPUT TYPE="HIDDEN" NAME="ShipState" VALUE="$shipstate">
 <INPUT TYPE="HIDDEN" NAME="ShipZip" VALUE="$shipzip">
 <INPUT TYPE="HIDDEN" NAME="ShipMethod" VALUE="$shipmethod">};
 print $cgih->end_form;

} elsif ($code==3) {

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
 }

#- compute shipping cost (again??) for display 
# if ($shipmethod eq 'UPSGROUND') {
#  $sth = $dbh->prepare($spGetUPSRate);
#  $sth->bind_param(1,$sid);
#  $result = $sth->execute;
#  
#  $shipcost = $sth->fetchrow_array;
#  $sth->finish;
#
# } else { 
#  #-----tada
# }

 $sth = $dbh->prepare("SELECT weight,qty FROM cart WHERE sessionID = $sid");
 $result = $sth->execute;


 $total_items =0;
 $total_weight = 0; $max_weight=0;
 $ups = 0;
 while (@row=$sth->fetchrow_array) {
  $total_weight += $row[0] * $row[1];
  if ($row[0]>$max_weight) { $max_weight = $row[0]; }
  $ups += $row[1] * ups_ground_rate($shipzip,$row[0]);
  $total_items +=$row[1];
 }

 $ups = sprintf("%0.2f",$ups);

 if ($shipmethod eq 'UPSGROUND') {
  $shipcost = $ups + ($total_items * $__SHIP_INCREASE__);
 }
 elsif ($shipmethod eq 'ODFL') {
  $shipcost = odfl_ship_rate("06512",$shipzip,$total_weight,55,55) + ($total_items * $__SHIP_INCREASE__);
 } 
else {
  $shipcost = 0.0;
 }
 
 $sth->finish;
 
 print $cgih->start_html(-title=>'Review Order');
 include_header();

 print qq{<TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF"><TR><TD VALIGN="TOP">}; 
 step_list(5,@steps,4);
 print qq{</TD><TD VALIGN="TOP">};

	display_cart($shipcost,$shipstate);

	print qq{</TD><TD VALIGN="TOP" ALIGN="LEFT">
	<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#F0F0F0">
	<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">BillTo</TD></TR>
	<TR><TD><NOBR>$billfirstname $billlastname</NOBR><BR>
		<NOBR>$billad1</NOBR><BR>
		<NOBR>$billad2</NOBR><BR>
		<NOBR>$billcity, $billstate $billzip</NOBR><BR></TD></TR>
	<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">ShipTo</TD></TR>
	<TR><TD><NOBR>$shipfirstname $shiplastname</NOBR><BR>
		<NOBR>$shipad1</NOBR><BR>
		<NOBR>$shipad2</NOBR><BR>
		<NOBR>$shipcity, $shipstate $shipzip</NOBR><BR></TD></TR>
	<TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER">Ship Via</TD></TR>
	<TR><TD>$shipmethod</TD></TR>
	</TABLE></TD></TR>
	</TABLE>};



##      print
##qq{$shipmethod,$shipcost,$creditcardnumber,$paymentmethod,$expmonth,$expyear};

 print $cgih->start_form,qq{
  <INPUT TYPE="HIDDEN" NAME="ShipFirstName" VALUE="$shipfirstname">
  <INPUT TYPE="HIDDEN" NAME="ShipLastName" VALUE="$shiplastname">
  <INPUT TYPE="HIDDEN" NAME="ShipAddress1" VALUE="$shipad1">
  <INPUT TYPE="HIDDEN" NAME="ShipAddress2" VALUE="$shipad2">
  <INPUT TYPE="HIDDEN" NAME="ShipCity" VALUE="$shipcity">
  <INPUT TYPE="HIDDEN" NAME="ShipState" VALUE="$shipstate">
  <INPUT TYPE="HIDDEN" NAME="ShipZip" VALUE="$shipzip">

  <INPUT TYPE="HIDDEN" NAME="BillFirstName" VALUE="$billfirstname">
  <INPUT TYPE="HIDDEN" NAME="BillLastName" VALUE="$billlastname">
  <INPUT TYPE="HIDDEN" NAME="BillAddress1" VALUE="$billad1">
  <INPUT TYPE="HIDDEN" NAME="BillAddress2" VALUE="$billad2">
  <INPUT TYPE="HIDDEN" NAME="BillCity" VALUE="$billcity">
  <INPUT TYPE="HIDDEN" NAME="BillState" VALUE="$billstate">
  <INPUT TYPE="HIDDEN" NAME="BillZip" VALUE="$billzip">

  <INPUT TYPE="HIDDEN" NAME="ContactPhone" VALUE="$contactphone">

  
  <INPUT TYPE="HIDDEN" NAME="ShipMethod" VALUE="$shipmethod">
  <INPUT TYPE="HIDDEN" NAME="ExpMonth" VALUE="$expmonth">
  <INPUT TYPE="HIDDEN" NAME="ExpYear" VALUE="$expyear">
  <INPUT TYPE="HIDDEN" NAME="PaymentMethod" VALUE="$paymentmethod">
  <INPUT TYPE="HIDDEN" NAME="CreditCardNumber" VALUE="$creditcardnumber">
  <INPUT TYPE="HIDDEN" NAME="ShipCost" VALUE="$shipcost">
  <INPUT TYPE="HIDDEN" NAME="action" VALUE="Finalize">
  <INPUT TYPE="SUBMIT" VALUE="Place Order">
 },$cgih->end_form;


} elsif ($code==4) {

#---
# finalize order of doom!
#---

#-- local variables if you will :)

 my ($isth,$orderid);


 $sth = $dbh->prepare($spCreateOrder);


 $sth->bind_param(1,$sid);
 $sth->bind_param(2,$billfirstname);
 $sth->bind_param(3,$billlastname);
 $sth->bind_param(4,$billad1);
 $sth->bind_param(5,$billad2);
 $sth->bind_param(6,$billcity);
 $sth->bind_param(7,$billstate);
 $sth->bind_param(8,$billzip);

 $sth->bind_param(9,$shipfirstname);
 $sth->bind_param(10,$shiplastname);
 $sth->bind_param(11,$shipad1);
 $sth->bind_param(12,$shipad2);
 $sth->bind_param(13,$shipcity);
 $sth->bind_param(14,$shipstate);
 $sth->bind_param(15,$shipzip);

 $sth->bind_param(16,$paymentmethod);
 $sth->bind_param(17,$creditcardnumber);
 $sth->bind_param(18,$expyear.'-'.$expmonth.'-'.$maxdays[$expmonth-1]);
 $sth->bind_param(19,$shipmethod);
 $sth->bind_param(20,$shipcost);
 $sth->bind_param(21,$contactphone);

 $result = $sth->execute;

 if (!$result) {
   die($sth->errstr);
  }


 $sth = $dbh->prepare("SELECT MAX(ID) FROM orders WHERE sessionID=$sid");
 $result = $sth->execute;
 if (!$result) { die($sth->errstr); }

 $orderid = $sth->fetchrow_array;

 $sth = $dbh->prepare($spGetCartContents);
 $sth->bind_param(1,$sid);
 $result = $sth->execute;   #- get all contents


 if (!$result) { die($sth->errstr); }

 $isth = $dbh->prepare($spCreateOrderDet);

 #-- create order detail rows
 while (@row=$sth->fetchrow_array) {
   $isth->bind_param(1,$orderid);
   $isth->bind_param(2,@row[0]);
   $isth->bind_param(3,@row[1]);
   $isth->bind_param(4,@row[3]);
   $isth->bind_param(5,@row[2]);
   $result = $isth->execute;
   if (!$result) { die($sth->errstr); }
}


 $sth->finish;
 $isth->finish;
  
 print $cgih->start_html(-title=>'Thanks For Your Order');
 include_header();


 print qq{
	<H1>Thank You for chosing DS Sewing today.</H1>
	Your online order id is <B>$orderid</B>. Please reference this number when you call
	about the status of your order.};
}

#--end of world

 print $cgih->end_html;
}


sub main {
 $cgih = new CGI;
 $dbh = DBI->connect('DBI:ODBC:DSSEWING','dssewing_www_service','!g0ttal3arnt0s3w') or error('unable to connect');


 # this will always kill off every page
 $sid=sessionID;


 # this is a hack to fix the redirect

 
  if (!$cgih->cookie('sessionID')) {
##	$cookie = $cgih->cookie(-name=>'sessionID',-value=>"$sid",-path=>'/',-expires=>'+6h',-domain=>'ds-sewing.com');
	$cookie = $cgih->cookie(-name=>'sessionID',-value=>"$sid",-path=>'/',-expires=>'+6h');
  print $cgih->header(-cookie=>[$cookie],-expires=>'-1d');
  } else {
     print $cgih->header(-expires=>'-1d');
  }
 

 #---

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
	/View Cart/ && do { view_cart; last; };
	/Search/ && do {search_catalog; last; };
	/Browse/ && do {browse_catalog_byletter; last;};

	/Shipping Form/ && do {shipping_form(0); last;};
	/Shipping Info/ && do {shipping_form(1); last;};
	/Billing Form/ && do {shipping_form(2); last;};
	/Billing Confirm/ && do {shipping_form(3); last;};
	/Finalize/ && do {shipping_form(4); last;};

	print $cgih->param('action');
 }


 $dbh->disconnect;
}


# kick off program
main();

print $sid;

