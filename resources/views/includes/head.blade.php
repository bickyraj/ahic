<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">

    <!-- Title-->
    <title>AHIC - Australian Harbour International College</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SEO Meta-->
    <meta name="description" content="Australian Harbour International College">
    <meta name="keywords" content="Australian Harbour International College">
    <meta name="author" content="AHIC">

    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}public/ahic/img/favicon/favicon.ico">
    <link rel="shortcut icon" href="{{asset('/')}}public/ahic/img/favicon/114x114.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/')}}public/ahic/img/favicon/96x96.png">


    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">


    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset('/')}}public/ahic/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}public/ahic/fonts/themify-icons/css/themify-icons.css">


    <!-- stylesheet-->
    <link rel="stylesheet" href="{{asset('/')}}public/ahic/css/vendors.bundle.css">
    <link rel="stylesheet" href="{{asset('/')}}public/ahic/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}public/modal/jquery.modal.min.css">
    

    <style media="screen">
    .close-modal{
      display:none !important;
    }

    #ex1{
      background: -moz-linear-gradient(268deg, rgba(255,235,230,1) 0%, rgba(227,244,234,1) 45%, rgba(194,255,239,1) 99%, rgba(194,255,239,1) 100%); /* ff3.6+ */
     background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255,235,230,1)), color-stop(45%, rgba(227,244,234,1)), color-stop(99%, rgba(194,255,239,1)), color-stop(100%, rgba(194,255,239,1))); /* safari4+,chrome */
     background: -webkit-linear-gradient(268deg, rgba(255,235,230,1) 0%, rgba(227,244,234,1) 45%, rgba(194,255,239,1) 99%, rgba(194,255,239,1) 100%); /* safari5.1+,chrome10+ */
     background: -o-linear-gradient(268deg, rgba(255,235,230,1) 0%, rgba(227,244,234,1) 45%, rgba(194,255,239,1) 99%, rgba(194,255,239,1) 100%); /* opera 11.10+ */
     background: -ms-linear-gradient(268deg, rgba(255,235,230,1) 0%, rgba(227,244,234,1) 45%, rgba(194,255,239,1) 99%, rgba(194,255,239,1) 100%); /* ie10+ */
     background: linear-gradient(182deg, rgba(255,235,230,1) 0%, rgba(227,244,234,1) 45%, rgba(194,255,239,1) 99%, rgba(194,255,239,1) 100%); /* w3c */
     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FFEBE6', endColorstr='#C2FFEF',GradientType=0 ); /* ie6-9 */
    padding-top: 50px;
    padding-bottom: 50px;
    padding-left: 25px;
    padding-right: 25px;
    text-align:center;
    }
    </style>
@yield('style')


  </head>

  <body>
