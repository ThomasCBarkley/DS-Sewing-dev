<?php $subtotal = 0 ?>
<TABLE BORDER="0" CELLSPACING="2" CELLPADDING="1" BGCOLOR="#f0f0f0" width="800">
    <TR BGCOLOR="#c0c0c0">
        <TD><B>Qty</B></TD>
        <TD ALIGN="CENTER"><B>Description</B></TD>
        <TD ALIGN="CENTER"><B>Part</B></TD>
        <TD ALIGN="CENTER"><B>Unit Price</B></TD>
        <TD ALIGN="CENTER"><B>Ext. Price</B></TD>
    </TR>
    @foreach($cart_items as $item)
        <TR BGCOLOR="{{$loop->index % 2 == 0 ? '#ffffff': '#F0F0F0'}}">
            <TD valign="top" width="5%">{{$item->qty}}</TD>
            <TD width="60%">{{$item->description}}</TD>
            <TD valign="top" width="15%">{{$item->pid}}</TD>
            <TD align="right" valign="top" width="10%">$
            @if ($item->price != $item->discountprice)
                @format($item->discountprice)
                <font size="-1" color="red"> (You saved $@format($item->qty * ($item->price - $item->discountprice))</font>
                </TD>
                <TD align="right" valign="top" width="10%">$@format($item->discountprice * $item->qty)</TD>
                <?php $subtotal += ($item->discountprice * $item->qty); ?>
            @else
                @format($item->price)
                </TD><TD align="right" valign="top" width="10%">$@format($item->price * $item->qty)</TD>
			    <?php $subtotal += ($item->price * $item->qty); ?>
            @endif
        </TR>
    @endforeach

    <tr bgcolor="#C0C0C0"><td colspan="5" align="CENTER"><b>Final Details</b></td></tr>
    <tr>
        <td colspan="2" align="LEFT">
            <b>Terms of Sale Agreement</b><br>
            <a href="https://www.ds-sewing.com/legal.htm" target="_blank">https://www.ds-sewing.com/legal.htm</a>
        </td>
        <td bgcolor="#decfde" colspan="2" align="RIGHT">Sub Total:</td><td colspan="1" align="RIGHT" bgcolor="#F0F0F0">$@format($subtotal)</td>
    </tr>
    <tr>
        <td colspan="2" align="LEFT">
            <b>Ordering, Freight and Payment Agreement</b><br>
            <a href="https://www.ds-sewing.com/forms/payment.html" target="_blank">https://www.ds-sewing.com/forms/payment.html</a>
        </td>
        <td colspan="2" align="RIGHT" bgcolor="#decfde">Shipping Cost:</td><td colspan="1" align="RIGHT">$@format($table_data->EstShipCost ?? 0) </td>
    </tr>
	<?php
        $tax_states = config('app.tax_states');

        if (
        	$table_data->AcctState == 'CT' ||
            $table_data->BillState == 'CT' ||
            $table_data->ShipState == 'CT'
        ) {
            $tax = $tax_states['CT'];
            $tax_state = 'CT';
        } elseif ($table_data->ShipState == 'CA') {
            $tax = $tax_states['CA'];
            $tax_state = 'CA';
        } else {
            $tax =0;
        }
	?>
    @if ($tax>0)
        <TR>
            <TD COLSPAN="2" ALIGN="LEFT"></TD>
            <TD COLSPAN="2" BGCOLOR="#decfde" ALIGN="RIGHT">{{$tax_state ?? ''}} sales tax</TD>
            <TD COLSPAN="1" ALIGN="RIGHT">$@format($tax*($subtotal+$table_data->EstShipCost))</TD>
        </TR>
        <TR>
            <TD COLSPAN="4"><HR></TD>
        </TR>
    @endif
    <tr>
        <td colspan="2" align="LEFT">[<a href="javascript:window.print()">Print This Page for your Records</a>]</td>
        <td colspan="2" align="RIGHT" bgcolor="#decfde">Total</td>
        <td colspan="1" align="RIGHT"><b><font color="Blue">$@format(($tax_states[strtoupper($table_data->AcctState)] ?? 0) * ($subtotal + $table_data->EstShipCost) + $subtotal + $table_data->EstShipCost)</font></b></td>
    </tr>
    <tr bgcolor="#C0C0C0">
        <td valign="TOP" colspan="5" align="CENTER">
            <strong>D.S. Sewing Inc - Custom Industrial Sewing and Heat Sealing. If you can imagine it, we can sew it !</strong>
        </td>
    </tr>
</TABLE>
<input type="hidden" name="SalesTax" value="@format(($tax ?? 0) * ($subtotal + $table_data->EstShipCost))">