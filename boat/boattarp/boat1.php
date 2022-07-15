<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Dry-Dock Boat Covers";
	$description = "Boat cover example - a custom winter storage tarp";
	$keywords    = "D.S.Sewing,boat covers,boat tarps,dry dock covers,dry dock boat covers,custom boat covers,boat frames,kover klamps";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/boat_footer.gif',
			'link'  => '/boat/boat.php',
			'alt'   => 'click to return To Boat Covers index'
		],
		'nav'  => [
			'previous' => '/boat/boat.php',
			'next'     => '/boat/boattarp/boat2.php',
			'current'  => '1',
			'total'    => '9'
		]
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
</head>
<body>
<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>
<DIV ALIGN="center">
    <CENTER>
        <table border="0" cellpadding="0" cellspacing="0" width="570">
            <tr>
                <td>
                    <center>
                        <table border="0" cellpadding="0" cellspacing="0">
                            <TR>
                                <TD ROWSPAN="2" WIDTH="54">
                                    <IMG align=bottom alt="boat tarp logo" height=96
                                         src="/images/boat_images/boatlogodiagram.gif" width=50>
                                </TD>
                                <TD WIDTH="388">
                                    <B><I><FONT SIZE="+4" FACE="Times New Roman" COLOR="#ff0000">Dry-Dock
                                                Cover</FONT></I></B></TD>
                            </TR>
                            <TR>
                                <TD WIDTH="388"><B><I><FONT FACE="Arial">Covers your Boat from the Harsh Winter
                                                Elements</FONT></I></B>

                                    <P></P></TD>
                            </TR>
                        </table>
                    </center>

                    <P><FONT FACE="Arial"> </FONT></P>

                    <P ALIGN="center">
                        <IMG align=bottom alt="Dry-Dock Tarp" border=2 height=207
                             src="/images/boat_images/blue_dry-dock-tarp.jpg" width=300>
                        <BR><font face="arial" size="-2">A custom winter storage tarp<font></P>
                    <CENTER>
                        <FONT FACE="Arial">Request Our <A href="/forms/request.asp"><B><I>2002
                                        Catalog</I></B></A></FONT></CENTER>
                </td>
            </tr>
        </table>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
    </CENTER>
</DIV>
</body>
</html>
