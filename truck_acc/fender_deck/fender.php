<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum & Stainless Steel Semi Truck Fenders";
	$keywords    = "Merritt Aluminum & Stainless Steel Semi Truck Fenders Super Duty Truck Fenders aluminum fenders,stainless steel fenders, diamond plate, quarter fender, poly truck fender";
	$description = "Merritt Aluminum & Stainless Steel Semi Truck Fenders, Super Duty Semi Truck Fenders, Fender Brackets, Plastic Fenders Quarter Fender";
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
            <TD WIDTH="100%"><FONT FACE="Arial" SIZE="5">
                    <NOBR><B>Merritt Aluminum & Stainless Steel Semi Truck Fenders 800 789-8143</B></NOBR>
                </FONT>
                <HR WIDTH="100%" NOSHADE SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE>
    <div align="center">
        <table border="1" width="700" cellspacing="0">
            <tr>
                <td align="center" valign="top">
                    <STRONG style="font-weight: 400"><small>
                            <a href="#Full_Tandem_Single_Radius_Truck_Fenders">Full Tandem<br>
                                Single Radius </a></small></STRONG></td>
                <td align="center" valign="top">
                    <p align="center"><small><strong style="font-weight: 400">
                                <a href="#Full_Tandem_Double_Radius_Truck_Fenders">Full
                                    Tandem,<br>
                                    Double Radius </a><br>
                                </strong></small></td>
                <td align="center" valign="top">
                    <STRONG style="font-weight: 400"><small>
                            <a href="#Half_Tandem_Single_Radius_Truck_Fenders">Half Tandem<br>
                                Single Radius </a></small></STRONG></td>
                <td align="center" valign="top">
                    <STRONG style="font-weight: 400"><small>
                            <a href="#Single_Axle_Full_Radius_Truck_Fenders">Single Axle<br>
                                Full Radius </a><br>
                            &nbsp;</small></STRONG></td>
                <td align="center" valign="top">
                    <STRONG style="font-weight: 400"><small><a href="#Flat_Fender">Flat Fender</a></small></STRONG></td>
                <td align="center" valign="top">
                    <STRONG style="font-weight: 400"><small>
                            <a href="#Single_Tire_Full_Radius_Truck_Fenders">Single Tire<br>
                                Full Radius </a></small></STRONG></td>
                <td align="center" valign="top"><small>
                        <a href="#Merritt_Super_Duty_Fenders">Merritt Super<br>
                            Duty Fenders</a></small></td>
                <td align="center" valign="top"><small>
                        <a href="#Quarter_Fenders">Quarter Fenders<br>
                        </a></small></td>
            </tr>
        </table>
        <p>&nbsp;</div>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top"><IMG height=162 alt="Aluminum &amp; Stainless Fenders"
                                             src="/images/truck_acc_images/fender1.jpg" width=270></TD>
            <TD WIDTH="99%" VALIGN="top">
                <UL>
                    <LI>Sixty-eight separate models of fenders to choose from.
                    <LI>Different styles and materials to choose from, allowing you to pick the "look" you want.
                    <LI>Design a mounting style that will work for your truck.</LI>
                </UL>
                <P><SMALL><STRONG>Most Prices and Weights Are Per Single Fender,</STRONG><BR> (Fenders are sold as
                        single units, order two for a set)</SMALL></P></TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR>
	<?php
	$add_info    = '<SMALL><FONT FACE="Arial">16" HIGH x 25" WIDE x 139" LONG</FONT></SMALL>
                <BR> <a href="/truck_acc/fender_deck/fender_index.php"> <font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5001', '5011', '5021', '5031', '5041', '5541' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Full Tandem, Single Radius, Truck Fenders',
		'strong' => true
	], $add_info );
	?>
    <BR> <BR>
	<?php
	$add_info    = '<FONT FACE="Arial"><SMALL>24" HIGH x 25" WIDE x 111" LONG</SMALL><BR> <SMALL>60" x 66" Axle Spread</SMALL></FONT>
                <BR> <a href="/truck_acc/fender_deck/fender_index.php"><font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5002', '5012', '5022', '5032', '5042', '5542' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Full Tandem, Double Radius, Truck Fenders',
		'strong' => true
	], $add_info );
	?>
    <BR> <BR>
	<?php
	$add_info    = '<FONT FACE="Arial"><SMALL>24" HIGH x 25" WIDE x 105" LONG</SMALL><BR> <SMALL>52" x 60" Axle Spread</SMALL></FONT>
                <BR> <a href="/truck_acc/fender_deck/fender_index.php"> <font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5003', '5013', '5023', '5033', '5043', '5543' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Full Tandem, Double Radius, Truck Fenders',
		'strong' => true
	], $add_info );
	?>
	<?php
	$product_arr = [ '5202', '5212', '5222', '5232' ];
	echo product_table( $product_arr, true, [
		'title'  => '30" Drop Fenders',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5203', '5213', '5223', '5233', '5243', '5547' ];
	echo product_table( $product_arr, true, [
		'title'  => '30" Wrap Fenders',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5343-2' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Black Polyethylene Standard',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5347-2' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Black Polyethylene Super Single',
		'strong' => false
	] );
	?>
    <BR>
    <HR WIDTH="600" NOSHADE SIZE="1" COLOR="#000000" ALIGN="center">
    <BR>
	<?php
	$add_info    = '<SMALL><FONT FACE="Arial">24" HIGH x 25" WIDE x 52" LONG</FONT></SMALL>
                <BR> <a href="/truck_acc/fender_deck/fender_index.php"><font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5000', '5010', '5020', '5030', '5040', '5540' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Half Tandem, Single Radius, Truck Fenders',
		'strong' => true
	], $add_info );
	?>
	<?php
	$product_arr = [ '5200', '5210', '5220', '5230' ];
	echo product_table( $product_arr, true, [
		'title'  => '30" Drop Fenders',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5201', '5211', '5221', '5231', '5241', '5546' ];
	echo product_table( $product_arr, true, [
		'title'  => '30" Wrap Fenders',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5340-2' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Black Polyethylene Standard',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5346-2' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Black Polyethylene Super Single',
		'strong' => false
	] );
	?>
    <BR>
    <HR WIDTH="600" NOSHADE SIZE="1" COLOR="#000000" ALIGN="center">
    <BR>
	<?php
	$add_info    = '<SMALL><FONT FACE="Arial">24" HIGH x 25" WIDE x 48" LONG</FONT></SMALL>
                <BR> <a href="/truck_acc/fender_deck/fender_index.php"><font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5004', '5014', '5024', '5034', '5044', '5544' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Single Axle, Full Radius, Truck Fenders',
		'strong' => true
	], $add_info );
	?>
	<?php
	$product_arr = [ '5204', '5214', '5224', '5234', '5244', '5548' ];
	echo product_table( $product_arr, true, [
		'title'  => '30" Wrap Fenders',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5344-2' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Black Polyethylene Standard',
		'strong' => false
	] );
	?>
	<?php
	$product_arr = [ '5345-2' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Black Polyethylene Super Single',
		'strong' => false
	] );
	?>
    <BR>
    <HR WIDTH="600" NOSHADE SIZE="1" COLOR="#000000" ALIGN="center">
    <BR>
	<?php
	$add_info    = '<SMALL><FONT FACE="Arial">25" WIDE x 75 1/2" LONG</FONT></SMALL>
                <BR> <a href="/truck_acc/fender_deck/fender_index.php"> <font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5025', '5026', '5027', '5028', '5029', '5549' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Flat Fender',
		'strong' => true
	], $add_info );
	?>
    <BR>
    <HR WIDTH="600" NOSHADE SIZE="1" COLOR="#000000" ALIGN="center">
    <BR>
	<?php
	$add_info    = '<a href="/truck_acc/fender_deck/fender_index.php"> <font color="red">Click here for the Fender Brackets</font></a>';
	$product_arr = [ '5005', '5037', '5035', '5036' ];
	echo product_table( $product_arr, true, [
		'title'  => 'Single Tire, Full Radius, Truck Fenders',
		'strong' => true
	], $add_info );
	?>
    <BR>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <TR>
            <TD WIDTH="100%">
                <p align="center"><strong><font face="Arial">
                            <a name="Merritt_Super_Duty_Fenders">Merritt Super Duty Truck Fenders</a></font></strong>
                    <BR> <a href="/truck_acc/fender_deck/fender_index.php"> <font color="red">Click here for the Fender
                            Brackets</font></a>
                </p>
                <HR WIDTH="100%" NOSHADE SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top"><IMG height=158 alt="Super Duty Fenders"
                                             src="/images/truck_acc_images/fender2.jpg" width=240></TD>
            <TD WIDTH="99%" VALIGN="top">
                <P ALIGN="left">No skimping with Merritt Super Duty Fenders- strong 1/8" thick, diamond plate aluminum
                    alloy designed with a double break, and reinforced gussets for added strength and long life!</P>
                <UL>
                    <LI>Bright, Diamond Plate Finish - stays good looking in hard use!
                    <LI>Half fenders have the same strong design and material specifications as the full fenders!
                    </LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <BR>
	<?php
	$product_arr = [ '179', '180', '177', '0007-0191-C' ];
	echo product_table( $product_arr, true );
	?>
    <BR>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <TR>
            <TD WIDTH="100%">
                <p align="center">
                    <strong><font face="Arial">
                            <a name="Quarter_Fenders">Quarter Fenders</font></strong>
                    <BR> <a href="/truck_acc/fender_deck/fender_index.php"><font color="red">Click here for the Fender
                            Brackets</font></a>
                </p>
                <HR WIDTH="100%" NOSHADE SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE>
    <BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top"><IMG alt="Super Duty Fenders" src="/images/truck_acc_images/QuarterFenders.jpg">
            </TD>
            <TD WIDTH="99%" VALIGN="top">
                <P ALIGN="left">Two S/S alloys to choose from, 304 - a longer lasting alloy or 430 - a more affordable
                    alloy. Both alloys are polished to a high degree of luster for a bright and good looking addition to
                    your truck.
                    <br><br>
                    Three sizes of fenders available in S/S; 24", 27" or 29", you can select the length you need.
                    Quarter fender kits include; 2 Quarter fenders, 2 Top flaps, 2 Mounting clamps and Nut and bolt
                    package.
                    <br><br>
                    The black poly fender is made of thick, tough polymer for a long life. Quarter Fenders </P>
            </TD>
        </TR>
    </TABLE>
    <BR>
	<?php
	$product_arr = [];
	echo product_table( $product_arr, true );
	?>
	<?php
	$product_arr = [ '5070-2', '5072-2', '5074-2', '5080-2', '5082-2', '5084-2', '5081-2' ];
	echo product_table( $product_arr, false, [ 'title' => 'Stainless Steel', 'strong' => false ] );
	?>
	<?php
	$product_arr = [ '5060-2' ];
	echo product_table( $product_arr, false, [ 'title' => 'Black Poly', 'strong' => false ] );
	?>
	<?php
	$product_arr = [ '5091', '573' ];
	echo product_table( $product_arr, false, [ 'title' => 'Mounting Kit or Post', 'strong' => false ] );
	?>
    <BR><BR>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>