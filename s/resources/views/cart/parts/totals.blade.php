<table cellspacing="4" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td>
            <table cellspacing="4" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td><b>Sub Total</b></td>
                    <td>$@format($subtotal)</td>
                </tr>
                <tr>
                    <td><b>Estimated Weight</b></td>
                    <td>@format($sum_weight) lbs.</td>
                </tr>
                </tbody>
            </table>
        </td>
        <td>
            <form method="get"
                  action="/s/tinycart/checkout"
                  style="margin-bottom: 3px;"
                  enctype="multipart/form-data">
                <input style="width:150" type="SUBMIT" value="Checkout">
                @csrf
            </form>
            <input style="width:150" type="BUTTON" value="Continue Shopping" onclick="javascript:window.location = '/';">
        </td>
    </tr>
    </tbody>
</table>