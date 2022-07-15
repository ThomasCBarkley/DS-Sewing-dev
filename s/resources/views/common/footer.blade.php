<div class="row">
    <div class="col-12 d-flex justify-content-center text-center">
        <div class="footer-row row">
            <div class="footer-col col-0 first"></div>
            <div class="footer-col col-0 second">
                <a href="https://www.ds-sewing.com/" target="">
                    <img alt="Returns to Homepage" src="https://www.ds-sewing.com/images/footer_images/logo3.gif"
                         width="87" height="39" border="0">
                </a>
            </div>
            <div class="footer-col col-0 center">
                <span>PO Box 8983, New Haven CT 06532</span>
            </div>
            <div class="footer-col col-0 last">
                @if (isset($posts) && $posts)
                    {{$posts->links('pagination::default-ds')}}
                    {{$posts->links('pagination::totals')}}
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center text-center footer-copyright">
        <nobr>Copyright D.S.Sewing 1999-{{ now()->year }}. All rights reserved</nobr>
    </div>
</div>