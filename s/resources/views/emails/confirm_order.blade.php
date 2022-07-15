<table border="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
    <tbody><tr>
        <td valign="TOP" align="center">
            <h1>D.S. Sewing Inc<br>Merritt</h1>
        </td>
    </tr>
    <tr>
        <td valign="TOP" align="center">
            <b>(800) 789-8143</b><br>
            <font color="green" size="4"><b>Order Receipt:</b></font> <b># {{$table_data->ID}}</b> <br>
            [<a href="javascript:window.print()">Print This Page</a>]<br><br>

        </td>
    </tr>
    </tbody>
</table>

<table border="0" cellspacing="0" bgcolor="#FFFFFF" width="800">
    <tbody><tr bgcolor="#c0c0c0">
        <td valign="TOP" width="50%">
            <b>Account Information:</b>
        </td>
        <td valign="TOP" width="50%">
            <b>Ship To Information:</b>  <br>
        </td>
    </tr>
    <tr>
        <td valign="TOP" width="50%">
            <b>Company Name:</b>{{ $table_data->AcctCompany }}<br>
            <b>Name:</b>{{ $table_data->AcctName }} <br>
            <b>Address 1:</b> {{ $table_data->AcctAddress1 }}<br>
            <b>Address 2:</b>  {{ $table_data->AcctAddress2 }}<br>
            <b>City:</b> {{ $table_data->AcctCity }}<br>
            <b>State:</b> {{ $table_data->AcctState }}<br>
            <b>Zip:</b> {{ $table_data->AcctZip }}<br>
            <b>Phone:</b> {{ $table_data->AcctPhone }}<br>
            <b>Fax:</b> {{ $table_data->AcctFax }}<br>
            <b>Cell:</b> {{ $table_data->AcctCell }}<br>
        </td>
        <td valign="TOP" width="50%">
            <b>Company Name:</b> {{ $table_data->ShipCompany }}<br>
            <b>Name:</b>  {{ $table_data->ShipName }}<br>
            <b>Address 1:</b>  {{ $table_data->ShipAddress1 }}<br>
            <b>Address 2:</b>  {{ $table_data->ShipAddress2 }}<br>
            <b>City:</b> {{ $table_data->ShipCity }}<br>
            <b>State:</b> {{ $table_data->ShipState }}<br>
            <b>Zip:</b> {{ $table_data->ShipZip }}<br>
            <b>Phone:</b> {{ $table_data->ShipPhone }}<br>
            <b>Ship Via</b>:  {{ $table_data->ShippingMethod }}<br><br>
        </td>
    </tr>
    <tr bgcolor="#c0c0c0">
        <td valign="TOP" width="50%">
            <b>Bill To Information:</b>
        </td>
        <td valign="TOP" width="50%">
            <b>Payment Information:</b>
        </td>
    </tr>
    <tr>
        <td valign="TOP" width="50%">
            <b>Name:</b> {{ $table_data->BillName }}<br>
            <b>Address:</b> {{ $table_data->BillAddress1 }}<br>
            <b>City:</b> {{ $table_data->BillCity }}<br>
            <b>State:</b> {{ $table_data->BillState }}<br>
            <b>Zip:</b> {{ $table_data->BillZip }}<br>
            <b>Phone:</b>  {{ $table_data->BillPhone }}<br><br>
        </td>
        <td valign="TOP" width="50%">
            <b>Payment Method</b>: {{ $table_data->PaymentMethod }}<br>
            Last Digits: {{ substr($table_data->CreditCardNumber, -4) }}<br>
        </td>
    </tr>
    </tbody>
</table>
@include('checkout.parts.items')