<%@Language=VBScript%>

<HTML>
<HEAD>
  <TITLE>Unsubscribe</TITLE>
  <!--#include virtual="/includes/analytics.html"-->
</HEAD>
<BODY BGCOLOR="#ffffff">
<CENTER><!--#include virtual="/includes/toolbar.htm"--></CENTER>

<%
On Error Resume Next
Dim cnSQL
Set cnSQL = Server.CreateObject("ADODB.Connection")
cnSQL.Connectionstring = "DSN=dssewing;UID=sa;PASS="
cnSQL.Open
cnSQL.Execute "sp_EmailUnsubscribe '" & Replace(Request("email"),"'","''") & "'"
cnSQL.Close
Set cnSQL = Nothing
If Err<>0 Then%>
	<CENTER><H2>I cannot unsubscribe you right now. Please try back later when the system is working!</H2></CENTER>
<%Else%>
	<CENTER>
		<H2>You have been removed from our email list!</H2>
		<A HREF="https://www.ds-sewing.com/">
		<IMG SRC="https://www.ds-sewing.com/images/buttons/truck_button.jpg" BORDER="1" VSPACE="0" HSPACE="0"><BR>
		Click here if you would like to visit our site.</A>
	</CENTER>

<%End If%>
</BODY>
</HTML>


	