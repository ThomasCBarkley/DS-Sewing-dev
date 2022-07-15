<%@Language=VBScript%>
  <HTML>

  <HEAD>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <TITLE>Truck Tarp Catalog Request</TITLE>
    <META NAME="robots" CONTENT="noindex,follow">
    <STYLE TYPE="text/css">
      <!--
      A {
        color: blue
      }

      a:hover {
        color: blue
      }

      a:visited {
        color: blue
      }

      a:visited:hover {
        color: red
      }
      -->
    </STYLE>
    <!--#include virtual="/includes/analytics.html"-->
  </HEAD>

  <BODY BGCOLOR="#ffffff">
    <CENTER>
      <!--#include virtual="/includes/toolbar.htm"-->
    </CENTER>
    <CENTER>
      <H2>Request A Catalog</H2>Please fill out the following
      information. We will rush a catalog to you as quickly as possible.
      <FORM ACTION="../cgi-bin/savecatalog.pl" METHOD="post">
        <INPUT TYPE="hidden" NAME="recipient" VALUE="dssewing@ds-sewing.com">
        <INPUT TYPE="hidden" NAME="required" VALUE="Name,Address1,City,State,Zip">
        <INPUT TYPE="hidden" NAME="redirect" VALUE="/thankyou.html">
        <INPUT TYPE="hidden" NAME="missing_fields_redirect" VALUE="/missingfield.html">
        <INPUT TYPE="hidden" NAME="subject" VALUE="Catalog Request">
        <INPUT TYPE="hidden" NAME="sort"
          VALUE="Name,Address1,Address2,City,State,Zip,Phone,email,searchengine,keygood,keybad">
        <TABLE BORDER="0" WIDTH="600px">
          <TR>
            <TD COLSPAN="2">
              <HR>
            </TD>
          </TR>
          <TR>
            <TD COLSPAN="2">
              <TABLE>
                <TR>
                  <TD><B>Please choose the catalog(s) you wish to receive.</B></TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Truck Tarp" VALUE="Catalog">Truck
                    Tarp English</TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Tough Tarp" VALUE="Catalog">Tough
                    Tarp</TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Dry-Dock Covers" VALUE="Catalog">Dry-Dock Covers</TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Banner Blanks" VALUE="Catalog">Truck Tarp Spanish</TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Inground Pool Covers" VALUE="Catalog">Inground Pool Covers</TD>
                  <TD> </TD>
                </TR>
                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Industrial Sewing & Heat Sealing" VALUE="Catalog">Industrial Sewing
                    &amp; Heat Sealing</TD>
                  <TD></TD>
                </TR>

                <TR>
                  <TD><INPUT TYPE="checkbox" NAME="Fabric Sample" VALUE="Catalog">Fabric
                    Sample</TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD>
                    <FONT COLOR="Red"><B>We can custom sew almost <U>anything</U>!</FONT> If you can't find what you are
                    looking for please enter a description. We'll contact you ASAP.</B>
                  </TD>
                  <TD><TEXTAREA cols=40 name=Comments rows=10></TEXTAREA></TD>
                </TR>

              </TABLE>
              <TABLE>

              </TABLE>
            </TD>
          </TR>
          <TR>
            <TD COLSPAN="2">
              <HR>
            </TD>
          </TR>
          <TR>
            <TD><B>Name</B></TD>
            <TD><INPUT SIZE="25" MAXLENGTH="40" NAME="Name">
              <FONT COLOR="blue">*</FONT>
            </TD>
          </TR>
          <TR>
            <TD><B>Address 1</B></TD>
            <TD><INPUT SIZE="25" MAXLENGTH="50" NAME="Address1">
              <FONT COLOR="blue">*</FONT>
            </TD>
          </TR>
          <TR>
            <TD><B>Address 2</B></TD>
            <TD><INPUT SIZE="25" MAXLENGTH="50" NAME="Address2"> </TD>
          </TR>
          <TR>
            <TD><B>City</B></TD>
            <TD><INPUT MAXLENGTH="30" NAME="City">
              <FONT COLOR="blue">*</FONT>
            </TD>
          </TR>
          <TR>
            <TD><B>State</B></TD>
            <TD><INPUT SIZE="2" MAXLENGTH="2" NAME="State">
              <FONT COLOR="blue">*</FONT>
            </TD>
          </TR>
          <TR>
            <TD><B>Zip</B></TD>
            <TD><INPUT SIZE="10" MAXLENGTH="10" NAME="Zip">
              <FONT COLOR="blue">*</FONT>
            </TD>
          </TR>
          <TR>
            <TD><B>Phone</B></TD>
            <TD><INPUT SIZE="11" MAXLENGTH="20" NAME="Phone"></TD>
          </TR>
          <TR>
            <TD><B>Email</B></TD>
            <TD><INPUT SIZE="35" MAXLENGTH="50" NAME="email"></TD>
          </TR>
          <TR>
            <TD><B>If you found us
                through a search engine <br> (
                excite,lycos,altavista etc )<br>please tell us
                which one</B></TD>
            <TD><INPUT SIZE="35" MAXLENGTH="50" NAME="searchengine" VALUE="<%=Left(Request.Cookies(" SRC"),35)%>"></TD>
          </TR>
          <TR>
            <TD><B>Which keywords did
                you use to find us</B></TD>
            <TD><INPUT SIZE="35" MAXLENGTH="50" NAME="keygood"></TD>
          </TR>
          <TR>
            <TD><B>Which keywords did
                not work to find us</B></TD>
            <TD><INPUT SIZE="35" MAXLENGTH="50" NAME="keybad"></TD>
          </TR>
          <TR>
            <TD COLSPAN="2">
              <HR>
            </TD>
          </TR>
          <TR>
            <TD ALIGN="middle" COLSPAN="2"><INPUT TYPE="submit" VALUE="Submit Request">
            </TD>
          </TR>
          <TR>
            <TD>
              <TABLE WIDTH="65" BORDER="6" BORDERCOLOR="#ffffff" BGCOLOR="#dcdcdc" CELLPADDING="6">

              </TABLE>
            </TD>
            <TD></TD>
          </TR>
        </TABLE>
        <TABLE>
          <TR>
            <TD>
              <P>
                <FONT SIZE="-1" FACE="Arial">Thank you very much for your interest,</FONT>
              </P>
              <P ALIGN="right"><IMG SRC="../images/signature.gif" WIDTH="250" HEIGHT="54" ALIGN="bottom"></P>
              <P ALIGN="right">
                <FONT SIZE="-1" FACE="Arial">David Steinhardt <BR>
                  President D.S. Sewing,
                  Inc</FONT>
              </P>
            </TD>
          </TR>
        </TABLE>
      </FORM>
    </CENTER>
    <CENTER>
      <!--#include virtual="/includes/information_footer.htm"-->
    </CENTER>
    </CENTER>
  </BODY>

  </HTML>