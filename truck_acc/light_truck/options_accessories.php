<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum Light Truck Lighting Options & Accessories - Aluminum Light Truck Accessories - D.S.Sewing";
	$keywords    = "Merritt Aluminum Light Truck Lighting Options & Accessories, Aluminum Light Truck Accessories,Light Truck Headache Racks";
	$description = "D.S.Sewing offers Merritt Light Truck Lighting Options & Accessories are built with commercial grade aluminum diamond plate material and the highest quality hardware";
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
                        <B>Merritt Aluminum Light Truck Lighting Options & Accessories</B>
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
                <IMG SRC="/images/truck_acc_images/light_truck/lighting-and-accessories-full.jpg" WIDTH="184"
                     HEIGHT="191" ALT="Cabinet-Guard">
            </TD>
            <TD WIDTH="99%" VALIGN="top" style="padding-left: 10px;">
                <p>The double channel track designed into the D-tube allows the user to easily install lighting options
                    and mounting brackets in your desired location and orientation. We proudly offer ECCO, Innotec and
                    Optronics lighting options and color matched mounting brackets to fit any lighting requirement.</p>
                <UL>
                    <li>The track system also offers a convenient place to conceal and protect the wiring harness</li>
                    <li>Harnesses are available for stop turn and tail light applications</li>
                    <li>ECCO LED work lights and emergency warning mini light bars are easily installed with brackets
                        designed to bolt into the track in the D-tube
                    </li>
                    <li>The Innotec Micro Bright Beacon light is about the size of a hockey puck providing small low
                        profile installation while meeting IP67 rating. Super bright and super durable
                    </li>
                    <li>Slim-line red led stop turn tail lights from Optronics add modern, sleek and great looking
                        appearance
                    </li>
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

    <br>
    <p></p>
	<?php
	$product_arr = [];
	echo product_table( $product_arr, true, [ 'title' => 'HEADACHE RACK AND UTILITY RACK OPTIONS', 'strong' => true ] );
	?>
	<?php
	$product_arr = [
		'7252-2',
		'7252-3',
		'7252-4',
		'7252-5',
		'7253-2',
		'7253-3',
		'7253-4',
		'7253-5',
		'7254-2',
		'7254-3',
		'7254-4',
		'7254-5',
		'7254-102',
		'7254-103',
		'7255-2',
		'7255-3',
		'7255-4',
		'7255-5',
		'7255-104',
		'7256-2',
		'7256-3',
		'7256-4',
		'7256-5',
		'7260-2',
		'7260-3',
		'7260-4',
		'7260-5'
	];
	echo product_table( $product_arr, false, [
		'title'  => 'LIGHT BRACKET OPTIONS ALL LIGHT BRACKETS COLOR MATCH THE HEADACHE RACKS AND UTILITY RACKS',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '7261-2', '7261-3', '7261-4', '7261-5' ];
	echo product_table( $product_arr, false, [ 'title' => 'LONG HORN UTILITY RACK EXTENSION', 'strong' => false ] );
	?>
	<?php
	$product_arr = [ '7220' ];
	echo product_table( $product_arr, false, [ 'title' => 'LOAD SECUREMENT', 'strong' => false ] );
	?>
	<?php
	$product_arr = [ '7250', '7251' ];
	echo product_table( $product_arr, false, [
		'title'  => 'HEADACHE RACK AND UTILITY RACK MOUNTING KITS',
		'strong' => false
	] );
	?>
    <br>
    <p></p>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="2">
        <TR>
            <TD WIDTH="600">
                <UL>
                    <LI><SMALL>All Cabinet-Rack meet D.O.T. 393.106. Tested and Certified by an Independent Engineering
                            Firm.</SMALL></LI>
                    <LI><SMALL>Must be Installed to Merritt Specifications with a Merritt Mounting Kit.</SMALL></LI>
                    <LI><SMALL>Mounting kits not included. </SMALL></LI>
                    <LI>
                        <SMALL>Additional mounting bracket not required for standard installations. (drilling is
                            required). A problem solver, mounting system is available for non-standard
                            applications. </SMALL>>
                    </LI>
                </UL>
            </TD>
        </TR>
    </TABLE>

    <br><br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</BODY>

</HTML>