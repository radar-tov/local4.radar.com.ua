@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Новая почта
@stop

@section('content')

    <div id="novaposhtaVue">
        <pre>
            @{{ $data.response}}
        </pre>

        <div class="col-xs-12">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h3>Области</h3>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <button v-on:click.prevent="updateAreas()" class="btn btn-primary">
                                    Обновить области
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h3>Города</h3>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <button v-on:click.prevent="updateCities()" class="btn btn-primary">
                                    Обновить города
                                </button>
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
    {{--<script src="/admin/assets/js/novaposhta/index.js"></script>--}}
    <script>
        Vue.config.debug = true;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

        var productsVue = new Vue({

            el: '#novaposhtaVue',

            data: {
                response: null,
                token: $("input[name='_token']").val(),
                np_id: null
            },

            created: function () {

            },

            methods: {
                updateAreas: function () {
                    var vue = this;
                    var options = {
                        _token: vue.token
                    };
                    this.$http.post('/server/np/updateAreas', options).then(function (response) {
                        vue.response = response.data;
                    }, function (error) {
                        vue.errors = error;
                    });
                },

                updateCities: function () {
                    var vue = this;
                    var options = {
                        _token: vue.token
                    };
                    this.$http.post('/server/np/updateCities', options).then(function (response) {
                        vue.response = response.data;
                    }, function (error) {
                        vue.errors = error;
                    });
                }
            }
        })
    </script>
@stop