<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Truck Tarps - Machine Tarps";
	$keywords    = "D.S.Sewing,Machine Tarps,load covers,freight tarps,truck tarps,covering machines,18 ounce vinyl-coated polyester";
	$description = "This machine tarp has graduated drops with grommets spaced approximately every 24 inches. This design increases the tarp's longevity by stopping the tarp from flapping in the wind, which is a major cause of tarp wear and damage.";
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
    <P><h2>Machine Tarps</h2></P>

    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <Tr>
            <TD>
                <CENTER>
                    <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0"
                           WIDTH="600">
                        <TR>
                            <TD ALIGN="CENTER" WIDTH="280">
                                <IMG SRC="/images/truck_images/machinediagram.gif" ALT="machine tarp diagram"
                                     WIDTH="150" HEIGHT="200" ALIGN="bottom"></TD>
                            <TD ALIGN="LEFT" WIDTH="340"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Shown
                                    here is a standard 20' x 20' tarp for covering machines and other loads during
                                    transporting. Various sizes are stocked for immediate delivery. Custom machine
                                    covers can be manufactured to your specifications and delivered within seven working
                                    days. This machine tarp has graduated drops with grommets spaced approximately every
                                    24 inches. This design increases the tarps longevity by stopping the tarp from
                                    flapping in the wind, which is a major cause of tarp wear and damage </FONT>

                                <P align=center><B><FONT face=Arial>Standard Prices and Sizes</FONT></B></P>
                                <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid tarps
                                        are available in 10 oz and 18 oz vinyl-coated polyester</FONT></P>

                                <CENTER>
                                    <TABLE BORDER="0" WIDTH="270">

                                        <TR>
                                            <td>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>20' x 20'</td>
                                                        <td>$<?php echo getPrice( "1011A" ); ?></td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1011" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1011LTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1011A" ); ?>lbs)
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
                                                <!--[]-->
                                                <br/>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>20' x 30'</td>
                                                        <td>$<?php echo getPrice( "1012A" ); ?></td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1012" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1012LTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1012A" ); ?>lbs)
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
                                                <!--[]-->
                                                <br/>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>25' x 25'</td>
                                                        <td>$<?php echo getPrice( "1013A" ); ?></td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1013" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1013LTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1013A" ); ?>lbs)
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
                                                <!--[]-->
                                                <br/>
                                                <table class="servicesT">
                                                    <tr>
                                                        <td class="servHd" width="50%">Size</td>
                                                        <td class="servHd" width="50%">Price</td>
                                                    </tr>
                                                    <tr>
                                                        <td>25' x 30'</td>
                                                        <td>$<?php echo getPrice( "1014A" ); ?></td>
                                                    </tr>
                                                    <form action="/s/incart" method="post">
                                                        <input type="hidden" value="incart" name="action"/>
                                                        <input type="hidden" value="1014" name="pid"/>
                                                        <tr>
                                                            <td align="right">Fabric:</td>
                                                            <td>
                                                                <select name="weight">
                                                                    <option value="LT">10oz
                                                                        (<?php echo getWeight( "1014LTA" ); ?>lbs)
                                                                    </option>
                                                                    <option value="">18oz
                                                                        (<?php echo getWeight( "1014A" ); ?>lbs)
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
    <br>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</html>