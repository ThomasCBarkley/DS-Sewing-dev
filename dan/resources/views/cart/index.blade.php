<?php $subtotal = $sum_weight = 0 ?>
@include('..common.header')
<table cellspacing="1" cellpadding="2" border="1" bgcolor="#ffcc66">
    <tbody><tr bgcolor="#ffaa00" align="CENTER"><td><b>Qty</b></td>
        <td align="CENTER"><b>Description</b></td>
        <td align="CENTER"><b>SKU</b></td>
        <td align="CENTER"><b>Unit Price</b></td>
        <td align="CENTER"><b>Ext. Price</b></td>
    </tr><tr>
    @foreach($items as $item)
        @include('cart.parts.items', ['item' => $item])
        <?php $sum_weight += ($item->qty * $item->weight) ?>
        @if ($item->price != $item->discountprice)
			<?php $subtotal += ($item->discountprice * $item->qty); ?>
        @else
			<?php $subtotal += ($item->price * $item->qty); ?>
        @endif
    @endforeach
    </tbody></table>
@include('cart.parts.totals', ['subtotal' => $subtotal, 'sum_weight' => $sum_weight])