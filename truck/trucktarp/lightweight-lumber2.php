<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing:MADE IN USA Lightweight Lumber Tarps only $285.00 for 45' and 48' trailers";
	$keywords    = "MADE IN USA Lightweight Lumber Tarps for 45' and 48' trailers";
	$description = "MADE IN USA Lightweight Lumber Tarps only $285.00 for 45' and 48' trailers";
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
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/product-line.php"; ?>
</head>
<body>
<center><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></center>
<br>
<div align="center">
    <center>
        <table width="650" height="5" border="1" bordercolor="#ffcc66" cellpadding="0" cellspacing="0"
               bgcolor="#ffcc66">
            <tr>
                <td>
                </td>
            </tr>
        </table>
        <font face="Verdana"><strong> 2 and 3 Piece MADE IN USA Waterproof Lightweight<br>
                Durable Lumber Tarps with Flaps</strong> </font>
    </center>
    <div align="center">
        <center>
            <img alt="New 2 and 3 Piece 100% Waterproof Lightweight " src="/images/truck_images/lightflash.gif"
                 width="400" height="49"><br/>
        </center>
        <div align="center">
            <center>
                <table width="650" height="5" border="1" bordercolor="#ffcc66" cellpadding="0" cellspacing="0"
                       bgcolor="#ffcc66">
                    <tr>
                        <td>
                        </td>
                    </tr>
                </table>
                <table border="0" width="500" cellpadding="1" cellspacing="1">
                    <tr>
                        <td>
                            <p style="text-align: center; font-size: small;">
                                DS-Sewing introduces a new revolutionary 100% waterproof lightweight fabric that reduces
                                the weight of the tarp while maintaining the "tough tarp" durability and fabric strength
                                that DS-Sewing is known for. The new lightweight 8 foot Lumber Tarps with grommets every
                                2 feet and the new 10oz lightweight fabric are only <span
                                        style="color: red; font-weight: bold;"> 75 LBS compared to 120 LBS</span> for
                                the old 18 oz. fabric. Tarps made of this new material are currently only available
                                from DS-Sewing. Tarps are available in 10 oz and 18 oz vinyl-coated polyester with
                                grommets every two feet.
                            </p>
                        </td>
                    </tr>
                </table>
                <table border="1" bordercolor="#ffcc66" bgcolor="#ffcc66" width="600" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="650" cellspacing="0"
                                   cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffcc">
                                        <table border="0" bordercolor="#ffcc66" bgcolor="#ffffcc" width="325"
                                               cellspacing="0"
                                               cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <b>2 PIECE LIGHTWEIGHT&nbsp;LUMBER TARP.</b> MADE IN USA.
                                                    <p style="font-size:12pt;color:red;font-weight:bold;">
                                                        Set requires 2 tarps (sold individually)
                                                    </p>

                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>26' x 20' (6' drop)</td>
                                                            <td>$<?php echo getPrice( '1003A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1003" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1003LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1003A' ); ?>lbs)
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
                                                    <br/>
                                                    <!--[]-->
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>26' x 22' (7' drop)</td>
                                                            <td>$<?php echo getPrice( '1002A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1002" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1002LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1002A' ); ?>lbs)
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
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>26' x 24' (8' drop)</td>
                                                            <td>$<?php echo getPrice( '1001A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1001" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1001LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1001A' ); ?>lbs)
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
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="300" height="100%" align="right">
                                        <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="325"
                                               height="100%"
                                               cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <center>
                                                        <img alt="" src="/images/truck_images/arrgghh.gif" width="262"
                                                             height="248">
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </TR>
                                </TBODY>
                            </TABLE>

                            <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="650" cellpadding="0"
                                   cellspacing="0">
                                <tr>
                                    <td>
                                        <center>
                                            <b>2 PIECE LIGHTWEIGHT LUMBER TARP MADE IN USA</b>
                                            <br>
                                            <img height="150" alt="lumber tarp diagram"
                                                 src="/images/truck_images/2_piecexxxx.gif"
                                                 width="380">
                                        </center>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="650" cellspacing="0"
                                   cellpadding="0">
                                <tr>
                                    <td colspan="2" align="center">
                                        <b>3 PIECE LIGHTWEIGHT&nbsp;LUMBER TARP</b>. MADE IN USA.
                                        <p>
                                            When ordering a standard 3-piece tarp set; <span
                                                    style="color:Red; font-weight:bold;">order two (2)                    end sections and one (1) middle section</span>.
                                            The middle section can be used separately as a steel tarp. Three piece tarps
                                            are great for partials or multiple stop deliveries.
                                        </p>
                                        <p style="text-align: center; font-size: small;">
                                            Solid tarps are available in 10 oz and 18 oz vinyl-coated polyester
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffcc" valign="top">
                                        <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="325"
                                               cellspacing="0"
                                               cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <p><b>3 PIECE END SECTION LIGHTWEIGHT&nbsp; LUMBER TARP MADE IN
                                                            USA</b></p>
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>17' x 20' (6' drop)</td>
                                                            <td>$<?php echo getPrice( '1110A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1110" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1110LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1110A' ); ?>
                                                                            lbs)
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
                                                    <br/>
                                                    <!--[]-->
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>17' x 22' (7' drop)</td>
                                                            <td>$<?php echo getPrice( '1111A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1111" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1111LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1111A' ); ?>
                                                                            lbs)
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
                                                    <br/>
                                                    <!--[]-->
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>17' x 24' (8' drop)</td>
                                                            <td>$<?php echo getPrice( '1112A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1112" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1112LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1112A' ); ?>
                                                                            lbs)
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
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td bordercolor="#ffcc66" bgcolor="#ffffcc" width="300" align="right">
                                        <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="325"
                                               cellspacing="0"
                                               cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <p><b>3 PIECE MIDDLE SECTION LIGHTWEIGHT&nbsp; LUMBER TARP MADE IN
                                                            USA</b></p>
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>20' x 20' (6' drop)</td>
                                                            <td>$<?php echo getPrice( '1113A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1113" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1113LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1113A' ); ?>
                                                                            lbs)
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
                                                    <br/>
                                                    <!--[]-->
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>20' x 22' (7' drop)</td>
                                                            <td>$<?php echo getPrice( '1114A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1114" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1114LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1114A' ); ?>
                                                                            lbs)
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
                                                    <br/>
                                                    <!--[]-->
                                                    <table width="325" class="servicesT">
                                                        <tr>
                                                            <td class="servHd">Size</td>
                                                            <td class="servHd">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>20' x 24' (8' drop)</td>
                                                            <td>$<?php echo getPrice( '1115A' ); ?>
                                                            </td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1115" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1115LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1003A' ); ?>
                                                                            lbs)
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
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <TABLE BORDER="1" bordercolor="#ffcc66" bgcolor="#ffffcc" WIDTH="650" CELLPADDING="0"
                                   cellspacing="0">
                                <TR>
                                    <TD><BR>
                                        <center>
                                            <IMG height="150" alt="lumber tarp diagram"
                                                 src="/images/truck_images/3_piecexxxx.gif" width=500>
                                            <BR>
                                            <B>3 PIECE LUMBER TARP MADE IN USA</B>
                                        </center>
                                    </TD>
                                </TR>
                            </TABLE>
                        </TD>
                    </TR>
                </TABLE>
				<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
            </center>
        </div>
    </div>
</div>
</body>
</html>