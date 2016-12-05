@extends('frontend.layout')
@inject('settingsProvider', '\App\ViewDataProviders\SettingsDataProvider')
@section('seo')
    <title>{{ 'Интернет-магазин отопительного оборудования и сантехники Radar' }}</title>

    <meta name="description"
          content="В интернет-магазине Radar предоставляеться огромный выбор котлов по лучшим ценам. 100% наличие! Техника высокого качества. Доставка по Одессе и Украине. Наш тел: (096)84-23-752"/>
    <meta name="keyword" content=""/>
@endsection

@section('content')

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l4 catalog no-padding main-sidebar">
                    @include('frontend.partials.sidebar')
                </div>
                <div class="col s12 m12 l8 catalog no-padding">
                    @include('frontend.partials.home_page_slider')
                </div>
            </div>
        </div>
        @include('frontend.partials.sale_slider')
        <div class="container">
            <div class="row">
                @include('frontend.partials.products.sale_products_slider')
                @include('frontend.partials.products.new_products_slider')
            </div>
        </div>

    </section>
    <section class="advantages">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="part-one">
                        <div>
                            <h3>Условия для монтажников</h3>
                            @if(array_get($settingsProvider->getSettings(),'uslovia'))

                                {!! array_get($settingsProvider->getSettings(),'uslovia') !!}

                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="our_partners">
        <div class="container">
            <div class="row">
                @include('frontend.partials.products.our_partners_slider')
            </div>
        </div>
    </section>

    <section class="description">
        <div class="container">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m12 l6 about-us">
                    <div class="about_pic">
                        <div class="for-pic">
                            <img src="/public/frontend/images/about_us.png" alt="">
                        </div>
                    </div>
                    <div class="about_text">
                        <h4>О нас</h4>


                        @if(array_get($settingsProvider->getSettings(),'about'))

                            {!! array_get($settingsProvider->getSettings(),'about') !!}

                        @endif

                    </div>

                </div>

                {{--<div class="col s12 m12 l6 feedback">--}}
                    {{--<h4>Отзывы</h4>--}}

                    {{--@if(array_get($settingsProvider->getSettings(),'reviews'))--}}

                        {{--{!! array_get($settingsProvider->getSettings(),'reviews') !!}--}}

                    {{--@endif--}}

                {{--</div>--}}
            </div>
        </div>
    </section>

    <div id="montagniki" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-action modal-close btn-flat "><i class="fa fa-close"></i></a>
            <div class="input-field col s12 center-align">
                <div class="col s12 m12 feedback">
                    <h4>Обратная связь</h4>
                    <p class="col s12 no-padding">Отправьте нам е-мейл. Все поля, помеченные *, обязательны для
                        заполнения.</p>
                    <form action="{!! route('mail.me') !!}" id="contactForm" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_view" value="skidka"/>
                        <div class="row">
                            <div class="col s12 m12 no-padding">
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
                                           placeholder="Ваш номер телефона" title="Telephone" value="" type="text">
                                </div>
                            </div>
                            <div class="col s12 m12 no-padding">
                                <div class="form-group">
                                        <textarea required="required" name="comment" placeholder="Ваше сообщение (*)"
                                                  id="comment" title="Comment"
                                                  class="form-control col input-text" cols="5"
                                                  rows="3"></textarea>
                                </div>

                            </div>
                            <div class="buttons-set clearfix">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Отправить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('bottom-scripts')
    @include('frontend.partials.scripts.add_to_cart')
    @include('frontend.partials.scripts.add_to_compare')
    @include('frontend.partials.scripts.slow_menu')
@endsection

