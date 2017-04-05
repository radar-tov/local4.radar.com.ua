@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Главная
@stop

@section('page-nav')

@stop

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="widget-box" style="min-height: 400px">
                                <div class="widget-header widget-header-flat">
                                    <h3>Онлайн</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main" id="online-div">
                                        Контент
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="widget-box" style="min-height: 400px">
                                <div class="widget-header widget-header-flat">
                                    <h3>Лог</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        Контент
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="widget-box" style="min-height: 400px">
                                <div class="widget-header widget-header-flat">
                                    <h3>Журнал</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        Контент
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="widget-box" style="min-height: 400px">
                                <div class="widget-header widget-header-flat">
                                    <h3>Что-то</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        Контент
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
@stop

@section('bottom-scripts')
    <script>
        $(document).ready(function () {
            getOnline();
            setInterval(getOnline, 15000);
        });
        function getOnline() {
            var token = $("input[name='_token']").val();
            $.ajax({
                type: "GET",
                url: "/server/getonline",
                data: {_token: token}
            }).done(function (response) {
                $("#online-div").html(response.online);
            });
        }
    </script>
@stop