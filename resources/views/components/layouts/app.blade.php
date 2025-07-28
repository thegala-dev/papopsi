<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $description ?? __('seo.default.description') }}" />
    <meta name="keywords" content="{{ $keywords ?? '' }}" />

    <meta property="og:title" content="{{ $ogTitle ?? __('seo.default.og_title') }}" />
    <meta property="og:description" content="{{ $ogDescription ?? __('seo.default.og_description') }}" />
    <meta property="og:image" content="{{ Vite::asset('resources/images/og_image.png') }}" />
    <title>{{ $title ?? __('seo.default.title') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-base text-papopsi-muted">
<livewire:support.toast />

<!-- start: sticky header -->
@include('components.interface.header')
<!-- end: sticky header -->

{{ $slot }}

<!-- start: footer -->
@include('components.interface.footer')
<!-- end: footer -->

</body>
</html>
