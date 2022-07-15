#!/usr/local/bin/perl

# this script performs a non-indexed search based on a keyword of all files within a site


use CGI qw(:standard);

$directory = '/data/sites/ds-sewing.com/htdocs'; 
$cgih=new CGI;

# paths to exclude from searches
@excludes = {'images','images_old','mike','tony','dons','old_site','new_site'};

@keywords = split(/ /,$cgih->param('keywords'));


print $cgih->header;

sub scan_files {

# directory we're scanning
 my $dir = $_[0];

# string we're looking for
 my $st=$_[1];

 print $dir."\n";

 my(@dirs,@files,@results,$filename,$newdir,$list);

# open current directory
 opendir(dir,$dir);

# return list of directories not including current  
 @dirs=grep {!(/^\./) && -d "$dir/$_"} readdir (dir);

# print join("   ",@dirs);


# reset to top
 rewinddir(dir);

# filter out all html files
 @files=grep {!(/^\./) && /html$/ && -T "$dir/$_"} readdir(dir);

# close current directory
 closedir(dir);

 for $list(0..$#dirs) {
  if (!($dirs[$list] eq /images/)) {
   $newdir = $dir."/".$dirs[$list];
   scan_files ($newdir, $st);
  }
 }
}



$lala='sewing';

print $lala

scan_files($directory,$lala);
