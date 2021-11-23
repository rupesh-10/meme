<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="{{ asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('frontend/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/color.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

@yield('styles')

</head>
<body>
<div class="theme-layout">
    @include('frontend.layouts.header')
@yield('content')
</div>
@include('frontend.layouts.footer')
  <script src="{{ asset('frontend/js/main.min.js') }}"></script>
	<script src="{{ asset('frontend/js/script.js') }}"></script>
	<script src="{{ asset('frontend/js/map-init.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
    <script src="https://kit.fontawesome.com/7362fdfc7d.js" crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>