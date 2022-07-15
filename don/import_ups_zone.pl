#!/usr/local/bin/perl

#-
# hack script to import ups rates
#-

use DBI;


$dbh = DBI->connect('DBI:mysql:dssewing',root,undef) or die ('unable to connect to database');


#004-005	2
#006-007	-
#8	-
#9	-
#010-034	2
#35	3
#36	2
#37	3
#038-039	2
#040-045	3
#046-047	4
#048-050	3
#051-053	2
#54	3
#55	2
#056-059	3
#060-089	2

open file,"064_don.csv";

while (<file>) {

 #split into pieces
 ($range,$zone) = split(/,/,$_);
 ($lower,$upper) = split(/-/,$range);

 if (!$upper) { $upper=$lower; }
 print $lower,' ',$upper,' ',$zone,"\n";

 
 if ( $zone=~/^\d/ ){
 $dbh->do("INSERT INTO ups_zones VALUES ($lower,$upper,$zone)");
 }

}

$dbh->disconnect;
close file;

__END__
