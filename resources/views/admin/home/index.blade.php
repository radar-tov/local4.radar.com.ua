@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Главная
@stop

@section('page-nav')

@stop

@section('content')
    <div class="page-content" id="homeVue">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="widget-box" style="min-height: 400px">
                            <div class="widget-header">
                                <h3>Онлайн</h3>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main" style="overflow: auto; height: 330px;">
                                    <table v-show="onlineList.length > 0">
                                        <thead>
                                        <tr>
                                            <th>IP</th>
                                            <th>Страница</th>
                                            <th>Вход</th>
                                            <th>Обновление</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item in onlineList">
                                            <td class="middle">@{{ item.ip }}&nbsp;&nbsp;</td>
                                            <td>
                                                <a v-bind:href="item.page">@{{ item.page }}&nbsp;&nbsp;</a>
                                            </td>
                                            <td class="middle">@{{ item.created_at }}&nbsp;&nbsp;</td>
                                            <td class="middle">@{{ item.updated_at }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="widget-box" style="min-height: 400px">
                            <div class="widget-header">
                                <h3>Чат</h3>
                            </div>
                            <div class="widget-body ace-scroll">
                                <div class="widget-main" style="overflow: auto; height: 330px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="widget-box" style="min-height: 805px">
                            <div class="widget-header">
                                <h3>Лог</h3>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main" style="overflow: auto; height: 760px;">
                                    <table v-show="logList.length > 0">
                                        <tr v-for="item in logList">
                                            <td class="middle">@{{ item.ip }}&nbsp;&nbsp;</td>
                                            <td>
                                                <a v-bind:href="item.page">@{{ item.page }}&nbsp;&nbsp;</a>
                                            </td>
                                            <td class="middle">@{{ item.log }}&nbsp;&nbsp;</td>
                                            <td class="middle">@{{ item.created_at }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@stop

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script>
        Vue.config.debug = true;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');
        var homeVue = new Vue({

            el: '#homeVue',

            data: {
                token: $("input[name='_token']").val(),
                onlineList: {},
                logList: {}
            },

            created: function () {
                this.getOnline();
                setInterval(this.getOnline, 15000);
            },

            methods: {
                getOnline: function () {
                    var vue = this;
                    var options = {
                        params: {
                            _token: vue.token
                        }
                    };
                    this.$http.get('/server/getonline', options).then(function (response) {
                        vue.onlineList = response.body.online;
                        vue.logList = response.body.log.data;
                    }, function (error) {

                    });
                }
            }
        });
    </script>
@stop