<html lang="en">

<head>
	<?php
	$title       = "Short Foot Cab Guard Options - Aluminum Truck Accessories - Short-foot cab-guard options";
	$keywords    = "Fits any Merritt Cabguard Dyna-Light or DiamondBack LSR, D.S.Sewing,Aluminum Truck Accessories,Short-foot cab-guards";
	$description = "Fits any Merritt Cabguard, Dyna-Light or DiamondBack LSR.";
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
</CENTER>
<div align="center">
    <table border="0" width="600" cellspacing="1">
        <tr>
            <td><b>
                    <font face="Arial" size="5">
                        <nobr>Short Foot and Cab Rack Options 800 789-8143</nobr>
                    </font>
                </b>
                <hr>
            </td>
        </tr>
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="4">
                    <center><B><a href="/images/Legal_LSR.jpg" target="_blank">
                                <font color="red">CAB RACK INSTALATION AND SECURITY WARNING</BR>
                                    <<< CLICK HERE &gt;&gt;&gt; </font>
                            </a></B></center>
                </FONT>
            </TD>
        </TR>
    </table>
</div>
<CENTER>
    <table border="0" width="600" cellpadding="2">
        <tr>
            <td width="162" align="center" valign="top">
                <img border="0" src="/images/truck_acc_images/shortfoot1.jpg" width="162" height="144">
            </td>
            <td align="left" valign="top">
                <ul>
                    <li>Fits any Merritt Cab Rack, Dyna-Light or DiamondBack.<br>
                        (Eight Models).
                    </li>
                    <li>Meets D.O.T. 393.106. Tested and certified by an independent engineering firm.
                    </li>
                    <li>Special tray options for the short foot to maximize trailer swing clearance.
                    </li>
                    <li>No Mounting Kit Needed. (Use Grade 8 Bolts)</li>
                    <li>Drilling Required.</li>
                </ul>
            </td>
        </tr>
    </table>
    <BR>
    <TABLE WIDTH="600" BORDER="0" CELLPADDING="10">
        <TR>
            <TD WIDTH="25%">
                <P ALIGN="CENTER"><IMG SRC="/images/truck_acc_images/shortfoot2.jpg" WIDTH="90" HEIGHT="90"
                                       ALT="shortfoot2.jpg (2354 bytes)" BORDER="1">
                    <BR>#628
                </P>
            </TD>
            <TD WIDTH="25%">
                <P ALIGN="CENTER"><IMG SRC="/images/truck_acc_images/shortfoot3.gif" WIDTH="90" HEIGHT="90"
                                       ALT="shortfoot3.gif (6614 bytes)" BORDER="1">
                    <BR>#661
                </P>
            </TD>
            <TD WIDTH="25%">
                <P ALIGN="CENTER"><IMG SRC="/images/truck_acc_images/shortfoot4.gif" WIDTH="90" HEIGHT="90"
                                       ALT="shortfoot4.gif (6915 bytes)" BORDER="1">
                    <BR>#629
                </P>
            </TD>
            <TD WIDTH="25%">
                <P ALIGN="CENTER"><IMG SRC="/images/truck_acc_images/shortfoot5.gif" WIDTH="90" HEIGHT="90"
                                       ALT="shortfoot5.gif (8436 bytes)" BORDER="1">
                    <BR>#605
                </P>
            </TD>
        </TR>
    </TABLE>
    <IMG alt="" src="/images/Merritt_Company_Logo.jpg">
    <BR> <BR>
	<?php
	$product_arr = [
		'628',
		'661',
		'629',
		'663',
		'664',
		'128',
		'147',
		'142',
		'143',
		'144',
		'335',
		'341',
		'336',
		'340',
		'367',
		'368',
		'369',
		'386',
		'601',
		'602',
		'603',
		'604',
		'605',
		'606',
		'607'
	];
	echo product_table( $product_arr, true );
	?>
    <BR>
    <TABLE BORDER="0" WIDTH="500" CELLSPACING="0">
        <TR>
            <TD WIDTH="600">
                <UL>
                    <LI><SMALL>Frame Mounting Bolts not included.</SMALL></LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>