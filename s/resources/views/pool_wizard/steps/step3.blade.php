<table align="center">
    <tr>
        <td>
            <asp:ValidationSummary Runat="server" HeaderText="<b>Please correct the following errors:</b>"
                                   id="ValidationSummary1"/>
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" bgcolor="#eeeeee"
                   style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid">
                <tr>
                    <td>Your plot id: <b><font color="red">plotif</font></b> - remember this number to continue where
                        you left off.
                    </td>
                </tr>

                <tr>
                    <td colspan="2">

                    </td>
                </tr>
                <tr>
                    <td>
                        <asp:Image Runat="server" ID="imgPlot"/>
                        Should be an Image
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="2" valign="top">
                        <input type="button" Runat="server" ID="btnPrev" value="A/B Measurements"/>&nbsp;&nbsp;<input
                                type="button" Runat="server" ID="btnNext" value="Pricing"/>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
