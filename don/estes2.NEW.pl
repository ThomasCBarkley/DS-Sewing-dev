#!/usr/bin/env perl
use strict;
use warnings;
use IO::Socket::INET;

#------
# Description:
#   Compute the cost of shipping an item between two zip codes based on weight, bleh!
# Usage:
#   $cost = estes_rate ($origin,$destination,$weight,$class)
#------

sub estes_rate {
    # WARNING: $origin is NOT used anywhere!
    my( $origin, $destination, $weight, $class ) = @_;
    $weight++;  # as you wish ;-)

    my $remote_host = 'www.estes-express.com';

    my $query_args = join( '&',
        'QCFROM=23860',      'QCTO=' . $destination, 'QCCL1=' . $class,
        'QCSWT1=' . $weight, 'QCCL2=',               'QCCL3=',
        'QCCL4=',            'QCCL5=',               'QCCL6=',
        'QCSWT2=',           'QCSWT3=',              'QCSWT4=',
        'QCSWT5=',           'QCSWT6=',              'QCDWP=S',
        'QCDTRM=P',          'QCDAC1=',              'QCDAC2=',
        'QCDAC3=',           'format=xml',           'user_name=7731344',
        'password=est789',   'QCACT=' );

    my $http_req = join( "\n",
        'GET /cgi-dta/qun100.mbr/output?' . $query_args . ' HTTP/1.1',
        'Host: ' . $remote_host,
        'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.1) Gecko/20060111 Firefox/1.5.0.1',
        'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5',
        'Accept-Language: en-us,en;q=0.5',
        'Accept-Encoding: plain',
        'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
        'Connection: Close' )
        . "\n\n";

    my $socketh = IO::Socket::INET->new(
        Proto    => 'tcp',
        PeerAddr => $remote_host,
        PeerPort => 'http(80)',
        TimeOut  => 3,
    ) or return -1;

    # As of VERSION 1.18 all IO::Socket objects have autoflush turned on by default.
    $socketh->autoflush(1) if $IO::Socket::INET::VERSION < 1.18;

    print {$socketh} $http_req;

    local $/ = undef;
    my $ans = <$socketh>;
    close $socketh;

    return $ans =~ m{<netfreightcharges>(.*?)</netfreightcharges>}mi ? $1 : 0;
}

print "\n", estes_rate( '06512', '06040', 150, 55, 55 ), "\n";

