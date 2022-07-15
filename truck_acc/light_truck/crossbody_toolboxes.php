<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum Crossbody ToolBoxes - Aluminum Light Truck Accessories - D.S.Sewing";
	$keywords    = "Merritt Aluminum Crossbody ToolBoxes, Aluminum Light Truck Accessories,Crossbody ToolBoxes";
	$description = "D.S.Sewing offers Aluminum Crossbody ToolBoxes are built with commercial grade aluminum diamond plate material and the highest quality hardware";
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
                    <NOBR>
                        <B>Merritt Aluminum Classic Crossbody ToolBoxes</B>
                    </NOBR>
                </FONT>
            </TD>
        </TR>
        <tr>
            <td>
                <HR WIDTH="100%" NOSHADE="NOSHADE" SIZE="1" COLOR="#000000">
            </td>
        </tr>
    </TABLE>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top">
                <IMG SRC="/images/truck_acc_images/light_truck/crossbody-toolboxes-full.jpg" WIDTH="184" HEIGHT="191"
                     ALT="Cabinet-Guard"></TD>
            <TD WIDTH="99%" VALIGN="top" style="padding-left: 10px;">
                <p>Designed and built in Colorado, USA. Models offered in single or double doors. These door
                    configurations easily open and close from the ground. 90 degree opening allows for optional access
                    in storage. Gas shocks for door lift up and Internal Track System for accessories and tiedown
                    points. The features and benefits of this high-quality, high-performance storage box are
                    endless.</p>
                <UL>
                    <LI>Commercial grade aluminum for exceptional durability</LI>
                    <LI>Faceted 45 degree corners for sleek appearance and strength</LI>
                    <LI>Extruded aluminum door frame provides unmatched security</LI>
                    <LI>Distinctive features/style never before seen in the industry</LI>
                    <LI>Powder coat finish for long lasting product life</LI>
                    <LI>Mounting hardware included</LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
	<?php
	$product_arr = [
		'710113-111',
		'710113-112',
		'710113-113',
		'710113-114',
		'710113-115',
		'710213-111',
		'710213-112',
		'710213-113',
		'710213-114',
		'710213-115',
		'710112-111',
		'710112-112',
		'710112-113',
		'710112-114',
		'710112-115',
		'710212-111',
		'710212-112',
		'710212-113',
		'710212-114',
		'710212-115'
	];
	echo product_table( $product_arr, true, 'MID-SIZE TRUCK DIAMOND PLATE ALUMINUM' );
	?>
    <br>
    <p></p>
	<?php
	$product_arr = [
		'710113-221',
		'710113-222',
		'710113-223',
		'710113-224',
		'710113-225',
		'710213-221',
		'710213-222',
		'710213-223',
		'710213-224',
		'710112-221',
		'710112-222',
		'710112-223',
		'710112-224',
		'710112-225',
		'710212-221',
		'710212-222',
		'710212-223',
		'710212-224',
		'710212-225'
	];
	echo product_table( $product_arr, true, 'MID-SIZE TRUCK SMOOTH ALUMINUM' );
	?>
    <br>
    <p></p>
	<?php
	$product_arr = [
		'710109-111',
		'710109-112',
		'710109-113',
		'710109-114',
		'710109-115',
		'710209-111',
		'710209-112',
		'710209-113',
		'710209-114',
		'710209-115',
		'710110-111',
		'710110-112',
		'710110-113',
		'710110-114',
		'710110-115',
		'710210-111',
		'710210-112',
		'710210-113',
		'710210-114',
		'710210-115',
		'710111-111',
		'710111-112',
		'710111-113',
		'710111-114',
		'710211-111',
		'710211-112',
		'710211-113',
		'710211-114',
		'710211-115'
	];
	echo product_table( $product_arr, true, 'FULL SIZE TRUCK ALL DIAMOND PLATE ALUMINUM' );
	?>
    <br>
    <p></p>
	<?php
	$product_arr = [
		'710109-221',
		'710109-222',
		'710109-223',
		'710109-224',
		'710109-225',
		'710209-221',
		'710209-222',
		'710209-223',
		'710209-224',
		'710209-225',
		'710110-221',
		'710110-222',
		'710110-223',
		'710110-224',
		'710110-225',
		'710210-221',
		'710210-222',
		'710210-223',
		'710210-224',
		'710210-225',
		'710111-221',
		'710111-222',
		'710111-223',
		'710111-224',
		'710111-225',
		'710211-221',
		'710211-222',
		'710211-223',
		'710211-224',
		'710211-225'
	];
	echo product_table( $product_arr, true, 'FULL SIZE TRUCK ALL SMOOTH ALUMINUM' );
	?>
    <br>
    <p></p>
	<?php
	$product_arr = [ '71000', '71001', '71002', '71011', '71020', '7249' ];
	echo product_table( $product_arr, true, 'OPTIONS' );
	?>
    <br>
    <p></p>
	<?php
	$product_arr = [ '3567' ];
	echo product_table( $product_arr, true, 'TOOL BOX MOUNTING KIT' );
	?>
    <br>
    <p></p>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="2">
        <TR>
            <TD WIDTH="600">
                <UL>
                    <LI><SMALL>All Cabinet-Rack meet D.O.T. 393.106. Tested and Certified by an Independent Engineering
                            Firm. </SMALL></LI>
                    <LI><SMALL>Must be Installed to Merritt Specifications with a Merritt Mounting Kit. </SMALL></LI>
                    <LI><SMALL>Mounting kits not included. </SMALL></LI>
                    <LI><font size="2">Additional mounting bracket not required for standard installations. (drilling is
                            required). A problem solver, mounting system is available for non-standard
                            applications. </font></LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <br><br>

	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>