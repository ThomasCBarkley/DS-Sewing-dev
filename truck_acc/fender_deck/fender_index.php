<html lang="en">
<head>
	<?php
	$title       = "Merritt Aluminum and Stainless Semi Truck Fenders, Deck Covers, Plastic Fenders, Fender Brackets";
	$keywords    = "Merritt Aluminum Stainless Semi Truck Fenders Deck Covers, Aluminum Quarter Fenders, Fender Brackets, Plastic Fender";
	$description = "Merritt Aluminum and Stainless Semi Truck Fenders & Deck Covers, Plastic Fenders, Fender Brackets";
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
</head>

<body>
<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/menu_truck_acc.php"; ?>

    <TABLE BORDER="0" WIDTH="600">
        <TR>
            <TD WIDTH="100%">
                <FONT FACE="Arial" SIZE="5">
                    <NOBR><B>Merritt Aluminum and Stainless Semi Truck Fenders</B></NOBR>
                </FONT>
                <HR WIDTH="100%" NOSHADE="NOSHADE" SIZE="1" COLOR="#000000">
            </TD>
        </TR>
    </TABLE>
    <BR>

    <TABLE BORDER="0" WIDTH="600" CELLSPACING="0" CELLPADDING="0">
        <TR>
            <TD WIDTH="50%" VALIGN="center">
                <DIV ALIGN="center">
                    <CENTER>
                        <TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="4">
                            <TR>
                                <TD WIDTH="1%" VALIGN="top">
                                    <A HREF="/truck_acc/fender_deck/fender.php">
                                        <IMG SRC="/images/truck_acc_images/fender_small.jpg" WIDTH="95" HEIGHT="80"
                                             ALT="Fenders" BORDER="1"></A></TD>

                                <TD WIDTH="99%" VALIGN="center">
                                    <A HREF="/truck_acc/fender_deck/fender.php">
                                        <FONT FACE="Arial"><STRONG>Semi Truck Fenders</STRONG></FONT>
                                    </A></TD>
                            </TR>
                            <TR>
                                <TD WIDTH="1%" VALIGN="top"><A HREF="/truck_acc/fender_deck/fenderbracket.php"><IMG
                                                SRC="/images/truck_acc_images/fenderbracket_small.jpg" WIDTH="95"
                                                HEIGHT="80"
                                                ALT="Fender Brackets" BORDER="1"></A></TD>
                                <TD WIDTH="99%" VALIGN="center"><A HREF="/truck_acc/fender_deck/fenderbracket.php">
                                        <FONT FACE="Arial"><STRONG>Fender<BR>
                                                Brackets</STRONG></FONT>
                                    </A></TD>
                            </TR>
                        </TABLE>
                    </CENTER>
                </DIV>
            </TD>

            <TD WIDTH="50%" VALIGN="center">
                <DIV ALIGN="center">
                    <CENTER>
                        <TABLE BORDER="0" WIDTH="100%" CELLSPACING="0" CELLPADDING="4">
                            <TR>
                                <TD WIDTH="1%" VALIGN="top"><A HREF="/truck_acc/fender_deck/deckcover.php"><IMG
                                                SRC="/images/truck_acc_images/deckplate_small.jpg" WIDTH="95"
                                                HEIGHT="80"
                                                ALT="Aluminum Deck Cover" BORDER="1"></A></TD>
                                <TD WIDTH="99%" VALIGN="center"><A HREF="/truck_acc/fender_deck/deckcover.php">
                                        <FONT FACE="Arial"><STRONG>Deck Covers</STRONG></FONT>
                                    </A></TD>
                            </TR>
                        </TABLE>
                    </CENTER>
                </DIV>
            </TD>
        </TR>
    </TABLE>
    <BR><BR>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>