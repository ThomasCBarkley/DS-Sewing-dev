#!/usr/local/bin/perl

# this is used to build the index files in mysql

use DBI;
use Text::Query::Simple;

# checks for exclusion
sub badpath {
foreach $exclude (@dir_excludes) {
 if ($exclude eq $_[0]) {
  return 1;
 }
}
 return 0;
}

sub badfile{
foreach $exclude (@file_excludes) {
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
 my($key,@id,@file,@dirs,@files,@results,$filename,$newdir,$list,%words,$description);

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
  if (!badpath($dirs[$list])) {
   $newdir = $dir."/".$dirs[$list];
   scan_files ($newdir, $st);
  } else {
   print "skipping: ".$dirs[$list]."\n";
  }
 }

 for $list(0..$#files) {
  if (!badfile($files[$list])) {
  
	  undef(%words);
	  undef(@results);
	  $filename=$dir."/".$files[$list];

	  open file,$filename;	 
	  @file = <file>; # read entire contents of file
	  close file;
	  $file = join(" ",@file); # make into string

	  # find title tag	  
 	  $file =~/<title>([^<]+)<\/title>/i;
	  $title = $1;
	  # find meta description tag
	  $file =~/<meta\s+name="description"\s+ content="([^<]+)\">/i;
	  $description = $1;

	  $file=~s/<[^>]*>/ /gs; # remove html tags
	  $file=~tr/A-Z/a-z/; #upper to lower thanks :)
	  @results=split(/[^\w-']+/,$file); #individual words thanks
	 
	  #generate list of valid words
	  foreach (@results) {
	   s/^'//;
	   s/^-//;
	   s/'$//;
	   s/-$//;
	   tr/'/\'/;

	  if (length($_)>3) {
	   $qh->prepare(/$_/,-regexp=>1); #prepare for search
	   $words{$_}=$qh->match($file); # no in document
	   if ($words{$_}==0) { print "bad keyword $_ in file $files[$list]"; }
	  }  
	 }

	 $filename=~s/\/inetpub\/wwwroot\/ds\///;

	 print "inserting keywords for: ",$filename, "\n";

	 # insert into main id :)
	 $description=~s/"/\"/g;
         $title=~s/"/\"/g;
         
     print $filename;
              
	 $sth=$dbh->prepare(qq{INSERT site_files ([filename], [title], [description]) values(?,?,?)});
	 $sth->bind_param(1,"" .$filename);
	 $sth->bind_param(2,"" .$title);
	 $sth->bind_param(3,"" .$description);
	 $sth->execute;
	 $sth->finish;

	 $sth=$dbh->prepare(qq{SELECT filename,id FROM site_files WHERE filename='$filename'});
	 $sth->execute;
	 @id = $sth->fetchrow_array;	
	 $sth->finish;
	 
	 print "ID=" . $id[1] . "\n";
	  
	 $sth=$dbh->prepare("INSERT site_keywords ([density], [keyword], [id]) VALUES(?,?,?)");


	 foreach $key (keys(%words)) {
	  $sth->bind_param(1,0 + $words{$key});
	  $key=~s/'/\'/;
	  $sth->bind_param(2,$key);
	  $sth->bind_param(3,$id[1]);
	  $sth->execute || die($key,' ',$words{$key});
	 } # for 
  	$sth->finish; 
  } else {
 print "skipping: ".$files[$list]."\n";
 }
} # for
 
return 0;
}

# converts a file to an array

sub file2list {
 my($file,@ret);
 open file,$_[0];
 while (<file>) {
  if (/\s*^#+/) {
  print "comment: ",$1,"\n";
  } else {
    if(/\s*(.+)(#$)*/) {
    print "name: ",$1,"\n";
    push (@ret,$1);
    }
  }
 }
 close file;
 return @ret;
}


# - begin actual work

 # $dbh = DBI->connect('DBI:mysql:dssewing',root,undef) or die ('boom!');
 $dbh = DBI->connect('DBI:ODBC:DSSEWING','sa','') or die('boom!');
 $dbh2 = DBI->connect('DBI:ODBC:DSSEWING','sa','') or die('boom!');
 
 $sth = $dbh->prepare("DELETE FROM site_files");
 $sth->execute;
 $sth->finish;
 
 $sth = $dbh->prepare("DELETE FROM site_keywords");
 $sth->execute;
 $sth->finish;
 
 $sth = $dbh->prepare("DELETE FROM site_keyweight");
 $sth->execute;
 $sth->finish;
 

# prepare for search!
$qh = new Text::Query::Simple;
$directory = '/inetpub/wwwroot/ds';

# paths to exclude from searches
@dir_excludes = file2list("dexclude.lst");
@file_excludes= file2list("fexclude.lst");

# scan files
scan_files($directory);

# update weights

print "updating weights.....\n";
$sth=$dbh->prepare("select distinct keyword,sum(density) from site_keywords group by keyword");
$sth->execute;

$isth=$dbh2->prepare("insert site_keyweight (weight,keyword) VALUES(?,?)");

while (@row=$sth->fetchrow_array) { 

 if ($row[1]>0) {
  $weight=1/$row[1]; } else {
  $weight=0; 
 }

 $key=$row[0];
 $key=~s/'/\'/;

 $isth->bind_param(1,$weight);
 $isth->bind_param(2,$key);
 $isth->execute or die('boom!');
}

$isth->finish;
$sth->finish;


$dbh->disconnect;
$dbh2->disconnect;

exit;

__END__
