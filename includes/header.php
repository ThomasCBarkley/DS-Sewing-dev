<?php
if (defined('ROOTUP')) {
    require_once ROOTUP . "/banner.php";
} else {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/banner.php";
}
$the_banner_id = array_rand( $banner_list, 1 );
?>

<TABLE>
    <TR>
        <TH>
            <CENTER>
                <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" HEIGHT="82" STYLE="HEIGHT: 82px; WIDTH: 505px"
                       WIDTH="505">
                    <TR>
                        <TH VALIGN="top" ALIGN="right">
                            <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" HEIGHT="82" WIDTH="137">
                                <TR>
                                    <TD><IMG SRC="/images/toolbar_images/window/window_top.gif" WIDTH="137" HEIGHT="14"
                                             BORDER="0" ALT="go to Truck Tarps"></TD>
                                </TR>
                                <TR>
                                    <TD>
                                        <A HREF="<?php echo $banner_list[ $the_banner_id ]['link']; ?>">
                                            <IMG BORDER="0" SRC="<?php echo $banner_list[ $the_banner_id ]['image']; ?>"
                                                 ALT="<?php echo $banner_list[ $the_banner_id ]['alt']; ?>">
                                        </A>
                                    </TD>
                                </TR>
                                <TR>
                                    <TD width="100%" style="text-align: center"><strong><a href="tel:+18007898143" style="color: red; text-decoration: none">(800) 789-81-43</a></strong>&nbsp;</TD>
                                </TR>
                            </TABLE>
                        </TH>
                        <TH>
                            <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
                                <TR>
                                    <TD><A HREF="/truck/truck.php" ONMOUSEOVER="swap_image(img0,0)"
                                           ONMOUSEOUT="swap_image(img0,0)">
                                            <IMG ID="img0" NAME="img0" SRC="/images/toolbar_images/tb_0.gif" WIDTH="70"
                                                 HEIGHT="59" BORDER="0" ALT="go to Truck Tarps"></A></TD>
                                    <TD><A HREF="/tough/toughtarps.php" ONMOUSEOVER="swap_image(img1,1)"
                                           ONMOUSEOUT="swap_image(img1,1)">
                                            <IMG NAME="img1" SRC="/images/toolbar_images/tb_1.gif" WIDTH="47"
                                                 HEIGHT="59" BORDER="0" ID="IMG1" ALT="go to Tough Tarps"></A></TD>
                                    <TD><A HREF="/pool/pool.php" ONMOUSEOVER="swap_image(img2,2)"
                                           ONMOUSEOUT="swap_image(img2,2)">
                                            <IMG NAME="img2" SRC="/images/toolbar_images/tb_2.gif" WIDTH="64"
                                                 HEIGHT="59" BORDER="0" ALT="go to Pool Covers"></A></TD>
                                    <TD><A HREF="/boat/boat.php" ONMOUSEOVER="swap_image(img3,3)"
                                           ONMOUSEOUT="swap_image(img3,3)">
                                            <IMG NAME="img3" SRC="/images/toolbar_images/tb_3.gif" WIDTH="55"
                                                 HEIGHT="59" BORDER="0" ALT="go to Boat Covers"></A></TD>
                                    <TD><A HREF="/custom/custom.php" ONMOUSEOVER="swap_image(img4,4)"
                                           ONMOUSEOUT="swap_image(img4,4)">
                                            <IMG NAME="img4" SRC="/images/toolbar_images/tb_4.gif" WIDTH="91"
                                                 HEIGHT="59" BORDER="0"
                                                 ALT="go to Industrial Sewing & Heat Sealing"></A></TD>
                                    <?php if (isset($is_home_page)) { ?>
                                    <TD><span HREF="/">
                                            <IMG SRC="/images/toolbar_images/logo.gif" WIDTH="114" HEIGHT="59"
                                                 BORDER="0" ALT="D S Sewing"></span></TD>
                                    <?php } else { ?>
                                    <TD><a HREF="/">
                                            <IMG SRC="/images/toolbar_images/logo.gif" WIDTH="114" HEIGHT="59"
                                                 BORDER="0" ALT="D S Sewing"></a></TD>
                                    <?php } ?>
                                </TR>
                            </TABLE>
                            <TABLE WIDTH="450" BORDER="0" CELLPADDING="0" CELLSPACING="0" BGCOLOR="#ffcc66">
                                <TBODY>
                                <TR>
                                    <TD valign="middle">
                                        <a href="/cart/cart.php"><!-- /s/tinycart -->
                                            <img name="tb_checkout" SRC="/images/toolbar_images/tb_checkout.gif"
                                                 WIDTH="56" HEIGHT="26" alt="Go to Cart">
                                        </a>
                                    </TD>
                                    <TD valign="middle">
                                        <A HREF="/" ONMOUSEDOWN="swap_image(img5,5)" ONMOUSEUP="swap_image(img5,5)"
                                           ONDRAGSTART="swap_image(img5,5)">
                                            <IMG NAME="img5" SRC="/images/toolbar_images/tb_5.gif" WIDTH="56"
                                                 HEIGHT="26" BORDER="0" ALT="Return to D.S. home page"></A>
                                    </TD>
                                    <TD>
                                        <A HREF="/s/forms/request" ONMOUSEDOWN="swap_image(img6,6)"
                                           ONMOUSEUP="swap_image(img6,6)" ONDRAGSTART="swap_image(img6,6)">
                                            <IMG NAME="img6" SRC="/images/toolbar_images/tb_6.gif" WIDTH="118"
                                                 HEIGHT="26" BORDER="0" ALT="Request a Catalog">
                                        </A>
                                    </TD>
                                    <TD>
                                        <A HREF="/truck_acc/truck_acc.php">
                                            <IMG NAME="img4" SRC="/images/toolbar_images/Merritt_Company_Logo.jpg"
                                                 BORDER="0" ALT="go to Merritt Products">
                                        </A>
                                    </TD>
                                    <TD> &nbsp;</TD>
                                    <TD width="100%"> &nbsp;</TD>
                                    </FORM>
                                    <TD>&nbsp;</TD>
                                </TR>
                                </TBODY>
                            </TABLE>
                        </TH>
                    </TR>
                </TABLE>
            </CENTER>
        </TH>
    </TR>
</TABLE>