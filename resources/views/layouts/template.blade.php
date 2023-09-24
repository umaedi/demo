<!DOCTYPE html>
<html lang="en" class="font-inter scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist') }}/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aos') }}/dist/aos.css">
    <title>ICOMESH</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist') }}/img/favicon.ico">
</head>

<body class="bg-white">
    @include('layouts.front.navbar')
    @yield('content')
    @include('layouts.front.footer')

    <script src="{{ asset('aos') }}/dist/aos.js"></script>
    <script src="{{ asset('dist') }}/script.js"></script>
    @stack('js')
</body>

</html>