<html lang="en">
<head>
	<?php
	$title       = "Replacement Hardware Accessories For Inground Pool Covers";
	$keywords    = "custom safety freeform inground pool covers,D.S.Sewing,Pool Covers,above ground pool covers,boat covers,truck tarps,custom tarpaulins,dry dock covers,swimming pool covers";
	$description = "Replacement Parts. We offer a complete selection of replacement hardware accessories - the same quality items that we feature with the purchase of a new pool cover.";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/pool_footer.gif',
			'link'  => '/pool/pool.php',
			'alt'   => 'click to return to Custom Pool Index Page'
		],
		'nav'  => [
			'next'     => '/pool/forms/forms.php',
			'previous' => '/pool/measurements/selectshape2.asp',
			'current'  => '7',
			'total'    => '8'
		]
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php"; ?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/product-line.php"; ?>
</head>
<body>
<center>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>

    <table width="538" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" height="975">
        <tr align="left" valign="top" height="41">
            <td align="middle" valign="top" height="41">
                <div align="center">
                    <b><font face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular" size="6">Replacement
                            Hardware</font></b>
                </div>
            </td>
        </tr>
        <tr align="left" valign="top" height="12">
            <td align="left" valign="top" height="76"><font face="verdana,arial,helvetica,sans-serif" size="2">These
                    are the same quality accessories that we feature with the purchase of a new safety pool cover. For
                    each part desired, select by clicking BUY. This will take you to the next page, where you can enter
                    the quantity desired. To select another part, return to this page by using your browser's Back
                    button.</font>
                <p></p>
            </td>
        </tr>

        <tr>
            <td align="left" valign="top" width="482" height="858">


                <table width="538" border="1" cellspacing="0" cellpadding="6" bgcolor="#ffffff">
                    <tr>
                        <td width="162" height="19">Item</td>
                        <td width="229" height="19">Description</td>
                        <td width="37" height="19">Price</td>
                        <td width="52" height="19">&nbsp;Select</td>
                    </tr>

                    <tr>
                        <td valign="top" width="160" height="49">
                            <img src="concrete-brass-anchor.jpg" alt="" height="47" width="160" border="0"></td>
                        <td valign="top" width="280" height="49">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"> Brass pool anchor
                                for concrete</font></td>
                        <td align="right" height="49" valign="top">$<?php echo getPrice( 'PLA001' ); ?></td>
                        <td align="middle" height="49" valign="top"><?php echo product_form( 'PLA001' ); ?></td>
                    </tr>


                    <tr>
                        <td width="160" height="60" valign="top">
                            <img src="brass-wood-deck-anchor.jpg" alt="" height="58" width="160" border="0">
                        </td>
                        <td valign="top" width="280" height="60">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass anchor with flange
                                for wood deck </font>
                        </td>
                        <td align="right" height="60" valign="top">$<?php echo getPrice( 'PLA002' ); ?></td>
                        <td align="middle" height="60" valign="top"><?php echo product_form( 'PLA002' ); ?></td>
                    </tr>


                    <tr>
                        <td width="160" height="54" valign="top">
                            <img src="../wizard/lawn-stake.jpg" alt="" height="52" width="160" border="0"></td>
                        <td valign="top" width="280" height="54">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Aluminum lawn pool
                                anchor</font></td>
                        <td align="right" height="54" valign="top">$<?php echo getPrice( 'PLA004' ); ?></td>
                        <td align="middle" height="54" valign="top"><?php echo product_form( 'PLA004' ); ?></td>
                    </tr>


                    <tr>
                        <td width="162" height="60" valign="top">
                            <img src="../wizard/stainless-steel-springs.jpg" alt="" height="58" width="160" border="0">
                        </td>
                        <td valign="top" width="229" height="60">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">8" Long Stainless steel
                                spring</font></td>
                        <td align="right" width="37" height="60" valign="top">$<?php echo getPrice( 'PLS001' ); ?></td>
                        <td align="middle" width="52" height="60"
                            valign="top"><?php echo product_form( 'PLS001' ); ?></td>
                    </tr>


                    <tr>
                        <td width="162" height="60" valign="top">
                            <img src="../wizard/stainless-steel-springs-sma.jpg" alt="" height="58" width="160"
                                 border="0"></td>
                        <td valign="top" width="229" height="60">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">5&quot; Short Stainless
                                steel spring</font></td>
                        <td align="right" width="37" height="60" valign="top">$<?php echo getPrice( 'PLS002' ); ?></td>
                        <td align="middle" width="52" height="60"
                            valign="top"><?php echo product_form( 'PLS002' ); ?></td>
                    </tr>

                    <tr>
                        <td width="162" height="74" valign="top">
                            <img src="../wizard/spring-cover.jpg" alt="" width="160" height="72" border="0"></td>
                        <td valign="top" width="229" height="74">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Cover for spring</font>
                        </td>
                        <td align="right" width="37" height="74" valign="top">$<?php echo getPrice( 'PLS003' ); ?></td>
                        <td align="middle" width="52" height="74"
                            valign="top"><?php echo product_form( 'PLS003' ); ?></td>
                    </tr>

                    <tr>
                        <td width="162" height="76" valign="top">
                            <img border="0" src="buckle.jpg" width="160" height="32"></td>
                        <td valign="top" width="229" height="76">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Stainless Steel
                                buckle</font></td>
                        <td align="right" width="37" height="76" valign="top">$<?php echo getPrice( 'PLCA002' ); ?></td>
                        <td align="middle" width="52" height="76"
                            valign="top"><?php echo product_form( 'PLCA002' ); ?></td>
                    </tr>

                    <tr>
                        <td width="162" height="64" valign="top">
                            <img src="../wizard/rubber-extension-strap.jpg" alt="" height="57" width="160" border="0">
                        </td>
                        <td valign="top" width="229" height="64">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Reinforcement chafe strip
                                for pool cover straps. This material, when applied under straps, will provide extra
                                protection from wear-and-tear.</font></td>
                        <td align="right" width="37" height="64" valign="top">$<?php echo getPrice( 'PLCA005' ); ?></td>
                        <td align="middle" width="52" height="64"
                            valign="top"><?php echo product_form( 'PLCA005' ); ?></td>
                    </tr>

                    <tr>
                        <td width="160" valign="top">
                            <img src="../wizard/aluminum-tamping-tool.jpg" alt="" height="58" width="160" border="0">
                        </td>
                        <td valign="top" width="280">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Aluminum tamping
                                tool</font></td>
                        <td align="right" valign="top">$<?php echo getPrice( 'PLCA003' ); ?></td>
                        <td align="middle" valign="top"><?php echo product_form( 'PLCA003' ); ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="160" valign="top">
                            <img src="../wizard/installation-rod.jpg" alt="" height="35" width="160" border="0"></td>
                        <td valign="top" width="280">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Installation rod</font>
                        </td>
                        <td align="right" valign="top">$<?php echo getPrice( 'PLCA004' ); ?></td>
                        <td align="middle" valign="top"><?php echo product_form( 'PLCA004' ); ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="160" valign="top">
                            <img border="0" src="rubber_strap.jpg" width="162" height="70"></td>
                        <td valign="top" width="280">
                            <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Rubber strap with
                                stainless-steel ring slides over anchor bolt. For non-safety pool covers.</font></td>
                        <td align="right" valign="top">$<?php echo getPrice( 'PLCA006' ); ?></td>
                        <td align="middle" valign="top"><?php echo product_form( 'PLCA006' ); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p align="center">&nbsp;</p>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</html>
