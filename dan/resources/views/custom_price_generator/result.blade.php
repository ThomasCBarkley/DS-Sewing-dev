<html>
<head>
    <title>Your Custom Tarp Quote</title>
</head>

<body bgcolor="White">
<center>@include('..common.header')</center>
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
                            <td valign = middle align = left><font size = "-1">{{$data->description}}</font></td>
                            <td valign = middle align = left><font size = "-1">$@format($data->price)</font></td>
                            <td valign = middle align = center>
                                <form action="/dan/incart" method="post">
                                    @csrf
                                    <input type="hidden" value="incart" name="action">
                                    <input type="hidden" value="{{$data->pid}}" name="pid">
                                    <input type="submit" value="Buy!">
                                </form>
                            </td>
                        </tr>
                    </table>
				</center>
			</td>
		</tr>
	</table>
    </center>
</body>
</html>