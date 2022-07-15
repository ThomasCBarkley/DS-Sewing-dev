<html>
<head>
  <title>Custom Price Generator</title>
  <!--#include virtual="/includes/analytics.html"-->
</head>

<body bgcolor="White">
	<CENTER>
	<!--#include virtual="/includes/toolbar.htm"--></center>
	<form method="post" action="pidgen.asp">
	<CENTER>
	<table width="750" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="2" valign="top" align="left"><img src="../images/2x2black.jpg" width="2" height="550" alt="" border="0"></td>
			<td width="5" valign="top" align="left">&nbsp;</td>
			<td width="738" valign="top" align="left">
				<br>
				<center><h3>Custom Price Generator</h3></center>

				<center>

				<table width=300 border=0 cellpadding=0 cellspacing=0 bgcolor="#ffcc66">
					<tr><td colspan=2 height=0 bgcolor=silver align=center valign=middle><b>Rectangle/Square</b></td></tr>
					<tr><td height=10 colspan=2>&nbsp;</td></tr>
					<tr><td width=30% align=right valign=middle>Length:</td><td align = left valign = middle><input name="txtLenFt" size="4" maxlength="4"> feet, <input name="txtLenIn" size="4" maxlength="4" value="0"> inches.<br></td></tr>
					<tr><td align=right valign=middle>Width:</td><td align=left valign=middle><input name="txtWidthFt" size="4" maxlength="4"> feet, <input name="txtWidthIn" size="4" maxlength="4" value="0"> inches.<br></td></tr>
					<tr><td align=right valign=middle>Material:</td><td align=left valign=middle><select name="txtFabric"><option value="1">6.5oz Vinyl Coated Mesh<option value="2">18oz PVC Coated Polyester<option value="3">22oz PVC Coated Polyester<option value="4">14oz PVC Coated Polyester</select><br></td></tr>
					<tr><td align=right valign=middle>Color:</td><td align=left valign=middle><select name="txtColour"><option value="A">Red<option value="B">Blue<option value="C">Black<option value="D">Green<option value="E">Yellow<option value="F">Grey</select><br><input type="hidden" name="txtShape" value="1"></td></tr>
					<tr><td align=middle valign=middle colspan=2><hr><input type="submit" value="Get price!"></form></td></tr>
				</table>

				<table width=300 border=0 cellpadding=0 cellspacing=0 bgcolor="#ffcc66">
					<tr><td colspan=2 height=30 bgcolor=silver align=center valign=middle><b>Circle</b></td></tr>
					<tr><td height=10 colspan=2>&nbsp;</td></tr>
					<tr><td width=30% align=right valign= middle><form method="post" action="pidgen.asp">Diameter:</td><td align = left valign = middle><input name="txtDiameterFt" size="4" maxlength="4"> feet, <input name="txtDiameterIn" size="4" maxlength="4"> inches.<br></td></tr>
					<tr><td align=right valign=middle>Material:</td><td align=left valign=middle><select name="txtFabric"><option value="1">6.5oz Vinyl Coated Mesh<option value="2">18oz PVC Coated Polyester<option value="3">22oz PVC Coated Polyester<option value="4">14oz PVC Coated Polyester</select><br></td></tr>
					<tr><td align=right valign=middle>Color:</td><td align=left valign=middle><select name="txtColour"><option value="A">Red<option value="B">Blue<option value="C">Black<option value="D">Green<option value="E">Yellow<option value="F">Grey</select><br><input type="hidden" name="txtShape" value="2"></td></tr>
					<tr><td align=middle valign=middle colspan=2><hr><input type="submit" value="Get price!"></td></tr>
				</table>
			</td>
		</tr>
	</table>
	</center>
	</form>
</body>
</html>
