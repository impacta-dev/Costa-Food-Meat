<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/2dcece28bf557cd56fae90acb2c5e7d5.js"></script>
    @section('head_metas')
        {{-- Meta tags --}}
        <title>@section('meta_title'){{ $page->meta_title ?? config('app.name') }}@show</title>
        <meta name="description" content="@section('meta_description'){{ $page->meta_description }}@show">
        {{-- Open Graph --}}
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@section('og_title'){{ $page->meta_title ?? config('app.name') }}@show">
        <meta property="og:description" content="@section('og_description'){{ $page->metatag_description }}@show">
        <meta property="og:image" content="@section('og_image'){{ asset('img/fb_logo.jpg') }}@show">
        <meta property="og:image:width" content="@section('og_image_width'){{ '1200' }}@show">
        <meta property="og:image:height" content="@section('og_image_height'){{ '628' }}@show">
        <meta property="og:type" content="@section('og_type'){{ 'website' }}@show">
        {{-- Twitter Card --}}
        <meta property="twitter:card" content="@section('tw_type'){{ 'summary_large_image' }}@show" />
        <meta property="twitter:title" content="@section('tw_title'){{ url()->current() }}@show" />
        <meta property="twitter:description" content="@section('tw_description'){{ $page->metatag_description }}@show" />
        <meta property="twitter:image" content="@section('tw_image'){{ asset('img/fb_logo.jpg') }}@show" />
    @show
    {{-- Google Search console --}}
    <meta name="google-site-verification" content="Hzi8kKhvR5HGav7Qt2OvNDXykrjxqDZa1cVRoRkl6RU" />
    {{-- Analytics --}}
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3BGT181KZ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Q3BGT181KZ');
    </script>
</head>
<body class="page-{{ $page->view }}{{ config('costa-food.edition_mode') ? ' edition-mode' : '' }}">
    {{--  Preload effect  --}}
    @if (!config('app.debug') && !config('costa-food.edition_mode'))
        <div class="preloader d-none d-xl-block">
            <div class="preloader__spinner"></div>
        </div>
        <div class="revealer revealer--loading d-none d-xl-block">
            <div class="revealer__layer"></div>
            <div class="revealer__layer"></div>
            <div class="revealer__layer"></div>
        </div> 
    @endif
    {{--  Content  --}}
    <div class="main-container">
        @yield('content')
        @include('partials.footer')
    </div>
    @include('partials.menu')
    {{-- @include('cookieConsent::index') --}}
    {{-- Edition bar --}}
    @if (config('costa-food.edition_mode'))
        <div class="edition-bar">
            <span class="edition-bar__saved"><img src="/img/icons/check-w.svg" alt=""> Guardado</span>
            <span class="edition-bar__error"><img src="/img/icons/warning-w.svg" alt=""> Error</span>
            <a href="/edition-logout" target="_self" class="edition-bar__logout">Salir de modo edición <img src="/img/icons/x-w.svg" alt=""></a>
        </div>
    @endif
    {{-- js --}}
	<script src="{{ mix('js/manifest.js') }}"></script>
	<script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    {{-- @include('partials.cookieControl') --}}
    @if (!config('app.debug'))
        {{--  <script>document.addEventListener('contextmenu', event => event.preventDefault());</script>  --}}
    @endif
    @yield('js')
</body>
</html>