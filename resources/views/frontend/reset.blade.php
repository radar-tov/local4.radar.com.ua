@extends('frontend.layout')

@section('seo')
    <title>{{ 'Сброс пароля' }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
@endsection


@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Сброс пароля</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <h3>Форма сброса пароля</h3>
                @if (session('status'))
                <div style="color: rgba(0, 128, 0, 0.76)">
                    <b>{{ session('status') }}</b>
                </div>
                @endif
                {{--<p class="col s12 deeppurple no-margin note">Обязательные поля помечены звёздочкой <span class="red-text">*</span></p>--}}
                <div id="register" class="col s12 no-padding">
                    @include('frontend.partials.errors')
                    <form id="order-form" class="registration col s12 m10 l6" role="form" method="POST" action="{{ url('/password/reset') }}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <p class="formField">
                            <label for="order-email" class="col s12 m4 l4">Электронная почта:<span class="red-text"> *</span></label>
                            <input class="col s12 m6 l7" id="order-email" placeholder="введите ваш email" tabindex="4" name="email" type="text">
                        </p>

                        <p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Пароль:<span class="red-text"> *</span></label>
                            <input class="col s12 m6 l7" name="password" placeholder="введите пароль" type="password" value="">
                        </p>

                        <p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Подтвердите пароль:<span class="red-text"> *</span></label>
                            <input class="col s12 m6 l7" name="password_confirmation" placeholder="Пароль еще раз" type="password" value="">
                        </p>

                        <button class="btn waves-effect waves-light" type="submit" name="action">Сбросить пароль</button>


                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection