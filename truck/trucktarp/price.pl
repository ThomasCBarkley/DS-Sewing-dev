#!/usr/local/bin/perl

use DBI;
#-
# fetch price for server side include, bleh
# this code is unforigiving, one query string item only must be PID!!
#-

$dbh = DBI->connect('DBI:ODBC:DSSEWING','','') or die ('unable to connect to database');


$pid=$ARGV[0];

$sth = $dbh->prepare("SELECT price FROM catalog WHERE pid = '$pid'");
$sth->execute;
$price = $sth->fetchrow_array;
$sth->finish;
$dbh->disconnect;

#print "Content-Type: text/html\n\n";
print sprintf("%0.2f",$price);
