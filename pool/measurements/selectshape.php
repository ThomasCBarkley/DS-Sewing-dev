<html lang="en">
<head>
	<?php
	$title       = "Custom Swimming Pool Covers from DS-Sewing";
	$keywords    = "custom freeform inground swimming pool covers, measuring pool cover instructions, pool covers made to order to fit";
	$description = "DS-Sewing makes the best quality custom pool covers you can buy. Use our step-by-step measuring instructions to get a cover with a perfect, exact fit - and to get it made fast. We offer a variety of safety fabrics and colors to choose from";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/pool_footer.gif',
			'link'  => '/pool/pool.php',
			'alt'   => 'click to return to Custom Pool Index Page'
		],
		'nav'  => [
			'previous' => '/pool/pooltarp/request.asp',
			'current'  => '6',
			'total'    => '6'
		]
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
</head>
<body>

<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>

<CENTER>
    <TABLE width="588" border="0" cellspacing="0" cellpadding="0" bgcolor="white" height="130">
        <tr height="18">
            <td height="18"></td>
            <td valign="bottom" width="530" height="18"></td>
            <td height="18"></td>
        </tr>
        <tr align="left" valign="top" height="100">
            <td align="right" valign="top" height="100"></td>
            <td align="left" valign="top" width="530" height="100">
                <b><font size="3" face="Verdana,Arial,Helvetica,Sans-serif">POOL COVER MEASURING</font></b>
                <p><font face="Verdana" size="2">On the following pages, we provide you with complete instructions for
                        measuring your pool. If you follow these instructions with patience and care, you will be
                        rewarded with a custom pool cover with an exact fit. There are instructions for seven basic
                        swimming pool shapes, shown below. The instructions are detailed, with specifics to measure
                        diving board legs, ladder rails, and steps.&nbsp;</font></p>
                <p><font size="2" face="Verdana">To get to the correct instructions for your pool shape, click the shape
                        below that most closely resembles your pool:</font></p>
                <table border="0" width="98%">
                    <tr>
                        <td width="25%"><a href="/pool/measurements/custom-rectangle/cr1.asp">
                                <IMG alt="" src="/images/pool_images/rectangle.gif" width="116" height="81"></a></td>
                        <td width="25%"><a href="/pool/measurements/true-L/tr1.php">
                                <IMG alt="" src="/images/pool_images/truel.gif" width="107" height="77"></a>
                        </td>
                        <td width="25%"><a href="/pool/measurements/lazy-L/lz1.asp">
                                <IMG alt="" src="/images/pool_images/lasy-L.gif" width="114" height="79"></a>
                        </td>
                        <td width="25%"><a href="/pool/measurements/oval/ov1.asp">
                                <IMG alt="" src="/images/pool_images/oval.gif" width="100" height="80"></a></td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="/pool/measurements/kidney/kd1.asp">
                                <IMG alt="" src="/images/pool_images/kidney1.gif" width="110" height="78"></a>
                        </td>
                        <td width="25%"><a href="/pool/measurements/roman/rm1.asp">
                                <IMG alt="" src="/images/pool_images/roman.gif" width="107" height="82"></a>
                        </td>
                        <td width="25%"><a href="/pool/measurements/grecian/gr1.asp">
                                <IMG alt="" src="/images/pool_images/grecian.gif" width="126" height="83"></a>
                        </td>
                        <td width="25%">&nbsp;</td>
                    </tr>
                </table>
            </td>
            <td height="100"></td>
        </tr>
        <tr align="left" valign="top" height="12">
            <td align="right" valign="top" height="12"></td>
            <td align="left" valign="top" width="530" height="12"></td>
            <td height="12"></td>
        </tr>
    </TABLE>

	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>