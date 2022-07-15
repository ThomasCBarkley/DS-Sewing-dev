<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum Tool Boxes for Semi Truck Trailers";
	$keywords    = "Merritt Aluminum Tool Boxes for Semi Truck Trailers, Toolboxes for Flat Bed Trailers, Underbody Tool Box, Smooth Door or Double Door, Diamond Plate";
	$description = "Merritt Polished Aluminum and Diamond Plate Tool Boxes Smooth Door or Double Door";
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
            <TD WIDTH="100%"><B>
                    <NOBR>
                        <FONT FACE="Arial" SIZE="5">Merritt Polished Aluminum<br>
                            and Diamond Plate Tool Boxes 800 789-8143&nbsp; </FONT>
                    </NOBR>
                </B>
                <HR WIDTH="100%" NOSHADE="NOSHADE" SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE> &nbsp;<div align="center">
        <table border="1" width="600" cellspacing="0" bordercolor="#000000">
            <tr>
                <td width="253" align="center" valign="top">
                    <a href="#Smooth_Door_Tool_Boxes"><small>Smooth Door <br>
                            Tool Boxes</small></a>
                </td>
                <td width="253" align="center" valign="top">
                    <a href="#Diamond_Plate_Door_Tool_Boxes"><small>Diamond Plate Door<br>
                            Tool Boxes</small></a>
                </td>
                <td width="253" align="center" valign="top">
                    <a href="#Tool_Box_Mounting_Brackets"><small>Tool Box <br>
                            Mounting Brackets</small></a>
                </td>
            </tr>
        </table>
    </div>
    <p><BR>
    </p>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top"><IMG SRC="/images/truck_acc_images/toolbox1.jpg" WIDTH="184" HEIGHT="158"
                                             ALT="toolbox1.jpg (8299 bytes)"></TD>
            <TD WIDTH="99%" VALIGN="top">
                <ul>
                    <li>Constructed of high strength/low weight aluminum.</li>
                    <li>Polished stainless steel T- handle latches with locks.</li>
                    <li>Protective coating on smooth doors for improved shipping protection,
                        (to be removed at time of installation)<BR> (removed at time of installation.)
                    </li>
                    <li>Doors available in polished finish or diamond plate.</li>
                    <li>All smooth doors are polished to a #8 grade for an exceptional appearance.</li>
                    <li>Piano style door hinge.</li>
                </ul>
            </TD>
        </TR>
    </TABLE>
    <BR> <b>Call Us For Custom Sizes and Designs To Meet Your Specific
        Needs</b>
    <p><b>Stainless Steel Doors Are Also Available By Special Order<br>
            <br>
            call us - 1-800-789-8143</b><BR>
    </p>
    <p>
        <font face="verdana,arial,helvetica,sans-serif" size="2">Click
            here for <br>
            <a href="Custom_Tool_Box.pdf"><strong>CUSTOM TOOL BOX WORKSHEET</strong></a><br>
            <em>Fax form to 203 773-1778</em>
        </font>
    </p>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="3">
        <TR>
            <TD WIDTH="99%" VALIGN="top">
                <UL>
                    <LI>Automotive grade door seal seals the entire perimeter.</LI>
                    <LI>Merritt's extruded door frame provides a weather tight seal.</LI>
                    <LI>Lap joint weld provides material overlap in the corner where it is needed for superior strength
                        and long life (compared to most boxes that are constructed with butt welds.)
                    </LI>
                </UL>
            </TD>
            <TD WIDTH="1%" VALIGN="top">
                <IMG SRC="/images/truck_acc_images/toolbox2.jpg" WIDTH="96" HEIGHT="96" ALT="toolbox2.jpg (5807 bytes)"
                     BORDER="1">
            </TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR>

	<?php
	$product_arr = [
		'201',
		'203',
		'205',
		'207',
		'287',
		'209',
		'211',
		'289',
		'291',
		'293',
		'295',
		'297',
		'299',
		'213',
		'215',
		'217',
		'235',
		'219',
		'221',
		'223',
		'225'
	];
	echo product_table( $product_arr, true, 'Smooth Door Tool Boxes' );
	?>
    <BR>

	<?php
	$product_arr = [
		'202',
		'204',
		'206',
		'208',
		'288',
		'210',
		'212',
		'290',
		'292',
		'294',
		'296',
		'298',
		'300',
		'214',
		'216',
		'218',
		'236',
		'220',
		'222',
		'224',
		'226'
	];
	echo product_table( $product_arr, true, 'Diamond Plate Door Tool Boxes' );
	?>
    <BR>

	<?php
	$product_arr = [ '117', '118', '620', '621', '3953', '3954' ];
	$add_info    = 'Steel for strength and low cost<br>
      Zinc Plated or Powder-Coated for lasting good looks';
	echo product_table( $product_arr, true, 'Tool Box Mounting Brackets', $add_info );
	?>
    <BR>


	<?php
	$product_arr = [ '1824', '1830', '1836', '1848', '1860', '2424', '2430', '2436', '2448', '2460', '1518', '1519' ];
	$add_info    = '<a href="Shelf_Mount_Instructions.pdf">*** Click here to Download Mounting
      Instructions ***</Click></a>';
	echo product_table( $product_arr, true, 'Tool Box Options', $add_info );
	?>

    <br><br>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="4">
                    <NOBR><B>
                            <font color="blue">Replacement Latches</font>
                        </B></NOBR>
                </FONT>
                <HR WIDTH="100%" NOSHADE="NOSHADE" SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE>

    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top"><IMG SRC="/images/truck_acc_images/latch.jpg" WIDTH="126" HEIGHT="126"
                                             ALT="Between The Frame, Tool Box"></TD>
            <TD WIDTH="99%" VALIGN="top">

                <DIV ALIGN="center">
                    <CENTER>

                        <TABLE WIDTH="425" BORDER="1" CELLSPACING="0" CELLPADDING="3">
                            <TR>
                                <TD WIDTH="75"><STRONG>
                                        <FONT SIZE="-1">Order #</FONT>
                                    </STRONG></TD>
                                <TD WIDTH="200"><STRONG><SMALL>Description/Dimensions</SMALL></STRONG></TD>
                                <TD WIDTH="50"><STRONG>
                                        <FONT SIZE="-1">Weight</FONT>
                                    </STRONG></TD>
                                <TD WIDTH="50"><SMALL><B>Price</B></SMALL></TD>
                                <TD WIDTH="50"><SMALL><B>Buy</B></SMALL></TD>

                            </TR>
							<?php
							$product_arr = [ '282', '280', '990', '0009-0008C' ];

							echo product_table_iterator( $product_arr );
							?>

                        </TABLE>
                    </CENTER>
                </DIV>
            </TD>
        </TR>
    </TABLE>
    <br><br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>