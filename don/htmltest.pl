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
use DBI;

use Socket;

require 'tinyconfig.pl';
require 'odfl.pl';
require 'ups.pl';
require 'support.pl';

$cgih = new CGI;
print $cgih->header;
print "<HTML><BODY>this is a test</BODY></HTML>";
print $cgih->https();