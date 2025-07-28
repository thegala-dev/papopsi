<meta name="description" content="{{ $this->description ?? '' }}" />
<meta name="keywords" content="{{ $this->keywords ?? '' }}" />

<meta property="og:title" content="{{ $this->ogTitle ?? 'Papopsi' }}" />
<meta property="og:description" content="{{ $this->ogDescription ?? '' }}" />
<meta property="og:image" content="{{ Vite::asset('resources/images/og_image.png') }}" />
<title>{{ $title ?? config('app.name') }}</title>
