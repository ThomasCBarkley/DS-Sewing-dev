<html lang="en">
<head>
	<?php
	$title       = "Bolt on Winches Winch Straps Winch Bars Plastic Corner Protectors";
	$keywords    = "D.S.Sewing,bolt on winch,standard winch bars,plastic corner protectors,tarp accessories,truck cover parts";
	$description = "Pictures a bolt-on winch, winch strap, a standard winch bar and plastic corner protectors.  Prices for each are shown.";
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

<CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>

    <img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0"
         alt="Truck Tarps and Accessories">

    <P>
    <H2>Winch Straps &amp; Accessories</H2></P>

    <table border="2" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <TR>
            <TD WIDTH="150" ALIGN="middle" ROWSPAN="2">
                <IMG SRC="/images/truck_images/winch.gif" border=1 ALT="winch" WIDTH="100" HEIGHT="78">
                <B><FONT face="verdana,arial,helvetica,sans-serif">Bolt-On Winch</FONT>
                    <FONT COLOR="#ff0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><BR>
                        only $<?php echo getPrice( "1062" ); ?> each</FONT></B>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1062" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
            </TD>
            <TD WIDTH="330" ALIGN="middle"><FONT face="verdana,arial,helvetica,sans-serif" SIZE="+1"><B>Winch
                        Straps-</B></FONT><BR>
                <IMG SRC="/images/truck_images/winchstrap.gif" border=1 ALT="winch strap" WIDTH="303"
                     HEIGHT="53"><BR>
                <FONT COLOR="#ff0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><B>only
                        $<?php echo getPrice( "1063" ); ?> each </B></FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1063" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
                <FONT COLOR="#ff0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><B>only
                        $<?php echo getPrice( "1064" ); ?> box </B></FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1064" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
            </TD>
            <TD WIDTH="127" ALIGN="middle" ROWSPAN="2"><FONT face="verdana,arial,helvetica,sans-serif"><B>Plastic
                        Corner Protectors-</B></FONT><IMG SRC="/images/truck_images/cornerprotecters.gif" border=1
                                                          ALT="corner protectors" WIDTH="100" HEIGHT="89"><BR>
                <FONT COLOR="#ff0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><B>only $
						<?php echo getPrice( "1065" ); ?> each</B></FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1065" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>

                <FONT face="verdana,arial,helvetica,sans-serif">
                    <IMG SRC="/images/truck_images/edgeprotector.jpg" border=1 ALT="edge protectors" width="130"
                         height="84"><BR>
                    <FONT COLOR="#ff0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><B>only $
							<?php echo getPrice( "1108" ); ?> each</B></FONT>
                    <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                        <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                        <INPUT TYPE="hidden" VALUE="1108" NAME="pid">
                        <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                    </FORM>
            </TD>
        </TR>
        <TR>
            <TD WIDTH="330" ALIGN="middle">
                <IMG SRC="/images/truck_images/winchbar.gif" border=1 ALT="winch bar" WIDTH="300" HEIGHT="21"><BR>
                <FONT face="verdana,arial,helvetica,sans-serif"><B>Standard Winch Bar- </FONT>
                <FONT SIZE="-1" COLOR="#ff0000">only $<?php echo getPrice( "1066" ); ?></FONT><BR> </B><FONT SIZE="-1">Chrome
                    plated for rust resistance and long life.</FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1066" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
            </TD>
        </TR>
    </TABLE>

	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
</CENTER>
</body>
</html>