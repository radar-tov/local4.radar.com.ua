<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    {{--@section('meta')--}}
        {{--<title>{{ $MetaTitle or 'Radar' }}</title>--}}
        {{--<meta name="description" content="{{ $MetaDescription or '' }}"/>--}}
        {{--<meta name="description" content="{{ $MetaKeywords or '' }}"/>--}}
    {{--@show--}}

    @yield('seo')

	
	<? $canonicalLink=$_SERVER['REQUEST_URI'];
    ?>
<link rel="canonical" href="<? echo ($canonicalLink)?>">
	
    <!-- CSS  -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
  


    <link rel="stylesheet" type="text/css" media="print" href="/frontend/css/print.css">
	<link href="/frontend/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="http://allfont.ru/allfont.css?fonts=a_avantetck-medium" rel="stylesheet" type="text/css" />
    <link href="http://allfont.ru/allfont.css?fonts=a_avantetck-heavy" rel="stylesheet" type="text/css" />
    <link href="http://allfont.ru/allfont.css?fonts=a_avantebs" rel="stylesheet" type="text/css" />
    <link href="http://allfont.ru/allfont.css?fonts=a_avanteltnr-thinitalic" rel="stylesheet" type="text/css" />
    <link href="http://allfont.ru/allfont.css?fonts=a_avantebsnr-light" rel="stylesheet" type="text/css" />
     <link href="http://allfont.ru/allfont.css?fonts=a_avantebsnr-bold" rel="stylesheet" type="text/css" />

    @yield('top-scripts')

    <link rel="stylesheet" href="/css/additional.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84810260-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>

@include('frontend.partials.nav_menu')
@include('frontend.partials.header')
   

@yield('content')


@include('frontend.partials.footer')

<!--Modals-->

<div id="application" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
        <div class="input-field col s12 center-align">
            <form action="{!! route('mail.me') !!}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_view" value="contact"/>

                <input placeholder="введите ваше имя" id="name" name="name" type="text" class="validate" required="required">
                <input placeholder="номер телефона" id="phone" name="phone" type="text" class="validate" required="required">
                <input placeholder="email" id="email"  name="email" type="text" class="validate" required="required">
                <input placeholder="примечание" id="comment" name="comment" type="text" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action">Отправить  <i class="fa fa-envelope"></i></button>
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
                <button class="btn waves-effect waves-light" type="submit" name="action"> Выслать письмо <i class="fa fa-envelop"></i></button>
            </div>
        </form>
    </div>
</div>

<!-- Review modal -->
    <div id="review" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
            @if(Auth::check())
                <form action="{!! route('add.review') !!}" method="post" id="review-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="product_id" value="{{ $productReviewId or 0 }}"/>
                <div class="input-field col s12">
                    <input disabled placeholder="Ваше имя" name="name" value={{ str_replace(' ', '&nbsp;', Auth::user()->name) }} type="text" />
                    <textarea class="materialize-textarea" placeholder="Отзыв" name="body" value="" required></textarea>
                    <button class="btn waves-effect waves-light" type="submit">Отправить</button>
                </div>
            </form>
            @else
                <p class="red-text"><b>Только зарегистрированные пользователи могут оставлять отзывы</b></p>
                <ol class="col s12 remember">
                    {{--<li><a href="#" class="order-forgot-login-link">Я забыл логин</a></li>--}}
                    <li>
                        <a href="{{ route('login') }}" class="order-forgot-pwd-link modal-trigger">Вход</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="order-forgot-pwd-link modal-trigger">Регистрация</a>
                    </li>
                </ol>
            @endif
        </div>
    </div>
<!-- / Review modal -->

<!--Scripts-->
<!--JQuery-->
<script type="text/javascript" src="/frontend/js/jquery-2.1.3.min.js"></script>
<script>


{{--<script>--}}

    {{--$("#forgot").find('form').submit(function(event){--}}
        {{--event.preventDefault();--}}
        {{--$.post($(this).attr('action'), $(this).serialize()).done(function(){--}}
            {{--alert('done');--}}
        {{--})--}}
    {{--})--}}

{{--</script>--}}


        var disabled = $(".disabled").prop('disabled', true);



    </script>

    <script type="text/javascript">
    $("._disabled").click(function(){
        return false;
    })
    </script>
<script language="javascript">
    function printsite() {
        if (navigator.platform == "Win32"){
            window.print();
        } else {
            alert ("print out this page by hitting command + p");
        }}
</script>
@yield('bottom-scripts')
@yield('rate')
@yield('filter_handler')

    <script>

        var flashObject = $(".flashObject");
        flashObject.css({"display":"block"});


        $(document).ready(function(){
            $(".object-3d").click(function(){
                $(".modalTest").addClass("modalAnimation");
                $("body").append("<div class='lean-overlay over' id='materialize-lean-overlay-4' style='z-index: 1002; display: block; opacity: 0.5;'></div>");

                $('.over').show();
                flashObject.css({"margin":"auto"});
                function second(){
                    $(".object-hover").css({"display":"none"});
                }
                setTimeout(second,"400");

            });
            $(".objClose").click(function(){
                $('.over').hide();
                $(".modalTest").removeClass("modalAnimation");
                $(".over").css("display", "none");
                flashObject.css({"margin-left":"-3000px"});
            });
        });
    </script>
	
	
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter39848700 = new Ya.Metrika({
                    id:39848700,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    ecommerce:"dataLayer"
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39848700" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

	
</body>
</html>
