<html lang="en">
<head>
	<?php
	$title       = "D.S.Sewing Truck Tarps - Covered Wagon Tarps";
	$keywords    = "D.S.Sewing,Truck Tarps,Covered Wagon Tarps,freight tarps,truck covers,18 ounce vinyl-coated polyester";
	$description = "This 45' x 8' Covered Wagon Tarp has sewn in corners, forming approximately a 10";
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
<CENTER>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
    <img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0" alt="Truck Tarps and Accessories">
    <P><B><h2><FONT face="verdana,arial,helvetica,sans-serif">Covered Wagon Tarps</FONT></h2></B></P>

    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <Tr>
            <TD>
                <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0" WIDTH="600">
                    <TR>
                        <TD ALIGN="CENTER" WIDTH="222"><BR>
                            <IMG SRC="/images/truck_images/coveredwagonphoto.jpg" ALT="Covered Wagon Picture"
                                 WIDTH="200" HEIGHT="153" border=2>
                        </TD>
                        <TD ALIGN="CENTER" WIDTH="343">
                            <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" WIDTH="400">
                                <TR>
                                    <TD ALIGN="CENTER" WIDTH="222">
                                        <IMG SRC="/images/truck_images/wagondiagram.gif" ALT="cover wagon tarp diagram"
                                             border=1 WIDTH="150" HEIGHT="200" ALIGN="bottom">
                                    </TD>
                                    <TD ALIGN="LEFT" WIDTH="280">
                                        <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">This 45' x 8' Covered
                                            Wagon Tarp has sewn in corners, forming approximately a 10&quot; overhang.
                                            It's available in 10 ounce or 18 ounce vinyl-coated polyester. Back your
                                            trailer into our facility for a custom fitted Covered Wagon Tarp
                                            (appointment needed). Side kits are available on request. (call for
                                            pricing.)</FONT>

                                        <P align=center>
                                            <B><FONT face="verdana,arial,helvetica,sans-serif">Standard Prices and
                                                    Weights</FONT></B></P>
                                        <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid
                                                tarps are available in 10 oz and 18 oz vinyl-coated polyester</FONT>
                                        </P>

                                        <TABLE border="0" bordercolor="#ffcc66" bgcolor="#ffffcc">
                                            <tr>
                                                <td colspan="3">
                                                    <table class="servicesT">
                                                        <tr>
                                                            <td class="servHd" width="50%">Size</td>
                                                            <td class="servHd" width="50%">Price</td>
                                                        </tr>
                                                        <tr>
                                                            <td>45' x 8'</td>
                                                            <td>$<?php echo getPrice( '1015A' ); ?></td>
                                                        </tr>
                                                        <form action="/s/incart" method="post">
                                                            <input type="hidden" value="incart" name="action"/>
                                                            <input type="hidden" value="1015" name="pid"/>
                                                            <tr>
                                                                <td align="right">Fabric:</td>
                                                                <td>
                                                                    <select name="weight">
                                                                        <option value="LT">10oz
                                                                            (<?php echo getWeight( '1015LTA' ); ?>lbs)
                                                                        </option>
                                                                        <option value="">18oz
                                                                            (<?php echo getWeight( '1015A' ); ?>lbs)
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right">Color:</td>
                                                                <td>
                                                                    <select name="colour">
                                                                        <option value="A">RED</option>
                                                                        <option value="B" selected="selected">
                                                                            BLUE
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

                                            <TR>
                                                <TD WIDTH="90">

                                                    <P ALIGN="center">
                                                        <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Extra
                                                            Fabric for High Bows </FONT>
                                                    </P></TD>
                                                <TD WIDTH="90">
                                                    <P ALIGN="center">
                                                        <FONT SIZE="-1"
                                                              face="verdana,arial,helvetica,sans-serif">$<?php echo getPrice( '1016' ); ?></FONT>
                                                    </P></TD>
                                                <TD WIDTH="90">

                                                    <P ALIGN="center">
                                                    <FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
                                                        <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
                                                        <INPUT TYPE="HIDDEN" VALUE="1016" NAME="pid"><INPUT
                                                                TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1
                                                                name=SUBMIT1>
                                                    </P></TD>
                                            </TR>


                                            </FORM>

                                            <TR>
                                                <TD WIDTH="90">

                                                    <P ALIGN="center">
                                                        <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Custom
                                                            Back </FONT>
                                                    </P></TD>
                                                <TD WIDTH="90">

                                                    <P ALIGN="center">
                                                        <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">$<?php echo getPrice('1017'); ?></FONT>
                                                    </P></TD>
                                                <TD WIDTH="90">

                                                    <P ALIGN="center">
                                                    <FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
                                                        <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
                                                        <INPUT TYPE="HIDDEN" VALUE="1017" NAME="pid">
                                                        <INPUT TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1
                                                               name=SUBMIT1>
                                                    </P></TD>
                                            </TR>


                                            <TR>
                                                <TD>&nbsp;</TD>

                                            </TR>
                                            </FORM>
                                            </TD></TR>

                                            </TBODY></TABLE>
                                        <P ALIGN="center">
                                            <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">18
                                                ounce vinyl-coated polyester</FONT></P>
                                    </TD>
                                </TR>
                            </TABLE>
                        </TD>
                    </TR>
                </TABLE>
            </TD>
        </TR>
    </TABLE>
    <BR><BR>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</HTML>