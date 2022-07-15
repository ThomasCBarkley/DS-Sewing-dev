<html lang="en">

<head>
  <?php
$title = "Tough Tarps Sizes and Prices";
$keywords = "";
$description = "Sizes and pricing information of Tough Tarps manufactured by D.S. Sewing ";
$robots = "noindex,follow";

$paginator = [
  'page' => [
    'image' => '/images/footer_images/tough_footer.gif',
    'link' => '/tough/toughtarps.php',
    'alt' => 'click to return to Tough-Tarps Index Page'
  ],
  'nav' => [
    'previous' => '/tough/toughtarps2.php',
    'next' => '/tough/toughtarps4.php',
    'current'=>'3', 
    'total'=>'4'
  ]  
];

?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php"; ?>
</head>

<body>
  <DIV ALIGN="center">
    <CENTER>
      <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?>
    </CENTER>
  </DIV>
  <DIV ALIGN="center">
    <CENTER>
      <IMG SRC="/images/tough_images/tough_page_header.gif" ALT="Tough-Tarps" WIDTH="159" HEIGHT="23">
    </CENTER>
    <table width=650 height=5 border=1 bordercolor="#ffcc66" cellpadding=0 cellspacing=0 bgcolor="#ffcc66">
      <TR>
        <TD>
        </TD>
      </TR>
    </table>
    <P ALIGN="center">
      <FONT SIZE="-1" FACE="Arial">
        <B>Gain New Customers</B>
        <STRONG>This field proven Tough-Tarp helps you comply with govenment enviromental regulations.
        </STRONG>
      </FONT>
    </P>
    <CENTER>
      <TABLE BORDER="0" WIDTH="400">
        <TR>
          <TD WIDTH="275">
            <P ALIGN="left">
              <FONT FACE="Arial"><B>Tough-Tarps</B>
              </FONT>
            </P>
          </TD>
          <TD WIDTH="75">
          </TD>
        </TR>
      </TABLE>
      <TABLE width=600>
        <TBODY>
          <TR>
            <TD align=middle width=245>
              <P align=left>
                <FONT face=Arial size=-1>75' x 20'(tractor trailer)
                </FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1018A");?></FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>220 lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action=/s/incart id=form1 method=post name=form1>
                <INPUT name=action type=hidden value=incart>
                <INPUT name=pid type=hidden value=1018>
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value=Buy>
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      <TABLE border=0 width=600>
        <TBODY>
          <TR>
            <TD align=middle width=250>
              <P align=left>
                <FONT face=Arial size=-1>50' x 20' (buses, trucks &amp; vans)</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1019A");?></FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>145lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action="/s/incart" id="form1" method="post" name="form1">
                <INPUT name="action" type="hidden" value="incart">
                <INPUT name="pid" type="hidden" value="1019">
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value="Buy">
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      <TABLE border=0 width=600>
        <TBODY>
          <TR>
            <TD align=middle width=250>
              <P align=left>
                <FONT face=Arial size=-1>30' x 20' (cars and service trucks)</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1020A");?></FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>90lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action=/s/incart id=form1 method=post name=form1>
                <INPUT name=action type=hidden value=incart>
                <INPUT name=pid type=hidden value=1020>
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value=Buy>
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      <TABLE BORDER="0" WIDTH="400">
        <TR>
          <TD WIDTH="275">
            <P ALIGN="left">
              <FONT face=Arial><B>Optional Bottom Tough-Tarps</B></FONT>
            </P>
          </TD>
        </TR>
      </TABLE>
      <TABLE border=0 width=600>
        <TBODY>
          <TR>
            <TD align=middle width=250>
              <P align=left>
                <FONT face=Arial size=-1>75' x 10' (tractor trailer)</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1021A");?></FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>118lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action=/s/incart id=form1 method=post name=form1>
                <INPUT name=action type=hidden value=incart>
                <INPUT name=pid type=hidden value=1021>
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value=Buy>
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      <TABLE border=0 width=600>
        <TBODY>
          <TR>
            <TD align=middle width=250>
              <P align=left>
                <FONT face=Arial size=-1>50' x 10' (buses, trucks and vans)</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1022A");?></FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>78lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action=/s/incart id=form1 method=post name=form1>
                <INPUT name=action type=hidden value=incart>
                <INPUT name=pid type=hidden value=1022>
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value=Buy>
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      <TABLE border=0 width=600>
        <TBODY>
          <TR>
            <TD align=middle width=250>
              <P align=left>
                <FONT face=Arial size=-1>30' x 10' (cars &amp; service trucks)</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1023A");?></FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>48lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action=/s/incart id=form1 method=post name=form1>
                <INPUT name=action type=hidden value=incart>
                <INPUT name=pid type=hidden value=1023>
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value=Buy>
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      <TABLE border=0 width=600>
        <TBODY>
          <TR>
            <TD align=middle width=230>
              <FONT face=Arial size=-1>
                <P align=left>
                  <FONT face=Arial size=-1>Drive on End Piece(four recommended)</FONT>
                </P>
              </FONT>
            </TD>
            <TD align=middle width=70>
              <P align=left>
                <FONT face=Arial size=-1>$<?php echo getPrice("1024A");?> ea</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <P align=left>
                <FONT face=Arial size=-1>25 lbs</FONT>
              </P>
            </TD>
            <TD align=middle width=50>
              <FORM action=/s/incart id=form1 method=post name=form1>
                <INPUT name=action type=hidden value=incart>
                <INPUT name=pid type=hidden value=1024>
            <TD align=middle width=50>
              <SELECT name=colour>
                <OPTION value=A>RED
                <OPTION selected value=B>BLUE
                <OPTION value=C>BLACK
                <OPTION value=D>GREEN
                <OPTION value=E>YELLOW
                <OPTION value=F>GREY
                </OPTION>
              </SELECT>
            </TD>
            <TD align=middle width=50>
              <INPUT id=SUBMIT1 name=SUBMIT1 type=submit value=Buy>
            </TD>
          </TR>
          </FORM>
        </TBODY>
      </TABLE>
      </TABLE>
      </TD>
      </TR>
      </TABLE>
    </CENTER>
    <BR><BR>
    <DIV ALIGN="center">
      <CENTER>
        <TABLE BORDER="0" WIDTH="400" HEIGHT="1" CELLSPACING="0" CELLPADDING="0">
          <TR>
            <TD WIDTH="100%" HEIGHT="1">
              <P align=left>
                <FONT SIZE="+1" FACE="Arial"><B><I>1-800-789-8143</I></B></FONT>
                <FONT FACE="Arial"><BR>
                  <FONT SIZE="3">1-203-773-1344<BR> </FONT>
                </FONT>
                <FONT face=Arial>
                  <FONT size=3> <B>Fax:</B>1-203-773-1778</FONT>
              </P>
              <P ALIGN="left">
                <FONT SIZE="-1" FACE="Arial">
                  <B>Mailing Address:</B>P.O. Box 8983, New Haven CT 06532<BR>
                  <B>Shipping Address:</B>
                  260 Wolcott St., New Haven, CT 06513
                </FONT>
              </P>
              </FONT>
            </TD>
          </TR>
        </TABLE>

    </DIV>
    </CENTER>

  </DIV>
  <CENTER>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
  </CENTER>
</BODY>

</HTML>