@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    SMS
@stop

@section('page-nav')

@stop

@section('content')
    <div class="page-content" id="smsVue">
        <div class="row">
            <div class="col-xs-6">
                <div id="response" style="min-height: 100px; border: 1 solid black">
                    @{{ response }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="form-field-mask-2">Телефон: </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="ace-icon fa fa-phone"></i>
                            </span>
                            <input class="form-control"
                                   placeholder="Телефон пользователя"
                                   id="phone"
                                   name="phone"
                                   type="text"
                                   v-model="phone"
                                    value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="form-field-mask-2">Текст: </label>
                        <div class="input-group">
                            <textarea class="form-control" placeholder="Текст"
                                      name="text" id="text" v-model="text"
                                      rows="10" cols="45"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <button v-on:click.prevent="sendSms()">
                        Отправить
                    </button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    {{--<script src="{!! url('frontend/js/jquery.maskedinput.min.js') !!}"></script>--}}

    <script>
        Vue.config.debug = true;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');
        var smsVue = new Vue({

            el: '#smsVue',

            data: {
                token: $("input[name='_token']").val(),
                phone: null,
                text: null,
                response: null
            },

            created: function () {
            },

            methods: {
                sendSms: function () {
                    var vue = this;
                    var options = {
                            _token: vue.token,
                            phone: vue.phone,
                            text: vue.text
                    };
                    this.$http.post('/server/sms/send', options).then(function (response) {
                        vue.response = response.body;
                    }, function (error) {});
                }
            }
        });
    </script>
@stop