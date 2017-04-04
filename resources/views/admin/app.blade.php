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
    <script>var fokus;
        function focusHere() {
            window.fokus = true;
        }
        function focusOut() {
            window.fokus = false;
        }</script>
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
    @include('admin.partials.bottomsidebar')
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
