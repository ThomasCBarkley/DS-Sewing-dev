#!/usr/local/bin/perl

#
# created 09-30-99 - DLL
# live    10-20-99 - DLL
#
# This will insert a new catalog request row into mysql(dssewing:catalog_requests)
#
# This supports a minimal subset of what the real formmail.pl script did. It is 
# effectively hard coded for our needs but in such a way so that we need not change
# the HTML page.
#
#

use DBI;
use CGI qw(:standard);


sub c2bool {
 if ($_[0] eq 'Catalog') {
  return 1;
 }
 return 0;
}

$cgih = new CGI;


sub init {
 @required = split(/,/,$cgih->param('required'));
 $email = $cgih->param('email');
 $redirect = $cgih->param('redirect');
 $missing_redirect = $cgih->param('missing_fields_redirect');
 @sort = split(/,/,$cgih->param('sort'));
 $recipient = $cgih->param('recipient'); 
 $error_redirect = $cgih->param('error_redirect');
 return 0;
}

sub save_request {
 $SQL = "insert into catalog_requests (dateadded,name,address1,address2,city,state,zip,phone,email,comments,truck,tough,drydock,bannerblank,ingroundpool,industrial,fabricsample,searchengine,goodwords,badwords)";
 $SQL = $SQL." values(getdate(),'".$cgih->param('Name')."','".$cgih->param('Address1')."','";
 $SQL = $SQL.$cgih->param('Address2')."','".$cgih->param('City')."','".$cgih->param('State')."','";
 $SQL = $SQL.$cgih->param('Zip')."','".$cgih->param('Phone')."','".$cgih->param('email')."','";
 $SQL = $SQL.$cgih->param('Comments')."',".c2bool($cgih->param('Truck Tarp')).",";
 $SQL = $SQL.c2bool($cgih->param('Tough Tarp')).",".c2bool($cgih->param('Dry-Dock Covers')).",";
 $SQL = $SQL.c2bool($cgih->param('Banner Blanks')).",".c2bool($cgih->param('Inground Pool Covers')).",";
 $SQL = $SQL.c2bool($cgih->param('Industrial Sewing & Heat Sealing')).",".c2bool($cgih->param('Fabric Sample'));
 $SQL = $SQL.",'".$cgih->param('searchengine')."','".$cgih->param('keybad')."','".$cgih->param('keygood');
 $SQL = $SQL."')";

 my $dbh = DBI->connect('DBI:ODBC:DSSEWING','dssewing_www_service','!g0ttal3arnt0s3w') or return 0;
 my $sth = $dbh->prepare($SQL);

 $sth->execute or print $sth->errstr;

 $sth->finish;
 $dbh->disconnect;

 return 1;
}


# returns 1 if all requireds are there
sub requireds {

$retval = 1;

foreach $req (@required) {
 
 if ($cgih->param($req) eq '') {
  push @missing_fields,$req;
  $retval = 0;
 }
}

return $retval;
}


sub HTML_missing_fields {
 print $cgih->header;
 print $cgih->start_html(-title=>'Incomplete Form Submission');

 open file,"../includes/tool_bar_include.html";
 print <file>;
 close file;

 print "<H1>Required Fields Missing</H1>";
 print "Please click back in your browser and complete the following required fields: ";
 
 print qq{<UL>};
 foreach $missing_field (@missing_fields) {
  print "<LI>".$missing_field."</LI>";
 }
 print "</UL>";
 
 print $cgih->end_html;
}


# begin actual stuff :)
init;



if (requireds) {
 if (save_request) {
  print $cgih->redirect($redirect);
 }
 else {
  #print $cgih->redirect($error_redirect); 
  print $cgih->header;
  print $DBI::errstr;
  exit;
 }
}
else {
 HTML_missing_fields;
 #print $cgih->redirect($missing_redirect);
}

