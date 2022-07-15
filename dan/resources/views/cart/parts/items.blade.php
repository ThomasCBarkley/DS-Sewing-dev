<form method="post" action="/dan/tinycart" enctype="multipart/form-data">
@csrf
<tr>
    <td><input name="qty" value="{{$item->qty}}" size="4" maxlength="4"></td>
    <td>{{$item->description}}</td>
    <td>{{$item->pid}}<input type="HIDDEN" name="pid" value="{{$item->pid}}"></td>
    <td align="right">
        @if ($item->price != $item->discountprice)
            $@format($item->discountprice)
            <font size="-1" color="red"> (You saved $@format($item->qty * ($item->price - $item->discountprice))</font>
            </TD>
            <TD align="right" valign="top" width="10%">$@format($item->discountprice * $item->qty)</TD>
        @else
            $@format($item->price)
            </TD><TD align="right" valign="top" width="10%">$@format($item->price * $item->qty)</TD>
        @endif
    </td>
    <td><input type="SUBMIT" name="action" value="update"></td>
    <td></td>
    <td>
        <input type="SUBMIT" name="action" value="remove">
        <input type="HIDDEN" name="id" value="{{$item->id}}">
        <input type="HIDDEN" name="last_action" value="">
    </td>
</tr>
</form>