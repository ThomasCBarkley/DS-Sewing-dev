#!/usr/local/bin/perl


use Socket;

#------
# Description:
#   Compute the cost of shipping an item between two zip codes based on weight, bleh!
# Usage:
#   $cost = odfl_ship_rate ($origin,$destination,$weight,$class,$discount)
#------


sub odfl_ship_rate {	

	my $weight = int($_[2]+1);
	my $discount = $_[4];
	my $origin = $_[0];
	my $destination = $_[1];
	my $class = $_[3];
	my $deststate =$_[5];
	my $destcity = $_[6];

	$deststate=~tr/a-z/A-Z/; #upper to lower thanks :)

	$destcity = odfl_ship_rate2($origin,$destination,$weight,$class,$discount,$deststate,"");
	if (length($destcity)==0) {$destcity="bogus";}
	my $cost = odfl_ship_rate2($origin,$destination,$weight,$class,$discount,$deststate,$destcity);

	return $cost;
}


sub odfl_ship_rate2 {
# declare some junk

my ($charge,$result,$postdata,$remote,$local,$port,$name,$alias,$type,$len,$remoteaddr,$socketh,$sin);

my $weight = int($_[2]+1);
my $discount = $_[4];
my $origin = $_[0];
my $destination = $_[1];
my $class = $_[3];
my $deststate =$_[5];
my $destcity = $_[6];

$remote = "www.odfl.com";
$local = "216.238.112.23";
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

#setsockopt SOCKET,LEVEL,OPTNAME,OPTVAL

# generate form post data
$postdata.="Wgt1=$weight"; #weight
$postdata.="&Cls1=$class";            #class
$postdata.="&OZip=$origin";
$postdata.="&DZip=$destination";
$postdata.="&Send=Y";
$postdata.="&Disc=$discount";
$postdata.="&OCity=East Haven";
$postdata.="&DCity=$destcity";
$postdata.="&OSt=CT";
$postdata.="&DSt=$deststate";

$content_length = length($postdata);

#	{ my $ofh = select LOG;
#	  $| = 1;
#	  select $ofh;
#	}

# i thought there might be some screwey buffering bullshit going on :) thanx to PJ
select((select(socketh), $|=1)[0]);

# write request to remote server
print socketh "POST /cgi-bin/db2www/rateest.mbr/main HTTP/1.0\n",
	"Accept: www/source\n",
	"Accept: text/html\n",
	"Accept: text/plain\n",
	"User-Agent: MSIE/4.0\n",
	"Content-type: application/x-www-form-urlencoded\n",
	"Content-length: $content_length\n\n";

print socketh $postdata;


# fetch basic data
while (<socketh>) {
 $result.=$_;
}

# prase what we get back
$result=~s/<[^>]*>/ /gs; # remove html tags
$result=~tr/A-Z/a-z/; #upper to lower thanks :)
if ($destcity eq "")
{
	$result =~/\*\s*city:\s*([A-Za-z]+[ A-Za-z]+)\s*/i;
	$charge =$1;	
}
else
{
$result =~/total\s*charges\s*=\s*\$([^<]+)\s*shipping/i;
$charge = $1;
}

#finish with life
close(socketh);
return $charge;
}

1;

#$tw = 150;
#$ez = "06040";
#my $cost =  odfl_ship_rate("06512",$ez,$tw,55,55,"CT","");
#print $cost;