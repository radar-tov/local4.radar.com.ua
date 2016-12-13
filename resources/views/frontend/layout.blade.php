<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
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
{{ dump($_ENV['BOT']) }}
<!-- include  -->
@include('frontend.partials.nav_menu')
@include('frontend.partials.header')
<!-- include  -->
<!-- section CONTENT  -->
@yield('content')
<!-- / section CONTENT  -->
@include('frontend.partials.footer')
<!--Modals-->
<div id="application" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
        <div class="input-field col s12 center-align">
            <form action="{!! route('mail.me') !!}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_view" value="contact"/>

                <input placeholder="введите ваше имя" id="name" name="name" type="text" class="validate"
                       required="required">
                <input placeholder="номер телефона" id="phone" name="phone" type="text" class="validate"
                       required="required">
                <input placeholder="email" id="email" name="email" type="text" class="validate" required="required">
                <input placeholder="примечание" id="comment" name="comment" type="text" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action">Отправить <i
                            class="fa fa-envelope"></i></button>
            </form>
        </div>
    </div>
</div>


<div id="forgot" class="modal">
    <div class="modal-content">
        <form action="{{ url('password/email') }}" method="POST">
            {!! csrf_field() !!}
            <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
            <div class="input-field col s12 center-align">
                <input placeholder="введите ваш e-mail" id="name_call" type="text" name="email" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action"> Выслать письмо <i
                            class="fa fa-envelop"></i></button>
            </div>
        </form>
    </div>
</div>

<!-- Review modal -->
<div id="review" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
        {{--@if(Auth::check())--}}
            <form action="{!! route('add.review') !!}" method="post" id="review-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="product_id" value="{{ $productReviewId or 0 }}"/>
                <div class="input-field col s12">
                    <input class="materialize-textarea" disabled placeholder="Ваше имя"
                           name="name" value="{{ str_replace(' ', '&nbsp;', ( Auth::check() ? Auth::user()->name : 'anonimus')) }}" type="text"/>
                    <textarea class="materialize-textarea" placeholder="Отзыв" name="body" value="" required></textarea>
                    <button class="btn waves-effect waves-light" type="submit"
                            onclick="yaCounter39848700.reachGoal('addComent'); ga('send', 'event', 'Knopka', 'addComent'); return true;">Отправить</button>
                </div>
            </form>
    </div>
</div>
<!-- / Review modal -->
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