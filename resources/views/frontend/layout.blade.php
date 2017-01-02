<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    {{--<meta name="bot" content="@if($_ENV['BOT']) BOT @endif {{ $_SERVER['HTTP_USER_AGENT'] }}"/>--}}
    <!-- section SEO  -->
    @yield('seo')
    <!-- / section SEO  -->
    <link rel="canonical" href="{{ $_SERVER['REQUEST_URI'] }}">
    <!-- CSS  -->  {{--  !!!   последовательность css не менять--}}
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/frontend/css/style.css" type="text/css" media="screen,projection">
    <link rel="stylesheet" href="/frontend/css/print.css" type="text/css" media="print">
    <link rel="stylesheet" href="/css/additional.css" type="text/css">
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- / CSS  -->
    <!-- FONTS  -->
    <link href="http://allfont.ru/allfont.css?fonts=a_avantetck-medium" rel="stylesheet" type="text/css"/>
    <link href="http://allfont.ru/allfont.css?fonts=a_avantetck-heavy" rel="stylesheet" type="text/css"/>
    <link href="http://allfont.ru/allfont.css?fonts=a_avantebs" rel="stylesheet" type="text/css"/>
    <link href="http://allfont.ru/allfont.css?fonts=a_avanteltnr-thinitalic" rel="stylesheet" type="text/css"/>
    <link href="http://allfont.ru/allfont.css?fonts=a_avantebsnr-light" rel="stylesheet" type="text/css"/>
    <link href="http://allfont.ru/allfont.css?fonts=a_avantebsnr-bold" rel="stylesheet" type="text/css"/>
    <!-- / FONTS  -->
    <!-- SCRIPTS  -->
    {!! Html::script("frontend/js/jquery-2.1.3.min.js") !!}
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel.pack.js"></script>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js"></script>
    <!-- section top-scripts  -->
    @yield('top-scripts')
    <!-- / section top-scripts  -->
    @include('frontend.googleAnalistic')
    <!-- / SCRIPTS  -->
</head>
<body>
<!-- include  -->
@include('frontend.partials.nav_menu')
@include('frontend.partials.header')
<!-- include  -->
<!-- section CONTENT  -->
@yield('content')
<a id="otvet" class="various fancybox.ajax" href="/otvet"></a>
<!-- / section CONTENT  -->
@include('frontend.partials.footer')
<!--Modals-->
<!-- / Modals-->
<!-- Scripts -->
<!-- section filter_handler -->
@yield('filter_handler')
<!-- / section filter_handler -->
<!-- section bottom-scripts -->
{!! Html::script("frontend/js/index.js") !!}
@yield('bottom-scripts')
<!-- / section bottom-scripts -->
<!-- section rate -->
@yield('rate')
<!-- / section rate -->
@include('frontend.yandexMetric')
<!-- / Scripts -->
</body>
</html>