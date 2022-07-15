<table align="center" width="590">
    <tr>
        <td>
            <table style="BORDER-BOTTOM: black 1px solid; BORDER-LEFT: black 1px solid; BORDER-TOP: black 1px solid; BORDER-RIGHT: black 1px solid" bgcolor="#ffcc66" border="0">
                <tbody><tr>
                    <td align="center" bgcolor="#cccccc" colspan="2"><b>Welcome to the A/B input form! </b>
                    </td>
                </tr>
                <tr>
                    <td>Please enter the distance between A and B. (usually 15ft)
                    </td>
                    <td>
                        <input name="txtDistanceFeet" type="text" maxlength="7" size="7" id="txtDistanceFeet">feet<input name="txtDistanceInches" type="text" maxlength="7" size="7" id="txtDistanceInches">inches
                    </td>
                </tr>
                <tr>
                    <td>Please input the number of pieces of masking tape X-points.
                        &nbsp;&nbsp;</td>
                    <td><input name="txtPointCount" type="text" maxlength="3" size="3" id="txtPointCount"></td>
                </tr>
                <tr>
                    <td>Please enter the number of crosscheck reference points.</td>
                    <td><input name="txtCrossCount" type="text" maxlength="3" size="3" id="txtCrossCount">&nbsp;
                        <font color="red">Maximum of 5 points.</font></td>
                </tr>
                <tr>
                    <td>Please enter the number of perimeter reference points.</td>
                    <td><input name="txtPerimCount" type="text" maxlength="3" size="3" id="txtPerimCount">&nbsp;
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
                        <input name="txtName" type="text" maxlength="64" size="30" id="txtName">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone Number
                    </td>
                    <td>
                        <input name="txtPhone" type="text" maxlength="32" size="16" id="txtPhone">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input name="txtEmail" type="text" maxlength="255" size="48" id="txtEmail">&nbsp;</td>
                </tr>
                <tr>
                    <td align="right" colspan="2">
                        <input type="submit" name="btnNext" value="Next Step" onclick="if (typeof(Page_ClientValidate) == 'function') Page_ClientValidate(); " language="javascript" id="btnNext">
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>