#!/usr/local/bin/perl

# error handler BS
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

# talk to outside world :)
use Socket;


$cgih = new CGI;

$remote = $cgih->param('REMOTESERVER');
$port = $cgih->param('REMOTEPORT');
$local = "localhost";

#print "Content-type: text/html\n\n";

#print $cgih->param('REMOTESERVER'),"<BR>";
#print $cgih->param('REMOTEPORT'),"<BR>";


#print $cgih->param('REQ');
#print "<BR><BR>";

($name, $alias,$type,$len,$remoteaddr) = gethostbyname($remote);

$proto = getprotobyname('tcp');

if (socket(socketh,AF_INET,SOCK_STREAM,$proto)) {
 #print "socketed<BR>";
} else {
# generate fucked up error
}


$sin = sockaddr_in($port,$remoteaddr);

if (connect (socketh,$sin)) {
 #print "connected<BR>";
} else {
# fucked up error!
}

#setsockopt SOCKET,LEVEL,OPTNAME,OPTVAL

# generate request...bleh
$request = $cgih->param('REQ');
$request =~s/http:\/\///;
$request =~s/$remote//;

#print "<BR><BR><BR><BR>";
#print $request;




#	{ my $ofh = select LOG;
#	  $| = 1;
#	  select $ofh;
#	}

# i thought there might be some screwey buffering bullshit going on :) thanx to PJ
select((select(socketh), $|=1)[0]);

# write request to remote server
print socketh $request;

# fetch basic data
# we want to strip the basic headers...hmmm...
# for now we'll just spit them out...


#print "<BLOCKQUOTE>$request</BLOCKQUOTE>";
#print "<BLOCKQUOTE>$remote</BLOCKQUOTE>";
#print "REMOTE: ", $remote;


$fct = 0;


while (<socketh>) {
 $result=$_;

# if ($fct == 0) {
#	if (/content-type*/i) { $fct = 1; print $result; }
# 	if (/cookies*/i) { print $result;  }
# 	if (/expires*/i) { print $result;  }
# } else { print $result; }
 print $result;

}



# prase what we get back
#$result=~s/<[^>]*>/ /gs; # remove html tags
#$result=~tr/A-Z/a-z/; #upper to lower thanks :)


#$result =~/total\s*charges\s*=\s*\$([^<]+)\s*total/i;
#$charge = $1;

#finish with life
close(socketh);

__END__
