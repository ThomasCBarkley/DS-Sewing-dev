<Html>
<Head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<Title>Refer a friend!</title>
<META NAME="robots" CONTENT="noindex,nofollow">
  <!--#include virtual="/includes/analytics.html"-->
</head>

<Body>
<center>
<!--#include virtual="/includes/toolbar.htm"-->
<%
If Request.ServerVariables("Request_Method") <> "POST" Then%>
	<H2>Refer A Friend</H2>
	<form ACTION="<%=Request.ServerVariables("Script_Name")%>" METHOD="POST" id=form1 name=form1>
	<table WIDTH="400px">
	<tr>
		<td>Your Email Address</td><td><input name="txtFromEmail"></td>
	</tr>
	<tr>
		<td>Friends Email</td><td><input name="txtToEmail"></td>
	</tr>
	<tr>
		<td ALIGN="center" colspan="2"><input TYPE="SUBMIT" NAME="SUB1" VALUE="Send email"></td>
	</tr>
	</table>
	</form>

<%Else
	'------------------------------------
	'--- Create an instance of the CDO.MAIL object
	'------------------------------------
	Set MyMail = Server.CreateObject("CDO.Message")
	MyMail.From = Request.Form("txtFromEmail")
	MyMail.To = Request.Form("txtToEmail")
	'MyMail.Cc = "email@address.com;email@address.com"
	'MyMail.Bcc = "email@address.com;email@address.com"
	MyMail.Subject = "D.S. Sewing, inc. Contract Sewing"
	'MyMail.BodyFormat = 0 ' 0=HTML, 1=plain text 
	'MyMail.MailFormat = 0 ' 0=MIME, 1=plain text
	'MyMail.Importance = 2 ' 0=Low Importance, 1=Normal Importance, 2=High Importance
	MyMail.HTMLBody = "     We would like to take a moment to thank your friend for forwarding our" &_
		" URL to you. He must have felt that our site has some significance. Please feel free to explore" &_
		" our site for yourself at https://www.ds-sewing.com." & vbCrLf & vbCrLf &_
		String(10," ") & "Sincerley," & vbCrLf & vbCrLf & String(10," ") & "David Steinhardt" & vbCrLf & String(10," ") & "President"



	MyMail.Send
	if MyMail.Send then
		Dim cnSQL
		Set cnSQL = Server.CreateObject("ADODB.Connection")
		cnSQL.ConnectionString = "DSN=DSSEWING;UID=sa;PASS=;"
		cnSQL.Open
		cnSQL.Execute "sp_ReferFriend '" & Replace(Request.Form("txtToEmail"),"'","''") & "','" & Replace(Request.Form("txtFromEmail"),"'","''") & "'"
		cnSQL.Close
		Set cnSQL = Nothing
	%>
			<H2>Thanks for recommending D.S. Sewing to your friend!</H2>

	<%else%>
			<H2>There was an error sending your mail. Please click back in your browser and try again.</H2>
	<%end if

	Set MyMail = Nothing
	End IF%>

<!--#include virtual="/includes/truck_footer.htm"-->
</center>
</body>
</html>
