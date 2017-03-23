<div id="sidebar" class="sidebar menu-min responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>
    <ul class="nav nav-list">
        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left"
               data-icon1="ace-icon fa fa-angle-double-left"
               data-icon2="ace-icon fa fa-angle-double-right" id="sidebar-collapse-click"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
        <li class="{{ Request::is('dashboard') ? 'active' : null }} highlight">
            <a href="{!! route('index') !!}">
                <i class="menu-icon fa fa-sliders"></i>
                <span class="menu-text"> Админпанель </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/products*') ? 'active' : null }} highlight">
            <a href="{!! route('products.index') !!}">
                <i class="menu-icon fa fa-shopping-cart"></i>
                <span class="menu-text"> Товары </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('products.create') ? 'active' : null }}">
                    <a href="{!! route('products.create') !!}">
                        <span class="menu-text"> Добавить товар </span>
                    </a>
                </li>
                <li class="hover {{ Route::is('products.trash') ? 'active' : null }}">
                    <a href="{!! route('products.trash') !!}">
                        <span class="menu-text"> Корзина </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/cena*') ? 'active' : null }} highlight">
            <a href="{!! route('cena.index') !!}" title="Группы цен">
                <i class="menu-icon fa fa-dollar"></i>
                <span class="menu-text"> Группы цен </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('cena.create') ? 'active' : null }}">
                    <a href="{!! route('cena.create') !!}" class="cena_create fancybox.ajax">
                        <span class="menu-text"> Добавить группу </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/categories*') ? 'active' : null }} highlight">
            <a href="{!! route('categories.index') !!}">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Категории </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('categories.create') ? 'active' : null }}">
                    <a href="{!! route('categories.create') !!}">
                        <span class="menu-text"> Добавить категорию </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/filters*') ? 'active' : null }} highlight">
            <a href="{!! route('filters.index') !!}">
                <i class="menu-icon fa fa-filter"></i>
                <span class="menu-text"> Фильтры </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('filters.create') ? 'active' : null }}">
                    <a href="{!! route('filters.create') !!}">
                        <span class="menu-text"> Добавить фильтр </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/characteristics*') ? 'active' : null }} highlight">
            <a href="{!! route('characteristics.index') !!}">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> Характеристики </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.characteristics.create') ? 'active' : null }}">
                    <a href="{!! route('characteristics.create') !!}">
                        <span class="menu-text"> Добавить характеристику </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/sales*') ? 'active' : null }} highlight">
            <a href="{!! route('sales.index') !!}">
                <i class="menu-icon fa fa-tags"></i>
                <span class="menu-text"> Акции </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.sales.create') ? 'active' : null }}">
                    <a href="{!! route('sales.create') !!}">
                        <span class="menu-text"> Добавить акцию </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/stock*') ? 'active' : null }} highlight">
            <a href="{!! route('stock.index') !!}">
                <i class="menu-icon fa fa-gift"></i>
                <span class="menu-text"> Акц.комплекты </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.stock.create') ? 'active' : null }}">
                    <a href="{!! route('stock.create') !!}">
                        <span class="menu-text"> Добавить комплект </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/groups*') ? 'active' : null }} highlight">
            <a href="{!! route('groups.index') !!}">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Гр.покупателей </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.groups.create') ? 'active' : null }}">
                    <a href="{!! route('groups.create') !!}">
                        <span class="menu-text"> Добавить группу </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/brands*') ? 'active' : null }} highlight">
            <a href="{!! route('brands.index') !!}">
                <i class="menu-icon fa fa-apple"></i>
                <span class="menu-text"> Бренды </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.brands.create') ? 'active' : null }}">
                    <a href="{!! route('brands.create') !!}">
                        <span class="menu-text"> Добавить бренд </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/shipments*') ? 'active' : null }} highlight">
            <a href="{!! route('shipments.index') !!}">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text"> Доставка </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.shipments.create') ? 'active' : null }}">
                    <a href="{!! route('shipments.create') !!}">
                        <span class="menu-text"> Добавить способ </span>
                    </a>
                </li>
                <li class="hover {{ Route::is('dashboard.novaposhta.index') ? 'active' : null }}">
                    <a href="{!! route('novaposhta.index') !!}">
                        <span class="menu-text"> Новая почта </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/payments*') ? 'active' : null }} highlight">
            <a href="{!! route('payments.index') !!}">
                <i class="menu-icon fa fa-money"></i>
                <span class="menu-text"> Способы оплаты </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.payments.create') ? 'active' : null }}">
                    <a href="{!! route('payments.create') !!}">
                        <span class="menu-text"> Добавить способ </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/orders*') ? 'active' : null }} highlight">
            <a href="{!! route('orders.index') !!}">
                <i class="menu-icon fa fa-shopping-basket"></i>
                <span class="menu-text"> Заказы </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/articles*') ? 'active' : null }} highlight">
            <a href="{!! route('articles.index') !!}">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text"> Статьи </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.articles.create') ? 'active' : null }}">
                    <a href="{!! route('articles.create') !!}">
                        <span class="menu-text"> Добавить статью </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/static_pages*') ? 'active' : null }} highlight">
            <a href="{!! route('static_pages.index') !!}">
                <i class="menu-icon fa fa-file-text-o"></i>
                <span class="menu-text"> Страницы </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.static_pages.create') ? 'active' : null }}">
                    <a href="{!! route('static_pages.create') !!}">
                        <span class="menu-text"> Добавить страницу </span>
                    </a>
                </li>
            </ul>
        </li>
        <li  class="{{ Request::is('dashboard/users*') ? 'active' : null }} highlight">
            <a href="{{ route("users.indexGet") }}">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Пользователи </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.users.create') ? 'active' : null }}">
                    <a href="{!! route('users.create') !!}">
                        <span class="menu-text"> Добавить пользователя </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/slider*') ? 'active' : null }} highlight">
            <a href="{{ route("sliders.index") }}">
                <i class="menu-icon fa fa-object-group"></i>
                <span class="menu-text"> Слайдеры </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li  class="hover {{ Route::is('dashboard.sliders.index') ? 'active' : null }}">
                    <a href="{{ route("sliders.index") }}">
                        <span class="menu-text"> Слайдер 1 </span>
                    </a>
                </li>
                <li  class="hover {{ Route::is('dashboard.slider2.index') ? 'active' : null }}">
                    <a href="{{ route("slider2.index") }}">
                        <span class="menu-text"> Слайдер 2 </span>
                    </a>
                </li>
                {{--<li  class="highlight">
                    <a href="{{ route("banners.index") }}">
                        <span class="menu-text"> Баннеры </span>
                    </a>
                </li>--}}
            </ul>
        </li>

        <li  class="{{ Request::is('dashboard/banners*') ? 'active' : null }} highlight">
            <a href="{{ route("banners.index") }}">
                <i class="menu-icon fa fa-file-image-o"></i>
                <span class="menu-text"> Банеры </span>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li  class="hover {{ Route::is('dashboard.banners.create') ? 'active' : null }}">
                    <a href="{{ route("sliders.create") }}">
                        <span class="menu-text"> Добавить баннер </span>
                    </a>
                </li>
            </ul>
        </li>

        <li  class="{{ Request::is('dashboard/reviews*') ? 'active' : null }} highlight">
            <a href="{{ route("reviews.index") }}">
                <i class="menu-icon fa fa-comments-o"></i>
                <span class="menu-text"> Отзывы </span>
            </a>
            <b class="arrow"></b>
        </li>
        {{--<li  class="{{ Request::is('dashboard/transfer*') ? 'active' : null }} highlight">
            <a href="{{ route("transfer.index") }}">
                <i class="menu-icon fa fa-retweet"></i>
                <span class="menu-text"> Импорт/Экспорт </span>
            </a>
            <b class="arrow"></b>
        </li>--}}
    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>