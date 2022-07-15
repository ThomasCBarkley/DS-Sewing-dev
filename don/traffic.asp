<%@Language="VBscript"%>
<%
Server.ScriptTimeout = 600
%>
<html>
<head>
  <title>Traffic Report</title>
  <!--#include virtual="/includes/analytics.html"-->
</head>
<body>
<form action="traffic.asp" method="post">
<select name="txtAffID">
<%
Dim cnSQL
Dim rsSQL

	Set cnSQL = Server.CreateObject("ADODB.Connection")
	cnSQL.ConnectionString="DSN=DSSewing;UID=sa;PWD=;"
	cnSQL.CommandTimeout = 600
	cnSQL.Open

	Set rsSQL = Server.CreateObject("ADODB.Recordset")
	rsSQL.Open "SELECT * FROM AffiliateData",cnSQL

	Do While Not rsSQL.EOF%>
		<option value="<%=rsSQL("id")%>"><%=rsSQL("CompanyName") & " - " & rsSQL("ImageLink")%>
		<%rsSQL.MoveNext
	Loop
	rsSQL.Close
	%>
<input type="submit" value="click">
</form>


<%If Request.ServerVariables("REQUEST_METHOD")="POST" Then
	' Wasted Operation :)
	rsSQL.Open "select * from affiliatedata where id = " & Request("txtAffID")
	vCName = rsSQL("CompanyName")
	rsSQL.Close

	' Show rolled up trash
	rsSQL.Open "select * from tblAdMonthRollup where afid = " & Request("txtAffID")  & " order by rollupdate"

	'AFID        RollupDate                  Impressions ClickThru   Visitors
	%>
	<table border="1" width="400px">
	<tr><th>Month</th><th>Impressions</th><th>Clicks</th><th>Visitors</th><th>%</th></tr>
	<%Do While rsSQL.EOF = False%>
	<tr>
		<td><%=rsSQL("RollupDate")%></td>
		<td><%=rsSQL("Impressions")%></td>
		<td><%=rsSQL("Clickthru")%></td>
		<td><%=rsSQL("Visitors")%></td>
		<td><%=FormatPercent(rsSQL("Clickthru")/rsSQL("Impressions"),2,True)%>
	</tr>
	<%rsSQL.MoveNext
	Loop

	rsSQL.Close


	' Get Data
	rsSQL.Open "sp_Traffic_ImpByID " & Request("txtAffID"),cnSQL
	vImpressions = rsSQL("Impressions")
	rsSQL.Close
	rsSQL.Open "sp_Traffic_ClickThruByID " & Request("txtAffID"),cnSQL
	vClicks = rsSQL("Clicks")
	rsSQL.Close
	rsSQL.Open "sp_Traffic_MagicalVisitorsByID " & Request("txtAffID"),cnSQL
	vVisits = rsSQL("visits")%>

	<table border="1" width="400px">
	<tr><th colspan="2"><%=vCName%></th></tr>
	<tr><td>Banner Impressions</td><td><%=vImpressions%></td></tr>
	<tr><td>Banner Clicks</td><td><%=vClicks%></td></tr>
	<tr><td>Click Thru Rate</td><td><%=FormatPercent(vClicks/vImpressions,2,True)%></td></tr>
	<tr><td>Visitors</td><td><%=vVisits%></td></tr>
 <%End IF%>
</body>
</html>