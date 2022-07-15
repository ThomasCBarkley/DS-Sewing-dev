<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum Dyna-Droms - Dyna-Drom Mounting Kits, Aluminum Truck Accessories";
	$keywords    = "Merritt Aluminum Dyna-Droms, Dyna-DromMounting Kits, Dyna-Drom Accessories, Aluminum Truck Accessories";
	$description = "Merritt Aluminum Dyna-Droms are lighter, yet stronger through the use of new engineering technology. Decks are designed to carry 1000# lbs. per linear foot- the strongest Drom available.";
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
            <td colspan="4">
                <b>
                    <nobr>
                        <font face="Arial" size="5">Merritt Aluminum Dyna-Droms/Enclosures 800 789-8143</font>
                    </nobr>
                </b>
                <hr>
            </td>
        </tr>
        <TR>
            <TD colspan="4" WIDTH="100%">
                <center>
                    <B><a href="/images/Legal_LSR.jpg" target="_blank">
                            <font color="red" FACE="Arial" SIZE="4">CAB RACK INSTALATION AND SECURITY WARNING</BR>
                                <<< CLICK HERE>>>
                            </font>
                        </a></B>
                </center>
            </TD>
        </TR>
        <tr>
            <td width="25%" align="center"
                style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
                <a href="#Dyna_Droms"> Dyna Droms</a>
            </td>
            <td width="25%" align="center"
                style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
                <a href="#Mounting_Kits">Mounting Kits</a>
            </td>
            <td width="25%" align="center"
                style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
                <a href="#Dyna_Drom_Accessories">Accessories</a>
            </td>
            <td width="25%" align="center"
                style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
                <a href="#Enclosures">Enclosures</a>
            </td>
        </tr>
        <tr>
            <td>
                <img border="0" src="/images/truck_acc_images/dynadrom1.jpg" width="180" height="170">
            </td>
            <td colspan="3"><br><br>
                <ul>
                    <li>Lighter, yet stronger through the use of new engineering technology.</li>
                    <li>Decks are designed to carry 1000# lbs. per linear foot- the strongest Drom available.</li>
                    <li>Aerodynamic shape patterned with the new truck designs.</li>
                    <li>Side gussets reinforce the assembly which is welded to two vertical beams providing increased
                        strength and protection.
                    </li>
                </ul>
            </td>
        </tr>
    </table>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR><BR>
	<?php
	$product_arr = [ '302', '303', '304', '305', '414', '346', '347', '348', '349', '342', '343', '344', '345' ];
	echo product_table( $product_arr, true, 'Dyna Droms' );
	?>
    <BR>
    <TABLE BORDER="0" WIDTH="500" CELLSPACING="0">
        <TR>
            <TD WIDTH="600">
                <UL>
                    <LI><SMALL>All Dyna-Drom Models Meet D.O.T. 393.106.</SMALL></LI>
                    <LI><SMALL>Tested to 46,900 lbs.</SMALL></LI>
                    <LI><SMALL>Must be Installed to Merritt Specifications with a Merritt Mounting Kit. Mounting Kits
                            not Included.</SMALL></LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
    <BR>
	<?php
	$product_arr = [ '351', '353', '354' ];
	echo product_table( $product_arr, true, 'Mounting Kits' );
	?>
    <BR>
    <P ALIGN="center"><SMALL>Note: 17&quot; mounting bolts are available upon request for chassis with deeper frame
            dimensions.</SMALL></P>

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
		'369',
		'386',
		'367',
		'368',
		'360',
		'128',
		'147',
		'147-10',
		'333-18',
		'333',
		'359',
		'361',
		'853',
		'3501'
	];
	echo product_table( $product_arr, true, 'Dyna-Drom Accessories' );
	?>
    <BR><BR>
    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <tr>
            <td colspan="4">
                <font face="Arial" size="5"><b><a name="Enclosures">Enclosures</a></small></b></font>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <ul>
                    <li>Outside doors open inward for easy access.</li>
                    <li>Extruded door frame with a full perimeter</li>
                    <li>automotive grade door seal.</li>
                    <li>Piano Style Hinges</li>
                    <li>Diamond Plate Surface</li>
                    <li>Stainless Steel Door Locks</li>
                    <li>Add Enclosure to Your Choice of Droms</li>
                </ul>
            </td>
            <td width="176" align="center" rowspan="2">
                <img border="0" src="https://www.ds-sewing.com/images/truck_acc_images/dynadrom2.jpg" width="162"
                     height="145">
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <dl>
                    <dt><small>70&quot; Wide-2 door</small></dt>
                    <dt><small>80&quot; Wide-3 door</small></dt>
                    <dt><small>86&quot; Wide-3 door</small></dt>
                    <dt><small>96&quot; Wide-3 door</small></dt>
                </dl>
                <p>&nbsp;
            </td>
        </tr>
    </table>
	<?php
	$product_arr = [ '356', '357', '339', '3400', '3401', '3402', '387', '338', '341' ];
	echo product_table( $product_arr, true );
	?>

    <br><br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>