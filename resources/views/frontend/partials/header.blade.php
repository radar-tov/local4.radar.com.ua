@inject('settingsProvider', '\App\ViewDataProviders\SettingsDataProvider')
<section class="header">
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l5 no-padding logo">
                <a id="logo-container" href="/" class="brand-logo">
                    <img class="responsive-img" src="/frontend/images/logo.png"/>
                </a>
            </div>
            <div class="col s12 m4 l2 contacts">
                {{--@if(array_get($settingsProvider->getSettings(),'header_phone1'))--}}
                {{--<span class="phone code right-align"><img src="/frontend/images/tel.png" /> {{ array_get($settingsProvider->getSettings(),'header_phone1') }}</span>--}}
                {{--@endif--}}
                {{--@if(array_get($settingsProvider->getSettings(),'header_phone2'))--}}
                {{--<span class="phone number right-align">{{ array_get($settingsProvider->getSettings(),'header_phone2') }}</span><br>--}}
                {{--@endif--}}
                <div class="for_code">
                    <span class="phone code right-align"><img src="/frontend/images/tel.png"/> 095 881 83 83</span><br>
                    <span class="phone code right-align"><img src="/frontend/images/tel.png"/> 063 881 83 83</span><br>
                    <span class="phone code right-align"><img src="/frontend/images/tel.png"/> 068 881 83 83</span><br>
                </div>



                {{--<div class="for_number">--}}
                {{--<span class="phone number right-align">881-83-83</span>--}}
                {{--</div>--}}
                @if(array_get($settingsProvider->getSettings(),'contact_email'))
                    <a href="mailto:{{ array_get($settingsProvider->getSettings(),'contact_email') }}">
                        <span class="mail">{{ array_get($settingsProvider->getSettings(),'contact_email') }}</span>
                    </a>
                @endif
            </div>
            <div class="col s12 m4 l2 links">
                <span>
                    <a href="{{ url('callbeck') }}" class="various fancybox.ajax"><i class="fa fa-phone green-text"></i>Заказать звонок</a>
                </span><br>
                <span>время работы: 9:00 - 17:00</span>
            </div>
            <div class="col s12 m2 l3 mini-cart-wrapper">
                <div class="compare">
                    <a href="/compare" class="">
                        <img src="/frontend/images/compare.png"/>
                    </a>
                    <p><span class="vs">Сравнить<br><span id="com_count">{{calcProductsInCompare()}}</span> товаров</span></p>
                </div>
                <a href="/cart" class="go-to-cart">
                    <div class="mini-cart tabs-wrapper pin-top" id="_cart">
                        <img src="/frontend/images/mini-cart.png"/>
                        <div>
                            <p>Товаров: <span class="qty">{{ cartItemsCount() }}</span> шт</p>
                            <p>На сумму: <span class="_sum">{{ cartTotalPrice() }}</span> грн</p>
                            <div>

                                {{--<div class="cart-content">--}}
                                    {{--<div class="col s12 cart_filled"--}}
                                         {{--style="display: {{ cartItemsCount() ? 'block' : 'none' }}">--}}
                                        {{--<strong>В корзине <span class="qty-items">{{  cartItemsCount() }}</span>товар/ов</strong>--}}
                                        {{--<strong>На сумму--}}
                                            {{--<span class="sum-payment">--}}
                                                {{--<span class="_sum">{{ cartTotalPrice() }}</span>--}}
                                                {{--<span class="currency"> грн</span>--}}
                                            {{--</span>--}}
                                        {{--</strong>--}}
                                        {{--<a href="/cart" class="waves-effect waves-light btn">Перейти в корзину</a>--}}
                                    {{--</div>--}}
                                    {{--<!--Empty-->--}}
                                    {{--<div class="cols4 cart_empty"--}}
                                         {{--style="display: {{ cartItemsCount() ? 'none' : 'block' }}">--}}
                                        {{--<img src="/frontend/images/mini-cart-empty.png" class="left no-padding"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="col s8 cart_empty"--}}
                                         {{--style="display: {{ cartItemsCount() ? 'none' : 'block' }}">--}}
                                        {{--<span class="left">В корзине ещё нет товаров</span>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>