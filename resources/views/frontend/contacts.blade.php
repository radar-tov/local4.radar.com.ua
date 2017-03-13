@extends('frontend.layout')

@section('seo')
    <title>{{ 'Контакты' }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
@endsection

@section('top-scripts')

@endsection


@section('content')

    @inject('settingsProvider', '\App\ViewDataProviders\SettingsDataProvider')
    @inject('categoriesProvider', '\App\ViewDataProviders\CategoriesDataProvider')

    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Контакты</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="content">
        <!--Simple Menu-->
        <div class="container">
            <div class="row">
                <div class="col s12 m12 text-page no-padding">
                    <h3>Контакты</h3>
                    <div class="col s12 m12 l8 no-padding">

                        <div class="col s12 m6">
                            <p class="bold">О компании <span class="uppercase">"Интернет магазин Radar"</span></p>
                            <p>Благодаря нашей компании, вы всегда сможете купить отопительное оборудование с доставкой</p>
                            <p>Мы поставляем качественную продукцию по самым выгодным ценам</p>
                            <p class="bold">Наш адрес:</p>
                            <p>
                                @if(array_get($settingsProvider->getSettings(),'currency'))
                                    {{ array_get($settingsProvider->getSettings(),'currency') }},
                                @endif
                                @if(array_get($settingsProvider->getSettings(),'address'))
                                    {{ array_get($settingsProvider->getSettings(),'address') }}
                                @endif
                            </p>
                        </div>
                        <div class="col s12 m6">
                            <p class="bold">Контакты</p>
                            <ul class="contact-info">
                                <li class="phone">
                                    @if(array_get($settingsProvider->getSettings(),'footer_phone1'))
                                        <a class=""
                                           href="tel:{{ preg_replace('/[^\d+]+/','',array_get($settingsProvider->getSettings(),'footer_phone1')) }} "><span
                                                    class="tel">{{ array_get($settingsProvider->getSettings(),'footer_phone1') }}</span></a>
                                    @endif
                                </li>
                                <li class="phone">
                                    @if(array_get($settingsProvider->getSettings(),'footer_phone2'))
                                        <a class=""
                                           href="tel:{{ preg_replace('/[^\d+]+/','',array_get($settingsProvider->getSettings(),'footer_phone2')) }} "><span
                                                    class="tel">{{ array_get($settingsProvider->getSettings(),'footer_phone2') }}</span></a>
                                    @endif
                                </li>
                                <li class="phone">
                                    @if(array_get($settingsProvider->getSettings(),'footer_phone3'))
                                        <a class=""
                                           href="tel:{{ preg_replace('/[^\d+]+/','',array_get($settingsProvider->getSettings(),'footer_phone3')) }}"><span
                                                    class="tel"> {{ array_get($settingsProvider->getSettings(),'footer_phone3') }}</span></a>
                                    @endif
                                </li>

                                @if(array_get($settingsProvider->getSettings(),'contact_email'))
                                    <li class="mail"><span class="mail">{{ array_get($settingsProvider->getSettings(),'contact_email') }}</span></li>
                                @endif

                            </ul>
                        </div>
                        <div class="col s12 m12 feedback">
                            <h4>Обратная связь</h4>
                            <p class="col s12 no-padding">Отправьте нам е-мейл. Все поля, помеченные *, обязательны для заполнения.</p>
                            <form action="{!! route('mail.contact') !!}" id="contactForm" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_view" value="contact"/>
                                <div class="row">
                                    <div class="col s12 m6 no-padding">
                                        <div class="form-group">
                                            <input required="required" name="name" class="form-control col" id="name"
                                                   placeholder="Ваше имя (*)" title="Name" value="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input required="required" name="email"
                                                   class="form-control col validate-email" id="email"
                                                   placeholder="Ваш email (*)" title="Email" value="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="input-text col form-control" name="phone" id="phone"
                                                   placeholder="Ваш номер телефона (*)" title="Telephone" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 m6 no-padding">
                                        <div class="form-group">
                                        <textarea required="required" name="comment" placeholder="Ваше сообщение (*)" id="comment" title="Comment"
                                                  class="form-control col input-text" cols="5"
                                                  rows="3"></textarea>
                                        </div>

                                    </div>
                                    <div class="buttons-set clearfix">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col s12 m12 l4 no-padding">
                        <div id="map">
                            <div id="map-container">
                                <!-- <script src="js/3dtour.js"></script> -->
                                {!! array_get($Settings,'map_code') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Menu-->

    </section>

@endsection

@section('bottom-scripts')
    <script src="frontend/js/jquery.maskedinput.min.js"></script>
    <script>
        $("#phone").mask("(999) 999-99-99");
    </script>
    @if(Session::get('from_otvet'))
        <script>
            $(document).ready(function () {
                $("#otvet").click();
            });
        </script>
    @endif
@endsection