<?php $steps = ['Account Information', 'Shipping Address', 'Shipping Method', 'Billing Info', 'Confirmation', 'Finished'] ?>
<td valign="TOP">
    <table cellspacing="2" cellpadding="1" border="0" bgcolor="#F0F0F0">
        <tbody>
        <tr bgcolor="#C0C0C0">
            <td colspan="2" align="CENTER"><b>Step</b></td>
        </tr>
        @for($i =0; $i < count($steps); $i++)
            <tr>
                <td><b>{{$i+1}}.</b></td>
                @if ($currentStep-1 == $i)
                    <td><b><u><font color="Red">{{$steps[$i]}}</font></u></b></td>
                @else
                    <td><b>{{$steps[$i]}}</b></td>
                @endif
            </tr>
        @endfor
        </tbody>
    </table>
</td>