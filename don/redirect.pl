#!/usr/local/bin/perl

# 9-30-99 - Created (DLL)
# perl script to perform basic redirect from one thing to another, uses CGI.pm
# should work with any basic input (list,radio,input,etc)
#
# expects name of list box passed in hidden form
#
# example:
#
# <FORM ACTION="redirect.pl" METHOD="POST">
#	<INPUT TYPE="HIDDEN" NAME="redirect_identifier" VALUE="lstURL">
#	<SELECT NAME="lstURL">
#		<OPTION SELECTED VALUE="http://www.yahoo.com">Site #1
#		<OPTION VALUE="http://www.altavista.com">Site 2
#	</SELECT>
#	<INPUT TYPE="SUBMIT">
# </FORM>
#

use CGI qw(:standard);
$query = new CGI;
print $query->redirect($query->param($query->param('redirect_identifier')));

__END__
