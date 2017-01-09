@inject('settingsProvider', '\App\ViewDataProviders\SettingsDataProvider')
@inject('categoriesProvider', '\App\ViewDataProviders\CategoriesDataProvider')
<footer class="page-footer">
    <div class="container">
        <div class="row">
        <div class="col s12 m4 l2">
                <a id="logo-container" href="/" class="brand-logo">
                    <img class="responsive-img" src="/frontend/images/logo.png"/>
                </a>
            </div>
        <div class="col s12 m4 l2">
                <p class="white-text">О интернет-магазине</p>
                <ul>
                    <li><a class="" href="/">Главная</a></li>
                    <li><a class="" href="/kotli">Каталог</a></li>
                    <li><a class="" href="/about">О нас</a></li>
                    <li><a class="" href="/proizvoditeli">Наши производители</a></li>
                    <li><a class="" href="/delivery">Доставка и оплата</a></li>
                    <li><a class="" href="/contacts">Контакты</a></li>
                    <li><a class="" href="/garantiya">Гарантия</a></li>
                    
                </ul>
            </div>
            <div class="col s12 m4 l2">
                <p class="white-text">Каталог товаров</p>
{{--                {{ dd($categoriesProvider->getListForFooter()) }}--}}
                <ul>
                    @foreach($categoriesProvider->getListForFooter() as $category)
                        <li><a class="" href="/{{ $category->slug }}">{{ $category->title }}</a>
                        @if(count($category->children))
                    @foreach($category->children as $child)
                            <li style="display: none"><a href="/{{ $child->slug }}"> {{ $child->title }}</a></li>
                        @endforeach
                        @endif
                        </li>
                    @endforeach

                </ul>
            </div>
            
            
            <div class="col s12 m4 l2">
            <p class="white-text">Пользователь</p>
                    <div class="links">
                        <a href="{{ url('login') }}" rel="nofollow">Вход</a>
                        <a href="{{ url('registration') }}" rel="nofollow">Регистрация</a>
                        <a href="{{ url('callbeck') }}" class="various fancybox.ajax" rel="nofollow">Обратный звонок</a>
                    </div>
                </form>
            </div>
            <div class="col s12 m4 l2">
                <p class="white-text">Мы в соцсетях</p>
                <div class="social_icon">
					@if(array_get($settingsProvider->getSettings(),'vkontakte'))
                        <a href="{{ array_get($settingsProvider->getSettings(),'vkontakte') }}" rel="nofollow" target="_blank"><img src="/public/frontend/images/vk_1.png"></a>
                    @endif
					
                    @if(array_get($settingsProvider->getSettings(),'facebook'))
                        <a href="{{ array_get($settingsProvider->getSettings(),'facebook') }}" rel="nofollow" target="_blank"><img src="/public/frontend/images/fb.png"></a>
                    @endif
                    @if(array_get($settingsProvider->getSettings(),'twitter'))
                        <a href="{{ array_get($settingsProvider->getSettings(),'twitter') }}" rel="nofollow" target="_blank"><img src="/public/frontend/images/inst.png"></a>
                    @endif
                    @if(array_get($settingsProvider->getSettings(),'google'))
                        <a href="{{ array_get($settingsProvider->getSettings(),'google') }}" rel="nofollow" target="_blank"><img src="/public/frontend/images/goo.png"></a>
                    @endif 
                    @if(array_get($settingsProvider->getSettings(),'youtube'))
                        <a href="{{ array_get($settingsProvider->getSettings(),'youtube') }}" rel="nofollow" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                    @if(array_get($settingsProvider->getSettings(),'twitter'))
                        <a href="{{ array_get($settingsProvider->getSettings(),'twitter') }}" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            <div class="col s12 m4 l2">
                <p class="white-text">Контакты компании</p>
                <ul class="contact-info">
                    <li class="phone">
                        @if(array_get($settingsProvider->getSettings(),'footer_phone1'))
                            <a class="" href="tel:{{ preg_replace('/[^\d+]+/','',array_get($settingsProvider->getSettings(),'footer_phone1')) }} "><span class="tel">{{ array_get($settingsProvider->getSettings(),'footer_phone1') }}</span></a>
                        @endif
                    </li>
                    <li class="phone">
                        @if(array_get($settingsProvider->getSettings(),'footer_phone2'))
                            <a class="" href="tel:{{ preg_replace('/[^\d+]+/','',array_get($settingsProvider->getSettings(),'footer_phone2')) }}"><span class="tel"> {{ array_get($settingsProvider->getSettings(),'footer_phone2') }}</span></a>
                        @endif
                    </li>
                    <li class="phone">
                        @if(array_get($settingsProvider->getSettings(),'footer_phone3'))
                            <a class="" href="tel:{{ preg_replace('/[^\d+]+/','',array_get($settingsProvider->getSettings(),'footer_phone3')) }}"><span class="tel"> {{ array_get($settingsProvider->getSettings(),'footer_phone2') }}</span></a>
                        @endif
                    </li>

                    @if(array_get($settingsProvider->getSettings(),'contact_email'))
                        <li class="mail"><a href="mailto:{{ array_get($settingsProvider->getSettings(),'contact_email') }}"><span class="mail">{{ array_get($settingsProvider->getSettings(),'contact_email') }}</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>
<section class="footer-copyright">
    <div class="container center-align">
        <p class="no-margin white-text">© Все права защищены.</p>
    </div>
</section>