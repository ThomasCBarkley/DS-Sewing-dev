<%@ Page Language="vb" AutoEventWireup="false" Codebehind="step4.aspx.vb" Inherits="pooltest.step4"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
		<title>Step 4</title>
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
			<table align="center"><tr><td>
			<table width="588" border="0" cellspacing="0" cellpadding="0" bgcolor="white">
				<tr align="left" valign="top" height="41">
					<td align="left" valign="top" width="530" height="41">
						<div align="center">
							<b><font size="+3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Completing Your 
									Order</font></b></div>
					</td>
				</tr>
				<tr align="left" valign="top" height="12">
					<td align="left" valign="top" width="530" height="12"><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Now 
							that you have been through the measurement process for your custom pool cover, 
							select from the accessories below to assemble everything you will need for a 
							smooth installation. </font>
						<p><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">To review cover 
								installation features and construction, use the following links. <b><i>Always use the 
										Back button of your browser to return to this page.</i></b></font></p>
						<table width="534" border="0" cellspacing="0" cellpadding="0">
							<tr height="40">
								<td valign="top" height="40">
									<div align="right">
										<font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><a href="/pool/pooltarp/installation.asp">Cover 
												Installation Features</a></font></div>
								</td>
								<td align="middle" valign="top" width="30" height="40">
									<div align="center">
									</div>
								</td>
								<td align="middle" valign="top" height="40">
									<div align="left">
										<font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><a href="/pool/pooltarp/consutruction.htm">Pool 
												Cover Construction</a></font></div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
							<tr>
								<td width="160">
									<img src="images\<%=Session.SessionID%>.small.png" width="160" height="120" alt="Pool Cover" border="0" vspace="0" hspace="0">
								</td>
								<td width="280">
									<asp:Label Runat="server" ID="lblDimension" />
									Custom Pool Cover
								</td>
								<td>
									<asp:Label Runat="server" ID="lblPrice" ForeColor="red" />
								</td>
								<td>
									<asp:TextBox Runat="server" ID="COVER" Columns="3" MaxLength="3">1</asp:TextBox>
								</td>
							</tr>
							<tr>
								<td valign="top" width="160"><!--webbing image here-->&nbsp;</td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Qty of webbing needed, in feet, for this cover.</font></td>
								<td align="middle"><%=Me.GetPrice("PLA005")%></td>
								<td>
									<asp:TextBox Runat="server" ID="WEBBING" Columns="3" MaxLength="3">1</asp:TextBox>
								</td>
							</tr>							
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3">
						<b><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Hardware For Anchoring - <i>Recommend <asp:Label Runat="server" ID="lblThreeFeets" Font-Bold="True" ForeColor="Red"/> Pieces</i></font></b>
					</td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top" width="530" height="610">
						<table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
							<tr>
								<td width="160">Item</td>
								<td width="280">Description</td>
								<td>Price</td>
								<td>Quantity</td>
							</tr>
							<tr>
								<td valign="top" width="160"><img src="concrete-brass-anchor.jpg" alt="" height="47" width="160" border="0"></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass screw anchor for concrete</font></td>
								<td align="right"><%=Me.GetPrice("PLA001")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="BAC" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="brass-wood-deck-anchor.jpg" alt="" height="58" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass 
										anchor with flange for wood deck </font>
								</td>
								<td align="right"><%=Me.GetPrice("PLA002")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="BAWD" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="spring-brass-anchor.jpg" alt="" height="56" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass Spring 
										or pop-up anchor for concrete</font></td>
								<td align="right"><%=Me.GetPrice("PLA003")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="SPUA" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="lawn-stake.jpg" alt="" height="52" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Lawn 
										stake</font></td>
								<td align="right"><%=Me.GetPrice("PLA004")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="LS" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
						</table>
						<p>
							<font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><b>Hardware For Buckling to Anchors - <i>Recommend <asp:Label Runat="server" ID="lblThreeFeets2" Font-Bold="True" ForeColor="Red"/> Pieces</i>								
							</b></font>
						</p>
						<table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
							<tr>
								<td width="160">Item</td>
								<td width="280">Description</td>
								<td>Price</td>
								<td>Quantity</td>
							</tr>						
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="stainless-steel-springs.jpg" alt="" height="58" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">8" Long Stainless 
										steel spring</font></td>
								<td align="right"><%=Me.GetPrice("PLS001")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="SPRING" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="stainless-steel-springs-sma.jpg" alt="" height="58" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">5" Short Stainless 
										steel spring</font></td>
								<td align="right"><%=Me.GetPrice("PLS002")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="SSPRING" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>						
							<tr>
								<td width="160"><img src="spring-cover.jpg" alt="" width="160" height="72" border="0"></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Cover 
										for spring</font></td>
								<td align="right"><%=Me.GetPrice("PLS003")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="SPRCOVER" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="extension-strap-with-buckle.jpg" alt="" height="74" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Stainless Steel buckle</font></td>
								<td align="right"><%=Me.GetPrice("PLCA002")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="STRAP" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="rubber-extension-strap.jpg" alt="" height="57" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Reinforcement 
										chafe strip for pool cover. This material, when applied under straps, will 
										provide extra protection from wear-and-tear.</font></td>
								<td align="right"><%=Me.GetPrice("PLCA005")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="REINSTRIP" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>						
						</table>
						<p><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><b>Installation Tools - <i>Recommend <font color="red">1</font> Piece.</i></b></font></p>
						<table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
							<tr>
								<td width="160">Item</td>
								<td width="280">Description</td>
								<td>Price</td>
								<td>Quantity</td>
							</tr>												
							<tr>
								<td width="160"><img src="aluminum-tamping-tool.jpg" alt="" height="58" width="160" border="0"></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Aluminum 
										tamping tool</font></td>
								<td align="right"><%=Me.GetPrice("PLCA003")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="TAMP" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="installation-rod.jpg" alt="" height="35" width="160" border="0"></font></td>
								<td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Installation 
										rod</font></td>
								<td align="right"><%=Me.GetPrice("PLCA004")%></td>
								<td align="middle"><asp:TextBox Runat="server" ID="LEVER" Columns="3" MaxLength="3">0</asp:TextBox></td>
							</tr>
							<tr>
								<td colspan="4" align="middle">
									<asp:Button Runat="server" ID="btnBuy" Text="Purchase Selected Items" />
								</td>
							</tr>
						</table>
						<table width="529" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="center" height="105"><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">After 
										entering the quantities of all the accessories you need, click the following 
										button to proceed with your order. <b><i>Note: If you do not select any accessories, we 
												will make your pool cover with grommets instead of preparing it for a selection 
												of the above accessories.</i></b></font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table></td></TD>
			</tr>
			</table>
		</form>
	</body>
</HTML>
