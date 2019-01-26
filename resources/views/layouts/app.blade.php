<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/monokai.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/paper-bootstrap-wizard.css')}}">



</head>
<body class="image-container" style="background-image: url({{asset('img/bg.png')}})">
<!-- Steppers -->
@yield('content')

<div class="footer mb-3 mt-0">
    <div class="container text-center">
        &copy;{{date('Y')}} Information Technology Student Union | Nomination Formation
    </div>
</div>
<!--NVD3-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>

<script src="{{asset('js/prism.min.js')}}"></script>
<script src="{{asset('js/step.js')}}"></script>
<script src="{{asset('js/paper-bootstrap-wizard.js')}}"></script>
<script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="{{asset('js/mask.init.js')}}"></script>
</body>
</html>