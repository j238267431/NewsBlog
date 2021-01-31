<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>@if(!isset($title)){{'NewsBlog'}}@else{{$title}}@endif</title>
    <link rel="stylesheet" href="{{asset('css/switcher.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico' )}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>
<!-- ##### Header Area Start ##### -->
<x-adminHeader :categories="$categories"/>
<!-- ##### Header Area End ##### -->
<!-- ##### Hero Area Start ##### -->


@yield('content')
<!-- ##### Hero Area End ##### -->

<!-- ##### Blog Content Area Start ##### -->

<!-- ##### Blog Content Area End ##### -->

<!-- ##### Instagram Area Start ##### -->

<!-- ##### Instagram Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
<!-- All Plugins js -->
<script src="{{asset('js/plugins/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>
@stack('js')
</body>

</html>
