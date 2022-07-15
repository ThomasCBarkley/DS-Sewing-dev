<html lang="en">
<head>
	<?php
	$title       = "Merritt Bawer Black Powder Coated Steel and Stainless Steel Tool Boxes";
	$keywords    = "Merritt Black Bawer Tool Boxes for Semi Truck Trailers, Toolboxes for Flat Bed Trailers, Underbody Tool Box, Smooth Door or Double Door";
	$description = "Merritt Bawer Semi Truck Trailers Tool Box, Black Powder Coated Steel Boxes";
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
                        <FONT FACE="Arial" SIZE="5">
                            <center>Merritt Bawer Black Powder Coated Steel Tool Boxes <br>800 789-8143&nbsp;</center>
                        </FONT>
                    </NOBR>
                </B>
                <HR WIDTH="100%" NOSHADE="NOSHADE" SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE> &nbsp;
    <div align="center">
        <table border="1" width="600" cellspacing="0" bordercolor="#000000">
            <tr>
                <td width="25%" align="center" valign="top">
                    <a href="#Bawer_Black_Powder_Coated_Steel_Tool_Boxes"><small>Bawer Black Powder Coated Steel Tool
                            Boxes</small></a>
                </td>
                <td width="25%" align="center" valign="top">
                    <a href="#Mounting_Kits_and_Bracket_Options"><small>Mounting Kits and Bracket Options</small></a>
                </td>
            </tr>
        </table>
    </div>
    <p><BR>
    </p>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0">
        <TR>
            <TD WIDTH="1%" VALIGN="top">
                <IMG SRC="/images/truck_acc_images/bawerboxes.jpg" WIDTH="184" HEIGHT="158"
                     ALT="bawerboxes.jpg"></TD>
            <TD WIDTH="99%" VALIGN="top">
                <UL>
                    <LI>Lockable T-Handles.</LI>
                    <LI>Single piece main structure for a stronger box, less welds.</LI>
                    <LI>Black Powder Coated Steel Boxes are equipped with a unique Aerator/Vent to help keep the
                        interior of the box dry.
                    </LI>
                    <LI>Dust cap on door locks.</LI>
                    <LI>"Automotive" style weather stripping.</LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <BR> <b>Give Us A Call
        <br>800-789-8143</b><BR>
    </p>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="3">
        <TR>
            <TD WIDTH="99%" VALIGN="top">
                <UL>
                    <LI>Automotive grade door seal seals the entire perimeter.</LI>
                    <LI>Extruded door frame provides a weather tight seal.</LI>
                    <LI>Lap joint weld provides material overlap in the corner where it is needed for superior strength
                        and long life (compared to most boxes that are constructed with butt welds.)
                    </LI>
                </UL>
            </TD>
            <TD WIDTH="1%" VALIGN="top"><IMG SRC="/images/truck_acc_images/bawerboxes2.jpg" WIDTH="96" HEIGHT="96"
                                             ALT="bawerboxes2.jpg" BORDER="1"></TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR><br>
	<?php
	$product_arr = [
		'3980',
		'3981',
		'3982',
		'3983',
		'3984',
		'3985',
		'3986',
		'3987',
		'3988',
		'3989',
		'3990',
		'3991',
		'3992'
	];
	echo product_table( $product_arr, true, 'Bawer Black Powder Coated Steel Tool Boxes' );
	?>
    <BR>
	<?php
	$product_arr = [ '117', '118', '620', '621', '3953', '3954' ];
	echo product_table( $product_arr, true, 'Mounting Kits and Bracket Options' );
	?>

    <br><br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>