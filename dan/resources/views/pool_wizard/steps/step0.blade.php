<table align="center">
    <tr>
        <td>
            <table border="0" bgcolor="#ffcc66"
                   style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid">
                <tr>
                    <td>
                        <input type="radio" ID="rbStart0" name="NewOrOld" value="0" Checked="True"/>
                    </td>
                    <td colspan="2">
                        Start a new pool cover.
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" ID="rbStart1" value="1" name="NewOrOld"/>
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
                        <input type="text" Runat="server" name="txtPlotID" MaxLength="10" Columns="10"/>
                        {{--<asp:RequiredFieldValidator ControlToValidate="txtPlotID" Runat="server" Enabled="False"--}}
                                                    {{--ErrorMessage="You must specify a pool id." ID="rvPlotID">*--}}
                        {{--</asp:RequiredFieldValidator>--}}
                        {{--<asp:RangeValidator ControlToValidate="txtPlotID" Runat="server" EnableClientScript="False"--}}
                                            {{--MinimumValue="100000" MaximumValue="500000"--}}
                                            {{--ErrorMessage="Pool cover ID must be between 100000 and 500000"--}}
                                            {{--ID="rngvPlotID" Type="Integer">*--}}
                        {{--</asp:RangeValidator>--}}
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="middle">
                        <input type="submit" ID="btnStart" value="Start Pool Wizard"/>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
