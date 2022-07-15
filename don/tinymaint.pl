#!/usr/local/bin/perl

use DBI;
use CGI;

# global declarations
$spGetCountCatItems ="SELECT COUNT(*) FROM catalog";
$spAddCatItem = "INSERT INTO catalog (pid,price,description,weight,image) VALUES(?,?,?,?,?)";
$spUpdateCatItem = "UPDATE catalog SET pid=?,price=?,description=?,weight=?,image=? WHERE pid=?";
$spAddCategory = "INSERT INTO category (name) VALUES(?)";

my ($dbh,$cgih);

sub go_back {
	print $cgih->redirect('tinymaint.pl?'.$cgih->param('last_action'));
}
# update item in catalog

sub update_item {
 my($pid,$price,$description,$weight,$image,$result);
 
 $pid = $cgih->param('pid');
 $price = $cgih->param('price');
 $description = $cgih->param('description');
 $weight = $cgih->param('weight');
 $image = $cgih->param('image');

 $sth = $dbh->prepare($spUpdateCatItem);
 $sth->bind_param(1,$pid);
 $sth->bind_param(2,$price);
 $sth->bind_param(3,$description);
 $sth->bind_param(4,$weight);
 $sth->bind_param(5,$image);
 $sth->bind_param(6,$pid);
 $result=$sth->execute;
 $sth->finish;


 # we have a list of categories for this pid, hmmm
 if ($cgih->param('cat')) {

  my @cat = $cgih->param('cat');

  # what we're left with is two lists, on of deletions, on of additions
  $sql = "DELETE FROM category_items WHERE id NOT IN (".join(/,/,@cat).") AND pid=$pid";
  $result = $dbh->do($sql);

  print $sql,'<BR>';

  foreach $id (@cat) {
    $sql = "INSERT INTO category_items (id,pid) VALUES ($id,$pid)";
    $result = $dbh->do($sql);
  }

  # we're quit done
 }

 go_back();

 return;
}

# add item to catalog
sub add_item {
 my ($sth,$result,$price,$description,$weight,$pid,$image,$sql);

 $pid = $cgih->param('pid');
 $price = $cgih->param('price');
 $description = $cgih->param('description');
 $weight = $cgih->param('weight');
 $image = $cgih->param('image');


 $image=~s/'/\'/g;
 $description=~s/'/\'/g;

 $sth = $dbh->prepare ($spAddCatItem);
 $sth->bind_param(1,$pid,{TYPE=>SQL_VARCHAR});
 $sth->bind_param(2,$price);
 $sth->bind_param(3,$description);
 $sth->bind_param(4,$weight);
 $sth->bind_param(5,$image);
 $result = $sth->execute;
 
 if ($result) {
	 # procedure return display
	 print $cgih->header, $cgih->start_html(-title=>"Item $pid added to catalog."),
	 	$cgih->h1($pid." successfully addedd!<BR>"),
		qq{Click here to add more. <INPUT TYPE="submit" NAME="action" VALUE="Add Catalog Item">},
		$cgih->end_html;
 } else {
	print $cgih->header, $cgih->start_html(-title=>"Error inserting $pid!"),
		$cgih->h1("Error adding item $pid.<BR>"),
		$dbh->errstr,":",$sth->err,"<BR>",$cgih->end_html;
 }

 $sth->finish;
 return;
}


sub add_category {
 my ($name,$sth,$result);

 $name = $cgih->param('name');
 $sth = $dbh->prepare($spAddCategory);
 $sth->bind_param(1,$name);
 $result = $sth->execute;
 
 if ($result) { 
	go_back();
 } else {
  # crash, burn :)
 }

 $sth->finish;
}

# browse/add category to database
sub category_form {
 my ($count,$name,$sth,$result,@row,$id,$name,$countitems);
 $sth = $dbh->prepare("SELECT name,id FROM category");
 $result = $sth->execute;

 print $cgih->header,$cgih->start_html(-title=>'List Of Categories'),
	$cgih->h1('List Of Product Categories'),$cgih->start_form,"<TABLE BORDER=1>";
 print "<TR><TD><B>ID</B></TD><TD><B>Name</B></TD><TD&nbsp;></TD></TR>";

 while (@row=$sth->fetchrow_array) {
  $name = $row[0];
  $id = $row[1];
  print qq{<TR><TD>$id</TD><TD>$name</TD>},
	qq{<TD><INPUT TYPE="SUBMIT" NAME="action" VALUE="Browse Catalog">},
	qq{<INPUT TYPE="HIDDEN" NAME="filter" VALUE="cat">},
	qq{<INPUT TYPE="HIDDEN" NAME="value" VALUE="$id"></TD></TR>};
 }

 print qq{<TR><TD><INPUT NAME="name" MAXLENGTH=64></TD>},
	qq{<TD><INPUT TYPE="SUBMIT" NAME="action" VALUE = "Add Category"></TD></TR>},
	qq{<INPUT TYPE="HIDDEN" NAME="last_action" VALUE="action=List+Categories">};
 print "</TABLE>",$cgih->end_form,$cgih->end_html;
 $sth->finish;
}

# browse the database
sub browse_form {

 my ($sth,$sql,$count,$upper,$lower,$pid,$weight,$description,$image,$price,$filter,$value,@row,$isth);

 if (@_) {
	$lower = $_[0];
	$upper = $_[1]; } else

{
 $lower=0;
 $upper=10;
}

 $filter = $cgih->param('filter');
 $value = $cgih->param('value');

 # we're ready to fetch items
 #filter = 'sku' or 'cat'

 if ($filter) {
  if ($filter eq 'cat') {
   $sql = "SELECT pid,price,description,weight,image,dateadded FROM catalog INNER JOIN ";
   $sql = $sql."category_items ON catalog.pid = category_items.pid WHERE ";
   $sql = $sql."category_items.id=$value ORDER BY PID LIMIT $lower,$upper";
  } else {
   $sth = $dbh->prepare("SELECT COUNT(*) FROM catalog WHERE pid LIKE '$value%'");
   $sth->execute;
   $count = $sth->fetchrow_array;

   $sql = "SELECT pid,price,description,weight,image,dateadded FROM catalog WHERE ";
   $sql = $sql."pid LIKE '$value%' ORDER BY pid LIMIT $lower,$upper"; 
  
  }
 } else
 {
  $sth = $dbh->prepare($spGetCountCatItems);
  $sth->execute;
  # get count of all catalog items
  $count = $sth->fetchrow_array;

  $sql = "SELECT pid,price,description,weight,image,dateadded FROM catalog ORDER BY PID LIMIT $lower,$upper";
 }
 
 $sth=$dbh->prepare($sql);


 # execute one of these routines

 $sth->execute;

 print $cgih->header,$cgih->start_html;


 print $cgih->h1('Browse Catalog');
 print qq{<B>$count</B> Catalog Items Found};
 print $sql;
 print "<TABLE BORDER=0>";

 print "<TR><TD COLSPAN=5 ALIGN=RIGHT><B>Description</B></TD></TR>";
 while (($pid,$price,$description,$weight,$image,$dateadded) = $sth->fetchrow_array) {
  print $cgih->start_form;
  print qq{<INPUT TYPE=HIDDEN NAME="last_action" VALUE="action=Browse+Catalog&lower=$lower&upper=10">
 	<TR><TD><B>PID</B></TD><TD COLSPAN=3><INPUT LENGTH=30 MAXLENGTH=32 VALUE="$pid" NAME="pid"></TD>
 		<TD ROWSPAN=2 ALIGN=RIGHT VALIGN=TOP><TEXTAREA NAME="description" 
		COLS=25 ROWS=3>$description</TEXTAREA></TD></TR>
	<TR><TD><B>Price</B></TD><TD><INPUT LENGTH=15 MAXLENGTH=15 NAME="price" VALUE="$price"></TD>
	<TD><B>Weight</B></TD><TD><INPUT LENGTH=15 MAXLENGTH=15 NAME="weight" VALUE=$weight></TD></TR>
	<TR><TD><B>Image</B></TD><TD><INPUT NAME="image" LENGTH=15 MAXLENGTH=255 VALUE="$image"></TD>
	<TD><B>Date Added</B></TD><TD>$dateadded</TD>
	<TD ALIGN=CENTER><INPUT TYPE="SUBMIT" NAME="action" VALUE="Update Item"></TD></TR>
	<TR><TD COLSPAN=5><HR></TD></TR>};
  print $cgih->end_form;
 }
 print "</TABLE>";

 my($i);

 if ($count>10 && ($lower+$upper)<$count) {
  for ($i=1; $i<=int($count/10); $i++) {
	$lower = 10*$i+1;
	$upper = 10*($i+1)-1;
	if ($upper > $count) { $upper = $count;}  
  	print qq{<A HREF="tinymaint.pl?action=Browse+Catalog&lower=},$lower-1,qq{&upper=10">$lower-$upper</A><BR>};
  }
 }
 
 print $cgih->end_html;
}




# here is the magic product detail form

sub detail_form {

 my($description,$price,$dateadded,$weight,$image,$key);
 my ($sth,$pid,%categories,%item_cats,@row,$result);

 $pid = $cgih->param('pid');

 $sth = $dbh->prepare("SELECT name,id FROM category");
 $result = $sth->execute;
 while (@row=$sth->fetchrow_array) {
  $categories{$row[1]}=$row[0];		# build list of categories
 }


 $sth = $dbh->prepare("SELECT id FROM category_items WHERE pid=$pid");
 $result = $sth->execute;

 while (@row=$sth->fetchrow_array) {
  $item_cats{$row[0]}=1;  # add to list of active categories
 }


 $sth = $dbh->prepare("SELECT description,price,dateadded,weight,image FROM catalog WHERE pid=$pid");
 $result = $sth->execute;
 ($description,$price,$dateadded,$weight,$image) = $sth->fetchrow_array;
 $sth->finish;

 # all of the prep work is done, we can go nuts with the display now

 print $cgih->header,$cgih->start_html(-title=>'Item Detail'),$cgih->start_form;

 print qq{<TABLE BORDER=1 WIDTH="600px">};

 print "<TR><TD COLSPAN=5 ALIGN=RIGHT><B>Description</B></TD></TR>";
 print qq{<INPUT TYPE=HIDDEN NAME="last_action" VALUE="action=Item+Detail&pid=$pid">};
 print qq{<TR><TD><B>PID</B></TD><TD COLSPAN=3><INPUT SIZE=32 MAXLENGTH=32 VALUE="$pid" NAME="pid"></TD>},
                qq{<TD ROWSPAN=2 ALIGN=RIGHT VALIGN=TOP><TEXTAREA NAME="description" },
                qq{COLS=25 ROWS=3>$description</TEXTAREA></TD></TR>},
        qq{<TR><TD><B>Price</B></TD><TD><INPUT LENGTH=15 MAXLENGTH=15 NAME="price" VALUE="$price"></TD>},
        qq{<TD><B>Weight</B></TD><TD><INPUT LENGTH=15 MAXLENGTH=15 NAME="weight" VALUE=$weight></TD></TR>},
        qq{<TR><TD><B>Image</B></TD><TD><INPUT NAME="image" LENGTH=15 MAXLENGTH=255 VALUE="$image"></TD>},
        qq{<TD><B>Date Added</B></TD><TD>$dateadded</TD>},
        qq{<TD ALIGN=CENTER><INPUT TYPE="SUBMIT" NAME="action" VALUE="Update Item"></TD></TR>};
  print qq{<TR><TD COLSPAN=5><HR></TD></TR>};
# print qq{</TABLE><TABLE BORDER="1">};
 print qq{<TR><TD ROWSPAN="2" COLSPAN="4" VALIGN="TOP">Plese select the product categories you wish this item to },
 	qq{appear in.<BR>You can use hold Ctrl or Shift to perform multiple },
	qq{selections </TD><TD><B>Categories</B></TD></TR>};
 print qq{<TR><TD ALIGN="LEFT"><SELECT NAME="cat" SIZE="8" MULTIPLE>};


 foreach $value (sort keys %categories) {
  print qq{<OPTION };
   if (exists $item_cats{$value}) { print qq{SELECTED }; }
 print qq{VALUE="},$value,qq{">},$categories{$value},qq{\n};
 }


 print qq{</SELECT></TD></TR></TABLE>};
 print $cgih->end_form;


 return;

}

# here is the magic form that lets you add items to the database
sub add_form {
 print $cgih->header;
 print $cgih->start_html(-title=>'Add Item To Catalog');
 print $cgih->start_form;

 print qq{<TABLE BORDER="1">},
 	qq{<TR><TD COLSPAN=2 ALIGN=CENTER VALIGN=TOP BGCOLOR=#D0D0D0>},
 	qq{<B>Add Catalog Item</B></TD></TR>};

 print qq{<TR><TD>Product ID</TD><TD><INPUT NAME="pid" SIZE=32 MAXLENGTH=32></TD></TR>};
 print qq{<TR><TD>Price</TD><TD><INPUT NAME="price" SIZE=15 MAXLENGTH=15></TD></TR>};
 print qq{<TR><TD>Weight</TD><TD><INPUT NAME="weight" SIZE=15 MAXLENGTH=15></TD></TR>};
 print qq{<TR><TD>Product Description</TD><TD><TEXTAREA NAME="description" ROWS=10 COLS=25>},
	 qq{</TEXTAREA><TD></TD></TR>};
 print qq{<TR><TD>Image Path</TD><TD><INPUT NAME="image" SIZE=32 MAXLENGTH=255></TD></TR>};

 print qq{<TR><TD><INPUT TYPE="RESET" VALUE="Clear Form"></TD><TD><INPUT },
	qq{TYPE="SUBMIT" NAME="action" VALUE="Add Item"></TD></TR>};

 print $cgih->end_form, $cgih->end_html;
}

sub main_menu {
 print $cgih->header;
 print $cgih->start_html(-title=>'Catalog Maintenence Main Menu');
 print $cgih->start_form;
 print qq{<TABLE BORDER="1">};

 print "<TR><TD COLSPAN=3 ALIGN=CENTER VALIGN=TOP BGCOLOR=#D0D0D0><B>Main Menu</B></TD></TR>";
 print "<TR><TD>Add products to catalog.</TD><TD>",
	$cgih->submit(-name=>'action',-value=>'Add Catalog Item'),"</TD><TD>&nbsp;</TD></TR>";

 print "<TR><TD>Browse Catalog.</TD><TD>",
	$cgih->submit(-name=>'action',-value=>'Browse Catalog'),"</TD><TD>&nbsp;</TD></TR>";

 print "<TR><TD>Browse By SKU.</TD><TD>",
	$cgih->submit(-name=>'action',-value=>'Browse Catalog'),"</TD><TD>",
	qq{<INPUT TYPE="HIDDEN" NAME="filter" VALUE="sku">},
	qq{<INPUT NAME="value" MAXLENGTH=32></TD></TR>};
 print "<TR><TD>Browse By Category.</TD><TD>",
	$cgih->submit(-name=>'action',-value=>'Browse Catalog'),"</TD><TD>",
	qq{<INPUT TYPE="HIDDEN" NAME="filter" VALUE="cat">},
	qq{<SELECT NAME="value">};

	$sth=$dbh->prepare("SELECT name,id FROM category ORDER BY name");
	$sth->execute;
	while (@row=$sth->fetchrow_array) {
		$name=$row[0]; $id=$row[1];
		print qq{<OPTION VALUE="$id">$name\n};
	}
	print qq{</SELECT></TD></TR>};
	$sth->finish;
	


 print "<TR><TD>View/Add Categories.</TD><TD>",
 	$cgih->submit(-name=>'action',-value=>'List Categories'),"</TD><TD>&nbsp;</TD></TR>";
 print "</TABLE>";
 print $cgih->end_form;
 print $cgih->end_html;
}

sub stub(){

}

sub main {
 $cgih = new CGI;
 $dbh = DBI->connect('DBI:mysql:dssewing','dssewing','C4H10o2') or die('boo-hoo');


 if (!$cgih->param('action')) { main_menu(); } else {

 # no switch (bleh!)
 for ($cgih->param('action')) {
  /Add Catalog Item/ && do { add_form; last;};
  /Add Item/ && do {add_item; last;};

  /Browse Catalog/ && do {browse_form($cgih->param('lower'),$cgih->param('upper')); last;};
  /Update Item/ && do {update_item; last;};

  /List Categories/ && do { category_form; last;};
  /Add Category/ && do {add_category; last;};
  /Item Detail/ && do {detail_form; last; };

  print $cgih->header,$cgih->param('action');
 }

 }


 $dbh->disconnect;

 return 1;
}


# this is where it all begins

main();

