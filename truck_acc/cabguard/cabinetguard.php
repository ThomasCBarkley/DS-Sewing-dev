<html lang="en">

<head>
	<?php
	$title       = "Merritt Aluminum Cabinet-Guards - Aluminum Truck Accessories - Cabinet-Guards";
	$keywords    = "Merritt Aluminum Cabinet-Guards, Aluminum Truck Accessories,Cabinet-Guards";
	$description = "D.S.Sewing offers Aluminum Cabinet-Guards that are space saving, very compact, high strength units";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/aluminium_footer.gif',
			'link'  => '/truck_acc/truck_acc.php',
			'alt'   => 'click to return To Aluminium Truck Tarp Accessories index'
		],
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php"; ?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/product-line.php"; ?>
</head>
<body>
<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/menu_truck_acc.php"; ?>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="5">
                    <NOBR><B>Merritt Aluminum Cabinet-Racks</B></NOBR>
                </FONT>&nbsp;
                <HR WIDTH="100%" NOSHADE="NOSHADE" SIZE="1" COLOR="#000000">
            </TD>
        </TR>
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="4">
                    <center><B><a href="/images/Legal_LSR.jpg" target="_blank">
                                <font color="red">CAB RACK INSTALATION AND SECURITY WARNING</BR>
                                    <<< CLICK HERE &gt;&gt;&gt;
                                </font>
                            </a></B></center>
                </FONT>
            </TD>
        </TR>
    </TABLE>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top">
                <IMG SRC="/images/truck_acc_images/cabinetguard1.jpg" WIDTH="184" HEIGHT="191" ALT="Cabinet-Guard">
            </TD>
            <TD WIDTH="99%" VALIGN="top">
                <UL>
                    <LI>No rear uprights, allowing for closer installation to the truck cab, a real space saver.</LI>
                    <LI>Chain hangers and a full width top shelf are built into the design of the Cabinet-Rack.</LI>
                    <LI>A very compact, high strength unit. Built and tested to meet D.O.T. regulations.</LI>
                    <LI>Full three door enclosure. A very compact high strength unit.</LI>
                    <LI>Outside Doors Open Inward for Easy Access</LI>
                    <LI>Extruded Door Frame with a Full Perimeter Automotive Grade Door Seal</LI>
                    <LI>Piano Style Hinges</LI>
                    <LI>Diamond Plate Surface</LI>
                    <LI>Stainless Steel Door Locks with Dust Covers.</LI>
                    <LI>New Side Door Option For Easier Access to Your Storage Areas</LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <br/>
    <br/>
	<?php
	$product_arr = [ '310', '311', '392', 413 ];
	echo product_table( $product_arr, true );
	?>

    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="2">
        <TR>
            <TD WIDTH="600">
                <UL>
                    <LI><SMALL>All Cabinet-Rack meet D.O.T. 393.106. Tested and Certified by an Independent Engineering
                            Firm.</SMALL></LI>
                    <LI><SMALL>Must be Installed to Merritt Specifications with a Merritt Mounting Kit. </SMALL></LI>
                    <LI><SMALL>Mounting kits not included. </SMALL></LI>
                    <LI>
                        <font size="2">Additional mounting bracket not required for standard installations. (drilling is
                            required). A problem solver, mounting system is available for non-standard
                            applications.</font>
                    </LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <br><br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>