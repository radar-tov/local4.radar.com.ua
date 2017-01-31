<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta id="token" name="token" value="{!! csrf_token() !!}" >
    <title>@yield('page-title')</title>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    {{--{!!Html::style('admin/assets/css/bootstrap.min.css') !!}--}}
    <link rel="stylesheet" href="{!! url('admin/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('admin/assets/css/font-awesome.min.css') !!}">

    <link rel="stylesheet" href="{!! url('admin/assets/css/jquery-ui.custom.min.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/jquery.gritter.css') !!}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    {{--{!!Html::style('admin/assets/css/font-awesome.min.css')!!}--}}

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{!! url('admin/assets/css/ace-fonts.css') !!}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{!! url('admin/assets/css/uncompressed/ace.css') !!}"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{!! url('admin/assets/css/uncompressed/ace-part2.css') !!}"/>
    <![endif]-->


    {{--<!-- Burn after reading -->--}}
    {{--{!!Html::style('admin/assets/css/ace-skins.min.css')!!}--}}
    {{--{!!Html::style('admin/assets/css/ace-rtl.min.css')!!}--}}
    {{--<!-- Burn after reading -->--}}


    <!--[if lte IE 9]>
        <link rel="stylesheet" href="{!! url('admin/assets/css/ace-ie.min.css') !!}"/>
    <![endif]-->

    <!-- Custom admin templates -->
    <link rel="stylesheet" href="{!! url('admin/assets/css/main.css') !!}"/>
    <link rel="stylesheet" href="{{ url('packages/colorbox/colorbox.css') }}">
    {{--<link rel="stylesheet" href="{{ url('admin/assets/css/chosen.css') }}">--}}


    {{--<!-- Burn after reading -->--}}
        {{--{!!Html::style('packages/colorbox/colorbox.css')!!}--}}
        {{--{!!Html::style('admin/assets/css/jquery-ui.min.css')!!}--}}
        {{--{!!Html::style('admin/assets/css/chosen.css')!!}--}}
    {{--<!-- Burn after reading -->--}}

    <!--/Custom admin templates -->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    {{--{!!Html::script('admin/assets/js/ace-extra.min.js')!!}--}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lte IE 8]>
        <script src="{!! url('admin/assets/js/html5shiv.js') !!}"></script>
        <script src="{!! url('admin/assets/js/respond.min.js') !!}"></script>

    <![endif]-->
    <!--[if !IE]> -->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/admin/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>
    <!-- <![endif]-->

    <!--[if IE]>
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/admin/assets/js/jquery1x.min.js'>"+"<"+"/script>");
    </script>
    <![endif]-->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel.pack.js"></script>
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js"></script>
    @yield('top-scripts')
    @yield('tiny')
</head>
<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
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
                <small>
                    Перейти на сайт
                </small>
            </a>
        </div>
            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                {{--<li class="light-blue"><a href="{{ url('/dashboard/flush') }}" onclick="return confirm('Это действие удалит весь кэш на сайте?')">Очистить кеш?</a></li>--}}
                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        {{--<img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Jason's Photo" />--}}
								<span class="user-info">
									<small>Здравствуйте,</small>
									{{ $currentUser->name or "Neo!" }}
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        @if(isset($currentUser))
                        <li>
                            <a href="{!! route('dashboard.users.edit',[$currentUser->id]) !!}">
                                <i class="ace-icon fa fa-user"></i>
                                Мой профиль
                            </a>
                        </li>
                        @endif

                        <li class="divider"></li>

                        <li>
                            <a href="/auth/logout">
                                <i class="ace-icon fa fa-power-off"></i>
                                Выход
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>
        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>
    <!-- #section:basics/sidebar -->
    @include('admin.partials.sidebar')
    <!-- /section:basics/sidebar -->
    <div class="main-content">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">

                {{--<li>--}}
                    {{--<i class="ace-icon fa fa-home home-icon"></i>--}}
                    {{--<a href="#">Home</a>--}}
                {{--</li>--}}
                {{--<li class="active">Dashboard</li>--}}

                {!! Breadcrumbs::renderIfExists() !!}
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">

                    {{--<div class="page-header">--}}
                        {{--<h1>--}}
                            {{--@yield('page-title')--}}
                            {{--<!--<small>--}}
                                {{--<i class="ace-icon fa fa-angle-double-right"></i>--}}
                                {{--overview &amp; stats--}}
                            {{--</small>-->--}}
                        {{--</h1>--}}
                    {{--</div><!-- /.page-header -->--}}

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
						<span class="bigger-120">
							<span class="blue bolder">Radar</span>
							  &copy; {{ date('Y') }}{{ date('Y') > 2015 ? ' - ' .date('Y') : null }}
						</span>
                        &nbsp; &nbsp;
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{!! url('admin/assets/js/excanvas.min.js') !!}"></script>
<![endif]-->


{{--{!!Html::script('admin/assets/js/jquery-ui.custom.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/jquery.ui.touch-punch.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/jquery.easypiechart.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/jquery.sparkline.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/jquery.gritter.min.js')!!}--}}


{{--<script src="../assets/js/jquery.gritter.min.js"></script>--}}


{{--{!!Html::script('admin/assets/js/flot/jquery.flot.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/flot/jquery.flot.pie.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/flot/jquery.flot.resize.min.js')!!}--}}


<!-- ace scripts -->
{{--{!!Html::script('admin/assets/js/ace-elements.min.js')!!}--}}
{{--{!!Html::script('admin/assets/js/ace.min.js')!!}--}}
<!-- inline scripts related to this page -->


{{--{!!Html::style('admin/assets/css/ace.onpage-help.css')!!}--}}
{{--{!!Html::style('admin/docs/assets/js/themes/sunburst.css')!!}--}}

{{--<script type="text/javascript"> ace.vars['base'] = '..'; </script>--}}

{{--{!! Html::script('admin/assets/js/ace/ace.onpage-help.js') !!}--}}
{{--{!! Html::script('admin/assets/js/ace/ace.onpage-help.js') !!}--}}


{{--{!! Html::script('admin/docs/assets/js/rainbow.js') !!}--}}
{{--{!! Html::script('admin/docs/assets/js/language/generic.js') !!}--}}
{{--{!! Html::script('admin/docs/assets/js/language/html.js') !!}--}}
{{--{!! Html::script('admin/docs/assets/js/language/css.js') !!}--}}
{{--{!! Html::script('admin/docs/assets/js/language/javascript.js') !!}--}}

<!-- page specific plugin scripts -->
{{--{!! Html::script('admin/assets/js/jquery-ui.min.js') !!}--}}
{{--{!! Html::script('admin/assets/js/jquery.ui.touch-punch.min.js') !!}--}}
<!-- /page specific plugin scripts -->

{{--{!! Html::script('admin/assets/js/fuelux/fuelux.spinner.min.js') !!}--}}
{{--{!! Html::script('admin/assets/js/chosen.jquery.min.js') !!}--}}

{{--assets/js/jquery.hotkeys.min.js --}}
{{--{!! Html::script('admin/assets/js/jquery.hotkeys.min.js') !!}--}}
{{--{!! Html::script('admin/assets/js/bootstrap-wysiwyg.min.js') !!}--}}

<!-- Colorbox -->
<script src="{!! url('packages/colorbox/jquery.colorbox-min.js') !!}"></script>
{{--{!! Html::script('packages/colorbox/jquery.colorbox-min.js') !!}--}}
<!--/Colorbox -->

<!-- Standalonepopup -->
<script src="{!! url('packages/barryvdh/elfinder/js/standalonepopup.js') !!}"></script>
<!-- /Standalonepopup-->

<!-- ace scripts -->
<script src="/admin/assets/js/ace.min.js"></script>
<script src="/admin/assets/js/ace-elements.min.js"></script>
<!-- Vue -->
{{--<script src="{!! url('admin/assets/js/vue.js') !!}"></script>--}}
{{--<script src="{!! url('admin/assets/js/vue-resource.js') !!}"></script>--}}
<!-- /Vue -->

<script src="{!! url('admin/assets/js/jquery-ui.custom.min.js') !!}"></script>
{{--<script src="{!! url('admin/assets/js/vue-resource.js') !!}"></script>--}}
<script src="{!! url('admin/assets/js/jquery.gritter.min.js') !!}"></script>



@yield('bottom-scripts')
{{--@include('admin.partials.messages')--}}
<script src="{!! url('admin/assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('admin/assets/js/index.js') !!}"></script>
</body>
</html>
