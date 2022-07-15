#!/usr/local/bin/perl

#-
# test ups shipping program
#-

use DBI;

sub american_ship_rate { 
 my ($dzip,$weight,$price,$sth,$dbh);
 
 $dzip = $_[0];
 $weight = $_[1];
 
 $dbh = DBI->connect('DBI:ODBC:dssewing','sa','') or die ('unable to connect to database');
 
 $sth = $dbh->prepare("SELECT mincharge, M500,M1000,M2000,M5000,M10000,M20000 from tblAmericanRate where destlowzip not in(select destlowzip from tblAmericanRate where destlowzip>$dzip or desthighzip<$dzip)");
 $sth->execute;
 
 my ($mc, $m500,$m1000,$m2000,$m5000,$m10000,$m20000) = $sth->fetchrow_array;
   
 if ($weight<500) { $price = $m500; }
 elsif ($weight<1000) { $price = $m1000; }
 elsif ($weight<2000) { $price = $m2000; }
 elsif ($weight<10000) { $price = $m5000; }
 elsif ($weight<20000) { $price = $m10000; }
 else { $price = $m20000; }
 
 $price = $price * sprintf("%0.2f",($weight/100.00));  

 if ($price < $mc) { $price = $mc; }

 $price = $price * 1.04; # estimated fuel surcharge
   
 
 $sth->finish;
 $dbh->disconnect;
 
 return sprintf("%0.2f",$price);
}

#print american_ship_rate("44254",1145); 
1;