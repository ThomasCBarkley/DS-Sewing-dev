@if ($paginator->hasPages())
    <table width="70" height="23" cellspacing="0" cellpadding="0" border="0" bgcolor="#6666ff">
        <tbody>
        <tr>
            {{-- Previous Page Link --}}
            <td align="right">
            @if ($paginator->onFirstPage())
                    <img src="https://www.ds-sewing.com/images/footer_images/back_gray.gif" alt="" width="24" height="23" border="0">
            @else
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <img src="https://www.ds-sewing.com/images/footer_images/back2.gif" alt="to page {{$paginator->currentPage()-1}} of {{$paginator->total()}}" width="24" height="23" border="0">
                    </a>
            @endif
            </td>

            {{-- Next Page Link --}}
            <td align="left">
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <img src="https://www.ds-sewing.com/images/footer_images/next2.gif" alt="to page {{$paginator->currentPage()+1}} of {{$paginator->total()}}" width="24" height="23" border="0">
                    </a>
            @else
                <img src="https://www.ds-sewing.com/images/footer_images/next_gray.gif" width="24" height="23" border="0">
            @endif
            </td>
        </tr>
        </tbody>
    </table>
@endif
