<td>
    <table cellspacing="1" cellpadding="2" border="0" bgcolor="#ffcc66">
        <tbody><tr bgcolor="#ffaa00"><td colspan="3" align="CENTER"><b>Account/Company Information</b></td></tr>
        <tr><td nowrap=""><b>Company Name</b></td><td><input size="25" maxlength="60" name="AcctCompany" VALUE="{{$table_data->AcctCompany ?? ''}}">&nbsp;Optional</td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>Contact Name</b></td><td><input size="25" maxlength="60" name="AcctName" VALUE="{{$table_data->AcctName ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>Address 1</b></td><td><input size="30" maxlength="60" name="AcctAddress1" VALUE="{{$table_data->AcctAddress1 ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>Address 2</b></td><td><input size="30" maxlength="60" name="AcctAddress2" VALUE="{{$table_data->AcctAddress2 ?? ''}}"></td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>City</b></td><td><input size="30" maxlength="40" name="AcctCity" VALUE="{{$table_data->AcctCity ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>State/Province</b></td>
            <td>
                @include('checkout.parts.select-state', ['name' => 'AcctState'])
                <font color="red">*</font></td><td>&nbsp;
            </td>
        </tr>
        <tr><td nowrap=""><b>Zip</b></td><td><input size="5" maxlength="5" name="AcctZip" VALUE="{{$table_data->AcctZip ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>Phone #</b></td><td><input size="15" maxlength="15" name="AcctPhone" VALUE="{{$table_data->AcctPhone ?? ''}}"><font color="red">*</font></td><td>Phone # of business address.</td></tr>
        <tr><td nowrap=""><b>Fax #</b></td><td><input size="15" maxlength="15" name="AcctFax" VALUE="{{$table_data->AcctFax ?? ''}}"></td><td>&nbsp;</td></tr>
        <tr><td nowrap=""><b>Cell #</b></td><td><input size="15" maxlength="15" name="AcctCell" VALUE="{{$table_data->AcctCell ?? ''}}"></td><td>&nbsp;</td></tr>
        </tbody></table>
    <input type="hidden" name="action" value="Shipping Form">

</td>

<tr>
    <td>&nbsp;</td>
    <td align="CENTER">
        <input type="SUBMIT" value="Enter Shipping Address">
    </td>
</tr>