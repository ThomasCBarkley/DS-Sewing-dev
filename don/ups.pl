#!/usr/local/bin/perl

#-
# test ups shipping program
#-

use DBI;

#-
# Description:
#       Returns ground rate shipping price based on destination zip and weight
# Usage:
#       $cost = ups_grond_rate(dest,weight);
#-

sub ups_ground_rate {
 my ($dbh,$weight,$price,$zone,$sth,$threezee);

 $weight = $_[1];
 
 if ($weight < 1) { $weight = 1; }
 
 $threezee = substr($_[0],0,3);

 $dbh = DBI->connect('DBI:ODBC:dssewing','sa','') or die ('unable to connect to database');

 $sth = $dbh->prepare("SELECT zone FROM ups_zones where $threezee>=zip_low and $threezee<=zip_high");
 $sth->execute;
 
 $zone = $sth->fetchrow_array;

 if (!$zone) { $sth->finish; return undef; }

 $sth = $dbh->prepare("SELECT z$zone FROM ups_ground_rate WHERE weight = floor($weight+0.5)");
 $sth->execute;

 $price = $sth->fetchrow_array;

 $sth->finish;
 $dbh->disconnect;

if($weight > 49){
$price=$price+30;
}

 return $price * $__SHIP_UPS_FUEL__;
}
#$price = ups_ground_rate("06040",100);
#if ($price) { print $price; } else { print "no ups rate available in your area!"; }
1;
