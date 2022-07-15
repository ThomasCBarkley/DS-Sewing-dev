<td valign="TOP">
    <table border="0" cellpadding="1" bgcolor="#F0F0F0">
        <tbody>
        <tr bgcolor="#C0C0C0">
            <td align="CENTER"><b>Acct </b></td>
        </tr>
        <tr>
            <td valign="TOP">
                <nobr>{{$table_data->AcctCompany ?? ''}} {{$table_data->AcctContact ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->AcctAddress1 ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->AcctAddress2 ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->AcctCity ?? ''}}, {{$table_data->AcctState ?? ''}} {{$table_data->AcctZip ?? ''}}</nobr>
                <br>
            </td>
        </tr>
        <TR BGCOLOR="#C0C0C0">
            <TD ALIGN="CENTER"><B>BillTo:</B></TD>
        </TR>
        <tr>
            <td valign="TOP">
                <nobr>{{$table_data->BillCompany ?? ''}} {{$table_data->BillName ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->BillAddress1 ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->BillAddress2 ?? ''}}</nobr>
                <br>
                <nobr>{{$table_data->BillCity ?? ''}}, {{$table_data->BillState ?? ''}} {{$table_data->BillZip ?? ''}}</nobr>
                <br>
            </td>
        </tr>
        </tbody>
    </table>
</td>