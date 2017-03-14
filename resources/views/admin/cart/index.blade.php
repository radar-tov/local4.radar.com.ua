@inject('cartProvider', '\App\ViewDataProviders\CartDataProvider')
@inject('settingsProvider', '\App\ViewDataProviders\SettingsDataProvider')

@extends('admin.app')

@section('top-scripts')
    <style>
        img.responsive-img {
            max-width: 75px;
            height: auto
        }
        input.item-quantity {
            font-family: "Roboto", sans-serif;
            float: left;
            height: 28px;
            line-height: 28px;
            padding: 0;
            box-sizing: border-box;
            max-width: 60px;
            text-align: center;
            margin-bottom: 5px;
        }
        input[type=date], input[type=datetime-local], input[type=email], input[type=number], input[type=password], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], textarea.materialize-textarea {
            background-color: transparent;
            border: 1px solid #cdcdcd;
            border-radius: 0;
            outline: 0;
            height: 3rem;
            width: 100%;
            font-size: 14px;
            box-shadow: none;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            transition: all .3s
        }
        button, input, optgroup, textarea {
            color: inherit;
            font: inherit;
            margin: 0
        }
    </style>
@stop

@section('page-title')
    Корзина
@stop

@section('content')
    <section id="cartVue">
        <div id="cartContent" style="display: none;">

            <h5 v-if="!len > 0">Корзина пуста</h5>

            <div class="col-xs-12" v-show="len > 0">
                <h3>Корзина</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Артикул</th>
                            <th>Название</th>
                            <th>Кол-во</th>
                            <th>Всего</th>
                        </tr>
                    </thead>
                    <tr v-for="product in cart">
                        <td>
                            <a v-bind:href="'/' + product.options.categorySlug + '/' + product.options.productSlug">
                                <img v-bind:src="product.options.thumbnail" class="responsive-img"
                                     v-if="product.options.thumbnail"/>
                                <img src="/frontend/images/default.png" class="responsive-img"
                                     v-if="!product.options.thumbnail"/>
                            </a>
                        </td>
                        <td>
                            @{{ product.options.article }}
                        </td>
                        <td>
                            <p>
                                <a v-bind:href="'/dashboard/products/' + product.id + '/edit'">@{{ product.name }}</a>
                            </p>
                            <p>@{{ product.options.excerpt }}</p>
                        </td>
                        <td>
                            <input type='number'
                                   v-bind:id="product.id"
                                   v-bind:value="product.qty"
                                   v-on:input.stop="updateItem(product, product.id)"
                                   debounce="500"
                                   class="item-quantity"
                                   v-bind:disabled="product.options.in_set_with">

                            <a v-on:click.stop="deleteItem(product.rowid)"><i class="fa fa-times red"></i></a>

                        </td>
                        <td>
                            <p v-show="product.subtotal > 0">
                                @{{ product.subtotal }} <span>грн</span>
                            </p>
                            <p v-show="product.subtotal == 0">
                                <span style="color:indianred;font-size:16px">В подарок!</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <p class="bold">Всего:</p>
                        </td>
                        <td>
                            <p class="bold">@{{ total }} грн</p>
                        </td>
                    </tr>
                </table>

                <!-- Секция создания клиента -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p class="formField">
                    <label for="order-name" class="col s12 m4 l4">Ваше имя:<span class="red-text"> *</span></label>
                    <input class="col s12 m6 l7" id="order-name" placeholder="введите имя, фамилию и отчество" tabindex="1" name="name" type="text" value="{{ old('name') }}">
                </p>
                <!--<p class="formField">-->
                <!--<label for="order-surname" class="col s12 m4 l4">Фамилия:<span class="red-text"> *</span></label>-->
                <!--<input class="col s12 m6 l7" id="order-surname" placeholder="введите вашу фамилию" tabindex="2" name="Orders[surname]" type="text">-->
                <!--</p>-->
                <p class="formField">
                    <label for="order-telephone" class="col s12 m4 l4">Телефон:<span class="red-text"> *</span></label>
                    <input class="col s12 m6 l7" id="order-telephone" placeholder="введите номер телефона" tabindex="3" name="phone" type="text"value="{{ old('phone') }}">
                </p>
                <p class="col s12 no-margin note">Заполните поле "Электронная почта", так как востановление пароля происходит через почтовый ящик.</p>
                <p class="formField">
                    <label for="order-email" class="col s12 m4 l4">Электронная почта:</label>
                    <input class="col s12 m6 l7" id="order-email" placeholder="введите ваш email" tabindex="4" name="email" type="text" value="{{ old('email') }}">
                </p>
                <p class="formField">
                    <label for="order-address" class="col s12 m4 l4">Страна:</label>
                    <select class="col s12 m6 l7 no-padding" id="order-country" tabindex="5" name="country" type="text">
                        <option value="Украина">Украина</option>
                        <option value="Россия">Россия</option>
                        <option value="США">США</option>
                    </select>
                </p>
                <p class="formField">
                    <label for="order-address" class="col s12 m4 l4">Город:</label>
                    <input class="col s12 m6 l7" id="order-city" placeholder="введите город" tabindex="6" name="city" type="text" value="{{ old('city') }}">
                </p>
                <p class="formField">
                    <label for="order-address" class="col s12 m4 l4">Адрес:</label>
                    <input class="col s12 m6 l7" id="order-address" placeholder="введите адрес" tabindex="7" name="address" type="text" value="{{ old('address') }}">
                </p>
                <p class="formField">
                    <label for="order-address" class="col s12 m4 l4">Пароль:<span class="red-text"> *</span></label>
                    <input class="col s12 m6 l7" name="password" placeholder="введите пароль" type="password">
                </p>
                <p class="formField">
                    <label for="order-address" class="col s12 m4 l4">Подтвердите пароль:<span class="red-text"> *</span></label>
                    <input class="col s12 m6 l7" name="password_confirmation" placeholder="подтвердите пароль" type="password">
                </p>
                <div class="col s12" style="padding-top: 100px">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Создать аккаунт</button>
                </div>
                <!-- / Секция создания клиента -->

                @if (count($errors) > 0)
                    <div class="col s6">
                        <ul style="padding-top: 20px;">
                            @foreach ($errors->all() as $error)
                                <li style="color: indianred">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col s12 offset-top-30px"></div>
            </div>

        </div>
    </section>
@stop

@section('bottom-scripts')
    {!! Html::script("/admin/assets/js/vue2.js") !!}
    {!! Html::script("/admin/assets/js/vue2-resource.js") !!}
    {!! Html::script("/admin/assets/js/cart.js") !!}
@stop