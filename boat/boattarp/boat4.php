<html lang="en">
<head>
	<?php
	$title       = "Dry Dock Order Forms page four";
	$description = "Instructions for measuring a frame for your boat cover. Steps 1-4";
	$keywords    = "";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/boat_footer.gif',
			'link'  => '/boat/boat.php',
			'alt'   => 'click to return To Boat Covers index'
		],
		'nav'  => [
			'previous' => '/boat/boattarp/koverklamps.asp',
			'next'     => '/boat/boattarp/boat5.php',
			'current'  => '5',
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
<P ALIGN="CENTER">
    <FONT FACE="Arial" SIZE="+2"><span style="color:#FF0000">Instructions</span> for Measuring your Custom <B><I>Dry-Dock
                Cover</I></B> </FONT>
</P>
<center>
    <TABLE WIDTH="600" BORDER="0" BORDERCOLOR="fffff">
        <TR>
            <TD ALIGN="LEFT" WIDTH="300"><BR>
                <B>
                    <IMG SRC="/images/boat_images/step1.gif" WIDTH="47" HEIGHT="17">
                    <IMG SRC="/images/boat_images/boatstep1drawing.gif" ALT="step1" WIDTH="150" HEIGHT="76"><BR>
                    Distance from 12&quot; below Waterline to Bow of Frame </B>
                <UL>
                    <LI>Start measuring at the bow 12&quot; below the waterline</LI>
                    <LI>Measure up and over the top of bow to where the frame begins</LI>
                    <LI>Write this measurement in Square <IMG SRC="/images/boat_images/aabox.gif" WIDTH="22" HEIGHT="14"
                                                              ALT="{short description of image}" ALIGN="MIDDLE">
                        on your
                        <FONT FACE="Times New Roman"><B><I>Dry-Dock Cover</I></B></FONT>
                        form<A HREF="/boat/boattarp/boat3.php"></A></LI>
                </UL>
            </TD>
            <TD ALIGN="LEFT" WIDTH="300">
                <B><IMG SRC="/images/boat_images/step3.gif" WIDTH="47" HEIGHT="17">
                    <IMG SRC="/images/boat_images/boatstep3drawing.gif" ALT="step1" WIDTH="150" HEIGHT="76"><BR>
                    Distance from 12&quot; below Waterline to Bow of Frame </B><BR>
                <UL>
                    <LI>Continue measuring the distance from one rib to the next until all the distances are measured
                    </LI>
                    <LI>Write these measurements in the corresponding <IMG SRC="/images/boat_images/boxes.gif"
                                                                           WIDTH="37" HEIGHT="14"
                                                                           ALT="{short description of image}"
                                                                           ALIGN="MIDDLE">
                        on your <FONT FACE="Times New Roman"><B><I>Dry-Dock Cover</I></B></FONT>
                        form
                    </LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
</center>

<P><BR></P>
<center>
    <TABLE>
        <TR>
            <TD ALIGN="LEFT" WIDTH="300">
                <B><IMG SRC="/images/boat_images/step2.gif" WIDTH="45" HEIGHT="17">
                    <IMG SRC="/images/boat_images/boatstep2drawing.gif" ALT="step2" WIDTH="150" HEIGHT="76"><BR>
                    Distance from Bow of Frame to First Rib</B> <BR>
                <UL>
                    <LI>Start measuring on the bow of the frame</LI>
                    <LI>Measure to the center joint of the fist rib</LI>
                    <LI>Write this measurement in <IMG SRC="/images/boat_images/boxa.gif" WIDTH="37" HEIGHT="14"
                                                       ALT="{short description of image}" ALIGN="MIDDLE">
                        on your <FONT FACE="Times New Roman"><B><I>Dry-Dock Cover</I></B></FONT> form
                    </LI>
                </UL>
            </TD>
            <TD ALIGN="LEFT" WIDTH="300">
                <B><IMG SRC="/images/boat_images/step4.gif" WIDTH="46" HEIGHT="17"><IMG
                            SRC="/images/boat_images/boatstep4drawing.gif" ALT="step4" WIDTH="150" HEIGHT="77">
                    <BR> Distance from Last Rib to the Stern</B>
                <UL>
                    <LI>Start measuring at the center joint of the last rib to the stern of the frame</LI>
                    <LI>Write this measurement in the corresponding <IMG SRC="/images/boat_images/box.gif" WIDTH="23"
                                                                         HEIGHT="14" ALT="{short description of image}"
                                                                         ALIGN="MIDDLE">
                        on your <FONT FACE="Times New Roman"><B><I>Dry-Dock Cover</I></B></FONT> form
                    </LI>
                </UL>
            </TD>
        </TR>
    </TABLE>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</html>
