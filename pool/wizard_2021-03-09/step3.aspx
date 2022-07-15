<%@ Page Language="vb" AutoEventWireup="false" Codebehind="step3.aspx.vb" Inherits="pooltest.step3"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<title>Step 3</title>
		<meta name="robots" content="noindex,nofollow">
		<meta name="GENERATOR" content="Microsoft Visual Studio.NET 7.0">
		<meta name="CODE_LANGUAGE" content="Visual Basic 7.0">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
	<!--#include virtual="/includes/analytics.html"-->
	</HEAD>
	<body>
		<p align="center"><!--#include virtual="/includes/toolbar.htm"--></p>
		<form id="frmMain" method="post" runat="server">
			<table align="center">
				<tr>
					<td><asp:ValidationSummary Runat="server" HeaderText="<b>Please correct the following errors:</b>" id="ValidationSummary1" />
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" bgcolor="#eeeeee" style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid">
							<tr>
								<td>Your plot id: <b><font color="red"><%=Session("plotid")%></font></b> - remember this number to continue where you left off.</td>
							</tr>
					
							<tr>
								<td colspan="2">
									
								</td>
							</tr>
							<tr>
								<td>
									<asp:Image Runat="server" ID="imgPlot" />
								</td>
							</tr>
							<tr>
								<td align="right" colspan="2" valign="top">
									<asp:Button Runat="server" ID="btnPrev" Text="A/B Measurements" />&nbsp;&nbsp;<asp:Button Runat="server" ID="btnNext" Text="Pricing" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</body>
</HTML>
