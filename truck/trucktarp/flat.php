<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Truck Tarps - Flat Truck Tarps";
	$keywords    = "D.S.Sewing,Truck Tarps,Flat Truck Tarps,14 ounce laminated fabric,18 ounce vinyl-coated polyester";
	$description = "This laminated tarp covers anything on the job-site.  Tarps other than standard sizes are 55 cents a square foot.  Hems with grommets approximately 2 feet apart.  14 ounce laminated fabric.";
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
    <H2>Flat Tarps</H2>

    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <Tr>
            <TD>
                <CENTER>
                    <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0"
                           WIDTH="600">
                        <TR>
                            <TD ALIGN="CENTER" WIDTH="150">
                                <IMG SRC="/images/truck_images/flatdiagram.gif" ALT="flat tarp diagram" border=1
                                     WIDTH="150" HEIGHT="200">
                            </TD>
                            <TD ALIGN="LEFT" WIDTH="460">
                                <CENTER>
                                    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="100%"
                                           cellspacing="0" cellpadding="0">
                                        <Tr>
                                            <TD>

                                                <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">This
                                                    vinyl-coated polyester tarp covers anything on the jobsite.</FONT>

                                                <P><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Tarps other
                                                        than standard sizes are 55 cents a square foot.</FONT></P>
                                                <P><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Hems with
                                                        grommets approximately 2 feet apart.</FONT></P>
                                                <CENTER>
                                                    <P ALIGN="center">
                                                        <B>Standard Prices and Weights</B></P>
                                                </CENTER>
                                                <P ALIGN="center">
                                                    <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid
                                                        tarps are available in 10 oz and 18 oz vinyl-coated
                                                        polyester</FONT>
                                                </P>

                                            </td>
                                        </tr>
                                    </table>

                                    <CENTER>
                                        <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="450"
                                               cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <TABLE BORDER="0" width="100%">
                                                        <tr>
                                                            <td align="Center">
                                                                <table class="servicesT">
                                                                    <tr>
                                                                        <td class="servHd" width="50%">Size</td>
                                                                        <td class="servHd" width="50%">Price</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>10' x 20'</td>
                                                                        <td>$<?php echo getPrice( "1025A" ); ?></td>
                                                                    </tr>
                                                                    <form action="/s/incart" method="post">
                                                                        <input type="hidden" value="incart"
                                                                               name="action"/>
                                                                        <input type="hidden" value="1025" name="pid"/>
                                                                        <tr>
                                                                            <td align="right">Fabric:</td>
                                                                            <td>
                                                                                <select name="weight">
                                                                                    <option value="LT">10oz
                                                                                        (<?php echo getWeight( "1025LTA" ); ?>
                                                                                        lbs)
                                                                                    </option>
                                                                                    <option value="">18oz
                                                                                        (<?php echo getWeight( "1025A" ); ?>
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
                                                                                    <option value="B"
                                                                                            selected="selected">BLUE
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
                                                                        <td>15' x 25'</td>
                                                                        <td>$<?php echo getPrice( "1026A" ); ?></td>
                                                                    </tr>
                                                                    <form action="/s/incart" method="post">
                                                                        <input type="hidden" value="incart"
                                                                               name="action"/>
                                                                        <input type="hidden" value="1026" name="pid"/>
                                                                        <tr>
                                                                            <td align="right">Fabric:</td>
                                                                            <td>
                                                                                <select name="weight">
                                                                                    <option value="LT">10oz
                                                                                        (<?php echo getWeight( "1026LTA" ); ?>
                                                                                        lbs)
                                                                                    </option>
                                                                                    <option value="">18oz
                                                                                        (<?php echo getWeight( "1026A" ); ?>
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
                                                                                    <option value="B"
                                                                                            selected="selected">BLUE
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
                                                                        <td>20' x 30'</td>
                                                                        <td>$<?php echo getPrice( "1027A" ); ?></td>
                                                                    </tr>
                                                                    <form action="/s/incart" method="post">
                                                                        <input type="hidden" value="incart"
                                                                               name="action"/>
                                                                        <input type="hidden" value="1027" name="pid"/>
                                                                        <tr>
                                                                            <td align="right">Fabric:</td>
                                                                            <td>
                                                                                <select name="weight">
                                                                                    <option value="LT">10oz
                                                                                        (<?php echo getWeight( "1027LTA" ); ?>
                                                                                        lbs)
                                                                                    </option>
                                                                                    <option value="">18oz
                                                                                        (<?php echo getWeight( "1027A" ); ?>
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
                                                                                    <option value="B"
                                                                                            selected="selected">BLUE
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
                                                                <table class="servicesT">
                                                                    <tr>
                                                                        <td class="servHd" width="50%">Size</td>
                                                                        <td class="servHd" width="50%">Price</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>25' x 45'</td>
                                                                        <td>$<?php echo getPrice( "1028A" ); ?></td>
                                                                    </tr>
                                                                    <form action="/s/incart" method="post">
                                                                        <input type="hidden" value="incart"
                                                                               name="action"/>
                                                                        <input type="hidden" value="1028" name="pid"/>
                                                                        <tr>
                                                                            <td align="right">Fabric:</td>
                                                                            <td>
                                                                                <select name="weight">
                                                                                    <option value="LT">10oz
                                                                                        (<?php echo getWeight( "1028LTA" ); ?>
                                                                                        lbs)
                                                                                    </option>
                                                                                    <option value="">18oz
                                                                                        (<?php echo getWeight( "1028A" ); ?>
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
                                                                                    <option value="B"
                                                                                            selected="selected">BLUE
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
                                                        <tr>
                                                            <td ALIGN="center">
                                                                18 ounce vinyl-coated polyester fabric
                                                            </td>
                                                        </tr>
                                                    </TABLE>
                                                </td>
                                            </tr>
                                        </table>
                                    </CENTER>
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
</CENTER>

</BODY>
</HTML>