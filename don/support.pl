#!/usr/local/bin/perl
#-
# 11-25-1999 - Created (DLL)
# Description:
#	Some support functions for tinycart.pl/tinymaint.pl
#-

use POSIX qw(strftime),qw(mktime),qw(ctime),qw(difftime);

sub vericard10 {
    my $Number = $_[0];
    my $NumberLength = length($Number);
    my $Location = 0;
    my $Checksum = 0;
    my $Digit = "";

    # Add even digits in even length strings
    # or odd digits in odd length strings.
    for ($Location = 1 - ($NumberLength % 2); $Location < $NumberLength; $Location += 2) {
        $Checksum += substr($Number, $Location, 1);
    }

    # Analyze odd digits in even length strings
    # or even digits in odd length strings.
    for ($Location = ($NumberLength % 2); $Location < $NumberLength; $Location += 2) {
        $Digit = substr($Number, $Location, 1) * 2;
        if ($Digit < 10) {
            $Checksum += $Digit;
        } else {
            $Checksum += $Digit - 9;
        }
    }

    # Is the checksum divisible by 10?
    return ($Checksum % 10 == 0);
}


sub now {
 return strftime "%a %b %e %H:%M:%S %Y", gmtime;
}

sub formattime {
 return strftime "%a %b %e %H:%M:%S %Y", gmtime$_[0];
}


#-- converts cc exp dates (12/2000) to usable date/time for system
#-- no leap year checking
 
sub exp_to_datetime {
 my $month = $_[0] - 1;  # adjust
 my $year = $_[1] - 1900; # adjust
 my @numdays = (31,28,31,30,31,30,31,30,30,30,30,31);

 return mktime(0,0,0,$numdays[$month],$month,$year); 
}

#-- valid_creditcard('4111111111111111',05,2000)

sub valid_creditcard {

 my $card = $_[0];
 my $month = $_[1];
 my $year = $_[2];

 if (!vericard10($card)) {return;} 
 if (difftime(exp_to_datetime($month,$year),time)<0) {return;}
 return 1;
}

1;

