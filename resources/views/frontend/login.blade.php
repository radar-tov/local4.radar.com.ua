@extends('frontend.layout')

@section('seo')
    <title>{{ 'Авторизация' }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
@endsection


@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Вход</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <h3>Форма входа</h3>
            @include('frontend.partials.flash_status')
            {{--<p class="col s12 deeppurple no-margin note">Обязательные поля помечены звёздочкой <span class="red-text">*</span></p>--}}
            <div id="register" class="col s12 no-padding">
                @include('frontend.partials.errors')
                <form id="order-form" action="{{ url('/auth/login') }}" method="post" class="registration col s12 m10 l6" >
                    {!! csrf_field() !!}
                    <p class="formField">
                        <label for="order-email" class="col s12 m4 l4">Электронная почта:<span class="red-text"> *</span></label>
                        <input class="col s12 m6 l7" id="order-email" placeholder="введите ваш email" tabindex="4" name="email" type="text">
                    </p>

                    <p class="formField">
                        <label for="order-address" class="col s12 m4 l4">Пароль:<span class="red-text"> *</span></label>
                        <input class="col s12 m6 l7" name="password" placeholder="введите пароль" type="password" value="">
                    </p>

                    <div class="col s12"><button class="btn waves-effect waves-light" type="submit" name="action">Войти</button></div>

                    <ol class="col s12 remember">
                        {{--<li><a href="#" class="order-forgot-login-link">Я забыл логин</a></li>--}}
                        <li>
                            <a class="various fancybox.ajax" href="{{ url('password_modal') }}">Забыли пароль?</a>
                        </li>
                    </ol>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection