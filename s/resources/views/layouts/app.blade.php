<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('meta-title', env('META_TITLE'))</title>
    <meta name="keywords"
          content="@yield('meta-keywords', 'truck tarps,truck parts,Dave the tarp guy,custom covers,steel tarps,custom truck tarps,truck tarps custom tarps,boat storage covers,swimming pool covers,custom pool covers,polyethylene tarps,blue poly tarps')">
    <meta name="description"
          content="@yield('meta-description', env('META_DESCRIPTION'))">
    <meta name="robots" content="@yield('robots', 'index,follow')">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="PICS-Label"
          content='(PICS-1.0 "http://www.classify.org/safesurf/" l gen true for "/" by "webmaster@ds-sewing.com" r (SS~~000 1 SS~~100 1))'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name="rating" content="General">
    <meta NAME="re-visit" CONTENT="10 days">
    <meta name="google-site-verification" content="IrHTzMNIiS33bCj3nAvVPGGMWnopJW5wYxGg5ftijCo"/>
    <meta name="verify-v1" content="7AGKTsHEzLlHEW3WA00l2scufzNZXn1c1Nh4A1KcHzg="/>

    <meta name="twitter:card" content="summary"/>
    <meta property="og:title" content="@yield('meta-title', env('META_TITLE'))"/>
    <meta property="og:description" content="@yield('meta-description', env('META_DESCRIPTION'))"/>

    <link rel="icon" type="image/png" href="/images/favicon-32.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @section('styles')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
    <script type="application/ld+json">
  {
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "https://www.ds-sewing.com/",
  "logo": "https://www.ds-sewing.com/images/toolbar_images/logo.gif",
  "image": ["https://www.ds-sewing.com/images/toolbar_images/logo.gif"],
  "email": "dsteinhardt@ds-sewing.com",
  "address": {
    	"@type": "PostalAddress",
    	"addressLocality": "New Haven",
    	"addressRegion": "CT",
    	"postalCode": "06513-3834",
    	"streetAddress": "260 Wolcott St"
  },
  "description": "Truck covers,tarps and accessories for trucking fleets and independent owner operators & custom tarps, custom boat storage covers & swimming pool covers too.",
  "name": "D S Sewing",
  "telephone": "1-800-789-8143"
  }
</script>
    @livewireStyles
</head>
<body>
<div id="app">
    @yield('content')
</div>
@livewireScripts

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JFNFFHB71D"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-JFNFFHB71D');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-190407276-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-190407276-1');
</script>
</body>
</html>
