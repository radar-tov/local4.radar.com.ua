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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Электронная почта:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Подтвердите пароль:</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить новый пароль
                                </button>
                            </div>
                        </div>
                    </form>



                   {{-- <form id="order-form" class="registration col s12 m10 l6" role="form" method="POST" action="{{ url('/password/reset') }}" >
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

                        <p class="formField">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Сбросить пароль</button>
                        </p>

                    </form>--}}

                </div>
            </div>
        </div>
    </section>
@endsection