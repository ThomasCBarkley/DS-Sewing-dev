#!/usr/local/bin/perl

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


print vericard10('4111111111111111'),"\n";
print vericard10('4111111111111112'),"\n";
print vericard10('4128002208273149'),"\n";
print vericard10('373072648411005'),"\n";
