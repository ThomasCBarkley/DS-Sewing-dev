<%@Language=VBScript%>

<%
Option  Explicit

Dim cnSQL, rsSQL, vWidth, vHeight, vLength, vShape, sSQL

%>

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
	vHeight = E2Z(Request("txtHeightFt")) + E2Z(Request("txtHeightIn"))/12
	vShape = E2Z(Request("txtShape"))

	If vShape = 2 Or vShape = 4 Then
		vWidth = E2Z(Request("txtDiameterFt")) + E2Z(Request("txtDiameterIn"))/12
		vLength = vWidth
	End If

	if (vShape>0 and vWidth >0 and vLength>0)  Then


	Set cnSQL = Server.CreateObject("ADODB.Connection")
	'cnSQL.ConnectionString = "DSN=dssewing;UID=dssewing_www_service;PWD=!g0ttal3arnt0s3w;"
	cnSQL.ConnectionString="Driver={SQL Server};" & "Server=localhost;" & "Database=dssewing;" & "Uid=dssewing_www_service;" & "Pwd=!g0ttal3arnt0s3w;" 
	cnSQL.Open

	Set rsSQL = Server.CreateObject("ADODB.Recordset")
	sSQL = "sp_Fabric_SizeToPid2 " & Request("txtFabric") & "," & vLength & "," & vWidth & "," & vHeight & ",'" & Request("txtColour") & "'," & vShape
	rsSQL.Open sSQL,cnSQL

%>
	<html>
<head>
	<title>Your Custom Tarp Quote</title>
  <!--<link rel="STYLESHEET" type="text/css" href="../styles/mainstyle.css">-->
  <!--#include virtual="/includes/analytics.html"-->
</head>

<body bgcolor="White">
	<center><!--#include virtual="/includes/toolbar.htm"--></center>
	<center>
	<table width="750" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="2" valign="top" align="left"><img src="../images/2x2black.jpg" width="2" height="300" alt="" border="0"></td>
			<td width="5" valign="top" align="left">&nbsp;</td>
			<td width="738" valign="top" align="left">
				<br>
				<center><h3>Your Custom Quote</h3></center>

				<center>

				<table width = 550 bgcolor = "#ffcc66" cellpadding = 10 cellspacing = 0>
				<tr>
				<td bgcolor = silver align = center valign = middle height="30"><b>Description</b></td>
				<td bgcolor = silver align = center valign = middle height="30"><b>Price</b></td>
				<td bgcolor = silver align = center valign = middle height="30"><b>Buy</b></td>
				</tr>
				<tr>
				<td valign = middle align = left><font size = "-1"><%=rsSQL("Description")%></font></td>
				<td valign = middle align = left><font size = "-1"><%=FormatCurrency(rsSQL("Price"),2,True)%></font></td>
				<td valign = middle align = center><form action="/s/incart" method="post"><input type="hidden" value="incart" name="action"><input type="hidden" value="<%=rsSQL("PID")%>" name="pid"><input type="submit" value="Buy!"></td>
				</tr>
				</table>
				</center>
			</td>
		</tr>
	</table>
</body>
</html>

	<%rsSQL.Close
	Set rsSQL = Nothing

	cnSQL.Close
	Set cnSQL = Nothing

	else
		'response.write ("Nope")
		'Response.write vShape
		'Response.write vWidth
		'Response.write vLength
		response.write "<script language = 'javascript'>window.location.href = 'index.html'</script>"
	end if
end if
%>
