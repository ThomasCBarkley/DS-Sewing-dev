<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Truck Tarps - Steel Trailer Tarps - Freight Covers";
	$keywords    = "D.S.Sewing,Steel Tarps,Steel Trailer Tarps,freight covers,18 ounce vinyl-coated polyester";
	$description = "The steel tarp covers coiled or flat steel shingles and high-density low area freight. It can be turned sideways and used with two smoke tarps for covering plywood.";
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
    <p><h2>STEEL TARP MADE IN USA</h2></p>

    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <tr>
            <TD bgcolor=#ffffcc>
                <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="325" cellspacing="0" cellpadding="0">
                    <Tr>
                        <TD>
                            <CENTER>
                                <TABLE BORDER="1" WIDTH="600" bordercolor="#ffcc66" bgcolor="#ffffcc" CELLPADDING="0"
                                       cellspacing="0">
                                    <TR>
                                        <TD ALIGN="CENTER" WIDTH="222"><BR>
                                            <IMG SRC="/images/truck_images/flatsteelphoto.gif" ALT="steel tarp"
                                                 BORDER="1" WIDTH="200" HEIGHT="150"></TD>
                                        <TD ALIGN="CENTER" WIDTH="343">
                                            <TABLE BORDER="1" bordercolor="#ffcc66" WIDTH="400" CELLPADDING="0"
                                                   cellspacing="0">
                                                <TR>
                                                    <TD ALIGN="CENTER" WIDTH="222"><IMG
                                                                SRC="/images/truck_images/steeldiagram.gif"
                                                                ALT="steel tarp diagram" WIDTH="150" HEIGHT="200"
                                                                ALIGN="bottom">
                                                    </TD>
                                                    <TD ALIGN="LEFT">
                                                        <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">This
                                                            tarp covers coiled or flat steel, shingles and high density
                                                            low area freight. It can be turned sideways and used with
                                                            two smoke tarps for covering plywood (5' drops). The
                                                            approximate sizes are 20' x 14' and 24' x 14'. This tarp has
                                                            a 3' drop with two rows of grommets on each side. The top
                                                            row is about 18&quot; and the bottom row is about 34&quot;.
                                                            Two or three tarps are needed per trailer.</FONT>
                                                        <P align=center>
                                                            <B><FONT face=Arial>Standard Prices and Weights</FONT></B>
                                                        </P>
                                                        <P ALIGN="center">
                                                            <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid
                                                                tarps are available in 10 oz and 18 oz vinyl-coated
                                                                polyester</FONT></P>

                                                        <table class="servicesT">
                                                            <tr>
                                                                <td class="servHd" width="50%">Size</td>
                                                                <td class="servHd" width="50%">Price</td>
                                                            </tr>
                                                            <tr>
                                                                <td> 20' x 14'</td>
                                                                <td>$<?php echo getPrice( "1006A" ); ?></td>
                                                            </tr>
                                                            <form action="/s/incart" method="post">
                                                                <input type="hidden" value="incart" name="action"/>
                                                                <input type="hidden" value="1006" name="pid"/>
                                                                <tr>
                                                                    <td align="right">Fabric:</td>
                                                                    <td>
                                                                        <select name="weight">
                                                                            <option value="LT">10oz
                                                                                (<?php echo getWeight( "1006LTA" ); ?>
                                                                                lbs)
                                                                            </option>
                                                                            <option value="">18oz
                                                                                (<?php echo getWeight( "1006A" ); ?>lbs)
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right">Color:</td>
                                                                    <td>
                                                                        <select name="colour">
                                                                            <option value="A">RED</option>
                                                                            <option value="B" selected="selected">BLUE
                                                                            </option>
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
                                                        <!--[]-->
                                                        <br/>
                                                        <table class="servicesT">
                                                            <tr>
                                                                <td class="servHd" width="50%">Size</td>
                                                                <td class="servHd" width="50%">Price</td>
                                                            </tr>
                                                            <tr>
                                                                <td>24' x 14'</td>
                                                                <td>$<?php echo getPrice( "1007A" ); ?></td>
                                                            </tr>
                                                            <form action="/s/incart" method="post">
                                                                <input type="hidden" value="incart" name="action"/>
                                                                <input type="hidden" value="1007" name="pid"/>
                                                                <tr>
                                                                    <td align="right">Fabric:</td>
                                                                    <td>
                                                                        <select name="weight">
                                                                            <option value="LT">
                                                                                10oz
                                                                                (<?php echo getWeight( "1007LTA" ); ?>
                                                                                lbs)
                                                                            </option>
                                                                            <option value="">18oz
                                                                                (<?php echo getWeight( "1007A" ); ?> lbs)
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right">Color:</td>
                                                                    <td>
                                                                        <select name="colour">
                                                                            <option value="A">RED</option>
                                                                            <option value="B" selected="selected">BLUE
                                                                            </option>
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
                                                    </TD>
                                                </TR>
                                                </FORM></TBODY></TABLE>
                                        </TD>
                                    </TR>
                                </TABLE>
                            </CENTER>
                        </TD>
                    </TR>
                </TABLE>
            </TD>
        </TR>
    </TABLE>

    <BR><BR>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</HTML>