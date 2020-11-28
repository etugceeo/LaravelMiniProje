<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',config("app.name"))</title>

    {{--
    **Burdaki config() fonksiyonu title a bir değer girmedğimzi
    zaman varsayılan olarak config/app/ dosyası içinde
    name değerini alacak

    --}}
    @include('layouts.partials.head')
    @yield('head')
</head>
<body>
@include('layouts.partials.navbar')

@yield('content')
@include('layouts.partials.footer',['yil'=>2020])
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('footer')
</body>
</html>
