@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Новая почта
@stop

@section('content')
    {{--{{dump($data)}}--}}
    <div id="novaposhtaVue">
        <div class="col-xs-12">
            <div class="row">
                <input type="text" name="np_id" v-model="np_id">
                <button v-on:click.prevent="areaUpdate()">
                    Обновить области
                </button>
            </div>
        </div>
        <pre>
            @{{ $data.response}}
        </pre>
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
                areaUpdate: function () {
                    var vue = this;
                    var options = {
                        _token: vue.token,
                        np_id: vue.np_id
                    };
                    this.$http.post('/server/np/updateAreas', options).then(function (response) {
                        vue.response = response;
                    }, function (error) {
                        vue.errors = error;
                    });
                }
            }
        })
    </script>
@stop