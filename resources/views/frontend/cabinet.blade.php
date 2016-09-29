@extends('frontend.layout')

@section('seo')

    <title>{{ 'Профиль '. Auth::user()->name }}</title>
    <meta name="description" content=""/>
    <meta name="description" content=""/>

@endsection


@section('content')

<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Аккаунт пользователя</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <h3>Данные профиля</h3>
            <p class="col s12 no-margin note">Обязательные поля помечены звёздочкой <span class="red-text">*</span></p>
            <div class="row">
                <div class="col s12 cart-authentication">
                    <ul class="tabs">
                        <li class="tab col s6 l3"><a class="active" href="#change-data">Изменить данные</a></li>
                        <li class="tab col s6 l3"><a  href="#order-history">История заказов</a></li>
                    </ul>
                </div>
                <div id="change-data" class="col s12 no-padding">
                    <form id="order-form" action="/user_update" method="post" class="registration col s12 m12 l6">
                        {!! csrf_field() !!}
                        <p class="formField">
                            <label for="order-name" class="col s12 m4 l4">ФИО:<span class="red-text"> *</span></label>
                            <input class="col s12 m8 l7" id="order-name" placeholder="введите имя, фамилию и отчество" tabindex="1" name="name" type="text" value="{{ old('name', $user->name) }}">
                        </p>
                        <!--<p class="formField">-->
                        <!--<label for="order-surname" class="col s12 m4 l4">Фамилия:<span class="red-text"> *</span></label>-->
                        <!--<input class="col s12 m6 l7" id="order-surname" placeholder="введите вашу фамилию" tabindex="2" name="Orders[surname]" type="text">-->
                        <!--</p>-->
                        <p class="formField">
                            <label for="order-telephone" class="col s12 m4 l4">Телефон:<span class="red-text"> *</span></label>
                            <input class="col s12 m8 l7" id="order-telephone" placeholder="введите номер телефона" tabindex="3" name="phone" type="text" value="{{ old('phone', $user->phone) }}">
                        </p>
                        <p class="formField">
                            <label for="order-email" class="col s12 m4 l4">Электронная почта:<span class="red-text"> *</span></label>
                            <input class="col s12 m8 l7" id="order-email" placeholder="введите ваш email" tabindex="4" name="email" type="text" value="{{ old('email', $user->email) }}">
                        </p>
                        <!--<p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Страна:</label>
                            
                            {!! Form::select('country', ['Украина' => 'Украина', 'Россия' => 'Россия', 'США' => 'США'], $selected = $user->country, ['class' => 'col s12 m6 l7 no-padding', 'id' => 'order-country', 'tabindex' => 5]) !!}
                            {{-- <select class="col s12 m6 l7 no-padding" id="order-country" tabindex="5" name="country" type="text" >
                                <option value="Ukraine">Украина</option>
                                <option value="Russia">Россия</option>
                                <option value="USA">США</option>
                            </select> --}}
                        </p>-->
                        <p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Город:</label>
                            <input class="col s12 m8 l7" id="order-city" placeholder="введите город" tabindex="6" name="city" type="text" value="{{ old('city', $user->city) }}">
                        </p>
                        <p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Адрес:</label>
                            <input class="col s12 m8 l7" id="order-address" placeholder="введите адрес" tabindex="7" name="address" type="text" value="{{ old('address', $user->address) }}">
                        </p>
                        <p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Пароль:</label>
                            <input class="col s12 m8 l7" name="password" placeholder="введите пароль" type="password" value="">
                        </p>
                        <p class="formField">
                            <label for="order-address" class="col s12 m4 l4">Подтвердите пароль:</label>
                            <input class="col s12 m8 l7" name="password_confirmation" placeholder="подтвердите пароль" type="password" value="">
                        </p>
                        <div class="col s12"><button class="btn waves-effect waves-light" type="submit" name="action">Сохранить</button></div>
                    </form>
                </div>
                <div id="order-history" class="col s12">
                    <table class="striped">
                    <thead>
                    <tr>
                        <th data-field="id">Номер заказа</th>
                        <th data-field="name">Дата</th>
                        <th data-field="status">Статус</th>
                        <th data-field="price">Стоимость</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($user->orders as $order)
                        <tr>
                            <td><a href="{{ route('order', $order->id) }}">{{ $order->id }}</a></td>
                            <td>{{ $order->created_at->formatLocalized('%A %d, %B %Y') }}</td>
                            <td>{{ config('order_status')[$order->status_id] }}</td>
                            <td>{{ $order->getTotal() }}грн</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table></div>
            </div>
        </div>
    </div>
</section>

@endsection