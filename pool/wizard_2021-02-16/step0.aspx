<%@ Page Language="vb" AutoEventWireup="false" CodeFile="step0.aspx.vb" Inherits="step0" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
		<title>Step 0</title>
		<meta name="GENERATOR" content="Microsoft Visual Studio.NET 7.0">
		<meta name="CODE_LANGUAGE" content="Visual Basic 7.0">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
  </HEAD>
	<body>	
		<p align="center"><!--#include virtual="/includes/toolbar.htm"--></p>
		<form id="frmMain" method="post" runat="server">
			<table align="center">
				<tr>
					<td><asp:ValidationSummary Runat="server" HeaderText="<b>Please correct the following errors:</b>" ID="Validationsummary1"></asp:ValidationSummary></td>
				</tr>
				<asp:Panel Runat="server" ID="pnlPlotNotFound" Visible="False">
  <TR>
    <TD colSpan=3><B><FONT color=red>Your plot could not be found! Please make 
      sure you have the right plot panel.</FONT></B> </TD></TR>
				</asp:Panel>
				<tr>
					<td>
						<table border="0" bgcolor="#ffcc66" style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid">
							<tr>
								<td>
									<asp:RadioButton Runat="server" ID="rbStart0" GroupName="NewOrOld" Checked="True" />
								</td>
								<td colspan="2">
									Start a new pool cover.
								</td>
							</tr>
							<tr>
								<td>
									<asp:RadioButton Runat="server" ID="rbStart1" GroupName="NewOrOld" />
								</td>
								<td colspan="2">
									Continue a saved pool cover.
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>
									Enter the pool id of the pool you wish to continue.
								</td>
								<td>
									<asp:TextBox Runat="server" id="txtPlotID" MaxLength="10" Columns="10" />
									<asp:RequiredFieldValidator ControlToValidate="txtPlotID" Runat="server" Enabled="False" ErrorMessage="You must specify a pool id." ID="rvPlotID">*</asp:RequiredFieldValidator>
									<asp:RangeValidator ControlToValidate="txtPlotID" Runat="server" EnableClientScript="False" MinimumValue="100000" MaximumValue="500000" ErrorMessage="Pool cover ID must be between 100000 and 500000" ID="rngvPlotID" Type="Integer">*</asp:RangeValidator>
								</td>
							</tr>
							<tr>
								<td colspan="3" align="middle">
									<asp:Button Runat="server" ID="btnStart" Text="Start Pool Wizard" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</body>
</HTML>
