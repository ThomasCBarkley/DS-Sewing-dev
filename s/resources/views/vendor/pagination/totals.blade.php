@if ($paginator->hasPages())
    <tr>
        <td valign="top" height="27" align="center">
            <p style="margin-left: 10px;">
                <font size="-2" face="arial" color="#6666ff"> page {{$paginator->currentPage()}} of {{$paginator->lastPage()}}</font>
            </p>
        </td>
    </tr>
@endif