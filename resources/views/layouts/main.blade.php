<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("favicon/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("favicon/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("favicon/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ asset("favicon/site.webmanifest") }}">

    <link rel="stylesheet" href="{{ mix('css/layouts/main.css') }}">

    <title>Laragram</title>
</head>
<body>
    @include('layouts.parts.main.header')

    <main>
       @yield('content')
    </main>


{{--    @include('layouts.parts.main.footer')--}}
    <script src="{{ mix('js/layouts/main.js') }}"></script>
</body>
</html>
