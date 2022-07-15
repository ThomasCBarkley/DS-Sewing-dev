<html lang="en">
<head>
	<?php
	$title       = "Rubber Straps,Chains,truck tarp repair kits,rubber tie downs,tie down assemblies ratchet straps";
	$keywords    = "D.S.Sewing,Rubber Straps,Chains,Tough tarp repair kit,rubber tie downs,tie down assemblies";
	$description = "Pictures rubber straps, tough tarp repair kits, tie down assemblies and tells of tarp repair service (minor repairs, same day service. large rips or alterations 1-2 days and their prices";
	$paginator   = [
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

    <IMG border="0" height=33 src="/images/truck_images/truck_header.gif" width="164" alt="Truck Tarps and Accessories">

    <p><h2>Tarp Accessories</h2></P>

    <table border="2" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0">
        <TR>
            <TD ALIGN="middle" WIDTH="150"><FONT SIZE="+1">
                    <B>Rubber Straps</B>
                </FONT><BR><BR>
                <IMG alt="rubber strap" border=1 height=53 src="/images/truck_images/rubberstrap.gif" width=100><BR>
                <BR>
                <FONT SIZE="-1">Beware of cheap imitations, ours are the highest quality. </FONT>
                <BR>
                <FONT SIZE="-1">(Boxes of 50)</FONT>
                <BR>
                <FONT COLOR="#ff0000" SIZE="-1">
                    <B>21" only $<?php echo getPrice( '1057' ); ?>/box</B>
                </FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1057" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
                <FONT COLOR="#ff0000" SIZE="-1">
                    <B>31" only $<?php echo getPrice( '1058' ); ?>/box</B>
                </FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1058" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
            </TD>
            <TD ALIGN="middle" WIDTH="150">
                <B>
                    <FONT SIZE="+1"><I>Tough-Tarp</I></FONT>Repair Kits</B></FONT><BR>
                <IMG alt="tarp repair kit" border=1 height=67 src="/images/truck_images/repairkits.gif"
                     width=100><BR>
                <FONT COLOR="#ff0000" SIZE="-1">
                    <B>only $<?php echo getPrice( '1059' ); ?> each</B></FONT>
                <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                    <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                    <INPUT TYPE="hidden" VALUE="1059" NAME="pid">
                    <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                </FORM>
                <FONT face="Times New Roman">Save costly damage to your valuable load and tarp. Fix tears and rips when
                    and where they happen.</FONT><BR><BR><BR><BR><BR>
            </TD>
            <TD ALIGN="middle" WIDTH="150"><B>
                    <FONT SIZE="+1">Tarp Repair Service</FONT>
                    <FONT SIZE="-1"><BR> <BR> Minor repairs- </FONT><BR>
                    <FONT SIZE="-1">same day service!<BR> </FONT></B><BR>
                <FONT SIZE="-1">Large rips or alterations- only one or two days.</FONT><BR> <BR>
                <FONT COLOR="#ff0000" SIZE="-1" face="verdana,arial,helvetica,sans-serif"><B>
                        <FONT face="Times New Roman">only $50.00 per hour plus materials</FONT>
                    </B></FONT><BR><BR><BR><BR><BR><BR><BR>
            </TD>
            <TD ALIGN="middle" WIDTH="150">
                <TABLE WIDTH="50%">
                    <TR>
                        <TD WIDTH="53" HEIGHT="150">
                            <IMG alt="tie down assembly" border=1 height=200
                                 src="/images/truck_images/tiedownassembly.gif" width=33>
                        </TD>
                        <TD WIDTH="115"><FONT SIZE="-1">
                                <B>Tie Down Assemblies</B></FONT>
                            <BR>2" Ratchet Strap Assembled with a wide handle ratchet, flat hook and tear resistant
                            webbing.</FONT><BR>
                            <FONT COLOR="#ff0000" SIZE="-1"><B>only $<?php echo getPrice( '1061' ); ?> each</B></FONT>
                            <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                                <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                                <INPUT TYPE="hidden" VALUE="1061" NAME="pid">
                                <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                            </FORM>
                            <BR>
                            <FONT COLOR="#ff0000" SIZE="-1">
                                <B>or $<?php echo getPrice( '1060' ); ?> for box of 10</B></FONT>
                            <FORM ACTION="/s/incart" METHOD="post" id=form1 name=form1>
                                <INPUT TYPE="hidden" VALUE="incart" NAME="action">
                                <INPUT TYPE="hidden" VALUE="1060" NAME="pid">
                                <INPUT TYPE="submit" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
                            </FORM>
                        </TD>
                    </TR>
                </TABLE>
            </TD>
        </TR>
    </table>
	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>

</CENTER>
</BODY>
</HTML>
