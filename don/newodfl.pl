#!/usr/local/bin/perl

#-
# test ups shipping program
#-

use DBI;

sub odfl_ship_rate { 
 my ($ozip,$dzip,$discount,$class,$dbh,$weight,$price,$sth,$state);
 
 $ozip = ($_[0]);
 $dzip = $_[1];
 $weight = $_[2];
 $class = $_[3];
 $discount = $_[4];
 $state = $_[5];

  
 $dbh = DBI->connect('DBI:ODBC:dssewing','sa','') or die ('unable to connect to database');
 
 $sth = $dbh->prepare("SELECT MC,L5C,M5C,M1M,M2M,M5M,M10M,M20M,M30M,M40M FROM tblODFLRate where dst5zp = $dzip");
 $sth->execute;
 
 my ($mc,$l5c,$m5c,$m1m,$m2m,$m10m,$m20m,$m30m,$m40m) = $sth->fetchrow_array;
 
 if ($weight<500) { $price = $l5c; }
 elsif ($weight<1000) { $price = $m5c; }
 elsif ($weight<2000) { $price = $m1m; }
 elsif ($weight<10000) { $price = $m2m; }
 elsif ($weight<20000) { $price = $m5m; }
 elsif ($weight<30000) { $price = $m10m; }
 elsif ($weight<40000) { $price = $m20m; } 
 elsif ($weight<50000) { $price = $m30m; }
 else { $price = $m40m; }

 $price = $price * sprintf("%0.0f",($weight/100.00));  

 if ($price < $mc) { $price = $mc; }

 $price = $price * 1.04; # estimated fuel surcharge
   
 
 $sth->finish;
 $dbh->disconnect;
 
 return sprintf("%0.2f",$price);
}

#print odfl_ship_rate("06512","44254",440,55,55,"CT",""); 
1;
