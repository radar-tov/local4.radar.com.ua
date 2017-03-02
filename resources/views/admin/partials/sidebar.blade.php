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
            <a href="{!! route('dashboard.index') !!}">
                <i class="menu-icon fa fa-sliders"></i>
                <span class="menu-text"> Админпанель </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/products*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.products.index') !!}">
                <i class="menu-icon fa fa-shopping-cart"></i>
                <span class="menu-text"> Товары </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.products.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.products.create') !!}">
                        <span class="menu-text"> Добавить товар </span>
                    </a>
                </li>
                <li class="hover {{ Route::is('dashboard.products.trash') ? 'active' : null }}">
                    <a href="{!! route('dashboard.products.trash') !!}">
                        <span class="menu-text"> Корзина </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/cena*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.cena.index') !!}" title="Группы цен">
                <i class="menu-icon fa fa-dollar"></i>
                <span class="menu-text"> Группы цен </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.cena.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.cena.create') !!}">
                        <span class="menu-text"> Добавить группу </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/categories*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.categories.index') !!}">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Категории </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.categories.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.categories.create') !!}">
                        <span class="menu-text"> Добавить категорию </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/filters*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.filters.index') !!}">
                <i class="menu-icon fa fa-filter"></i>
                <span class="menu-text"> Фильтры </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.filters.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.filters.create') !!}">
                        <span class="menu-text"> Добавить фильтр </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/characteristics*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.characteristics.index') !!}">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> Характеристики </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.characteristics.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.characteristics.create') !!}">
                        <span class="menu-text"> Добавить характеристику </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/sales*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.sales.index') !!}">
                <i class="menu-icon fa fa-tags"></i>
                <span class="menu-text"> Акции </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.sales.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.sales.create') !!}">
                        <span class="menu-text"> Добавить акцию </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/stock*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.stock.index') !!}">
                <i class="menu-icon fa fa-gift"></i>
                <span class="menu-text"> Акц.комплекты </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.stock.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.stock.create') !!}">
                        <span class="menu-text"> Добавить комплект </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/groups*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.groups.index') !!}">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Гр.покупателей </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.groups.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.groups.create') !!}">
                        <span class="menu-text"> Добавить группу </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/brands*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.brands.index') !!}">
                <i class="menu-icon fa fa-apple"></i>
                <span class="menu-text"> Бренды </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.brands.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.brands.create') !!}">
                        <span class="menu-text"> Добавить бренд </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/shipments*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.shipments.index') !!}">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text"> Доставка </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.shipments.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.shipments.create') !!}">
                        <span class="menu-text"> Добавить способ </span>
                    </a>
                </li>
                <li class="hover {{ Route::is('dashboard.novaposhta.index') ? 'active' : null }}">
                    <a href="{!! route('dashboard.novaposhta.index') !!}">
                        <span class="menu-text"> Новая почта </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/payments*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.payments.index') !!}">
                <i class="menu-icon fa fa-money"></i>
                <span class="menu-text"> Способы оплаты </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.payments.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.payments.create') !!}">
                        <span class="menu-text"> Добавить способ </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/orders*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.orders.index') !!}">
                <i class="menu-icon fa fa-shopping-basket"></i>
                <span class="menu-text"> Заказы </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/articles*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.articles.index') !!}">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text"> Статьи </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.articles.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.articles.create') !!}">
                        <span class="menu-text"> Добавить статью </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/static_pages*') ? 'active' : null }} highlight">
            <a href="{!! route('dashboard.static_pages.index') !!}">
                <i class="menu-icon fa fa-file-text-o"></i>
                <span class="menu-text"> Страницы </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.static_pages.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.static_pages.create') !!}">
                        <span class="menu-text"> Добавить страницу </span>
                    </a>
                </li>
            </ul>
        </li>
        <li  class="{{ Request::is('dashboard/users*') ? 'active' : null }} highlight">
            <a href="{{ route("dashboard.users.indexGet") }}">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Пользователи </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover {{ Route::is('dashboard.users.create') ? 'active' : null }}">
                    <a href="{!! route('dashboard.users.create') !!}">
                        <span class="menu-text"> Добавить пользователя </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('dashboard/slider*') ? 'active' : null }} highlight">
            <a href="{{ route("dashboard.sliders.index") }}">
                <i class="menu-icon fa fa-object-group"></i>
                <span class="menu-text"> Слайдеры </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li  class="hover {{ Route::is('dashboard.sliders.index') ? 'active' : null }}">
                    <a href="{{ route("dashboard.sliders.index") }}">
                        <span class="menu-text"> Слайдер 1 </span>
                    </a>
                </li>
                <li  class="hover {{ Route::is('dashboard.slider2.index') ? 'active' : null }}">
                    <a href="{{ route("dashboard.slider2.index") }}">
                        <span class="menu-text"> Слайдер 2 </span>
                    </a>
                </li>
                {{--<li  class="highlight">
                    <a href="{{ route("dashboard.banners.index") }}">
                        <span class="menu-text"> Баннеры </span>
                    </a>
                </li>--}}
            </ul>
        </li>


        <li  class="{{ Request::is('dashboard/reviews*') ? 'active' : null }} highlight">
            <a href="{{ route("dashboard.reviews.index") }}">
                <i class="menu-icon fa fa-comments-o"></i>
                <span class="menu-text"> Отзывы </span>
            </a>
            <b class="arrow"></b>
        </li>
        {{--<li  class="{{ Request::is('dashboard/transfer*') ? 'active' : null }} highlight">
            <a href="{{ route("dashboard.transfer.index") }}">
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