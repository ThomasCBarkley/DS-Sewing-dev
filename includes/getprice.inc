<%
Dim cnSQL
Dim rsSQL
Set cnSQL = Server.CreateObject("ADODB.Connection")
'cnSQL.ConnectionString = "DSN=DSSewing;UID=dssewing_www_service;PWD=!g0ttal3arnt0s3w;"
cnSQL.ConnectionString="Driver={SQL Server};" & "Server=localhost;" & "Database=dssewing;" & "Uid=dssewing_www_service;" & "Pwd=!g0ttal3arnt0s3w;" 
'192.168.0.211
cnSQL.Open

Function GetPrice(vPID)	
	Set rsSQL = cnSQL.Execute("SELECT Price FROM Catalog WHERE PID='" & vPID & "'")
	If Not rsSQL.EOF Then
		GetPrice = "<!--GP-->" & FormatNumber(rsSQL("Price"),2,True)
	Else
		GetPrice = "Unknown"
	End If
'	rsSQL.Close
End Function

Function GetWeight(vPID)	
	Set rsSQL = cnSQL.Execute("SELECT weight FROM Catalog WHERE PID='" & vPID & "'")
	If Not rsSQL.EOF Then
		GetWeight = "<!--GW-->" & FormatNumber(rsSQL("weight"),0,True)
	Else
		GetWeight = "Unknown"
	End If
'	rsSQL.Close
End Function

Function GetImages(vPID)	
	Set rsSQL = cnSQL.Execute("SELECT image, image_schematics  FROM Catalog WHERE PID='" & vPID & "'")
	If Not rsSQL.EOF Then
		TheImage =  rsSQL("image")
		TheSchematic = rsSQL("image_schematics")
		If TheImage <> "" Then
			GetImages = "<br><a onclick=""window.open('" & TheImage & "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;"" href=""" & TheImage & """>View Picture</a>"
		End If
		If TheSchematic <> "" Then
			GetImages = GetImages & "<br><a onclick=""window.open('" & TheSchematic & "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;"" href=""" & TheSchematic & """><font color=green>View Schematic</font></a>"
		End If
	Else
		GetImages = ""
	End If

'	rsSQL.Close
End Function

Function GetDescription(vPID)	
	Set rsSQL = cnSQL.Execute("SELECT description FROM Catalog WHERE PID='" & vPID & "'")
	If Not rsSQL.EOF Then
		GetDescription = "<!--GW-->" & rsSQL("description")
	Else
		GetDescription = "Unknown"
	End If
'	rsSQL.Close
End Function

%>