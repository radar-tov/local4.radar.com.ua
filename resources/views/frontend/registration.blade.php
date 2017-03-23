@extends('frontend.layout')

@section('seo')
    <title>{{ 'Регистрация' }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
@endsection


@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Регистрация</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <h3>Форма регистрации</h3>

            @include('frontend.partials.errors')
            <p class="col s12 note">Обязательные поля помечены звёздочкой <span class="red-text">*</span></p>
            <div id="register" class="col s12 no-padding">
                {{--<form id="order-form" action="" method="post" class="registration col s12 m10 l6">--}}
                <form class="registration col s12 m10 l6"  id="order-form" role="form" method="POST" action="{{ url('/register') }}">
                    @include('frontend.partials.registration_fields')
                </form>
            </div>
        </div>
    </div>
</section>
@endsection