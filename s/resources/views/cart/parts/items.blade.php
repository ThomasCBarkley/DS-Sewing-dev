<form id="item-{{$item->id}}" method="post" action="/s/tinycart" enctype="multipart/form-data"></form>
<tr>
    <td><input form="item-{{$item->id}}" name="qty" value="{{$item->qty}}" size="4" maxlength="4"></td>
    <td>{{$item->description}}</td>
    <td>{{$item->pid}}<input form="item-{{$item->id}}" type="HIDDEN" name="pid" value="{{$item->pid}}"></td>
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
    <td><input form="item-{{$item->id}}" type="SUBMIT" name="action" value="update"></td>
    <td></td>
    <td>
        <input form="item-{{$item->id}}" type="hidden" name="_token" value="{{ csrf_token() }}">
        <input form="item-{{$item->id}}" type="SUBMIT" name="action" value="remove">
        <input form="item-{{$item->id}}" type="HIDDEN" name="id" value="{{$item->id}}">
        <input form="item-{{$item->id}}" type="HIDDEN" name="last_action" value="">
    </td>
</tr>
