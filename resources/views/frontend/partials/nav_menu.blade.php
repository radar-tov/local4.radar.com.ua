@inject('categoriesProvider', '\App\ViewDataProviders\CategoriesDataProvider')
@inject('bannerProvider', '\App\ViewDataProviders\BannerDataProvider')
<section class="nav-menu">
    <div class="nav-wrapper container">
        <div class="row">
            <nav class="col s6 m6 l6 no-padding" role="navigation">
                <a href="#" data-activates="nav-mobile" class="button-collapse"><img src="/frontend/images/menu55.png" /></a>
                <ul id="nav-mobile" class="side-nav collapsible" data-collapsible="accordion">
                    <i class="drag-target close-button fa fa-times"></i>

                    <li><a href="/">Главная</a></li>
                    <li><a href="{{ url('about') }}">О нас</a></li>
                    <li><a href="{{ route('proizvoditeli') }}">Наши производители</a></li>
                    <li><a href="{{ url('delivery') }}">Доставка и оплата</a></li>
                    <li><a href="{{ route('frontend.page') }}">Статьи</a></li>
                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                </ul>
                <ul class="left hide-on-med-and-down">
                    <li><a href="/">Главная</a></li>
                    <li><a href="{{ url('about') }}">О нас</a></li>
                    <li><a href="{{ url('proizvoditeli') }}">Наши производители</a></li>
                    <li><a href="{{ url('delivery') }}">Доставка и оплата</a></li>
                    <li><a href="{{ route('frontend.page') }}">Статьи</a></li>
                    <li><a href="{{ url('contacts') }}">Контакты</a></li>
                </ul>
            </nav>
            <div class="col s6 m6 l6 search-box">

                <form action="{{ route('search') }}" method="GET">
                    <div class="col s12 m6 l6"><input class="search-form" type="search" placeholder="Поиск" name="search" value="{{ Request::get('search') }}"/></div>
                    <div class="links col s12 m6 l6">

                     @if(Auth::check())
                        <span><a href="{{ route('cabinet') }}"><img src="/frontend/images/icon-login.png" />Кабинет</a></span>
                        <span><a href="/auth/logout"> Выход</a></span>
                        @else
                        <span><a href="{{ route('login') }}"><img src="/frontend/images/icon-login.png" />Вход</a></span>
                        <span><a href="{{ route('register') }}"><img src="/frontend/images/icon-reg.png" />Регистрация</a></span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<section class="mobile-menu">
    <!--Mobile-Menu-->
    <div class="hide-on-large-only categories">
        <div class="container">
            <div class="row">
                <nav class="col s12">
                    <a href="#" data-activates="cat-mobile" class="left button-collapse"></a>
                    <p class="left no-margin white-text">Категории товаров</p>
                    <ul id="cat-mobile" class="side-nav collapsible" data-collapsible="accordion">
                        <div class="col s12 right-align dotted-border-bottom">
                            <span class="left uppercase catmenu-title">Категории</span>
                            <i class="drag-target close-button fa fa-times"></i>
                        </div>
                        @foreach($categoriesProvider->getListForNav() as $category)
                            <li class="col s12">
                                <a href="/{{ $category->slug }}">{{ $category->title }}</a>
                                @if(count($category->children))
                                    <span class="collapsible-header"><i class="fa fa-arrow-down subcategories-open"></i></span>
                                    <ul class="col no-padding s12 sub-categories collapsible-body">
                                        @foreach($category->children as $child)
                                            <li><a href="/{{ $category->slug }}/{{ $child->slug }}"><i class="fa fa-circle-o"></i> {{ $child->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>