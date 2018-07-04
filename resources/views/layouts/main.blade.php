<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'ElixirShop') }} - @yield('title')</title>

{{--    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{ asset('libs/bootstrap/bootstrap-grid-3.3.2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/myFonts/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/magnific/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}" />
    <link rel="stylesheet" href="@yield('css')" />
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" />
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/slick-1.6.0/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/slick-1.6.0/slick/slick-theme.css') }}">

    <script src="{{ asset('libs/modernizr/modernizr.js') }}"></script>

</head>
<body>
<div class="wrapper">
    @yield('header')
    @yield('breadcrumbs')
    @yield('content')
<div class="empty"></div>
</div>
    @yield('footer')
<div class="hidden"></div>

<script src="{{ asset('libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('libs/stellar/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('libs/animate/animate-css.js') }}"></script>
<script src="{{ asset('libs/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('libs/magnific/jquery.magnific-popup.min.js') }}"></script>
<!-- /Slick -->
<script src="{{ asset('libs/slick-1.6.0/slick/slick.min.js') }}" defer></script>

<script src="{{ asset('js/common.js') }}"></script>

</body>
</html>
