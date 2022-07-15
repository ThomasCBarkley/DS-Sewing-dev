#!/usr/local/bin/perl

#-
# hack script to import ups rates
#-

use DBI;


$dbh = DBI->connect('DBI:mysql:dssewing',root,undef) or die ('unable to connect to database');


open file,"ground_res_don.csv";

while (<file>) {
 s/$//g; # delete dollars
 $dbh->do("INSERT INTO ups_ground_rate VALUES ($_)");
}

close file;
