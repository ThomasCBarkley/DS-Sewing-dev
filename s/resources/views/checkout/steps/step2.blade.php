<td>
    <table BORDER="0" CELLPADDING="2" CELLSPACING="1" BGCOLOR="#ffcc66">
        <tr bgcolor="#ffaa00"><td ALIGN="CENTER" COLSPAN="3"><b>Shipping Information</b></td></tr>
        <tr><td nowrap><b>Company Name</b></td><td><input SIZE=25 MAXLENGTH=60 NAME="ShipCompany" VALUE="{{$table_data->ShipCompany ?? ''}}"></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>Contact Name</b></td><td><input SIZE=25 MAXLENGTH=60 NAME="ShipName" VALUE="{{$table_data->ShipName ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>Address 1</b></td><td><input SIZE=30 MAXLENGTH=60 NAME="ShipAddress1" VALUE="{{$table_data->ShipAddress1 ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>Address 2</b></td><td><input SIZE=30 MAXLENGTH=60 NAME="ShipAddress2" VALUE="{{$table_data->ShipAddress2 ?? ''}}"></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>City</b></td><td><input SIZE=30 MAXLENGTH=40 NAME="ShipCity" VALUE="{{$table_data->ShipCity ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>State/Province</b></td>
            <td>
                @include('checkout.parts.select-state', ['name' => 'ShipState'])
                <font color="red">*</font></td><td>&nbsp;
            </td>
        </tr>
        <tr><td nowrap><b>Zip</b></td><td><input SIZE=5 MAXLENGTH=5 NAME="ShipZip" VALUE="{{$table_data->ShipZip ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>Phone #</b></td><td><input SIZE=15 MAXLENGTH=15 NAME="ShipPhone" VALUE="{{$table_data->ShipPhone ?? ''}}"><font color="red">*</font></td><td>Phone # of shipping address.</td></tr>
        <tr><td nowrap><b>Address Type</b></td>
            <td>
                <select name="AddressType">
                    <option value="">Select A Type</option>
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Farm">Farm</option>
                </select>
                <font color="red">*</font></td><td>&nbsp;
            </td>
        </tr>
    </table>
    <input type="hidden" name="action" value="Shipping Info">
</td>
<tr>
    <td>&nbsp;</td>
    <td align="CENTER">
        <input type="SUBMIT" value="Select Shipping Method">
    </td>
</tr>