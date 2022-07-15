#!/usr/local/bin/perl

use CGI::Carp qw(fatalsToBrowser set_message);

BEGIN {
 sub handle_errors {
  my $msg = shift;
  print "<h1>Internal Error</h1>";
  print "The following error(s) ocurred:<BR>$msg";
 }
 set_message(\&handle_errors);
}

use CGI qw/:standard/;

$cgih = new CGI;

$pid = $cgih->param('pid');
$mod0 = $cgih->param('weight');
$mod1 = $cgih->param('colour');
$mod2 = $cgih->param('qty');

print $cgih->redirect("https://www.ds-sewing.com/don/tinycart.pl?action=incart&pid=$pid$mod0$mod1&qty=$mod2");


__END__

