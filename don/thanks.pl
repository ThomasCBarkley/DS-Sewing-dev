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

$spNewSession="INSERT INTO sessionID (timestamp,referer,remote_addr,user_agent,sessionID) VALUES(?,?,?,?,?)";
$spGetCartContents="select C.pid, C.price, C.qty, C.weight, C.price - (isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0) * C.price) as discountprice  from cart C left join promo P on P.code = C.code where sessionID=?";
$spGetCartContentsDetail = "select C.pid, C.price, C.qty, description, image, C.weight, id, C.price - (isnull((select max(discount) from promo P inner join promoitem PP on PP.code = P.code and PP.pid = C.pid inner join sessionpromo SP on SP.code = P.code where SP.sid = C.sessionid) , 0) * C.price) as discountprice from cart C LEFT JOIN catalog ON C.pid = catalog.pid where sessionid = ?";

# global options
my($cgih,$dbh,$sid);


sub include_header {
	open file,$__HEADER_PATH__;	 
 	print  <file>;
 	close file; 
}

# find/return/set session
sub sessionID {

    

}

# display cart, with shipping cost
sub display_cart {
    my($sth,$result,$pid,$price,$extprice, $discount, $qty,$description,$weight,$image,$id,$counter,$subtotal,$sum_weight,$shipcost,$shipstate);
    
    $shipcost = $_[0];
    $shipstate = $_[1];
    $sid = $_[2];

    $sth=$dbh->prepare($spGetCartContentsDetail);
    $sth->bind_param(1,$sid);
    $result = $sth->execute;

    # build display of items
    $counter=0;
    $subtotal = 0;

    if ($result) {
        print qq{<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#f0f0f0">};
    
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

    print qq{
        <TR>
            <TD COLSPAN="2" ALIGN="LEFT">
                <b>Terms of Sale Agreement</b><br>
                    <a href="/legal.htm" target="_blank">/legal.htm</a>
            </TD>
            <TD BGCOLOR="#decfde" COLSPAN="2" ALIGN="RIGHT">Sub Total:</TD>
            <TD COLSPAN="1" ALIGN="RIGHT" BGCOLOR="#F0F0F0">\$},sprintf("%0.2f",$subtotal),qq{</TD>
        </TR>
        <TR>
            <TD COLSPAN="2" ALIGN="LEFT">
                <b>Ordering, Freight and Payment Agreement</b><br>						
                    <a href="/forms/payment.html" target="_blank">/forms/payment.html</a>
            </TD>  
            <TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Shipping Cost:</TD>
            <TD COLSPAN="1" ALIGN="RIGHT">\$},sprintf("%0.2f",$shipcost),qq{</TD>
        </TR>
    };

    if ($__TAX_STATES__{uc($shipstate)}) {
    print qq{
        <TR>
            <TD COLSPAN="2" ALIGN="LEFT"></TD>
            <TD COLSPAN="2" BGCOLOR="#decfde" ALIGN="RIGHT">$shipstate sales tax</TD>
            <TD COLSPAN="1" ALIGN="RIGHT">\$},sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)),qq{</TD>
        </TR>
        <TR>
            <TD COLSPAN="4"><HR></TD>
        </TR>};
    }

    print qq{
        <TR>
            <TD COLSPAN="2" ALIGN="LEFT">[<A HREF="javascript:window.print()">Print This Page for your Records</a>]</TD>
            <TD COLSPAN="2" ALIGN="RIGHT" BGCOLOR="#decfde">Total</TD>
            <TD COLSPAN="1" ALIGN="RIGHT">
                <B><FONT COLOR="Blue">\$},sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)+$subtotal+$shipcost),qq{</FONT></B>
            </TD>
        </TR>};

    #} else {
    # print "sad", $sth->errstr;
    # boom, sad, die, fuck
    #}

    print qq{</TABLE>};

    $sth->finish;

    return (sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)+$subtotal+$shipcost),sprintf("%0.2f",$subtotal),sprintf("%0.2f",$shipcost),sprintf("%0.2f",$__TAX_STATES__{uc($shipstate)}*($subtotal+$shipcost)));
}

sub thankyou_page  {
    my($order_id);
    $orderid = $cgih->param('order_id');
    
    my ($shipcompanyname,$shipcontactname,$shipad1,$shipad2,$shipcity,$shipstate,$shipzip, $shipphone);
    my ($billcompanyname,$billcontactname,$billad1,$billad2,$billcity,$billstate,$billzip);
    my ($acctcompanyname,$acctcontactname, $acctfax, $acctcell, $acctad1,$acctad2,$acctcity,$acctstate,$acctzip); 
    my ($shipmethod,$shipcost);

    $sth = $dbh->prepare("
        SELECT 
            AcctCompany,
            AcctName,
            AcctAddress1,
            AcctAddress2,
            AcctCity,
            AcctState,
            AcctZip,
            AcctPhone,
            AcctFax,
            AcctCell,
            BillCompany,
            BillName,
            BillAddress1,
            BillAddress2,
            BillCity,
            BillState,
            BillZip,
            BillPhone,
            ShipCompany,
            ShipName,
            ShipAddress1,
            ShipAddress2,
            ShipCity,
            ShipState,
            ShipZip,
            ShipPhone,
            PaymentMethod,
            CreditCardNumber,
            ExpirationDate,
            CVV2,
            ShippingMethod,
            EstShipCost,
            ContactPhoneNumber,
            EmailAddress,
            SalesTax,
            OrderProcessed,
            addresstype, 
            sessionID
        FROM orders WHERE ID=? and sessionID=?");
    #sessionID = $sid");
    $sth->bind_param(1,$orderid);
    $sth->bind_param(2,$sid);
    $result = $sth->execute;
        
    if ($result) {


        if($result != 0){
            
            while (my $row=$sth->fetchrow_hashref) {
                $acctcompanyname = $row->{AcctCompany};
                $acctcontactname = $row->{AcctName};
                $acctad1 = $row->{AcctAddress1};
                $acctad2 = $row->{AcctAddress2};
                $acctcity = $row->{AcctCity};
                $acctstate = $row->{AcctState};
                $acctzip = $row->{AcctZip};
                $acctphone = $row->{AcctPhone};
                $acctfax = $row->{AcctFax};
                $acctcell = $row->{AcctCell};

                $shipcompanyname = $row->{ShipCompany};
                $shipcontactname = $row->{ShipName};
                $shipad1 = $row->{ShipAddress1};
                $shipad2 = $row->{ShipAddress2};
                $shipcity = $row->{ShipCity};
                $shipstate = $row->{ShipState};
                $shipzip = $row->{ShipZip};
                $shipphone = $row->{ShipPhone};
                $shipmethod = $row->{ShippingMethod};
                $shipcost = $row->{EstShipCost};

                $billcontactname = $row->{BillName};
                $billad1 = $row->{BillAddress1};
                $billcity = $row->{BillCity};
                $billstate = $row->{BillState};
                $billzip = $row->{BillZip};
                $billphone = $row->{BillPhone};
                
                $paymentmethod = $row->{PaymentMethod};
                $last4ccdigits = substr($row->{CreditCardNumber}, -4);

                $sid = $row->{sessionID};

                print $cgih->start_html(-title=>'Thanks For Your Order');
                print qq{
                    <TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF" width="800">
                        <TR>
                            <TD VALIGN="TOP" align="center">
                    };	
                include_header();
                print qq{
                            </TD>
                        </TR>
                    </TABLE>	
                };
                print qq{
                    <TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF" width="800">
                        <TR>
                            <TD VALIGN="TOP" align="center">
                                <H1>D.S. Sewing Inc<br>Merritt</H1>
                            </TD>
                        </TR>
                        <TR>
                            <TD VALIGN="TOP" align="center">
                                <b>(800) 789-8143</b><br>
                                <font color="green" size="4"><b>Order Receipt:</b></font> <b>\# $orderid</b> <br>
                                [<A HREF="javascript:window.print()">Print This Page</a>]<br><br>
                                
                            </TD>
                        </TR>
                    </TABLE>
                    <TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF" width="800">
                        <TR BGCOLOR="#c0c0c0">
                            <TD VALIGN="TOP" width="50%">
                                <B>Account Information:</B>
                                </TD>
                            <TD VALIGN="TOP" width="50%">
                                <B>Ship To Information:</B>  <br>
                            </TD>
                        </TR>
                        <TR>
                            <TD VALIGN="TOP" width="50%">
                                <B>Company Name:</B> $acctcompanyname <br>
                                <B>Name:</B>$acctcontactname <br>
                                <B>Address 1:</B> $acctad1<br>
                                <B>Address 2:</B>  $acctad2<br>
                                <B>City:</B> $acctcity<br>
                                <B>State:</B> $acctstate<br>
                                <B>Zip:</B> $acctzip<br>
                                <B>Phone:</B> $acctphone<br>
                                <B>Fax:</B> $acctfax<br>
                                <B>Cell:</B> $acctcell<br>
                            </TD>
                            <TD VALIGN="TOP" width="50%">
                                <B>Company Name:</B>$shipcompanyname <br>
                                <B>Name:</B>  $shipcontactname <br>
                                <B>Address 1:</B>  $shipad1<br>
                                <B>Address 2:</B>  $shipad2<br>
                                <B>City:</B> $shipcity<br>
                                <B>State:</B> $shipstate<br>
                                <B>Zip:</B> $shipzip<br>
                                <B>Phone:</B> $shipphone <br>
                                <B>Ship Via</B>:  $shipmethod<br><br>
                            </TD>
                        </TR>
                        <TR BGCOLOR="#c0c0c0">
                            <TD VALIGN="TOP" width="50%">
                                <B>Bill To Information:</B>
                                </TD>
                            <TD VALIGN="TOP" width="50%">
                                <B>Payment Information:</B>
                            </TD>
                        </TR>
                        <TR>
                            <TD VALIGN="TOP" width="50%">
                                <B>Name:</B> $billcontactname <br>
                                <B>Address:</B> $billad1<br>
                                <B>City:</B> $billcity<br>
                                <B>State:</B> $billstate<br>
                                <B>Zip:</B> $billzip<br>
                                <B>Phone:</B> $billphone <br><br>
                            </TD>
                            <TD VALIGN="TOP" width="50%">
                                <B>Payment Method</B>: $paymentmethod <br>
                                Last Digits: $last4ccdigits <br>
                            </TD>
                        </TR>
                    </TABLE>
                };
                ## put the items in

                print qq{
                    <TABLE BORDER="0" CELLSPACING="0" BGCOLOR="#FFFFFF"  WIDTH="800">
                        <TR>
                            <TD VALIGN="TOP">}; 
                print qq{
                            </TD>
                            <TD VALIGN="TOP">
                };
            
                ($total,$subtotal,$shipcost,$tax) = display_cart($shipcost,$shipstate, $sid);

                print qq{
                            </TD>
                        </TR>
                        <TR BGCOLOR="#C0C0C0">
                            <TD VALIGN="TOP" COLSPAN="5" ALIGN="CENTER">
                                <strong>D.S. Sewing Inc - Custom Industrial Sewing and Heat Sealing. If you can imagine it, we can sew it !</strong>
                            </TD>
                        </TR>
                    </TABLE>
                };    
            }
        }else{
            print "Error: no order found"
        }

    } else {
        print "bleh",$sth->errstr;
    }

}



sub main {
    $cgih = new CGI;
    $dbh = DBI->connect('DBI:ODBC:DSSEWING','dssewing_www_service','!g0ttal3arnt0s3w') or error('unable to connect');
    $dbh->{'AutoCommit'} = 1;
    $dbh->{LongReadLen} = 10000;

    # this will always kill off every page
    
    #$sid=sessionID;

    #print $cgih->cookie('sessionID');
    
    if ($cgih->cookie('sessionID')) { 
        $sid = $cgih->cookie('sessionID'); 
    } else {
	
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
    }


    #if (!$cgih->cookie('sessionID')) {
        ##	$cookie = $cgih->cookie(-name=>'sessionID',-value=>"$sid",-path=>'/',-expires=>'+6h',-domain=>'ds-sewing.com');
	    #$cookie = $cgih->cookie(-name=>'sessionID',-value=>"$sid",-path=>'/',-expires=>'+1h');
        #print $cgih->header(-cookie=>[$cookie],-expires=>'-1d');
    #} else {
        #print $cgih->header(-expires=>'-1d');
    #}

    #$cookie = $cgih->cookie(-name=>'sessionID',-value=>0,-path=>'/',-expires=>'+1s',-domain=>'.ds-sewing.com');
    #$n_cookie = $cgih->cookie(-name=>'sessionID',-value=>0,-path=>'/',-expires=>'+1s',-domain=>'.www.ds-sewing.com');

    $cookie = $cgih->cookie(-name=>'sessionID',-value=>0,-path=>'/',-expires=>'+30s');
    print $cgih->header(-cookie=>[$cookie],-expires=>'-1d');

    # perl has no switch  :(
    for ($cgih->param('action')) {
        /order/ && do { thankyou_page;last; };
        
        print $cgih->param('action');
    }

    #destroy cookie & session
    $dbh->disconnect;
    
}


# kick off program
main();