<html lang="en">
<head>
	<?php
	$title       = "D.S. Sewing Chain and Accessories";
	$keywords    = "Merritt Semi Truck Aluminum Headache Racks, Cab Guards, Mounting Kits";
	$description = "Chain & grab hooks, lever action chain binder, ratchet action chain binder, stencil kit 1 (includes computer print out and spray ink (letters up to 23' tall) and stencil kit 2 (includes 6\" stencil & spray ink)";
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

<center>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>

    <img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0" alt="Truck Tarps and Accessories">
    <P><B><H2><FONT face="verdana,arial,helvetica,sans-serif">Chains &amp; Accessories</FONT></B></H2></P>

    <table border="2" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <TR>
            <TD ALIGN="CENTER" WIDTH="150" ROWSPAN="2"><BR><FONT face="verdana,arial,helvetica,sans-serif">
                    <FONT SIZE="+1"><B>Chain &amp; Grab Hooks</B></FONT>
                    <BR><BR><BR>
                    <IMG SRC="/images/truck_images/chain.gif" border=1 ALT="chain" WIDTH="100" HEIGHT="65"><BR>
                    <FONT SIZE="-1">Heavy Duty Grade 70 5/16 inch</FONT><BR> </FONT>
                <FONT COLOR="#FF0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif">
                    <B>only $<?php echo getPrice( "1052" ); ?> for 20 feet w/ grab hook</B></FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1052" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
                <IMG SRC="/images/truck_images/grabhook.gif" border=1 ALT="grab hook" WIDTH="100" HEIGHT="98">
            </TD>
            <TD ALIGN="CENTER" WIDTH="150" ROWSPAN="2"><FONT face="verdana,arial,helvetica,sans-serif">
                    <FONT SIZE="+1"><B>Lever Type<BR> Chain Binder</B></FONT><BR><BR><BR>
                    <IMG SRC="/images/truck_images/leverbinder.gif" border=1 ALT="lever type chain binder" WIDTH="100"
                         HEIGHT="66">
                    <BR>
                </FONT>
                <FONT COLOR="#FF0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><BR><B>only
                        $<?php echo getPrice( "1053" ); ?> each</B></FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1053" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
                <FONT COLOR="#000000" SIZE="-1" face="verdana,arial,helvetica,sans-serif">For 3/8&quot; chain with
                    breaking strenght of 21,600 pounds</FONT>
                <BR><BR> <BR><BR></TD>
            <TD ALIGN="CENTER" WIDTH="150" ROWSPAN="2"><FONT face="verdana,arial,helvetica,sans-serif">
                    <FONT SIZE="+1"><B>Ratchet Action Chain Binder<BR>

                        </B></FONT><BR> <IMG SRC="/images/truck_images/ratchetbinder.gif" border=1
                                             ALT="ratchet type chain binder" WIDTH="100" HEIGHT="63"><BR>

                    <FONT COLOR="#FF0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><B><BR>
                            <BR> only $<?php echo getPrice( "1054" ); ?> each</B></FONT>
                    <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                        <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                        <INPUT TYPE="hidden" VALUE="1054" NAME="pid">
                        <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                    </FORM>

                    <FONT face="verdana,arial,helvetica,sans-serif" SIZE="-1">For 3/8&quot; chain. Push-pull operation
                        for easy one man use.</FONT>
                    <BR><BR><BR>

                    <BR></TD>
            <TD ALIGN="CENTER" WIDTH="150" valign="top">
                <FONT face="verdana,arial,helvetica,sans-serif"><B>
                        <FONT SIZE="+1">Stencil Kit 1</FONT></B><BR>
                    <FONT SIZE="-1">Includes 6" stencil &amp;Spray Ink</FONT><BR></FONT>
                <TABLE WIDTH="100%" BORDER="0">
                    <TR>
                        <TD>
                            <FONT face="verdana,arial,helvetica,sans-serif">
                                <FONT SIZE="-1"></FONT><BR> </FONT>
                            <HR>
                            <FONT face="verdana,arial,helvetica,sans-serif" SIZE="-1">Ordinary spray paint will not
                                work</FONT></TD>
                        <TD>
                            <IMG SRC="/images/truck_images/stencil_kit_1.gif" border=1
                                 ALT="Spray Ink and Computer Print Out" WIDTH="81" HEIGHT="82"></TD>
                    </TR>
                </TABLE>
                <B><FONT face="verdana,arial,helvetica,sans-serif" COLOR="#FF0000" SIZE="-1">only
                        $<?php echo getPrice( "1056" ); ?></FONT></B>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1055" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
            </TD>
        </TR>
    </table>
    <br><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?></CENTER>
</BODY>
</HTML>