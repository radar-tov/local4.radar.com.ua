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
    <link rel="stylesheet" href="{{ elixir('css/frontend/all.css') }}" type="text/css"  media="screen">
    <link rel="stylesheet" href="/frontend/css/print.css" type="text/css" media="print">
    <!-- / CSS  -->
    <!-- SCRIPTS  -->
    <!-- section top-scripts  -->
    @yield('top-scripts')
    <!-- / section top-scripts  -->
    @include('frontend.googleAnalistic')
    <!-- / SCRIPTS  -->
</head>
<body onmouseover="focusHere();" onmouseout="focusOut();">
<!-- include  -->
@include('frontend.partials.nav_menu')
@include('frontend.partials.header')
<!-- include  -->
<!-- section CONTENT  -->
@yield('content')
<a id="otvet" class="various fancybox.ajax" href="/otvet"></a>
<!-- / section CONTENT  -->
@include('frontend.partials.footer')
<!-- Scripts -->
<!-- section bottom-scripts -->
<script type="text/javascript" src="{{ elixir('js/frontend/all.js') }}"></script>
@yield('bottom-scripts')
<!-- / section bottom-scripts -->
<!-- section rate -->
@yield('rate')
<!-- / section rate -->
@include('frontend.yandexMetric')
<!-- / Scripts -->
</body>
</html>