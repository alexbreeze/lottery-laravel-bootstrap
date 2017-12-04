<!DOCTYPE html>
<html>
<head>
<title>Lottery</title>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('logo.ico')}}" media="screen"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-default">
<div class="container-fluid">
@yield('navbar')
</div>
</nav>
@yield('div-lottery')
@yield('div-recode')
@include('include')
</body>
</html>