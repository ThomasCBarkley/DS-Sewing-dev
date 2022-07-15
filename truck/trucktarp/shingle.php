<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Truck Tarps - Shingle Tarp";
	$keywords    = "D.S.Sewing,shingle tarp,coiled steel,flat steel,shingles,18 ounce vinyl-coated polyester";
	$description = "The shingle tarp covers coiled steel, flat steel, shingles and machinery.  It's a good all-purpose tarp. The size is approximately 16' x 24'.  Two tarps are needed.  Used with Smoke tarps, it's good for covering sheet rock by turning the tarp sideways.";
	$robots      = "index,follow";

	$paginator = [
		'page' => [
			'image' => '/images/footer_images/truck_footer.gif',
			'link'  => '/truck/truck.php',
			'alt'   => 'click to return To Truck Tarp &amp; Accessories index'
		]
	];

	?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php"; ?>
</head>
<body>
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>

    <img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0"
         alt="Truck Tarps and Accessories">

    <H2>SHINGLE TARP MADE IN USA</H2>

    <table border="0" width="600" cellspacing="0" cellpadding="0">
        <tr>
            <TD ALIGN="CENTER" WIDTH="222"><BR>
                <IMG SRC="/images/truck_images/shingletarpphoto.gif" ALT="shingle tarp" WIDTH="200" HEIGHT="150"
                     border=1>
            </TD>
            <td>
                <p style="font-size: small; margin: 10px;">
                    This shingle tarp covers coiled steel, flat steel, shingles and machinery. It's a good all purpose
                    tarp. The size is approximately 16' x 24'. You can order shingle tarp with front flaps or without
                    flaps. Their are two rows of grommets on each side. Two tarps are needed. Used with Smoke Tarps,
                    it's good for covering sheet rock by turning the tarp(without flaps) sideways.
                </p>
            </td>
        </tr>

        <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
            <tr>
                <TD>
                    <CENTER>
                        <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0"
                               WIDTH="600">
                            <TR>

                                <TD ALIGN="CENTER" WIDTH="222">
                                    <IMG SRC="/images/truck_images/shinglediagram.gif" ALT="shingle tarp diagram"
                                         WIDTH="150" HEIGHT="200" ALIGN="bottom">
                                </TD>
                                <TD ALIGN="LEFT" WIDTH="280">

                                    <p style="text-align: center; font-weight: bold;">
                                        Shingle Tarp without flaps
                                    </p>
                                    <p style="font-size: small; text-align: center;">
                                        Solid tarps are available in 10 oz and 18 oz vinyl-coated polyester
                                    </p>

                                    <CENTER>
                                        <table border="0" width="200">
                                            <td>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>24' x 16'</td>
                                                        <td>$<?php echo getPrice( "1009A" ); ?>
                                                        </td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1009" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1009LTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1009A" ); ?>lbs)
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
                                        </table>
                                    </CENTER>
                                </TD>
                            </TR>
                            <tr>

                                <TD ALIGN="CENTER" WIDTH="222"><IMG SRC="/images/truck_images/shinglediagram.jpg"
                                                                    ALT="shingle tarp diagram" WIDTH="150" HEIGHT="200"
                                                                    ALIGN="bottom">
                                </TD>
                                <TD ALIGN="LEFT" WIDTH="280">

                                    <p style="text-align: center; font-weight: bold;">
                                        Shingle Tarp with front flaps
                                    </p>
                                    <p style="font-size: small; text-align: center;">
                                        Solid tarps are available in 10 oz and 18 oz vinyl-coated polyester
                                    </p>


                                    <CENTER>
                                        <table border="0" width="200">
                                            <td>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>24' x 16' with Flaps</td>
                                                        <td>$<?php echo getPrice( "1009FA" ); ?>
                                                        </td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1009F" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1009FLTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1009FA" ); ?>lbs)
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
                                        </table>
                                    </CENTER>
                                </TD>

                            </tr>
                        </TABLE>
                    </CENTER>
                </TD>
            </tr>
        </TABLE>
        <BR><BR>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
    </table>
</CENTER>
</body>
</html>