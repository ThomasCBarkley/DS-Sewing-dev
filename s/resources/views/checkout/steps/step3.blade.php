<td valign="TOP">
    <table border="0" cellspacing="1" celpadding="2" bgcolor="#ffcc66">
        <tbody>
        <tr>
            <td></td>
        </tr>
        <tr bgcolor="#ffaa00">
            <td colspan="3" align="CENTER"><b>Shipping Methods Available</b></td>
        </tr>
        <tr>
            <td><b>Carrier</b></td>
            <td><b>Price</b></td>
            <td>&nbsp;</td>
        </tr>
        @foreach($shipping['methods'] as $code => $method)
            <tr>
                <td>{{ $method['title'] }}</td>
                @if ($method['cost'] > 0)
                    <td>${{ $method['cost'] }}</td>
                    <input type="hidden" name="EstShipCost[{{$code}}]" value="{{ $method['cost'] }}">
                    <td>
                        <input type="RADIO" name="ShippingMethod" value="{{$code}}" {!! $shipping['shipmethod'] == $code ? 'CHECKED' : '' !!}>
                    </td>
                @else
                    <td>Not Avail</td>
                @endif
                <td>&nbsp;</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</td>
@include('cart.parts.shipping')

<tr>
    <td>&nbsp;</td>
    <td align="CENTER">
        <input type="SUBMIT" value="Enter Billing Info">
    </td>
</tr>