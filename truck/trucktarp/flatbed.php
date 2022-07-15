<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Truck Tarps - Flatbed Trailer Tarps";
	$keywords    = "D.S.Sewing,Truck Tarps,Flat Truck Tarps,lumber tarp,smoke tarp,coiled steel tarps,freight covers,18 ounce vinyl-coated polyester";
	$description = "This all purpose flatbed tarp covers coiled steel,flat steel,sheet rock,machinery,plywood,shingles high-density low area freight and other loads. If combined with two smoke tarps,it can be used as a lumber tarp.";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/truck_footer.gif',
			'link'  => '/truck/truck.php',
			'alt'   => 'click to return To Truck Tarp & Accessories index'
		],
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php"; ?>
</head>
<body>
<center>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
    <img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0" alt="Truck Tarps and Accessories">
    <p><h2>Flatbed Tarps</h2></p>

    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <Tr>
            <TD>
                <CENTER>
                    <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0"
                           WIDTH="600">
                        <TR>
                            <TD ALIGN="CENTER" WIDTH="168">
                                <IMG SRC="/images/truck_images/flatbeddiagram.gif" ALT="flatbed tarp diagram"
                                     WIDTH="150" HEIGHT="200" ALIGN="bottom"></TD>
                            <TD ALIGN="LEFT" WIDTH="280"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">This
                                    all purpose flatbed tarp covers coiled steel, flat steel, sheet rock, machinery,
                                    plywood, shingles, high-density low area freight, and other loads. If combined with
                                    two smoke tarps, it can be used as a lumber tarp. The approximate size is 24' by 18'
                                    6&quot;. It has a 5' 3&quot; drop with two rows of grommets approximately 28&quot;
                                    apart. Two or three tarps are needed per trailer.</FONT>

                                <P align=center><B><FONT face=Arial>Standard Prices and Weights</FONT></B></P>
                                <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid tarps
                                        are available in 10 oz and 18 oz vinyl-coated polyester</FONT></P>

                                <CENTER>
                                    <TABLE border="0" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0"
                                           cellpadding="0" width=270>
                                        <tr>
                                            <td>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>24' x 18' 6"</td>
                                                        <td>$<?php echo getPrice( "1010A" ); ?></td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1010" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1010LTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1010A" ); ?>lbs)
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Color:</td>
                                                            <td>
                                                                <select name="colour">
                                                                    <option value="A">RED</option>
                                                                    <option value="B" selected="selected">BLUE</option>
                                                                    <option value="C">BLACK</option>
                                                                    <option value="D">GREEN</option>
                                                                    <option value="E">HUNTER</option>
                                                                    <option value="F">GREY</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Qty:</td>
                                                            <td>
                                                                <select name="qty">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>
                                                                <input type="submit" value="Buy"/>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                </table>

                                            </td>
                                        </tr>
                                        </TD>
                                        </TR>
                                    </TABLE>
                                </CENTER>
                            </TD>
                        </TR>
                    </TABLE>
                </CENTER>
            </TD>
        </TR>
    </TABLE>
    <BR><BR>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</HTML>
