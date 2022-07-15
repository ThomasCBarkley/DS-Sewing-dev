<html lang="en">

<head>
    <?php
    $title       = "D.S.Sewing Truck Tarps - Mechanical Arm Tarps";
    $keywords    = "D.S.Sewing,Machine Tarps,Mechanical Arm tarps,18 ounce vinyl-coated polyester";
    $description = "The roll off container mechanical-arm tarp is made of mesh or solid 18-ounce vinyl-coated polyester both are with reinforced webbing.  Standard sizes are 28' x 8' and 26' x 6'.";
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
  <CENTER>

<!--#include virtual="/includes/toolbar.htm"-->
	<center><img src="/images/truck_images/truck_header.gif" width="164" height="33" border="0" alt="Truck Tarps and Accessories">
	<P><B><H2><FONT face="verdana,arial,helvetica,sans-serif">Roll-Off Container Mechanical Arm Tarp</FONT></H2></B></P>
    </CENTER>

    <CENTER>
     <table border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" width="600" cellspacing="0" cellpadding="0"><Tr>
 <TD>
   <CENTER>
    <TABLE border="1" bordercolor="#ffcc66" bgcolor="#ffffcc" cellspacing="0" cellpadding="0" WIDTH="600">
      <TR>
       <TD ALIGN="CENTER" WIDTH="220"><BR><BR><IMG SRC=" /images/truck_images/mechanicalarmphoto.gif" 
          ALT="moving floor tarp photo" border=1 WIDTH="200" HEIGHT="150" ALIGN="bottom"><BR><BR>
            <IMG SRC="/images/truck_images/mechanicalarmdiagram.gif" border=1
             ALT="moving floor tarp diagram" WIDTH="150" HEIGHT="200" ALIGN="bottom"><BR><BR>
       </TD>
       
       
       <TD ALIGN="CENTER" WIDTH="380">
            <P ALIGN="center"><FONT FACE="Arial"><B>Standard Prices and
              Weights</B></FONT></P>
           <CENTER><TABLE BORDER="0">
              <TR>
                <TD ALIGN="center" WIDTH="55">
                <P><FONT SIZE="-1" FACE="Arial">Solid</FONT></P></TD>
                <TD ALIGN="center" WIDTH="55">
                <P><FONT SIZE="-1" FACE="Arial">28' x 8'</FONT></P></TD>
                <TD ALIGN="center" WIDTH="66">
                <P><FONT SIZE="-1" FACE="Arial">$<?php echo getPrice("1037A")?></FONT></P></TD>
                <TD WIDTH="74">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">35 lbs.</FONT>
                </P></TD>
                <FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
              <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
              <INPUT TYPE="HIDDEN" VALUE="1037" NAME="pid">
          <TD>
					<SELECT NAME="colour">
						<OPTION VALUE="A">RED
						<OPTION SELECTED VALUE="B">BLUE
						<OPTION VALUE="C">BLACK
						<OPTION VALUE="D">GREEN
						<OPTION VALUE="E">YELLOW
						<OPTION VALUE="F">GREY
					</SELECT>
					</TD>
					<TD ALIGN="CENTER" WIDTH="55">
						<INPUT TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>

				</TD>
              </TR>
              </FORM> 
              </TR>
              <TR>
                <TD WIDTH="55" HEIGHT="53">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">Mesh</FONT>
                </P></TD>
                <TD WIDTH="66" HEIGHT="53">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">26' x 8'</FONT>
                </P></TD>
                <TD WIDTH="74" HEIGHT="53">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">$<?php echo getPrice(1038)?></FONT>
                </P></TD>
                <TD WIDTH="74" HEIGHT="53">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">13 lbs</FONT>
                </P></TD><FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
              <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
              <INPUT TYPE="HIDDEN" VALUE="1038" NAME="pid">
              <TD ALIGN="CENTER" WIDTH="55">
						<INPUT TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
					</TD>
              </TR>
              </FORM> 
              </TR>
              <TR>
                <TD WIDTH="55">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">Mesh</FONT>
                </P></TD>
                <TD WIDTH="66">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">28' x 8'</FONT>
                </P></TD>
                <TD WIDTH="74">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">$<?php echo getPrice(1039)?></FONT>
                </P></TD>
                <TD WIDTH="74">
                <P ALIGN="center"><FONT SIZE="-1" FACE="Arial">15 lbs.</FONT>
                </P></TD>
                <FORM ACTION="/s/incart" METHOD="POST" id=form1 name=form1>
              <INPUT TYPE="HIDDEN" VALUE="incart" NAME="action">
              <INPUT TYPE="HIDDEN" VALUE="1039" NAME="pid">
              <TD ALIGN="CENTER" WIDTH="55">
						<INPUT TYPE="SUBMIT" VALUE="Buy" id=SUBMIT1 name=SUBMIT1>
					</TD>
              </TR>
              </FORM> 
              </TR>
            </TABLE>
            <P><FONT SIZE="-1" FACE="Arial">Solid tarps are made from 18 ounce
              vinyl-coated polyester</FONT></P></CENTER></TD>
          </TR>
        </TABLE> </TD>
      </TR>
    </TABLE></center></TD>
      </TR>
    </TABLE></center><br>
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?></CENTER>
  </BODY>
</HTML>