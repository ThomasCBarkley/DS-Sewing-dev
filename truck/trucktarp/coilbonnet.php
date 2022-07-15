<html lang="en">

<head>
	<?php
	$title       = "D.S.Sewing - Truck Tarps - Coiled Steel Bonnet Tarps";
	$keywords    = "D.S.Sewing,Truck Tarps,Coiled Steel Bonnet Tarps,18 ounce vinyl-coated polyester";
	$description = "The bonnet tarp for coiled steel is approximately 70x70x70. It's quick and easy to install, remove or fold. This size bonnet will cover two small coils or one extra large coil. Grommets are located for easy placement of 21 inch rubber straps. The height is designed to fit snuggly to the floor. Larger custom sizes available.";
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
<center><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
    <img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0"  alt="Truck Tarps and Accessories">
    <p>
        <b>
            <h2>
                <font face="verdana,arial,helvetica,sans-serif">Coil Bonnet Tarps </font>
            </h2>
        </b>
    </p>
    <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="325" cellspacing="0"
           cellpadding="0">
        <tr>
            <td>
                <center>
                    <table border="3" bordercolor="#ffcc66" width="600" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="CENTER" width="222">
                                <br>
                                <img src="/images/truck_images/coiledsteelphoto.gif" alt="coiled steel tarp photo"
                                     border="1" width="200" height="150" align="bottom"></td>
                            <td align="CENTER" width="343">
                                <table border="1" bordercolor="#ffcc66" cellpadding="0" cellspacing="0" width="400">
                                    <tr>
                                        <td align="CENTER" width="222">
                                            <img src="/images/truck_images/coiledsteeldiagram.gif"
                                                 alt="coiled steel tarp diagram"
                                                 border="1" border color="#ffcc66" width="150" height="200"
                                                 align="bottom"></td>
                                        <td align="LEFT">
                                            <font size="-1" face="verdana,arial,helvetica,sans-serif">This bonnet tarp
                                                for coiled steel is approximately 70&quot; x 70&quot; x 70&quot;. It's
                                                quick and easy to install, remove, or fold. This size bonnet will cover
                                                two small coils or one extra large coil. Grommets are located for easy
                                                placement of 21&quot; rubber straps. The height is designed to fit
                                                snuggly to the floor. Larger custom sizes available.</font>

                                            <p align="center"><b><font face="Arial">Standard Prices and
                                                        Weights</font></b></p>
                                            <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid
                                                    tarps are available in 10 oz and 18 oz vinyl-coated polyester</FONT>
                                            </P>
                                            <table class="servicesT">
                                                <tr>
                                                    <td class="servHd" width="50%">Size</td>
                                                    <td class="servHd" width="50%">Price</td>
                                                </tr>
                                                <tr>
                                                    <td> 70" x 70" x 70"</td>
                                                    <td>$<?php echo getPrice( "1005A" ); ?></td>
                                                </tr>
                                                <form action="/s/incart" method="post">
                                                    <input type="hidden" value="incart" name="action"/>
                                                    <input type="hidden" value="1005" name="pid"/>
                                                    <tr>
                                                        <td align="right">Fabric:</td>
                                                        <td>
                                                            <select name="weight">
                                                                <option value="LT">10oz
                                                                    (<?php echo getWeight( "1005LTA" ); ?>lbs)
                                                                </option>
                                                                <option value="">18oz
                                                                    (<?php echo getWeight( "1005A" ); ?>lbs)
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
                                </table>
                            </td>
                        </tr>
                    </table>
            </td>
        </tr>
    </table>
    <br/>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</html>
