<td valign="TOP">
    <table BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#ffcc66" width="550">
        <tr bgcolor="#ffaa00"><td align="center" colspan="3"><b>Billing/Credit Card Information</b></td></tr>
        <tr><td nowrap><b>Name On Card</b></td><td><INPUT SIZE=25 MAXLENGTH=60 NAME="BillName" VALUE="{{$table_data->BillName ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td nowrap><b>Company Name</b></td><td><INPUT SIZE=25 MAXLENGTH=60 NAME="BillCompany" VALUE="{{$table_data->BillCompany ?? ''}}"></td><td>&nbsp;</td></tr>
        <tr><td><b>Address 1</b></td><td nowrap><INPUT SIZE=30 MAXLENGTH=60 NAME="BillAddress1" VALUE="{{$table_data->BillAddress1 ?? ''}}"><font color="red">*</font></td><td rowspan="3">Address where credit card statement is mailed to.</td></tr>
        <tr><td><b>Address 2</b></td><td nowrap><INPUT SIZE=30 MAXLENGTH=60 NAME="BillAddress2" VALUE="{{$table_data->BillAddress2 ?? ''}}"></td></tr>
        <tr><td><b>City</b></td><td nowrap><INPUT SIZE=30 MAXLENGTH=40 NAME="BillCity" VALUE="{{$table_data->BillCity ?? ''}}"><font color="red">*</font></td></tr>
        <tr><td><b>State/Province</b></td>
            <td>
                @include('checkout.parts.select-state', ['name' => 'BillState'])
                <font color="red">*</font></td><td>&nbsp;
            </td>
        </tr>
        <tr><td><b>Zip/Postal Code</b></td><td nowrap><INPUT SIZE=5 MAXLENGTH=5 NAME="BillZip" VALUE="{{$table_data->BillZip ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td><b>Contact Phone #</b></td><td nowrap><INPUT SIZE=32 MAXLENGTH=32 NAME="ContactPhoneNumber" VALUE="{{$table_data->ContactPhoneNumber ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
        <tr><td><b>Email Address</b></td><td nowrap><INPUT SIZE=32 MAXLENGTH=255 NAME="EmailAddress" VALUE="{{$table_data->EmailAddress ?? ''}}"><font color="red">*</font></td><td>&nbsp;</td></tr>
    </table>
    <input type="hidden" name="action" value="Shipping Form">
</td>
@include('cart.parts.shipping')
<TR><TD>&nbsp;</TD><TD COLSPAN="2" ALIGN="LEFT">
        <TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR=#ffcc66>
            <TR BGCOLOR="#ffaa00"><TD COLSPAN="4" ALIGN="CENTER"><B>By Entering Payment Info Customer agrees to Terms of Sales and Ordering Agreements</B></TD></TR>
            <TR>
                <TD>Payment Method</TD><TD>
                    <SELECT NAME="PaymentMethod">
                        <OPTION>VISA
                        <OPTION>MASTERCARD
                        <OPTION>AMEX
                        <OPTION>CHECK/MO
                    </SELECT>
                </TD>
                <TD>Expiration Date</TD><TD>
                    <NOBR>
                        <SELECT NAME="ExpMonth">
                            <OPTION>01
                            <OPTION>02
                            <OPTION>03
                            <OPTION>04
                            <OPTION>05
                            <OPTION>06
                            <OPTION>07
                            <OPTION>08
                            <OPTION>09
                            <OPTION>10
                            <OPTION>11
                            <OPTION>12
                        </SELECT>/<SELECT NAME="ExpYear">
                            @for ($i = 2021 ; $i < 2031; $i++)
                            <OPTION>{{$i}}
                            @endfor
                        </SELECT>
                    </NOBR>
                </TD>
            </TR>
            <TR>
                <TD>Credit Card Number</TD><TD><INPUT SIZE=19 MAXLENGTH=19 NAME="CreditCardNumber" VALUE={{$table_data->CreditCardNumber ?? ''}}></TD>
            </TR>
            <TR>
                <TD>Last 3 Digits On Back of Cart (CVV2)</TD><TD><INPUT SIZE=3 MAXLENGTH=4 NAME="CVV2" VALUE="{{$table_data->CVV2 ?? ''}}">
                    <font size=-1>
                        <A HREF="javascript:popUp('https://www.ds-sewing.com/cvv2.html')">Click here for explanation.</A>
                    </font>
                </TD>
            </TR>
        </TABLE>
    </TD></TR>
<tr>
    <td>&nbsp;</td>
    <td align="CENTER">
        <input type="SUBMIT" value="Continue">
    </td>
</tr>
<SCRIPT LANGUAGE="JavaScript">
    function popUp(URL) {
        day = new Date();
        id = day.getTime();
        eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=420,height=600');");
    }
</script>