<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum Light Truck Headache Racks - Aluminum Light Truck Accessories - D.S.Sewing";
	$keywords    = "Merritt Aluminum Light Truck Headache Racks, Aluminum Light Truck Accessories,Light Truck Headache Racks";
	$description = "D.S.Sewing offers Aluminum Light Truck Headache Racks are built with commercial grade aluminum diamond plate material and the highest quality hardware";
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
    <CENTER>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/menu_truck_acc.php"; ?>

    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="5">
                    <NOBR>
                        <B>Merritt Aluminum Light Truck Headache Racks</B>
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
                <table border="0" cellspacing="0">
                    <tr>
                        <td><IMG SRC="/images/truck_acc_images/light_truck/headache-racks-full.jpg" WIDTH="180"
                                 HEIGHT="180" ALT="Cabinet-Guard"></td>
                    </tr>
                    <tr>
                        <td><IMG SRC="/images/truck_acc_images/light_truck/headache-racks-full2.jpg" WIDTH="180"
                                 HEIGHT="180" ALT="Cabinet-Guard"></td>
                    </tr>
                </table>


            </TD>
            <TD WIDTH="99%" VALIGN="top" style="padding-left: 10px;">
                <p>Merritt&apos;s headache racks are designed for function and durability while providing a distinctive
                    look. Each headache rack has a channel designed into the frame to support multiple lighting and load
                    securement accessories. The channel also serves to hide and protect a wiring harness.</p>
                <UL>
                    <LI>Merritt&apos;s headache racks fit all Mid and Full-Size pickups</LI>
                    <LI>All Merritt headache racks are built from commercial grade aluminum materials for strength and
                        durability
                    </LI>
                    <LI>Features a lightweight extruded frame for maximum visibility</LI>
                    <LI>A channel on the backside of the frame provides easy mounting and flexibility for multiple
                        accessories such as lighting and load securement
                    </LI>
                    <LI>The rear channel also hides and protects a wiring harness for light options</LI>
                    <LI>Mounting kits available to fit your truck</LI>
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
	$product_arr = [];
	echo product_table( $product_arr, true, 'HEADACHE RACKS CAB HIGH MODEL' );
	?>

	<?php
	$product_arr = [
		'720204-131',
		'720204-132',
		'720204-133',
		'720204-134',
		'720204-135',
		'720204-231',
		'720204-232',
		'720204-233',
		'720204-234',
		'720204-235'
	];
	echo product_table( $product_arr, false, 'FORD F150 2002 TO CURRENT, GMC 1500 2007 TO CURRENT, GMC 2500-3500 2007-2019, TOYOTA TUNDRA 2007 TO CURRENT' );
	?>
	<?php
	$product_arr = [
		'720205-131',
		'720205-132',
		'720205-133',
		'720205-134',
		'720205-135',
		'720205-231',
		'720205-232',
		'720205-233',
		'720205-234',
		'720205-235',
	];
	echo product_table( $product_arr, false, 'DODGE RAM 1500 2009 TO 2018, RAM 2500-3500 2009 TO 2020' );
	?>

    <?php
    $product_arr = [
        "720206-131",
        "720206-132",
        "720206-133",
        "720206-134",
        "720206-135",
        "720206-231",
        "720206-232",
        "720206-233",
        "720206-234",
        "720206-235",
    ];
    echo product_table( $product_arr, false, 'GMC 2500-3500 2020-CURRENT, GMC 1500-3500 1999 TO 2006' );
    ?>

    <?php
    $product_arr = [
        "720207-131",
        "720207-132",
        "720207-133",
        "720207-134",
        "720207-135",
        "720207-231",
        "720207-232",
        "720207-233",
        "720207-234",
        "720207-235",
    ];
    echo product_table( $product_arr, false, 'DODGE RAM 1500-3500 2002 TO 2008. FORD SUPER DUTY 1999 TO 2016' );
    ?>

    <?php
    $product_arr = [
        "720208-131",
        "720208-132",
        "720208-133",
        "720208-134",
        "720208-135",
        "720208-231",
        "720208-232",
        "720208-233",
        "720208-234"
    ];
    echo product_table( $product_arr, false, 'FORD SUPER DUTY 2017 TO CURRENT' );
    ?>

    <br>
    <p></p>

    <?php
    $product_arr = [];
    echo product_table( $product_arr, true, 'HEADACHE RACKS ABOVE CAB HIGH MODEL' );
    ?>
    <?php
    $product_arr = [
        "720407-131",
        "720407-132",
        "720407-133",
        "720407-134",
        "720407-135",
        "720407-231",
        "720407-232",
        "720407-233",
        "720407-234",
        "720407-235",
    ];
    echo product_table( $product_arr, false, 'FORD F150 2002 TO CURRENT, GMC 1500 2007 TO CURRENT, GMC 2500-3500 2007-2019, TOYOTA TUNDRA 2007 TO CURRENT' );
    ?>

    <?php
    $product_arr = [
        "720408-131",
        "720408-132",
        "720408-133",
        "720408-134",
        "720408-135",
        "720408-231",
        "720408-232",
        "720408-233",
        "720408-234",
        "720408-235"
    ];
    echo product_table( $product_arr, false, 'DODGE RAM 1500 2009 TO 2018, RAM 2500-3500 2009 TO 2020' );
    ?>

    <?php
    $product_arr = [
        "720409-131",
        "720409-132",
        "720409-133",
        "720409-134",
        "720409-135",
        "720409-231",
        "720409-232",
        "720409-233",
        "720409-234",
        "720409-235"
    ];
    echo product_table( $product_arr, false, 'GMC 2500-3500 2020-CURRENT, GMC 1500-3500 1999 TO 2006' );
    ?>

    <?php
    $product_arr = [
        "720410-131",
        "720410-132",
        "720410-133",
        "720410-134",
        "720410-135",
        "720410-231",
        "720410-232",
        "720410-233",
        "720410-234",
        "720410-235",
    ];
    echo product_table( $product_arr, false, 'DODGE RAM 1500-3500 2002 TO 2008. FORD SUPER DUTY 1999 TO 2016' );
    ?>

    <?php
    $product_arr = [
        "720411-131",
        "720411-132",
        "720411-133",
        "720411-134",
        "720411-134",
        "720411-231",
        "720411-232",
        "720411-233",
        "720411-234",
        "720411-235",
    ];
    echo product_table( $product_arr, false, 'FORD SUPER DUTY 2017 TO CURRENT' );
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