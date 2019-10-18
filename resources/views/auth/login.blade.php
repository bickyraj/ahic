<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel = { 
    csrfToken: '{{ csrf_token() }}',
    baseUrl: '{{ url('') }}',
    vueBaseUrl: '{{ env("VUE_BASE_URL") }}',
     }</script>

    <title>AHIC - Australian Harbour International College | Admin</title>

    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}public/front/img/favicon/favicon.ico">
    <link rel="shortcut icon" href="{{asset('/')}}public/front/img/favicon/114x114.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/')}}public/front/img/favicon/96x96.png">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css') }}">
    <link href="{{ asset('public/css/admin-style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/css/login-style.css') }}" rel="stylesheet" type="text/css" />
    <style>
    .mce-widget.mce-notification.mce-in{
      display:none !important;
    }
    </style>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <div id="app"></div>
  <script src="{{ asset('public/js/app.js') }}"></script>

</body>
</html>