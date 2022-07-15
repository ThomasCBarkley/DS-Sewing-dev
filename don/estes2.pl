#!/usr/bin/env perl
#use strict;
#use warnings;
#use IO::Socket::INET;

#------
# Description:
#   Compute the cost of shipping an item between two zip codes based on weight, bleh!
# Usage:
#   $cost = estes_rate ($origin,$destination,$weight,$class)
#------

sub get_from_zip {
    my ($param) = @_;
    my @zip = (
        '80640', #0
        '80640', #1
        '80640', #2
        '80640', #3
        '80640', #4
        '77029', #5
        '95691', #6
        '15205', #7
        '15205', #8
        '64120', #9
    );
    my $letter = substr($param,0,1);
    return @zip[$letter];
}

sub estes_rate {
    # WARNING: $origin is NOT used anywhere!
    my( $destination, $weight, $class ) = @_;
    $weight++;  # as you wish ;-)

    #Sample date: '2020-07-07'
    #$shipdate = '2020-07-13';
    my ($d, $m, $y) = (localtime)[3,4,5];
    my $shipdate = sprintf "%d-%02d-%02d", $y+1900, $m+1, $d;

    #From Zip Code (temporary, same as used before)
    my $from_zip= get_from_zip($destination);

    use LWP::UserAgent;
    my $ua = LWP::UserAgent->new;

    #OLD requests, keeping for future reference
    #my $remote_host = 'www.estes-express.com';
    my $query_args = join( '&',
        'QCFROM=23860',      'QCTO=' . $destination, 'QCCL1=' . $class,
        'QCSWT1=' . $weight, 'QCCL2=',               'QCCL3=',
        'QCCL4=',            'QCCL5=',               'QCCL6=',
        'QCSWT2=',           'QCSWT3=',              'QCSWT4=',
        'QCSWT5=',           'QCSWT6=',              'QCDWP=S',
        'QCDTRM=P',          'QCDAC1=',              'QCDAC2=',
        'QCDAC3=',           'format=xml',           'user_name=7731344',
        'password=est789',   'QCACT=' );

    #my $server_endpoint = "http://www.estes-express.com/cgi-dta/qun100.mbr/output?$query_args";
    # End

    my $server_endpoint = "http://services.shipwithcts.com/cts/shiprite/rater.cfm?action=xml&UID=3655&fromzip=$from_zip&tozip=$destination&shipdate=$shipdate&weight1=$weight&class1=70";
    
    #my $server_endpoint = "httpS://services.shipwithcts.com/cts/shiprite/rater.cfm?action=xml&UID=3655&fromzip=23860&tozip=".destination."&shipdate=2020-07-06&weight1=".$weight;
    

    # set custom HTTP request header fields
    my $req = HTTP::Request->new(GET => $server_endpoint);
    $req->header('content-type' => 'application/json');
    my $message;
    my $resp = $ua->request($req);
    
    if ($resp->is_success) {
      $message = $resp->decoded_content;
      #use Data::Dumper;
	#		my $str = Dumper($message);
	#		die $str;
    #  print "Received reply: $message\n";
        my @names;
        my $count = 0;
        while ($message =~ m/<finalcharge>(.*?)<\/finalcharge>/g) {
            @names[$count] = $1;
            $count++;
        }

        if ($count == 1) {
            return @names[0];
        }

        my $avr = int($count/2);
        return @names[$avr];

      #return $message =~ m{<netfreightcharges>(.*?)</netfreightcharges>}mi ? $1 : 0;
    } else {
    #	print 'test5';
    	return 1;
     # print "HTTP GET error code: ", $resp->code, "\n";
     # print "HTTP GET error message: ", $resp->message, "\n";
    }
    
}

1;

#print "\n", estes_rate( '06512', '90210', 150, 55 ), "\n";