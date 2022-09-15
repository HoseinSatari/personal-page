<!DOCTYPE html>
<html lang="fa" dir="rtl" class="crt crt-side-box-on crt-nav-on crt-nav-type2 crt-main-nav-on crt-sidebar-on crt-layers-1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .mb-2{
            margin-bottom: 0.5rem;
        }
    </style>
    <title>@yield('title' ,  option()->sitename)</title>
    <meta name="subject" content="@yield('subject')"/>
    <meta name="description" content="@yield('descrip' , 'صفحه اصلی ')">
    <meta name="keywords" content="@yield('keyword' , option()->keyword)">
    <meta property=”og:locale” content=”fa_IR”>
    <meta property=”og:type” content=”Personal_Page”>
    <meta name="author" content="Hoseinsattari, ho3einsss84@gmail.com , 09305257455"/>
    <meta name="language" content="fa"/>
    <meta name="robots" content="index, follow"/>
    <meta name="application-name" content="{{option()->sitename}}">
    <meta name="apple-mobile-web-app-title" content="{{option()->sitename}}">

    <link rel="apple-touch-icon"  href="{{option()->logo}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{option()->logo}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{option()->logo}}">
    <link rel="shortcut icon" href="{{option()->logo}}">


    <!-- Icon Fonts -->
    <link href="/assets/css/icomoon.css" rel="stylesheet">

    <!-- Styles -->
    <link href="/assets/css/plugins.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    @livewireStyles
    <!-- Theme Color -->
    <meta name="theme-color" content="#d14b4a">
    <link rel="stylesheet" href="/ckeditor/theme/styles/paraiso-dark.min.css">
    <!-- Modernizer -->
    <script type="text/javascript" src="/assets/js/vendor/modernizr-3.3.1.min.js"></script>
</head>

<body class="">

<div class="crt-wrapper">

    <livewire:header /><!-- #crt-header -->

    <div id="crt-container" class="crt-container">
        <livewire:side-right /><!-- #crt-side-box-wrap -->

    @if(request()->routeIs('home'))
        <livewire:nav-left /><!-- .crt-nav-wrap -->
        @endif

        <div class="crt-container-sm">
            {{ $slot ?? '' }}
            <!-- .crt-paper-layers -->
        </div>
        <!-- .crt-container-sm -->
    </div>
    <!-- .crt-container -->

    <livewire:side-left /><!-- #crt-sidebar -->


    <livewire:footer /> <!-- #crt-footer -->

    <svg id="crt-bg-shape-1" class="hidden-sm hidden-xs" height="519" width="758">
        <polygon class="pol" points="0,455,693,352,173,0,92,0,0,71"></polygon>
    </svg>

    <svg id="crt-bg-shape-2" class="hidden-sm hidden-xs" height="536" width="633">
        <polygon points="0,0,633,0,633,536"></polygon>
    </svg>
</div>
<!-- .crt-wrapper -->
@livewireScripts
<!-- Scripts -->
<script type="text/javascript" src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEn4c_T1rFt7ltf_oNavnjND8dDPm4KQs&language=fa"></script>--}}

<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script type="text/javascript" src="/assets/js/scripts.js"></script>
<script type="text/javascript" src="/app/app.js" ></script>

</body>

</html>
