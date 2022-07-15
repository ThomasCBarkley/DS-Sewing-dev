<html lang="en">
<head>
	<?php
	$title       = "Dry Dock Boat Form Selector";
	$description = "Boat frame form selection page.";
	$keywords    = "";
	$robots      = "noindex,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/boat_footer.gif',
			'link'  => '/boat/boat.php',
			'alt'   => 'click to return To Boat Covers index'
		],
		'nav'  => [
			'previous'     => '/boat/boattarp/printable_instructions.php',
			'next'         => '/boat/boattarp/boat8.php',
			'current'  => '9',
			'total'    => '9'
		]
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
</head>
<body>
<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>    </CENTER>
</DIV>
<P>
    <FONT SIZE="+1" FACE="Arial"> </FONT>
</P>
<P ALIGN="center">Click on the form that most closely resembles your boat.</P>
<DIV ALIGN="center">
    <CENTER>
        <TABLE BORDER="0">
            <TR>
                <TD WIDTH="250">
                    <P ALIGN="center">
                        <A HREF="/boat/boattarp/cigform.asp">
                            <IMG SRC="/images/boat_images/cigboatformtiny.gif" ALT="cig boat" WIDTH="200" HEIGHT="96"
                                 ALIGN="bottom"><BR>
                            Click here for the Cigarette Boat From</A>
                    </P>
                </TD>
                <TD WIDTH="269">
                    <P ALIGN="center">
                        <A HREF="/boat/boattarp/runaboutform.asp">
                            <IMG SRC="/images/boat_images/runabouttiny.gif" ALT="runabout" WIDTH="200" HEIGHT="96"
                                 ALIGN="bottom"><BR>
                            Click here for the Runabout Form</A>
                    </P>
                </TD>
            </TR>
            <TR>
                <TD WIDTH="250">
                    <P ALIGN="center">
                        <A HREF="/boat/boattarp/sailform.asp">
                            <IMG SRC="/images/boat_images/sailtiny.gif" ALT="sailboat" WIDTH="200" HEIGHT="134"
                                 ALIGN="bottom"><BR>
                            Click here for the Sail Boat Form</A>
                    </P>
                </TD>
                <TD WIDTH="269">
                    <P ALIGN="center">
                        <A HREF="/boat/boattarp/yachtfrom.asp">
                            <IMG SRC="/images/boat_images/yachttiny.gif" ALT="yacht" WIDTH="200" HEIGHT="134"
                                 ALIGN="bottom"><BR>
                            Click here for the Yacht Form</A>
                    </P>
                </TD>
            </TR>
        </TABLE>
    </CENTER>
</DIV>
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>