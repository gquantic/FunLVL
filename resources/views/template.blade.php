<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FunLVL</title>
    <meta property="og:site_name" content="FunLVL"/>
    <meta property="og:description" content="FunLVL"/>
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <link href="{{ asset('css/self-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.scss') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
</head>
<body style="background-color: #fafafa;!important;">
<x-header/>
@yield('main')
<x-footer/>
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/socket.js') }}"></script>
<script src="{{ asset('js/vendors.min.js') }}"></script>
{{--<script src="{{ asset('js/components.css') }}"></script>--}}
{{--<script src="{{ asset('js/components.min.css') }}"></script>--}}
</body>
</html>
