<div class="navbar-container" id="navbar-container">
    <!-- #section:basics/sidebar.mobile.toggle -->
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
        <span class="sr-only">Toggle sidebar</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <!-- /section:basics/sidebar.mobile.toggle -->
    <div class="navbar-header pull-left">
        <!-- #section:basics/navbar.layout.brand -->
        <a href="/" class="navbar-brand">
            <small>Перейти на сайт</small>
        </a>
        <ul class="breadcrumb">
            {!! Breadcrumbs::renderIfExists() !!}
        </ul>
    </div>
    <!-- #section:basics/navbar.dropdown -->
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
            <!-- #section:basics/navbar.user_menu -->
            <li class="light-blue">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <img class="nav-user-photo"
                         @if(is_file(public_path($currentUser->thumbnail)))
                         src="{!! asset($currentUser->thumbnail) !!}"
                         @else
                         src="{!! url('/images/users/default.jpg') !!}"
                         @endif
                         alt="{{ $currentUser->name or "Neo!" }} Photo"
                    />
                    <span class="user-info"><small>Здравствуйте,</small> {{ $currentUser->name or "Neo!" }} </span>
                    <i class="ace-icon fa fa-caret-down"></i>
                </a>
                <ul class="user-menu dropdown-menu dropdown-menu-right dropdown-yellow dropdown-caret dropdown-close">
                    @if(isset($currentUser))
                        <li>
                            <a href="{!! route('users.edit',[$currentUser->id]) !!}">
                                <i class="ace-icon fa fa-user"></i> Мой профиль
                            </a>
                        </li>
                    @endif
                    <li class="divider"></li>
                    <li>
                        <a href="/logout">
                            <i class="ace-icon fa fa-power-off"></i> Выход
                        </a>
                    </li>
                </ul>
            </li>

            <!-- /section:basics/navbar.user_menu -->
        </ul>
    </div>
    <!-- /section:basics/navbar.dropdown -->
    <nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
        {{--<form class="navbar-form navbar-left form-search" role="search">
            <div class="form-group">
                <input type="text" placeholder="search"/>
            </div>
            <button type="button" class="btn btn-xs btn-info2">
                <i class="ace-icon fa fa-search icon-only bigger-110"></i>
            </button>
        </form>--}}
        <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
            <!-- #section:basics/navbar.nav -->
            <ul class="nav navbar-nav">
                <li>
                    <a href="{!! route('orders.index') !!}">
                        <i class="ace-icon fa fa-shopping-basket menu_top"></i> Заказы
                        <span id="order">
                                @if(orderItemsCount() > 0)
                                <span class="badge badge-danger">{{ orderItemsCount() }}</span>
                            @endif
                            </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("admincart.index") }}">
                        <i class="ace-icon fa fa-shopping-cart menu_top"></i> Корзина
                        <span id="cart">
                                @if(cartItemsCount() > 0)
                                <span class="badge badge-warning"> {{ cartItemsCount() }} </span>
                            @endif
                            </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки</a>
                    <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                        <li>
                            <a href="{{ route("config.index") }}">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Конфигурация
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Остальное
                        {{--<i class="ace-icon fa fa-angle-down bigger-110"></i>--}}
                    </a>
                    <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                        {{--<li>
                            <a href="{{ route("reviews.index") }}">
                                <i class="ace-icon fa fa-comments-o menu_top"></i> Отзывы <span class="badge badge-purple"> 5 </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-envelope menu_top"></i> Почта <span class="badge badge-info"> 5 </span>
                            </a>
                        </li>--}}
                        <li>
                            <a href="https://seosolution.ua/executed-work.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> SEO
                            </a>
                        </li>
                        <li>
                            <a href="http://client.seosolution.ua/admin.site.list.html?login=success"
                               target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> SEO stat
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/html/index.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Пример html админки
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/html/ajax/index.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Пример ajax админки
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/docs/index.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Документация админки
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/build/css.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> CSS построитель
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/build/js.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Script построитель
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/build/email.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Email построитель
                            </a>
                        </li>
                        <li>
                            <a href="/aceadmin/examples/index.html" target="_blank">
                                <i class="ace-icon fa fa-cog bigger-110 blue"></i> Examples админки
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /section:basics/navbar.nav -->
        </nav>
        <!-- you can also have a form here -->
    </nav><!-- /.navbar-menu -->
</div><!-- /.navbar-container -->