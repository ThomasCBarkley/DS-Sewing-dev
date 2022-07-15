<%@ Page Language="vb" AutoEventWireup="false" Codebehind="step1.aspx.vb" Inherits="pooltest.step1"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<title>Step 1</title>
		<meta content="noindex,nofollow" name="robots">
		<meta content="Microsoft Visual Studio.NET 7.0" name="GENERATOR">
		<meta content="Visual Basic 7.0" name="CODE_LANGUAGE">
		<meta content="JavaScript" name="vs_defaultClientScript">
		<meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
	<!--#include virtual="/includes/analytics.html"-->
	</HEAD>
	<body>
		<p align="center"></p>
		<form id="frmMain" method="post" runat="server">
			<table align="center" width="600">
				<tr>
					<td><asp:validationsummary id="ValidationSummary1" Runat="server" HeaderText="<b>Please correct the following errors:</b>"></asp:validationsummary></td>
				</tr>
				<tr>
					<td>
						<table style="BORDER-BOTTOM: black 1px solid; BORDER-LEFT: black 1px solid; BORDER-TOP: black 1px solid; BORDER-RIGHT: black 1px solid"
							bgColor="#ffcc66" border="0">
							<tr>
								<td align="center" bgColor="#cccccc" colSpan="2"><b>Welcome to the A/B input form! </b>
								</td>
							</tr>
							<tr>
								<td>Please enter the distance between A and B. (usually 15ft)
								</td>
								<td><asp:textbox id="txtDistanceFeet" Runat="server" MaxLength="7" Columns="7"></asp:textbox>feet<asp:textbox id="txtDistanceInches" Runat="server" MaxLength="7" Columns="7"></asp:textbox>inches
								</td>
							</tr>
							<tr>
								<td>Please input the number of pieces of masking tape X-points.
									<asp:rangevalidator id="Rangevalidator1" Runat="server" ControlToValidate="txtPointCount" MinimumValue="4"
										MaximumValue="300" Type="Double" ErrorMessage="The A/B point count must be between 4 and 100.">*</asp:rangevalidator><asp:requiredfieldvalidator id="RequiredFieldValidator2" Runat="server" ControlToValidate="txtPointCount" ErrorMessage="The qty of A/B points is required.">*</asp:requiredfieldvalidator></td>
								<td><asp:textbox id="txtPointCount" Runat="server" MaxLength="3" Columns="3"></asp:textbox></td>
							</tr>
							<tr>
								<td>Please enter the number of crosscheck reference points.</td>
								<td><asp:textbox id="txtCrossCount" Runat="server" MaxLength="3" Columns="3" /><asp:RangeValidator Runat="server" ControlToValidate="txtCrossCount" ErrorMessage="Maximum of 5 cross points allowed."
										MinimumValue="0" MaximumValue="5" Type="Integer" ID="Rangevalidator2">*</asp:RangeValidator>
									<font color="red">Maximum of 5 points.</font></td>
							</tr>
							<tr>
								<td>Please enter the number of perimeter reference points.</td>
								<td><asp:textbox id="txtPerimCount" Runat="server" MaxLength="3" Columns="3" /><asp:RangeValidator Runat="server" ControlToValidate="txtPerimCount" ErrorMessage="Maximum of 5 perimeter points allowed."
										MinimumValue="0" MaximumValue="5" Type="Integer" id="RangeValidator3">*</asp:RangeValidator>
									<font color="red">Maximum of 5 points.</font></td>
							</tr>
							<tr>
								<td colspan="2"><hr>
								</td>
							</tr>
							<tr>
								<td colspan="2">Please enter your name, phone, and email address. We will mail you 
									your plot ID number in case you lose it. <b>This number is very important.</b> Without 
									it you can not correct your measurements should you need to.
								</td>
							</tr>
							<tr>
								<td>
									Name
								</td>
								<td>
									<asp:TextBox Runat="server" ID="txtName" Columns="30" MaxLength="64" /><asp:RequiredFieldValidator Runat="server" ControlToValidate="txtName" ErrorMessage="Name is required." id="RequiredFieldValidator1">*</asp:RequiredFieldValidator>
								</td>
							</tr>
							<tr>
								<td>
									Phone Number
								</td>
								<td>
									<asp:TextBox Runat="server" ID="txtPhone" Columns="16" MaxLength="32" /><asp:RequiredFieldValidator Runat="server" ControlToValidate="txtPhone" ErrorMessage="Phone number is required."
										id="RequiredFieldValidator3">*</asp:RequiredFieldValidator>
								</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><asp:textbox id="txtEmail" Runat="server" MaxLength="255" Columns="48" /><asp:RequiredFieldValidator Runat="server" ControlToValidate="txtEmail" ErrorMessage="Email is required." ID="Requiredfieldvalidator4">*</asp:RequiredFieldValidator></td>
							</tr>
							<tr>
								<td align="right" colspan="2"><asp:button id="btnNext" Runat="server" Text="Next Step"></asp:button></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</body>
</HTML>
