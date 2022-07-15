#!/usr/local/bin/perl

# this is used to build the index files in mysql

use DBI;
use Text::Query::Simple;

# checks for exclusion
sub badpath {

foreach $exclude (@excludes) {
 if ($exclude eq $_[0]) {
  return 1;
 }
}
 return 0;
}

# this does most of the work, recursively
sub scan_files {

# directory we're scanning
 my $dir = $_[0];
 my($key,@id,@file,@dirs,@files,@results,$filename,$newdir,$list,%words);


  print "scanning: ".$dir,"\n";
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
  #if (!(join(" ",@excludes)=~/\b$dirs[$list]/)) {
  if (!badpath($dirs[$list])) {
  $newdir = $dir."/".$dirs[$list];
   scan_files ($newdir, $st);
  } else {
   print "skipping: ".$dirs[$list]."\n";
  }
 }

 for $list(0..$#files) {
  undef(%words);
  undef(@results);
  $filename=$dir."/".$files[$list];

  open file,$filename;

 # Get list of words/densities
 # Stick into database
 # the end :)
 
 #while (<file>) {
 #  if (/<title>([^<]+)<\/title>/i) {
 #    $title = $1;
 #  }  
 # } #while

 @file = <file>; # read entire contents of file
 $file = join(" ",@file); # make into string
 $file=~s/<[^>]*>/ /gs; # remove html tags
 $file=~tr/A-Z/a-z/; #upper to lower thanks :)
 @results=split(/[^\w-']+/,$file); #individual words thanks
 
 #generate list of valid words
 foreach (@results) {
  s/^'//;
  s/^-//;
  s/'$//;
  s/-$//;
  tr/'/\\'/;

 if (length($_)>3) {
  $qh->prepare($_); #prepare for search
  $words{$_}=$qh->match($file); # no in document
  print $words{$_}." ".$_."\n";
 } 
 
}

 $filename=~s/\/data\/sites\/ds-sewing.com\/htdocs\///;

 print "inserting keywords for: ",$filename, "\n";


 
 # insert into main id :)
 $sth=$dbh->prepare("INSERT INTO site_files VALUES ('$filename',0)");
 $sth->execute;
 $sth->finish;

 $sth=$dbh->prepare("SELECT filename,id FROM site_files WHERE filename='$filename'");
 $sth->execute;
 @id = $sth->fetchrow_array;	
 $sth->finish;

 #$sth=$dbh->prepare("INSERT INTO site_keywords VALUES($words{$key},'$key',$id[1])");
 $sth=$dbh->prepare("INSERT INTO site_keywords VALUES(?,?,$id[1])");

 foreach $key (keys(%words)) {
#  print $key."-";
  $sth->bind_param(1,$words{$key});
  $sth->bind_param(2,$key);
  $sth->execute;
  $sth->finish;
 } # for 

 
 } # for
 
 return;
}


# - begin actual work
 $dbh = DBI->connect('DBI:mysql:dssewing',root,undef) or die ('boom!');
 $sth = $dbh->prepare("DELETE FROM site_files");
 $sth->execute;
 $sth->finish;
 $sth = $dbh->prepare("DELETE FROM site_keywords");
 $sth->execute;
 $sth->finish;

# prepare for search!
$qh = new Text::Query::Simple;
$directory = '/data/sites/ds-sewing.com/htdocs/pool';

# paths to exclude from searches
@excludes=("images_old","flashstats","flash_test","truck_acc_images","pool_photos","images","images_old","mike","tony","old_site","new_site","links","includes","don","flash");

scan_files($directory);
$dbh->disconnect;


__END__
