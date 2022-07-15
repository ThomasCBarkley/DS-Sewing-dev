<td valign="TOP">
    <table border="0" cellpadding="1" bgcolor="#F0F0F0">
        <tbody>
        @if ($currentStep >= 5)
            @include('cart.parts.billing')
        @endif
        <tr bgcolor="#C0C0C0">
            <td align="CENTER"><b>ShipTo: </b></td>
        </tr>
        <tr>
            <td valign="TOP">
                <nobr>{{$table_data->ShipCompany ?? ''}} {{$table_data->ShipName ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->ShipAddress1 ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->ShipAddress2 ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->ShipCity ?? ''}}, {{$table_data->ShipState ?? ''}} {{$table_data->ShipZip ?? ''}}</nobr>
                <br>
            </td>
        </tr>
        @if ($currentStep >= 4)
            <TR BGCOLOR="#C0C0C0"><TD ALIGN="CENTER"><B>Ship Via:</B></TD></TR><TR><TD>{{$table_data->ShippingMethod ?? ''}}</TD></TR>
        @endif
        </tbody>
    </table>
</td>