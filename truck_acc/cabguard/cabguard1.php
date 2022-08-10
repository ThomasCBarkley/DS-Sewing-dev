<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum Headache Racks, Cab Guards, Mounting Kits";
	$keywords    = "Merritt Semi Truck Aluminum Headache Racks, Cab Guards, Mounting Kits";
	$description = "Merritt Semi Truck Aluminum Headache Racks, Cab Guards, Mounting Kits, Aluminum Semi Truck Cab Guard Accessories.";
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
	<!-- 
		iNSERT jQuery to process the but click events. this will need to call the 
		addToCart($pid, $price, $weight, $qty, $length, $width, $height) function in the /includes/data/getprice.php file
		
	-->

</head>
<body>
<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/menu_truck_acc.php"; ?>
</CENTER>
<DIV ALIGN="center">
    <TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" WIDTH="600">
        <TR>
            <TD WIDTH="100%">
                <NOBR>
                    <FONT FACE="Arial" SIZE="5"><B>Merritt Aluminum Headache Racks, Cab Racks, Mounting Kits 800
                            789-8143</B>
                    </FONT>
                </NOBR>&nbsp;
                <HR WIDTH="100%" NOSHADE SIZE="1" COLOR="#000000">
            </TD>
        </TR>
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="4">
                    <center><B><a href="/images/Legal_LSR.jpg" target="_blank">
                                <font color="red">CAB RACK INSTALATION AND SECURITY WARNING</BR>
                                    <<< CLICK HERE >>>
                                </font>
                            </a></B></center>
                </FONT>
            </TD>
        </TR>
    </TABLE>
    &nbsp;<div align="center">
        <table border="1" width="600" cellspacing="0" bordercolor="#000000">
            <tr>
                <td width="20%" align="center" valign="top">
                    <a href="#Cabguards"><small>Cab Racks</small></a>
                </td>
                <td width="20%" align="center" valign="top">
                    <a href="#Cabguards_offset_feet"><small>Cab Racks offset feet</small></a>
                </td>
                <td width="20%" align="center" valign="top">
                    <a href="#Mounting_Kits"><small>Mounting Kits</small></a>
                </td>
                <td width="20%" align="center" valign="top">
                    <a href="#Options"><small>Options</small></a>
                </td>
                <td width="20%" align="center" valign="top">
                    <a href="#Enclosures"><small>Enclosures</small></a>
                </td>
            </tr>
        </table>
    </div>
    <p><BR>
    </p>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top"><IMG alt="" height=173 src="/images/truck_acc_images/cabguard1.jpg"
                                             width=187><br>
                <font size="2"><b>Image shown above is a Cab Rack with option package 328 or 363. Must order Cab Rack
                        and option.</b></font>
            </TD>
            <TD WIDTH="99%" VALIGN="top">
                <UL>
                    <LI>Dyna-Tube Extrusion, aerodynamic radius corner shape, high strength - low weight.
                    <LI>New Technology alloy provides for a better weight to strength ratio, for increased load capacity
                        and safety.
                    <LI>4" Foot assembly providing increased trailer clearance, easier mounting and durability.
                    <LI>5" Uprights require less mounting space and give unparalleled load resistance.</LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR>
    <a name="Cabguards">
        <font color="red"> CAB RACKS </font>
    </a>
	<?php
	
	$product_arr = [
		'317',
		'3173',
		'318',
		'3183',
		'319',
		'3193',
		'320',
		'3203',
		'321',
		'3213',
		'322',
		'3223',
		'3750',
		'370',
		'371',
		'229',
		'230'
	];
	
	//echo("before product table call");
	echo product_table( $product_arr, true );
	?>
    <a name="Cabguards_Northern">
        <font color="red">NORTHERN-LIGHT CAB RACKS FOR SEMI-TRUCKS </font>
    </a>
	<?php
	$product_arr = [ '3700', '3701', '3702', '3710', '3711', '3712', '3240' ];
	echo product_table( $product_arr );
	?>
    <a name="Cabguards_offset_feet">
        <font color="red"> CAB RACKS WITH OFFSET FEET </font>
    </a>

	<?php
	$product_arr = [ '3172', '3182', '3192', '3202', '3212', '3222' ];
	echo product_table( $product_arr );
	?>

    <a name="Mounting_Kits">
        <font color="red"> MOUNTING KITS</font>
    </a>

	<?php
	$product_arr = [ '324', '325', '323', '326', '327', '394', '395' ];
	echo product_table( $product_arr );
	?>

    <a name="Options">
        <font color="red"> OPTIONS </font>
    </a><br>
    <font color="blue">Select option with your Cab Rack choice.<br>Must order Cab Rack with option.</font>

	<?php
	$product_arr = [
		'142',
		'143',
		'144',
		'141-1',
		'141-2',
		'145-1',
		'145-2',
		'145-3',
		'145-4',
		'145-5',
		'145-6',
		'413',
		'393',
		'369',
		'386',
		'367',
		'328',
		'363',
		'128',
		'147',
		'1471',
		'147-10',
		'333-18',
		'333',
		'329',
		'332',
		'334',
		'331',
		'330',
		'336',
		'335',
		'392',
		'853',
		'3501',
		'338'
	];
	echo product_table( $product_arr, true );
	?>

    <a name="Enclosures">
        <font color="red"> ENCLOSURES </font>
    </a><br>
    <font color="blue">Select enclosure option with your Cab Rack choice.<br>Must order Cab Rack and enclosure.</font>

	<?php
	$product_arr = [
		'3400',
		'3401',
		'390',
		'390-40',
		'390-41',
		'3402',
		'381',
		'375',
		'377',
		'378',
		'379',
		'341',
		'4870',
		'4871',
		'3430',
		'229',
		'230',
		'0003-0059C',
		'0003-0028C',
		'0002-0297C'
	];
	echo product_table( $product_arr );
	?>
    <CENTER><br><br>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
    </CENTER>
</body>
</html>