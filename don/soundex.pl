#!/usr/local/bin/perl



sub soundex2 {
  local($s) = @_;

  # associate each letter with its soundex code
  %sound = (
     'a', 0,
     'b', 1, 
     'c', 2,
     'd', 3,
     'e', 0,
     'f', 1,
     'g', 2,
     'h', 0,
     'i', 0,
     'j', 2,
     'k', 2,
     'l', 4,
     'm', 5,
     'n', 5,
     'o', 0,
     'p', 1,
     'q', 2,
     'r', 6,
     's', 2,
     't', 3,
     'u', 0,
     'v', 1,
     'w', 0,
     'x', 2,
     'y', 0,
     'z', 2
   );

   $s =~ tr/A-Z/a-z/;		# change to lower case
   $s =~ s/\W//g;		# eliminate non-alphanumeric chars
   $s =~ s/\d//g;		# eliminate numbers
   $s =~ s/_//g;		# eliminate underscores

   @sterm = split(//, $s);	# array of search terms
   $count = 0;
   $separator = 0;   
   $code = "0000000";
   $prev_char = '';

   foreach $sterm(@sterm) {	# for each letter of the word
      if ($count == 8) {	# once code length = 4, stop
         last;
      } elsif ($count == 0) {	# code first letter as a letter
         substr($code, $count, 1) = $sterm;
         $count++;
         $prevchar = $sterm;
      } elsif ($sound{$sterm} == 0) {
				# letter is a vowel or other null
         $separator = 1;
      } elsif ($sterm ne $prev_char) {
         substr($code, $count, 1) = $sound{$sterm};
         $count++;
         $prev_char = $sterm;
      }
   }
   return $code;	# return soundex code as result
}

1;	# return true


sub soundex {
  local($s) = @_;

  # associate each letter with its soundex code
  %sound = (
     'a', 0,
     'b', 1, 
     'c', 2,
     'd', 3,
     'e', 0,
     'f', 1,
     'g', 2,
     'h', 0,
     'i', 0,
     'j', 2,
     'k', 2,
     'l', 4,
     'm', 5,
     'n', 5,
     'o', 0,
     'p', 1,
     'q', 2,
     'r', 6,
     's', 2,
     't', 3,
     'u', 0,
     'v', 1,
     'w', 0,
     'x', 2,
     'y', 0,
     'z', 2
   );

   $s =~ tr/A-Z/a-z/;		# change to lower case
   $s =~ s/\W//g;		# eliminate non-alphanumeric chars
   $s =~ s/\d//g;		# eliminate numbers
   $s =~ s/_//g;		# eliminate underscores

   @sterm = split(//, $s);	# array of search terms
   $count = 0;
   $separator = 0;   
   $code = "0000";
   $prev_char = '';

   foreach $sterm(@sterm) {	# for each letter of the word
      if ($count == 4) {	# once code length = 4, stop
         last;
      } elsif ($count == 0) {	# code first letter as a letter
         substr($code, $count, 1) = $sterm;
         $count++;
         $prevchar = $sterm;
      } elsif ($sound{$sterm} == 0) {
				# letter is a vowel or other null
         $separator = 1;
      } elsif ($sterm ne $prev_char) {
         substr($code, $count, 1) = $sound{$sterm};
         $count++;
         $prev_char = $sterm;
      }
   }
   return $code;	# return soundex code as result
}

1;	# return true


print soundex("steal"),' ',soundex2("steal"),"\n";
print soundex("style"),' ',soundex2("style"),"\n";
print soundex("telephone"),' ',soundex2("telephone"),"\n";
print soundex("asdfjkldsajflkjasfdjadsf");
print "\n";
print soundex2("asdfjkldsajflkjasfdjadsf");

