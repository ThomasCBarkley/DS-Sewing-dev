#!/usr/local/bin/perl

# this recursivley hacks at html files searching for keywords

use CGI qw{:standard};
use Text::Query::Simple;


# this does mose of the work, recursively
sub scan_files {

# directory we're scanning
 my $dir = $_[0];
 my(@dirs,@files,@results,$filename,$newdir,$list);


# print $dir,"\n";
# open current directory
 opendir(dir,$dir);

# return list of directories not including current  
 @dirs=grep {!(/^\./) && -d "$dir/$_"} readdir (dir);

# reset to top
 rewinddir(dir);

# filter out all html files
 @files=grep {!(/^\./) && /htm(l?)$/ && -T "$dir/$_"} readdir(dir);

# close current directory
 closedir(dir);

 for $list(0..$#dirs) {

 # if ((index($excludes,$dirs[$list]))==-1) 

  if (!($excludes=~/$dirs[$list]/)) {
   $newdir = $dir."/".$dirs[$list];
   scan_files ($newdir, $st);
  }
 }

 for $list(0..$#files) {
  $filename=$dir."/".$files[$list];
 
  $hitcount = 0;

  open file,$filename;

  while (<file>) {
   if (/<title>([^<]+)<\/title>/i) {
     $title = $1;
   }  
  
   $hitcount = $hitcount + $qh->match();
  } #while

  $filename=~s/\/data\/sites\/ds-sewing.com\/htdocs\///;
  
  if ($hitcount>0) {
   #print qq{<A HREF="https://www.ds-sewing.com/"$filename}."<B>".$hitcount."-".$title."</B></A><BR>\n";
   push @hits,join(":",($hitcount,$filename,$title))
  }
 } # for
 
 return;
}


# - begin actual work
$cgih = new CGI;
$keywords = $cgih->param('keywords');

# prepare for search!
$qh = Text::Query::Simple->new($keywords);

$directory = '/data/sites/ds-sewing.com/htdocs';
$cgih=new CGI;

# paths to exclude from searches
$excludes = "flashstats flash_test truck_acc_images pool_photos images images_old mike tony old_site new_site links includes don flash";

print $cgih->header;

scan_files($directory);

#print "<BR><BR>";

foreach (sort {$b cmp $a} @hits) { 
 ($hitcount,$filename,$title) = split(/:/,$_);
 print $hitcount." - ".$title.qq{<A HREF="https://www.ds-sewing.com/$filename"</A><BR>};
}

__END__
