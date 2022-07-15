#!/usr/local/bin/perl 



open file,"fexclude.lst";

while (<file>) {
 if (/\s*^#+/) {
 print "comment: ",$1,"\n";
 } else { 
   if(/\s*(.+)(#$)*/) {
   print "name: ",$1,"\n";
   }
 }
}


close file;

