<html lang="en">
<head>
	<?php
	$title       = "Lonas Para Camiones Con Cargas De Madera";
	$keywords    = "Dave The Tarp Guy, Lumber Tarps, Tarpa, Lonas Para Camiones, Madera, Acero, Maquinaria,";
	$description = "Lumber Tarps, Shingle tarps, Tarpa, Lonas Para Camiones, Madera, Acero, Maquinaria.";
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

<center>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
    <table border="0" width="590">
        <tr>
            <td>
                <table width="100" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2"
                            style="text-align:center; font-family:Verdana;font-weight:bold;font-size:14pt;border: dashed 1px black; padding:3px 3px 3px 3px;">
                            Lonas Para Camiones, Madera, Acero, Maquinaria, Tarpa <p>LONAS LIVIANAS PARA MADERA Y
                                TECHADO.</p>
                            <p>Para flotas de camiones y operadores independientes.
                            <p/>Dave el Hombre Lona 800 789-8143
                            <p style="font-size:12pt;">
                                Por favor entre su <span style="color:red;">codigo promocional</span> en su orden para
                                recibir su descuento.
                            </p>
                            <p><font face="verdana,arial,helvetica,sans-serif" size="2"> Dave el Hombre Lona dice
                                    Presione aqui para nuestro<br>
                                    <a href="Catalog/Catalog_Spanish.PDF"><strong>CATALOGO DE LONAS</strong></a><br>
                                    <em>Pesan la mitad y son iguales de fuertes!</em></font></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="325" class="servicesT">
                                <tr>
                                    <td class="servHd" colspan="2">Size</td>
                                    <td class="servHd">Price</td>
                                </tr>
                                <tr>
                                    <td colspan="2">26' x 20' (6' drop)</td>
                                    <td>$<?php echo getPrice("1003A"); ?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action"/>
                                    <input type="hidden" value="1003LT" name="pid"/>
                                    <tr>
                                        <td rowspan="4"><img src="/images/buttons/20-percent-Off-Button.gif"/></td>
                                        <td align="right">Fabric:</td>
                                        <td>
                                            10oz (<?php echo getWeight("1003LTA"); ?>lbs)</option>
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
                        <td><img src="/images/truck_images/2_piecexxxx.gif"/></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="325" class="servicesT">
                                <tr>
                                    <td class="servHd" colspan="2">Size</td>
                                    <td class="servHd">Price</td>
                                </tr>
                                <tr>
                                    <td colspan="2">26' x 24' (8' drop)</td>
                                    <td>$<?php echo getPrice("1001A"); ?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action"/>
                                    <input type="hidden" value="1001LT" name="pid"/>
                                    <tr>
                                        <td rowspan="4"><img src="/images/buttons/20-percent-Off-Button.gif"/></td>
                                        <td align="right">Fabric:</td>
                                        <td>
                                            10oz (<?php echo getWeight("1002LTA"); ?>lbs)</option>
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
                        <td align="center"
                        ">
                        <b>2 PIEZAS DE LONAS LIVIANAS&nbsp;PARA MADERA</b> . Para camiones de 45' y 48'.
                        <p style="font-size:12pt;color:red;font-weight:bold;">Se requieren dos lonas (se venden
                            individualmente)</p>
                        <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Las lonas solidas de
                                poliester con recubrimiento de vinyl estan disponibles en 10 y 18 onzas.</FONT></P>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <table width="325" class="servicesT">
                                <tr>
                                    <td class="servHd" colspan="2">Size</td>
                                    <td class="servHd">Price</td>
                                </tr>
                                <tr>
                                    <td colspan="2">24' x 16'</td>
                                    <td>$<?php echo getPrice("1009A"); ?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action"/>
                                    <input type="hidden" value="1009LT" name="pid"/>
                                    <tr>
                                        <td rowspan="4"><img src="/images/buttons/20-percent-Off-Button.gif"/></td>
                                        <td align="right">Fabric:</td>
                                        <td>
                                            10oz (<?php echo getWeight("1009LTA"); ?>lbs)</option>
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
                        <td valign="top">
                            <table>
                                <tr>
                                    <td><img src="/images/truck_images/shinglediagram.gif"/></td>
                                    <td>Su tamano es de aproximadamente 24'X16'. Se necesitan dos lonas.Si coloca esta
                                        lona lateralmente y coloca lonas frontales (smoke tarps)
                                        pueden servir para cubrir tableros de yeso (sheetrock).
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="servicesT">
                                <tr>
                                    <td class="servHd" width="50%" colspan="2">Size</td>
                                    <td class="servHd" width="50%">Price</td>
                                </tr>
                                <tr>
                                    <td colspan="2">50' x 12'</td>
                                    <td>$<?php echo getPrice("1030A"); ?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action"/>
                                    <input type="hidden" value="1030" name="pid"/>
                                    <tr>
                                        <td rowspan="3"><img src="/images/buttons/20-percent-Off-Button.gif"/></td>
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
                            <br/>
                            <table class="servicesT">
                                <tr>
                                    <td class="servHd" width="50%" colspan="2">Size</td>
                                    <td class="servHd" width="50%">Price</td>
                                </tr>
                                <tr>
                                    <td colspan="2">55' x 12'</td>
                                    <td>$<?php echo getPrice("1132A"); ?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action"/>
                                    <input type="hidden" value="1132" name="pid"/>
                                    <tr>
                                        <td rowspan="3"><img src="/images/buttons/20-percent-Off-Button.gif"/></td>
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
                        <td>
                            <table>
                                <tr>
                                    <td><img src="/images/truck_images/movingdiagram.gif"/></td>
                                    <td>Estas lonas vienen en tamanos standard 50'x12' o 55'x12'. Son hechas con malla
                                        de poliester tejida de 9x9 con recubrimiento de vinyl de 6.5 onz. con una
                                        capacidad de tension de 209 lbs. de urdimbre x 204 de rellenado. Las esquinas
                                        frontales pueden ser cosidas hacia dentro.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <table class="servicesT">
                                <tr>
                                    <td class="servHd" width="50%" colspan="2">Size</td>
                                    <td class="servHd" width="50%">Price</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Mesh 26'x12'Box of 2pc</td>
                                    <td>$<?php echo getPrice("1036A"); ?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action"/>
                                    <input type="hidden" value="1036" name="pid"/>
                                    <tr>
                                        <td rowspan="3"><img src="/images/buttons/20-percent-Off-Button.gif"/></td>
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
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="/images/truck_images/handdiagram.gif"/></td>
                                    <td>Estas lonas son usadas para cubrir los contenedores que usan las industrias de
                                        demolicion y basura. Nuestras lonas son conocidas por su gran durabilidad. Con
                                        los ojales y cinchos a lo largo de los bordes usted puede asegurar su cubierta
                                        al contenedor.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</center>
</body>
</html>
