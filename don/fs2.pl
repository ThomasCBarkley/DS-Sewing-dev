#!/usr/local/bin/perl

use CGI;
use DBI;
use Text::Soundex;


 $cgih=new CGI; 

 $dbh = DBI->connect('DBI:mysql:dssewing',root,undef);


 @keywords=split(" ",$cgih->param('keywords'));
 

 for ($i=$#keywords;$i>=0;$i--) {
   $keywords[$i]='"'.$keywords[$i].'"';
   $keywords[$i]=~s/'//g;
   $keywords[$i]=~s/-//g;
 }

$SQL = "SELECT SUM(weight*density) as sum_weight,site_keywords.ID,filename,title,description FROM ";
$SQL = $SQL."site_keywords LEFT JOIN site_files ON site_keywords.id = site_files.id ";
$SQL = $SQL." LEFT JOIN site_keyweight on site_keyweight.keyword=site_keywords.keyword ";
$SQL = $SQL."where site_keywords.keyword IN (".join(",",@keywords).") ";
$SQL = $SQL."GROUP BY site_keywords.ID ORDER BY sum_weight DESC";

 $sth = $dbh->prepare($SQL);
 $sth->execute;

 print $cgih->header;
 print $cgih->start_html(-title=>'Search Results');

 $rowcount=0;

 open file,"../includes/tool_bar_include.html";
 print <file>;
 close file; 

 
 print "<TABLE>";
 while ((@row=$sth->fetchrow_array) && $rowcount<20) {
  $weight=$row[0];
  $href=$row[2];
  $title=$row[3];
  $title=~s/d.s.\s*sewing\s*\W*//i;
  $description=$row[4];

  print "<TR>";
  print qq{<TD><B>},$rowcount+1,qq{.</B></TD><TD COLSPAN=2><A HREF="https://www.ds-sewing.com/$href"><B>$title</B></A></TD>};
  print "</TR>";
  print "<TR>";
  print qq{<TD>$weight&nbsp;&nbsp;&nbsp;&nbsp;</TD><TD>&nbsp;&nbsp;&nbsp;&nbsp;</TD><TD>$description</TD>};
  print "</TR>";
  $rowcount++;
}

#$rowcount=0;

# try soundex search, maybe they just spell bad :)
if (!$rowcount) { 

print "No Results"; 
@keywords=split(" ",$cgih->param('keywords'));

 for ($i=$#keywords;$i>=0;$i--) {

   $keywords[$i]=~s/'//g;
   $keywords[$i]=~s/-//g;
   $keywords[$i]=soundex $keywords[$i];
   $keywords[$i]='"'.$keywords[$i].'"';
  print $keywords[$i]."\n"		;
 }

$SQL = "SELECT SUM(weight*density) as sum_weight,site_keywords.ID,filename,title,description FROM ";
$SQL = $SQL."site_keywords LEFT JOIN site_files ON site_keywords.id = site_files.id ";
$SQL = $SQL." LEFT JOIN site_keyweight on site_keyweight.keyword=site_keywords.keyword ";
$SQL = $SQL."where site_keywords.soundex IN (".join(",",@keywords).") ";
$SQL = $SQL."GROUP BY site_keywords.ID ORDER BY sum_weight DESC";

 $sth = $dbh->prepare($SQL);
 $sth->execute;

 $rowcount=0;

 print "<TABLE>";
 while ((@row=$sth->fetchrow_array) && $rowcount<20) {
  $weight=$row[0];
  $href=$row[2];
  $title=$row[3];
  $title=~s/d.s.\s*sewing\s*\W*//i;
  $description=$row[4];

  print "<TR>";
  print qq{<TD><B>},$rowcount+1,qq{.</B></TD><TD COLSPAN=2><A HREF="https://www.ds-sewing.com/$href">},$title,"</A></TD>";
  print "</TR>";
  print "<TR>";
  print qq{<TD>$weight&nbsp;&nbsp;&nbsp;&nbsp;</TD><TD>&nbsp;&nbsp;&nbsp;&nbsp;</TD><TD>$description</TD>};
  print "</TR>";
  $rowcount++;
}
}
 print "</TABLE>";

 $sth->finish;
 $dbh->disconnect;

 print $cgih->end_html;



