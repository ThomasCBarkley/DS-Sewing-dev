<html lang="en">

<head>
    <?php
    $title       = "D.S.Sewing Truck Tarps - Hand Roll-Off Container Tarp";
    $keywords    = "D.S.Sewing,Container Hand Tarps,flat steel covers,Flat Coil Tarps,18 ounce vinyl-coated polyester";
    $description = "The hand roll-off container tarp is made of 18-ounce vinyl-coated polyester, mesh or solid.  The tarp comes in a variety of sizes.  Standard sizes are 24' x 12' and 26' x 12'.";
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
<center><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
	<center><img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0" alt="Truck Tarps and Accessories"></center>
	<P><B><H2><FONT face="verdana,arial,helvetica,sans-serif">Hand Roll-Off Container Tarp</FONT></H2></B></P>
    <CENTER>
     <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0"><Tr>
 <TD>
   <CENTER>
    <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0" WIDTH="600">
      <TR>
       <TD ALIGN="CENTER" WIDTH="220" valign="top"><BR><IMG SRC="/images/truck_images/rolloffcontainerphoto.gif" 
          ALT="moving floor tarp photo" WIDTH="200" HEIGHT="150" ALIGN="bottom" border=1>
            <IMG SRC="/images/truck_images/handdiagram.gif" 
             ALT="moving floor tarp diagram" WIDTH="150" HEIGHT="200" ALIGN="bottom" border="1">
       </TD>
       <TD ALIGN="CENTER" WIDTH="380" valign="top"">
          <FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">
          Hand Roll-Off Container Tarps are used to cover roll off containers for the demolition and garbage industries. Our strong fabric is known for its long lasting durability.
          With the grommets and webbing along the hems you can secure your cover to the roll off container.
          </FONT>

            
            <P ALIGN="center"><B><FONT face="verdana,arial,helvetica,sans-serif">Standard Prices and
              Weights</FONT></B></P>
            <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Solid tarps are available in 10 oz and 18 oz vinyl-coated polyester</FONT></P>
            <P ALIGN="center"><FONT SIZE="-1" face="verdana,arial,helvetica,sans-serif">Mesh tarps are available in 6.5 oz vinyl-coated polyester</FONT></P>
                        
            <CENTER><TABLE BORDER="0">
              <tr>
                <td>
                            <table class="servicesT">                                                                            
                                <tr>
                                    <td class="servHd" width="50%">Size</td>
                                    <td class="servHd" width="50%">Price</td>
                                </tr>                                                                            
                                <tr>                                                                                
                                    <td>Solid 24' x 12'</td>
                                    <td>$<?php echo getPrice("1034A")?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action" />
                                    <input type="hidden" value="1034" name="pid" />
                                     <tr>                                                                                    
                                        <td align="right">Fabric:</td>
                                        <td>
                                            <select name="weight">
                                                <option value="LT">10oz (<?php echo getPrice("1034LTA")?>lbs)</option>
                                                <option value="">18oz (<?php echo getPrice("1034A")?>lbs)</option>
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
                                            <input type="submit" value="Buy" />
                                        </td>
                                       </tr>
                                </form>                                                                            
                            </table>
                            <!--[]-->
                            <br />
                            <table class="servicesT">                                                                            
                                <tr>
                                    <td class="servHd" width="50%">Size</td>
                                    <td class="servHd" width="50%">Price</td>
                                </tr>                                                                            
                                <tr>                                                                                
                                    <td>Mesh 24'x12'Box of 1pc</td>
                                    <td>$<?php echo getPrice("1035A")?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action" />
                                    <input type="hidden" value="1035" name="pid" />
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
                                            <input type="submit" value="Buy" />
                                        </td>
                                       </tr>
                                </form>                                                                            
                            </table>
                            <!--[]-->
                            <br />
                            <table class="servicesT">                                                                            
                                <tr>
                                    <td class="servHd" width="50%">Size</td>
                                    <td class="servHd" width="50%">Price</td>
                                </tr>                                                                            
                                <tr>                                                                                
                                    <td>Mesh 26'x12'Box of 1pc</td>
                                    <td>$<?php echo getPrice("1036A")?></td>
                                </tr>
                                <form action="/s/incart" method="post">
                                    <input type="hidden" value="incart" name="action" />
                                    <input type="hidden" value="1036" name="pid" />
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
                                            <input type="submit" value="Buy" />
                                        </td>
                                       </tr>
                                </form>                                                                            
                            </table>
                                                                                                                                    
                </td>
              </tr>
            </TABLE> </CENTER>             
            </TD>
          </TR>
        </TABLE></CENTER></TD>
          </TR>
        </TABLE></CENTER></TABLE></cENTER>
        </CENTER><BR>
        <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?></CENTER>
  </BODY>
</HTML>
