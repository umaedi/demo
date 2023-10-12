<!DOCTYPE html>
<html lang="en" class="font-inter scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('dist') }}/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aos') }}/dist/aos.css">
    <title>{{ $title ?? 'ICOMESH 2023' }}</title>
    <meta name="description" content="international conferencce on medical science and health (ICOMESH 2023)">
    <meta name="keywords" content="icomesh, unila">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $title ?? 'ICOMESH 2023' }}">
    <meta property="og:description" content="{{ $title ?? 'international conferencce on medical science and health (ICOMESH 2023)' }}">
    <meta property="og:image" content="{{ asset('dist/img/logo-icomesh.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('dist') }}/img/favicon.ico">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'icomesh' }}">
    <meta property="twitter:description" content="{{ $title ?? 'international conferencce on medical science and health (ICOMESH 2023)' }}">
    <meta property="twitter:image" content="{{ asset('dist/img/logo-icomesh.png') }}">
</head>

<body class="bg-white">
    @include('layouts.front.navbar')
    @yield('content')
    @include('layouts.front.footer')

    <script src="{{ asset('aos') }}/dist/aos.js"></script>
    <script src="{{ asset('dist') }}/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
    @stack('js')
</body>

</html>