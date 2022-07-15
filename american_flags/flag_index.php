<html lang="en">

<head>
    <?php
    $title       = "D.S.Sewing Magnetic American Flags";
    $keywords    = "D.S.Sewing Magnetic American Flags";
    $description = "Magnetic American Flags";
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
	<P><B><H1><FONT FACE="verdana,arial,helvetica,sans-serif">Magnetic American Flags</FONT></H1></B></P>
	<BR><CENTER>
	<HR color="#99ccff" width="600"></CENTER><BR>
	<CENTER>
     <table border="0"  width="600" cellspacing="0" cellpadding="0"><Tr>
 <TD><CENTER>
	<P><FONT FACE="verdana,arial,helvetica,sans-serif" align="left"><B>&nbsp;&nbsp;&nbsp;Show your patriotism!...with our magnetic flag on the side of your vehicles door, or at home, even on your refrigerator. Guaranteed your'll love it. And your friends will be proud too!  <TD><B>Buy 100pc, Sell to your friends and neighbors as a fundraiser or donate to your local charity. 800 789-8143 for special pricing.<TD></B>
	</FONT></P></CENTER></TR></TD></table>
    </CENTER>
<BR>
    <CENTER>
     <table border="1" bordercolor="#99ccff" bgcolor="#ccffff" width="600" cellspacing="0" cellpadding="0"><Tr>
 <TD>
   <CENTER>
    <TABLE border="2" bordercolor="#99ccff" bgcolor="#ccffff" cellspacing="0" cellpadding="0" WIDTH="600">
      <TR>
       <TD>
       <TABLE BORDER="0">
              <TR>
                <TD ALIGN="CENTER" WIDTH="295">
                <P ALIGN="center"><FONT SIZE="-1" FACE="verdana,arial,helvetica,sans-serif"><U><B>Small Magnetic American Flag</B></U></FONT>
                </P></TD>
                <TD ALIGN="CENTER" WIDTH="136">
                
                <P ALIGN="center"><FONT SIZE="-1" FACE="verdana,arial,helvetica,sans-serif">$<?php echo getPrice(1116)?></FONT>
                </P></TD>
                <TD WIDTH="220">
                
                <P ALIGN="center"><FONT SIZE="-1" FACE="verdana,arial,helvetica,sans-serif"><U><B>6" Width X 4" Height</B></U></FONT>
                </P></TD>
              
              <FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
              <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
              <INPUT TYPE="HIDDEN" VALUE="1116" NAME="pid">
          
					<TD ALIGN="CENTER" WIDTH="125">
						<INPUT TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
					</TD>
              </TR>
              </FORM>   
                    <TR>
                <TD WIDTH="295">
                
                <P ALIGN="center"><FONT SIZE="-1" FACE="verdana,arial,helvetica,sans-serif"><U><B>Large Magnetic American Flag</B></U></FONT>
                </P></TD>
                <TD WIDTH="136">
                
                <P ALIGN="center"><FONT SIZE="-1" FACE="verdana,arial,helvetica,sans-serif">$<?php echo getPrice(1117)?></FONT>
                </P></TD>
                <TD WIDTH="225">
                
                <P ALIGN="center"><FONT SIZE="-1" FACE="verdana,arial,helvetica,sans-serif"><U><B>11" Width X 7" Height</B></U></FONT>
                </P></TD>
              
              <FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
              <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
              <INPUT TYPE="HIDDEN" VALUE="1117" NAME="pid">
          
					<TD ALIGN="CENTER" WIDTH="125">
					<INPUT TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
					</TD>
                </TR>
        </TABLE> 
        
         <CENTER>
     <table border="1" bordercolor="#99ccff" bgcolor="#ccffff" width="600" height="100%" cellspacing="0" cellpadding="0"><Tr>
 <TD>
 <BR><BR><P></P><center>
 <img src="american_flag_sm.gif" border="0" width="287" height="200"></center>
 <P></P>
 </TD></TR><TR>
 <TD><BR><BR>
 <center>
 <img src="american_flag_big.gif" border="0" width="574" height="400"></center><P></P>
 </TD>
      </TR>
    </TABLE> 
        </TD>
      </TR>
    </TABLE> 
        
    </TABLE> </CENTER><br>
<CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?></CENTER>
  </BODY>
</HTML>
