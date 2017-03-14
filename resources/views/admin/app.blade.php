<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta id="token" name="token" value="{!! csrf_token() !!}">
    <title>@yield('page-title')</title>
    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ elixir('css/admin/all.css') }}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- page specific plugin styles -->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{!! url('admin/assets/css/uncompressed/ace-part2.css') !!}"/>
    <link rel="stylesheet" href="{!! url('admin/assets/css/ace-ie.min.css') !!}"/>
    <![endif]-->

    <!--[if lte IE 8]>
    <script src="{!! url('admin/assets/js/html5shiv.js') !!}"></script>
    <script src="{!! url('admin/assets/js/respond.min.js') !!}"></script>
    <![endif]-->

    <!--[if !IE]> -->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/admin/assets/js/jquery.min.js'>" + "<" + "/script>");
    </script>
    <!-- <![endif]-->
    <!--[if IE]>
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/admin/assets/js/jquery1x.min.js'>" + "<" + "/script>");
    </script>
    <![endif]-->
    @yield('top-scripts')
    @yield('tiny')
</head>


<body class="skin-3 no-skin" onmouseover="focusHere();" onmouseout="focusOut();">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>
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
                                <a href="{!! route('dashboard.users.edit',[$currentUser->id]) !!}">
                                    <i class="ace-icon fa fa-user"></i> Мой профиль
                                </a>
                            </li>
                        @endif
                        <li class="divider"></li>
                        <li>
                            <a href="/auth/logout">
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
                        <a href="{!! route('dashboard.orders.index') !!}">
                            <i class="ace-icon fa fa-shopping-basket menu_top"></i> Заказы <span class="badge badge-danger"> 1 </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("dashboard.admincart.index") }}">
                            <i class="ace-icon fa fa-shopping-cart menu_top"></i> Корзина
                            <span id="cart">
                                @if(cartItemsCount() > 0)
                                    <span class="badge badge-warning"> {{ cartItemsCount() }} </span>
                                @endif
                            </span>
                        </a>
                    </li>
                    {{--<li>
                        <a href="#">
                            <i class="ace-icon fa fa-envelope menu_top"></i> Почта <span class="badge badge-info"> 5 </span>
                        </a>
                    </li>--}}
                    <li>
                        <a href="{{ route("dashboard.reviews.index") }}">
                            <i class="ace-icon fa fa-comments-o menu_top"></i> Отзывы <span class="badge badge-purple"> 5 </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Overview
                            <i class="ace-icon fa fa-angle-down bigger-110"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-eye bigger-110 blue"></i> Monthly Visitors
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-user bigger-110 blue"></i> Active Users
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog bigger-110 blue"></i> Settings
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
</div>
<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>
    <!-- #section:basics/sidebar -->
@include('admin.partials.sidebar')
<!-- /section:basics/sidebar -->
    <div class="main-content">
        {{--<div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                {!! Breadcrumbs::renderIfExists() !!}
            </ul>
        </div>--}}
        {{--<div class="page-header">
            <h1>
                @yield('page-title')
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    overview &amp; stats
                </small>
            </h1>
        </div><!-- /.page-header -->--}}
        <div class="page-content">
            @yield('page-nav')
            @yield('content')
            <div class="row"></div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    <div class="clearfix"></div>
    <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content">
						<span class="bigger-100">
							<span class="blue bolder">Radar.com.ua</span> &copy; {{ date('Y.m.d') }}
                            {{--{{ date('Y') > 2015 ? ' - ' .date('Y') : null }}--}}
						</span>
            </div>
            <!-- /section:basics/footer -->
        </div>
    </div>
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->


<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='/admin/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<!--[if lte IE 8]>
<script src="{!! url('admin/assets/js/excanvas.min.js') !!}"></script>
<![endif]-->

<script type="text/javascript" src="{{ elixir('js/admin/all.js') }}"></script>

@yield('bottom-scripts')

</body>
</html>
