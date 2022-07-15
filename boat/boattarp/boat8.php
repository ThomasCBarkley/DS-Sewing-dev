<html lang="en">
<head>
	<?php
	$title       = "Boat Cover, dry dock tarp example page";
	$description = "Instructions for measuring for a frame for your boat cover. (Steps 1-4)";
	$robots      = "noindex,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/boat_footer.gif',
			'link'  => '/boat/boat.php',
			'alt'   => 'click to return To Boat Covers index'
		],
		'nav'  => [
			'previous'    => '/boat/boattarp/boat7.php',
			'current' => '10',
			'total'   => '10'
		]
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
</head>
<body>
<CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
    <TABLE WIDTH="215" HEIGHT="240" BORDER="0" CELLPADDING="0" CELLSPACING="0">
        <TR>
            <TD ROWSPAN="3"><IMG SRC="/images/boat_images/gray_boat_cover2.jpg" width="215" height="220"
                                 ALT="Boat Tarp in the shop">
            </TD>
            <TD HEIGHT="33">&nbsp;</TD>
        </TR>
        <TR>
            <TD HEIGHT="65" width="155"><IMG SRC="/images/boat_images/gray_boat_cover_detail.jpg" width="156"
                                             height="65" ALT="Deatial of Boat Tarp Reefing Rows"></TD>
        </TR>
        <TR>
            <TD HEIGHT="122" ALIGN="center" VALIGN="top">
                <TABLE WIDTH="120" BORDER="0">
                    <TR>
                        <TD align="center"><FONT SIZE="-2" FACE="Arial">Reefing rows enable you to custom fit the
                                Dry-Dock tarp to your boat.</FONT></TD>
                    </TR>
                </TABLE>
            </TD>
        </TR>
        <TR>
            <TD HEIGHT="20" WIDTH="215" ALIGN="center" VALIGN="top">
                <TABLE WIDTH="215" BORDER="0">
                    <TR>
                        <TD>
                            <CENTER><FONT SIZE="-2" FACE="Arial">A Custom Boat Tarp in
                                    our shop.</FONT></CENTER>
                        </TD>
                    </TR>
                </TABLE>
            </TD>
            <TD HEIGHT="20" ALIGN="center" VALIGN="top"></TD>
        </TR>
    </TABLE>


	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>
