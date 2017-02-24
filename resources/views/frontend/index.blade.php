@extends('frontend.layout')
@inject('settingsProvider', '\App\ViewDataProviders\SettingsDataProvider')
@section('seo')
    <title>{{ 'Интернет-магазин отопительного оборудования и сантехники Radar' }}</title>

    <meta name="description"
          content="В интернет-магазине Radar предоставляеться огромный выбор котлов по лучшим ценам! Техника высокого качества. Доставка по Одессе и Украине. Наш тел: +38-063-881-83-83"/>
    <meta name="keyword" content=""/>
@endsection

@section('top-scripts')

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
        {{--@include('frontend.partials.sale_slider')--}}
        <div class="container">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m12 l6 about-us">
                    @if(array_get($settingsProvider->getSettings(),'about'))
                        {!! array_get($settingsProvider->getSettings(),'about') !!}
                    @endif
                </div>
            </div>
        </div>
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
                <div id="partner" style="display: none">
                    @include('frontend.partials.products.our_partners_slider')
                </div>
            </div>
        </div>
    </section>

{{--    <section class="description">
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

                <div class="col s12 m12 l6 feedback">
                    <h4>Отзывы</h4>

                    @if(array_get($settingsProvider->getSettings(),'reviews'))

                        {!! array_get($settingsProvider->getSettings(),'reviews') !!}

                    @endif

                </div>
            </div>
        </div>
    </section>--}}
@endsection


@section('bottom-scripts')

@endsection

