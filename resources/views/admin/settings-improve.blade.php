@extends('admin.form')

@section('top-scripts')

@stop

@section('page-title')
    Настройка контактов
@stop



@section('page-nav')@stop

@section('tiny')
    <!--
        If you need tinyMCE support
         add parent into section
          if not, leave empty
    -->
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">

            {!! Form::model($settings,['route'=>['dashboard.update',$settings->id],'method'=>'put', 'id'=>'form-data']) !!}
                <!-- PAGE CONTENT BEGINS -->
                <div class="tabbable">
                    <!-- #section:pages/faq -->
                    <ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#settings">
                                <i class="blue ace-icon fa fa-cogs bigger-120"></i>
                                Настройки
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#map">
                                <i class="green ace-icon fa fa-map-marker bigger-120"></i>
                                Карта
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#agreement">
                                <i class="red ace-icon fa fa-info-circle bigger-120"></i>
                                Условия обслуживания
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#apinp">
                                <i class="red ace-icon fa fa-truck bigger-120"></i>
                                Новая почта
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#sendtwitter">
                                <i class="blue ace-icon fa fa-twitter-square bigger-120"></i>
                                Твиттер
                            </a>
                        </li>
                    </ul>

                    <!-- /section:pages/faq -->
                    <div class="tab-content no-border padding-24">
                        <div id="settings" class="tab-pane fade active in">
                            <h4 class="blue">
                                <i class="ace-icon fa fa-cog  bigger-110"></i>
                                Контакты
                            </h4>
                            <div class="space-8"></div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('currency','Страна') !!}
                                        {!! Form::text('currency',$value = null,['placeholder'=>'Страна','class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('address','Адрес') !!}
                                        {!! Form::text('address',$value = null,['placeholder'=>'Адрес магазина','class'=>'form-control']) !!}
                                    </div>

                                </div>
                                <div class="form-group">
                                    {!! Form::label('address','Адрес') !!}
                                    {!! Form::text('address',$value = null,['placeholder'=>'Адрес магазина','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('news','Новости') !!}
                                    {!! Form::text('news',$value = null,['placeholder'=>'Новости в футере','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('header_phone1','Телефон в шапке 1') !!}
                                    {!! Form::text('header_phone1',$value = null,['placeholder'=>'Телефон в шапке','class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('header_phone2','Телефон в шапке 2') !!}
                                    {!! Form::text('header_phone2',$value = null,['placeholder'=>'Телефон в шапке','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('footer_phone1','Телефон в футере 1') !!}
                                    {!! Form::text('footer_phone1',$value = null,['placeholder'=>'Телефон в футере','class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('footer_phone2','Телефон в футере 2') !!}
                                    {!! Form::text('footer_phone2',$value = null,['placeholder'=>'Телефон в футере 2','class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('footer_phone3','Телефон в футере 3') !!}
                                    {!! Form::text('footer_phone3',$value = null,['placeholder'=>'Телефон в футере 3','class'=>'form-control']) !!}
                                </div>
                            </div>


                        <h4 class="blue">
                            <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                            Почта сайта
                        </h4>
                        <div class="space-8"></div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('contact_email','Публичный email') !!}
                                    {!! Form::text('contact_email',$value = null,['placeholder'=>'Публичный email','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('feedback_email','Email для обратной связи') !!}
                                    {!! Form::text('feedback_email',$value = null,['placeholder'=>'Email для обратной связи','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <h4 class="blue">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Социальные сети
                        </h4>
                        <div class="space-8"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('vkontakte','Страница в vkontakte') !!}
                                    {!! Form::text('vkontakte',$value = null,['placeholder'=>'Страница в vkontakte','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('facebook','Страница в facebook') !!}
                                    {!! Form::text('facebook',$value = null,['placeholder'=>'Страница в facebook','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('twitter','Страница в Instagram') !!}
                                    {!! Form::text('twitter',$value = null,['placeholder'=>'Страница в Instagram','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('google','Страница в Google+ ') !!}
                                    {!! Form::text('google',$value = null,['placeholder'=>'Страница в google+','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('youtube','Страница на youtube') !!}
                                    {!! Form::text('youtube',$value = null,['placeholder'=>'Страница на youtube','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('twitter','Страница twitter') !!}
                                    {!! Form::text('twitter',$value = null,['placeholder'=>'Страница twitter','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('uslovia','Условия для монтажников') !!}
                                    {!! Form::textarea('uslovia',$value = null,['placeholder'=>'Условия','class'=>'form-control tiny']) !!}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('reviews','Отзывы') !!}
                                    {!! Form::textarea('reviews',$value = null,['placeholder'=>'Отзывы','class'=>'form-control tiny']) !!}
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('about','О нас') !!}
                                    {!! Form::textarea('about',$value = null,['placeholder'=>'О нас','class'=>'form-control tiny']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="map" class="tab-pane fade">
                            <h4 class="blue">
                                <i class="ace-icon fa fa-map bigger-110"></i>
                                Вставка кода карты сайта
                            </h4>
                            <div class="space-8"></div>
                            <div class="col-lg-10">
                                <textarea name="map_code" id="map_code" cols="60"
                                          rows="5">{{ old('map_code',$settings->map_code) }}</textarea>
                            </div>
                            <div class="col-lg-5">
                                @if(trim($settings->map_code))
                                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                       data-target=".bs-example-modal-lg">Показать на карте</a>
                                @endif

                                <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog"
                                     aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content custom-modal">
                                            {!! $settings->map_code !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="API_NP">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {!! Form::label('API_key_NP','Ключ для работы с API Новой почты') !!}
                                        {!! Form::text('API_key_NP',$value = null,['placeholder'=>'Ключ','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="agreement" class="tab-pane fade">
                            <h4 class="blue">
                                <i class="ace-icon fa fa-info-circle bigger-110"></i>
                                Условия соглашения
                            </h4>

                            {!! Form::textarea('agreement', $value = null, ['rows'=>'20', 'class' => 'form-control tiny']) !!}
                        </div>
                        <div id="apinp">
                            <p>Настройки новой почты</p>
                        </div>
                        <div id="sendtwitter" class="tab-pane fade">
                            <h4 class="blue">
                                <i class="ace-icon fa fa-twitter-square bigger-110"></i>
                                Твиттер
                            </h4>
                            <div id="counter"></div>
                            {!! Form::text('twiterText', $value = null, ['class' => 'form-control', 'id' => 'twiterText']) !!}
                            <br>
                            <button class="btn btn-success" onclick="sendTwitter(); return false;">Отправить</button>
                            <div id="result"></div>
                            <script>
                                function sendTwitter() {
                                    $.ajax({
                                        type: "POST",
                                        url: "/server/send",
                                        data: {
                                            text: $("#twiterText").val(),
                                            _token: '{{ csrf_token() }}'
                                        }
                                    }).done(function (response) {
                                        $("#result").html(response);
                                        setTimeout(function () {
                                            $("#result").html('');
                                        }, 10000);
                                    });
                                }

                                $(document).ready(function () {
                                    var characters = 140;
                                    $("#counter").append("Можете ввести ещё " + characters + " символов");
                                    $("#twiterText").keyup(function () {
                                        if ($(this).val().length > characters) {
                                            $(this).val($(this).val().substr(0, characters));
                                        }
                                        var remaining = characters - $(this).val().length;
                                        $("#counter").html("Можете ввести ещё " + remaining + " символов");
                                        if (remaining <= 10) {
                                            $("#counter").css("color", "red");
                                        } else {
                                            $("#counter").css("color", "black");
                                        }
                                    });
                                });


                            </script>
                        </div>
                    </div>
                </div>


                <button form='form-data' class="btn btn-success btn-block">Сохранить</button>
            {!! Form::close() !!}
        <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
@stop

@section('bottom-scripts')

@stop