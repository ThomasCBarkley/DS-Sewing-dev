<%@ Page Language="vb" AutoEventWireup="false" Codebehind="step2.aspx.vb" Inherits="pooltest.step2"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
		<title>Step 2</title>
		<meta name="GENERATOR" content="Microsoft Visual Studio.NET 7.0">
		<meta name="CODE_LANGUAGE" content="Visual Basic 7.0">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		<style>
			input { text-align:right; }
		</style>
  <!--#include virtual="/includes/analytics.html"-->
	</HEAD>
	<body>
		<p align="center"><!--#include virtual="/includes/toolbar.htm"--></p>
		<form id="frmMain" method="post" runat="server">
			<table align="center">
				<tr>
					<td><asp:ValidationSummary Runat="server" HeaderText="<b>Please correct the following errors:</b>" id="ValidationSummary1" /></td>
				</tr>
				<tr>
					<td>
						<asp:Label Runat="server" ID="lblName"/>&nbsp;|&nbsp;<asp:Label Runat="server" ID="lblPhone"/>&nbsp;|&nbsp;<asp:Label Runat="server" ID="lblEmail"/>
					</td>
				</tr>						
				<tr>
					<td>
						<table border="0" bgcolor="#ffcc66" style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid" width="100%">
							<tr>
								<td>
									The distance between you A-B reference measurement is <asp:Label Runat="server" ID="lblABDist"/>. Round to quarter inches.
								</td>
							</tr>
							<tr>
								<td>Your plot ID: <b><font color="red"><%=Session("plotid")%></font></b> - remember this number to continue where you left off.</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#cccccc" align="middle"><b>Please Enter A-B measurements.</b></td>
							</tr>
							<tr>
								<td colspan="2" valign="top">
									<asp:Table Runat="server" id="tblPoints" EnableViewState="True" CellPadding="2" CellSpacing="2">
										<asp:TableRow>
											<asp:TableCell HorizontalAlign="Center"><b>X</b></asp:TableCell>
											<asp:TableCell HorizontalAlign="Center"><b>A</b></asp:TableCell>
											<asp:TableCell HorizontalAlign="Center"><b>B</b></asp:TableCell>
											<asp:TableCell>&nbsp;</asp:TableCell>
										</asp:TableRow>
									</asp:Table>
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#cccccc" align="middle"><b>Please enter diagonal and crosscheck reference points.</b></td>
							</tr>
							<tr>
								<td colspan="2" valign="top">
									<asp:Table Runat="server" ID="tblCross" EnableViewState="True" CellPadding="2" CellSpacing="2">
										<asp:TableRow>											
											<asp:TableCell><b>X Start Point</b></asp:TableCell>
											<asp:TableCell><b>X End Point</b></asp:TableCell>
											<asp:TableCell><b>Distance</b></asp:TableCell>
										</asp:TableRow>
									</asp:Table>
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#cccccc" align="middle"><b>Please enter perimeter reference points.</b></td>
							</tr>
							<tr>
								<td colspan="2" valign="top">
									<asp:Table Runat="server" ID="tblPerim" EnableViewState="True" CellPadding="2" CellSpacing="2">
										<asp:TableRow>											
											<asp:TableCell><b>X Start Point</b></asp:TableCell>
											<asp:TableCell><b>X End Point</b></asp:TableCell>
											<asp:TableCell><b>Distance</b></asp:TableCell>
										</asp:TableRow>
									</asp:Table>
								</td>
							</tr>							
							<tr>
								<td align="right" valign="top">
									<asp:Button Runat="server" ID="btnSave" Text="Save Changes" />
								</td>
								<td align="right" valign="top">
									<asp:Button Runat="server" ID="btnNext" Text="Show Me My Cover" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</body>
</HTML>
