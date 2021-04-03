<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="{{ asset('images/frontend/fav.png')}}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/frontend/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/color.css')}}">
    <link rel="stylesheet" href="{{ asset('css/frontend/responsive.css') }}">
    <script src="https://kit.fontawesome.com/7362fdfc7d.js" crossorigin="anonymous"></script>


</head>
<body>
<div class="theme-layout">
    @include('layouts.header')
@yield('content')
</div>
@include('layouts.footer')
  <script src="{{ asset('js/frontend/main.min.js') }}"></script>
	<script src="{{ asset('js/frontend/script.js') }}"></script>
	<script src="{{ asset('js/frontend/map-init.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
</body>
</html>
