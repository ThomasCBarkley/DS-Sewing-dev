<html lang="en">

<head>
  <?php
$title = "Industrial Sewing and Heat Sealing";
$description = "D.S. Sewing makes custom repairs. We repaired UV damage on Jump Zone's";
$robots = "index,follow";

$paginator = [
  'page' => [
    'image' => '/images/footer_images/industrial_footer.gif',
    'link' => '/custom/custom.php',
    'alt' => 'click to return To Boat Covers index'
  ],
  'nav' => [
    'previous' => '/custom/custom3.php',
    'next' => '/custom/custom5.php',
    'current'=>'4', 
    'total'=>'14'
  ]
];

?>
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
</head>

<body>

  <DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
  </DIV>
  <center><img src="/images/custom_images/industrial_header.gif" width="164" height="33" border="0"></center>
  <center>
    <table width=650 height=5 border=1 bordercolor="#ffcc66" cellpadding=0 cellspacing=0 bgcolor="#ffcc66">
      <TR>
        <TD>
        </TD>
      </TR>
    </TABLE>
  </CENTER>
  <DIV ALIGN="center">
    <CENTER>
      <TABLE WIDTH="650">
        <TR>
          <TD ALIGN="middle">
            <P ALIGN="center"><BR><B>
                <FONT SIZE="+2" FACE="Arial" COLOR="#0000af">CUSTOM REPAIRS</FONT>
              </B></P>
            <DIV ALIGN="center">
              <CENTER>&nbsp; </CENTER>
            </DIV>
            <TABLE WIDTH="650">
              <TR>
                <TD ALIGN="middle"><IMG SRC="/images/custom_images/moonwalkvertical.jpg"
                    ALT="Fixing sun damage to the Star Walk with vinyl paint" BORDER="2" WIDTH="176" HEIGHT="236"></TD>
                <TD>
                  <DIV ALIGN="center">
                    <CENTER>
                      <TABLE WIDTH="200">
                        <TR>
                          <TD><IMG SRC="/images/custom_images/starwalk2.jpg" ALT="Fixing sun damage with vinyl paint"
                              BORDER="2" WIDTH="200" HEIGHT="136"></TD>
                        </TR>
                        <TR>
                          <TD>
                            <P ALIGN="center">
                              <FONT FACE="Arial" SIZE="-1"><BR> D.S. Sewing makes custom repairs. We repaired UV damage
                                on JumpZone's &quot;StarWalk.&quot;</FONT>
                            </P>
                          </TD>
                        </TR>
                      </TABLE>
                    </CENTER>
                  </DIV>
                </TD>
              </TR>
            </TABLE>
          </TD>
        </TR>
      </TABLE>

      <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
    </CENTER>
  </DIV>
</BODY>

</HTML>