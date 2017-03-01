<div id="sidebar" class="sidebar menu-min responsive">
    {{--<script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>--}}
    <ul class="nav nav-list">
        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left"
               data-icon1="ace-icon fa fa-angle-double-left"
               data-icon2="ace-icon fa fa-angle-double-right"
               onclick="menuCookie()" id="sidebar-collapse-click"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        {{--<script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>--}}
        <li class="{{ Request::is('dashboard') ? 'active' : null }}">
            <a href="{!! route('dashboard.index') !!}">
                <i class="menu-icon fa fa-sliders"></i>
                <span class="menu-text">Админпанель</span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/products*') ? 'active' : null }}">
            <a href="{!! route('dashboard.products.index') !!}">

                <i class="menu-icon fa fa-shopping-cart"></i>
                <span class="menu-text">Товары</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/cena*') ? 'active' : null }}">
            <a href="{!! route('dashboard.cena.index') !!}" title="Группы цен">
                <i class="menu-icon fa fa-dollar"></i>
                <span class="menu-text">Группы цен</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/categories*') ? 'active' : null }}">
            <a href="{!! route('dashboard.categories.index') !!}">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">Категории</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/filters*') ? 'active' : null }}">
            <a href="{!! route('dashboard.filters.index') !!}">
                <i class="menu-icon fa fa-filter"></i>
                <span class="menu-text">Фильтры</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/characteristics*') ? 'active' : null }}">
            <a href="{!! route('dashboard.characteristics.index') !!}">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text">Характеристики</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/sales*') ? 'active' : null }}">
            <a href="{!! route('dashboard.sales.index') !!}">
                <i class="menu-icon fa fa-tags"></i>
                <span class="menu-text">Акции</span>
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{{ Request::is('dashboard/stock*') ? 'active' : null }}">
            <a href="{!! route('dashboard.stock.index') !!}">
                <i class="menu-icon fa fa-gift"></i>
                <span class="menu-text">Акц.комплекты</span>
            </a>
            <b class="arrow"></b>
        </li>

        <li class="{{ Request::is('dashboard/groups*') ? 'active' : null }}">
            <a href="{!! route('dashboard.groups.index') !!}">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">Гр. покупателей</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/brands*') ? 'active' : null }}">
            <a href="{!! route('dashboard.brands.index') !!}">
                <i class="menu-icon fa fa-apple"></i>
                <span class="menu-text">Бренды</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/shipments*') ? 'active' : null }}">
            <a href="{!! route('dashboard.shipments.index') !!}">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text">Способы доставки</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/novaposhta*') ? 'active' : null }}">
            <a href="{!! route('dashboard.novaposhta.index') !!}">
                <i class="menu-icon fa fa-truck"></i>
                <span class="menu-text">Новая почта</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/payments*') ? 'active' : null }}">
            <a href="{!! route('dashboard.payments.index') !!}">
                <i class="menu-icon fa fa-money"></i>
                <span class="menu-text">Способы оплаты</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="{{ Request::is('dashboard/orders*') ? 'active' : null }}">
            <a href="{!! route('dashboard.orders.index') !!}">
                <i class="menu-icon fa fa-shopping-basket"></i>
                <span class="menu-text">
                    Заказы
                {{--<span class="label label-success arrowed-right arrowed-in"></span>--}}
                </span>
            </a>
            <b class="arrow"></b>
        </li>
        {{--
            <li class="{{ Request::is('dashboard/pages*') ? 'active' : null }}">
                <a href="{!! route('dashboard.pages.index') !!}">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text">Страницы</span>
                </a>
                <b class="arrow"></b>
            </li>
        --}}

        <li class="{{ Request::is('dashboard/articles*') ? 'active' : null }}">
            <a href="{!! route('dashboard.articles.index') !!}">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text">Статьи блога</span>
            </a>
        </li>
        <li class="{{ Request::is('dashboard/static_pages*') ? 'active' : null }}">
            <a href="{!! route('dashboard.static_pages.index') !!}">
                <i class="menu-icon fa fa-file-text-o"></i>
                <span class="menu-text">Страницы</span>
            </a>
        </li>
        <li  class="{{ Request::is('dashboard/users*') ? 'active' : null }}">
            <a href="{{ route("dashboard.users.indexGet") }}">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Пользователи </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li  class="{{ Request::is('dashboard/sliders*') ? 'active' : null }}">
            <a href="{{ route("dashboard.sliders.index") }}">
                <i class="menu-icon fa fa-object-group"></i>
                <span class="menu-text"> Слайдер </span>
            </a>
            <b class="arrow"></b>
        </li>

        <li  class="{{ Request::is('dashboard/slider2*') ? 'active' : null }}">
            <a href="{{ route("dashboard.slider2.index") }}">
                <i class="menu-icon fa fa-image"></i>
                <span class="menu-text"> Слайдер 2 </span>
            </a>
            <b class="arrow"></b>
        </li>

        <li  class="{{ Request::is('dashboard/banners*') ? 'active' : null }}">
            <a href="{{ route("dashboard.banners.index") }}">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Баннеры </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li  class="{{ Request::is('dashboard/reviews*') ? 'active' : null }}">
            <a href="{{ route("dashboard.reviews.index") }}">
                <i class="menu-icon fa fa-comments-o"></i>
                <span class="menu-text"> Отзывы </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li  class="{{ Request::is('dashboard/transfer*') ? 'active' : null }}">
            <a href="{{ route("dashboard.transfer.index") }}">
                <i class="menu-icon fa fa-retweet"></i>
                <span class="menu-text">Импорт/Экспорт</span>
            </a>
            <b class="arrow"></b>
        </li>
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