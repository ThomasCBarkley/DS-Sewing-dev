#!/usr/local/bin/perl

use Socket;

#------
# Description:
#   Compute the cost of shipping an item between two zip codes based on weight, bleh!
# Usage:
#   $cost = estes_rate ($origin,$destination,$weight,$class)
#------



sub estes_rate {	

my $weight = int($_[2]+1);
my $origin = $_[0];
my $destination = $_[1];
my $class = $_[3];	

my ($charge,$result,$getdata,$remote,$port,$name,$alias,$type,$len,$remoteaddr,$socketh,$sin);


$remote = "www.estes-express.com";
$port = 80;

($name, $alias,$type,$len,$remoteaddr) = gethostbyname($remote);


$proto = getprotobyname('tcp');

if (socket(socketh,AF_INET,SOCK_STREAM,$proto)) {
} else {
 return -1;
}

$sin = sockaddr_in($port,$remoteaddr);

if (connect (socketh,$sin)) {
} else {
 return -1;
}


# i thought there might be some screwey buffering bullshit going on :) thanx to PJ
select((select(socketh), $|=1)[0]);

$getdata = "QCFROM=23860";
$getdata .= "&QCTO=$destination";
$getdata .= "&QCCL1=$class";
$getdata .= "&QCSWT1=$weight";
$getdata .= "&QCCL2=";
$getdata .= "&QCCL3=";
$getdata .= "&QCCL4=";
$getdata .= "&QCCL5=";
$getdata .= "&QCCL6=";
$getdata .= "&QCSWT2=";
$getdata .= "&QCSWT3=";
$getdata .= "&QCSWT4=";
$getdata .= "&QCSWT5=";
$getdata .= "&QCSWT6=";
$getdata .= "&QCDWP=S&QCDTRM=P&QCDAC1=&QCDAC2=&QCDAC3=&format=xml";
$getdata .= "&user_name=7731344&password=est789&QCACT=";



my $gogo = "GET /cgi-dta/qun100.mbr/output?$getdata HTTP/1.1\n";
$gogo .="Host: www.estes-express.com\n";
$gogo .="User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.1) Gecko/20060111 Firefox/1.5.0.1\n";
$gogo .="Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5\n";
$gogo .="Accept-Language: en-us,en;q=0.5\n";
$gogo .="Accept-Encoding: plain\n";
$gogo .="Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\n";
$gogo .="Connection: Close\n\n";	
	
print socketh $gogo;

# fetch basic data
while (<socketh>) {	
 $result.=$_;
}

#
$exp = q[<netfreightcharges>(.*)</netfreightcharges>];
if ($result  =~ /$exp/mgi) {
	# print "found\n";
	$charge = $1;
} else {
	$charge = 0;
}

#finish with life
close(socketh);
return $charge;
}

1;


# $tw = 150;
# $ez = "06040";


# my $cost =  estes_rate("06512",$ez,$tw,55,55);
# print $cost;