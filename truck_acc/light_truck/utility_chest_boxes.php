<html lang="en">
<head>
	<?php
	$title       = "Merritt Utility Chest Boxes - Merritt Light Truck Products - D.S.Sewing";
	$keywords    = "Merritt Utility Chest Boxes, Merritt Aluminum Light Truck Accessories";
	$description = "D.S.Sewing offers Merritt Utility Chest Boxes that are designed to mount in your bed rather than on your bed rails";
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
                        <B>Merritt Light Truck Utility Chest Boxes</B>
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
                <IMG SRC="/images/truck_acc_images/light_truck/chest-boxes.jpg" WIDTH="184" HEIGHT="191"
                     ALT="Light Truck Chest Boxes"></TD>
            <TD WIDTH="99%" VALIGN="top" style="padding-left: 10px;">
                <p>Merritt Utility Chest Boxes are designed to mount in your bed rather than on your bed rails. They are
                    manufactured for commercial use, providing legendary durability and functionality. Every Chest Box
                    is built with commercial grade materials and the highest quality hardware providing years of
                    trouble-free operation.</p>
                <ul>
                    <li>Tamper-resistant locks and high-quality latch hardware and components provide the highest level
                        of security and years of trouble-free operation.
                    </li>
                    <li>Extruded aluminum door framing provides the highest level of strength, durability and function
                        in the industry
                    </li>
                    <li>The extruded frame also provides a stronger attachment point for the latch and gas shocks which
                        eliminates failure points
                    </li>
                    <li>The door and body extrusions mate to protect the seal surface, providing the best weather
                        resistant seal and security in the industry.
                    </li>
                    <li>Cargo control D-Rings and removable tool tray options available</li>
                </ul>
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
		'710418-121',
		'710418-122',
		'710418-123',
		'710418-124',
		'710418-125'
	];
	echo product_table( $product_arr, true, [
		'title'  => 'COMPACT BED TRUCK, SMOOTH ALUM BODY DIAMOND LID',
		'strong' => true
	] );
	?>
	<?php
	$product_arr = [ '710416-122', '710416-123', '710416-124', '710416-125' ];
	echo product_table( $product_arr, true, [
		'title'  => 'MID SIZE TRUCK BED, SMOOTH ALUM BODY DIAMOND LID',
		'strong' => true
	] );
	?>
	<?php
	$product_arr = [ '710414-122', '710414-123', '710414-124', '710414-125' ];
	echo product_table( $product_arr, true, [
		'title'  => 'FULL SIZE TRUCK 5.5\' BED, SMOOTH ALUM BODY DIAMOND LID',
		'strong' => true
	] );
	?>
	<?php
	$product_arr = [ '710417-121', '710417-122', '710417-123', '710417-124', '710417-125' ];
	echo product_table( $product_arr, true, [
		'title'  => 'FULL SIZE TRUCK 6.5\' & 8\' BED SMOOTH ALUM BODY DIAMOND LID',
		'strong' => true
	] );
	?>
	<?php
	$product_arr = [ '3567' ];
	echo product_table( $product_arr, true, [
		'title'  => 'TOOL BOX MOUNTING KIT',
		'strong' => true
	] );
	?>
	<?php
	$product_arr = [ '71000' ];
	echo product_table( $product_arr, true, [
		'title'  => 'OPTIONS',
		'strong' => true
	] );
	?>
	<?php
	$product_arr = [ '7249' ];
	echo product_table( $product_arr, true, [
		'title'  => 'CARGO CONTROL',
		'strong' => true
	] );
	?>
    <br>
    <br>

    <br>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="2">
        <TR>
            <TD WIDTH="600">
                <ul>
                    <li>All Cabinet-Rack meet D.O.T. 393.106. Tested and Certified by an Independent Engineering
                        Firm.
                    </li>
                    <li>Must be Installed to Merritt Specifications with a Merritt Mounting Kit.</li>
                    <li>Mounting kits not included.</li>
                    <li>Additional mounting bracket not required for standard installations. (drilling is required). A
                        problem solver, mounting system is available for non-standard applications.
                    </li>
                </ul>
            </TD>
        </TR>
    </TABLE>

    <br><br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>

</BODY>
</HTML>