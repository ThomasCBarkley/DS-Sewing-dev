<table width="657" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td colspan="4" valign="top">
            <table width="657" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td valign="center" align="right" width="117">
                        <table width="117" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td width="30" height="23" valign="center">
                                    <table width="30" bgcolor="#6666ff" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="23">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="87" height="39" valign="center">
                                    <a style="display: block;" target="" href="https://www.ds-sewing.com/"><img height="39" alt="Returns to Homepage" src="/images/footer_images/logo3.gif" width="87" border="0"></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="center" align="right" width="400">
                        <table width="100%" height="23" bgcolor="#6666ff" border="0" cellpadding="0"
                               cellspacing="0">
                            <tbody>
                            <tr>
                                <td width="60%" height="23">
                                    <p>
                                        <font face="Arial" size="-3" color="#ffffff">
                                            <nobr>&nbsp;&nbsp;&nbsp;PO Box 8983, New Haven CT 06532</nobr>
                                        </font>
                                    </p>
                                </td>
                                <td align="right" height="23">
                                    <A style="display: block;" href="<?php echo $paginator['page']['link']; ?>">
                                        <IMG height=23 alt="<?php echo $paginator['page']['alt']; ?>"
                                             src="<?php echo $paginator['page']['image']; ?>" width=200 border=0>
                                    </A>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="center" align="right" width="70">
                        <table width="70" height="23" bgcolor="#6666ff" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td align="left" colspan="2">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <?php if ( isset( $paginator['nav'] ) ) { ?>
                        <TD HEIGHT="23" width="70" VALIGN="center">
                            <TABLE WIDTH="70" HEIGHT="23" BGCOLOR="6666ff" BORDER="0" CELLPADDING="0" CELLSPACING="0">
                                <TR>
                                    <TD ALIGN="right">
                                        <?php if ( ! empty( $paginator['nav']['previous'] ) ) { ?>
                                            <a style="display:block;" href="<?php echo $paginator['nav']['previous']; ?>">
                                                <img src="/images/footer_images/back2.gif"
                                                     alt="to page <?php echo $paginator['nav']['current'] - 1; ?> of <?php echo $paginator['nav']['total']; ?>"
                                                     width="24" height="23" border="0">
                                            </a>
                                        <?php } else { ?>
                                            <img SRC="/images/footer_images/back_gray.gif" ALT="" WIDTH="24" HEIGHT="23"
                                                 BORDER="0">
                                        <?php } ?>
                                    </TD>
                                    <TD ALIGN="left">
                                        <?php if ( ! empty( $paginator['nav']['next'] ) ) { ?>
                                            <A style="display:block;" HREF="<?php echo $paginator['nav']['next']; ?>">
                                                <IMG SRC="/images/footer_images/next2.gif"
                                                     ALT="to page <?php echo $paginator['nav']['current'] + 1; ?> of <?php echo $paginator['nav']['total']; ?>"
                                                     WIDTH="24" HEIGHT="23" BORDER="0">
                                            </A>
                                        <?php } else { ?>
                                            <img src="/images/footer_images/next_gray.gif" alt="" width="24" height="23"
                                                 border="0">
                                        <?php } ?>
                                    </TD>
                                </TR>
                            </TABLE>
                        </TD>
                    <?php } else{ ?>
                        <TD HEIGHT="23" width="70" VALIGN="center">
                            <table width="70" height="23" bgcolor="#6666ff" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td align="left" colspan="2">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </TD>
                    <?php }?>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td width="116"></td>
        <td width="400" align="middle">
            <table border="0" width="400">
                <tbody>
                <tr>
                    <td align="middle">
                        <center>
                            <p style="margin: 0;">
                                <font face="Arial" size="-2">
                                    <nobr>Copyright D.S.Sewing 1999-
                                        <script type="text/javascript" async=""
                                                src="./index_files/analytics.js.завантаження"></script>
                                        <script type="text/javascript" async=""
                                                src="./index_files/js"></script>
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        2021. All rights reserved
                                    </nobr>
                                </font>
                            </p>
                        </center>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td width="58" align="middle"></td>
        <TD width="83" HEIGHT="27" VALIGN="middle" ALIGN="center">
            <?php if ( isset( $paginator['nav']['current'] ) ) { ?>
                <P>
                    <FONT FACE="arial" SIZE="-2" COLOR="6666ff">page <?php echo $paginator['nav']['current']; ?> of
                        <?php echo $paginator['nav']['total']; ?></FONT>
                </P>
            <?php } ?>
        </TD>
                </tr>
                </tbody>
            </table>

                <!-------------------- -->

    <script language="JavaScript">
        var images = new Array(8); // generate an array 8 deep, 2 wide
        var i = 0; // used for looping

        for (i = 0; i < images.length; i++) {
            images[i] = new Image;
            images[i].src = "/images/toolbar_images/tb_" + i + "_ro.gif"; // swapable gif
        }

        function swap_image(img, which) {
            var tmp = new Image;
            tmp.src = img.src;
            img.src = images[which].src;
            images[which].src = tmp.src;
        }
    </script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/analytics.php"; ?>