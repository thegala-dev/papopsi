<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Iubenda -->
    <script type="text/javascript" src="//embeds.iubenda.com/widgets/a812a7d6-8da5-4ba4-bdf7-7c64375107bc.js"></script>
    <!-- End Iubenda -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W8PMLZQS');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $description ?? __('seo.default.description') }}" />
    <meta name="keywords" content="{{ $keywords ?? '' }}" />

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $ogTitle ?? __('seo.default.og_title') }}" />
    <meta property="og:description" content="{{ $ogDescription ?? __('seo.default.og_description') }}" />
    <meta property="og:image" content="{{ Vite::asset('resources/images/og_image.png') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="it" />

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ request()->getHttpHost() }}">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? __('seo.default.title') }}">
    <meta name="twitter:description" content="{{ $description ?? __('seo.default.description') }}">
    <meta name="twitter:image" content="{{ Vite::asset('resources/images/og_image.png') }}">

    <title>{{ $title ?? __('seo.default.title') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/images/favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-white text-base text-papopsi-muted" data-view="{{$viewName}}">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8PMLZQS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<livewire:support.toast />

<!-- start: sticky header -->
@include('components.interface.header')
<!-- end: sticky header -->

{{ $slot }}

<!-- start: footer -->
@include('components.interface.footer')
<!-- end: footer -->

@livewireScriptConfig
</body>
</html>
