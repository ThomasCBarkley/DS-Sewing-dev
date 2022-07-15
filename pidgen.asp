<%@Language=VBScript%>

<%
Function E2Z(vStr)
	If vStr = "" Or Not IsNumeric(vStr) Then
		E2Z = 0
	Else
		E2Z = CCur(vStr)
	End If
End Function


if request.servervariables("REQUEST_METHOD")="POST" then

	vWidth = E2Z(Request("txtWidthFt")) + E2Z(Request("txtWidthIn"))/12
	vLength=  E2Z(Request("txtLenFt")) + E2Z(Request("txtLenIn"))/12
	vShape = E2Z(Request("txtShape"))


	If vShape = 2 Then
		vWidth = E2Z(Request("txtDiameterFt")) + E2Z(Request("txtDiameterIn"))/12
		vLength = vWidth
	End If

	if (vShape>0 and vWidth >0 and vLength>0)  Then

	Dim cnSQL
	Dim rsSQL
	Dim vWidth
	dim vLength


	Set cnSQL = Server.CreateObject("ADODB.Connection")
	cnSQL.ConnectionString = "DSN=DSSEWING;UID=sa;PWD=;"
	cnSQL.Open

	Set rsSQL = Server.CreateObject("ADODB.Recordset")
	
	rsSQL.Open "sp_Fabric_SizeToPid " & Request("txtFabric") & "," & vLength & "," & vWidth & ",'" & Request("txtColour") & "'," & vShape,cnSQL%>

	<html>
<head>
	<title>Your Custom Tarp Quote</title>
  <link rel="STYLESHEET" type="text/css" href="../styles/mainstyle.css">
  <!--#include virtual="/includes/analytics.html"-->
</head>

<body bgcolor="White">
	<center>
	<table width="750" height="75" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" valign="top">
				<table width="750" height="58" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="100" valign="bottom" align="center">
							<a href = "/"><img src="../images/minilogo.jpg" width="100" height="50" alt="" border="0"></a></td>
						<td width="650" align="center" valign="bottom">
							<img src="/images/standardheader.gif"></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td width="5" valign="top" align="left"><img src="../images/2x2black.jpg" width="2" height="17" alt="" border="0"></td>
			<td height="17" width="740" valign="bottom" align="center">
				<font size = "-1"><b><a href = "/">Home</a> <img src="../images/menubar.gif"> <a href = "../pvc_polyester">PVC Coated Polyester</a> <img src="../images/menubar.gif"> <a href = "../woven_polyethylene">Woven Polyethylene</a> <img src="../images/menubar.gif"> <a href = "../pvc_mesh">PVC Dipped Mesh</a> <img src="../images/menubar.gif"> <a href = "../shrink_wrap">Shrink Wrap</a> <img src="../images/menubar.gif"> <a href = "../accessories">Accessories</a>  <img src="../images/menubar.gif"> <a href = "../scripts/tinycartcandt.pl">Cart</a></b></font><br>
				<img src="../images/2x2black.jpg" width="746" height="2" alt="" border="0"></td>
			<td width="2" valign="top" align="right"><img src="../images/2x2black.jpg" width="2" height="17" alt="" border="0"></td>
		</tr>
	</table>
	<table width="750" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="2" valign="top" align="left"><img src="../images/2x2black.jpg" width="2" height="300" alt="" border="0"></td>
			<td width="5" valign="top" align="left">&nbsp;</td>
			<td width="738" valign="top" align="left">
				<br>
				<center><h3>Your Custom Quote</h3></center>
				
				<center>
			
				<table width = 550 bgcolor = "#ccffcc" cellpadding = 10 cellspacing = 0>
				<tr>
				<td bgcolor = silver align = center valign = middle height="30"><b>Description</b></td>
				<td bgcolor = silver align = center valign = middle height="30"><b>Price</b></td>
				<td bgcolor = silver align = center valign = middle height="30"><b>Buy</b></td>
				</tr>
				<tr>
				<td valign = middle align = left><font size = "-1"><%=rsSQL("Description")%></font></td>
				<td valign = middle align = left><font size = "-1"><%=FormatCurrency(rsSQL("Price"),2,True)%></font></td>
				<td valign = middle align = center><form action="../scripts/gob.pl" method="post"><input type="hidden" value="incart" name="action"><input type="hidden" value="<%=rsSQL("PID")%>" name="pid"><input type="submit" value="Buy!"></td></form>
				</tr>
				<tr>
					
				</tr>
				</table>

				</center>
					<table width = 100% height = 100% border = 0 cellpadding = 0 cellspacing = 0>
						<tr><td height = 100%>&nbsp;</td></tr>
						<tr><td valign = bottom align = center>
							<font size="-1">
							PHONE:1 800 789 8143     FAX: 203 467 5103<br>
							MAILING ADDRESS: P.O. Box 8983 New Haven Ct 06532<br>
							MANUFACTURING & SALES OFFICE: 39 Washington Ave., East Haven, CT. 06512
							</font>
							<hr width="75%"><font size="-1" color = "silver">&copy; Covers and Tarps 2001. All rights reserved.</font>
						</td></tr>
					</table>
				</td>
			<td width="5" valign="top" align="right"><img src="../images/2x2black.jpg" width="2" height="300" alt="" border="0"></td></tr>
		<tr><td colspan = "4" valign="bottom"><img src="../images/2x2black.jpg" width="750" height="2" alt="" border="0"></td></tr>
		<tr>
			<td width="2" valign="top" align="left"><img src="../images/2x2black.jpg" width="2" height="17" alt="" border="0"></td>
			<td colspan="2" height="17" valign="top" align="center"><font size = "-1"><b><a href = "../pages/orderinfo.html">Ordering Info</a> <img src="../images/menubar.gif"> <a href = "../pages/presletter.html">President's Letter</a> <img src="../images/menubar.gif"> <a href = "../pages/legal.html">Legal</a> <img src="../images/menubar.gif"> <a href = "../pages/links.html">Links</a> <img src="../images/menubar.gif"> <a href = "../pages/employment.html">Employment</a></b></font></td>
			<td width="5" valign="top" align="right"><img src="../images/2x2black.jpg" width="2" height="17" alt="" border="0"></td></tr>
		<tr><td colspan = "4" valign="top"><img src="../images/2x2black.jpg" width="750" height="2" alt="" border="0"></td></tr>
	</table>
</body>
</html>
	
	<%rsSQL.Close
	Set rsSQL = Nothing

	cnSQL.Close
	Set cnSQL = Nothing
			
	else
		response.write "<script language = 'javascript'>window.location.href = 'index.asp'</script>"
	end if
end if
%>
