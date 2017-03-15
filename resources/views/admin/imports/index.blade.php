@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')@stop

{{--@section('content')--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-12">--}}
            {{--@if(Session::has('message'))--}}
                {{--<div class="col-xs-7 no-pad">--}}
                    {{--<div class="alert alert-{{ Session::get('success') ? 'success' : 'danger' }}">--}}
                        {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                        {{--{{ Session::get('message') }}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<div class="col-xs-12 no-pad">--}}
                {{--<div class="col-xs-12 no-pad">--}}
                    {{--<div class="form-group">--}}
                        {{--<h4>Импрот товаров</h4>--}}
                        {{--<p>--}}
                            {{--Важно дождаться полного обновления страницы и не закрывать окно браузера до завершения импорта!--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 no-pad">--}}
                    {{--<div class="form-group">--}}
                        {{--<form id="form-data" action="{{ route('transfer.store') }}" method="post" enctype="multipart/form-data">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>--}}
                            {{--<div class="form-group">--}}
                                {{--<input name="import" type="file"/>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xs-6 no-pad">--}}
                    {{--<div class="form-group">--}}
                        {{--<button form="form-data" type="submit" class="btn btn-sm btn-primary">--}}
                            {{--<i class="ace-icon fa fa-plus"></i>--}}
                            {{--Загрузить--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xs-6 no-pad">--}}
                    {{--<form action="{{ route('transfer.rollback') }}">--}}
                        {{--<button type="submit"--}}
                                {{--class="btn btn-sm btn-danger pull-right"--}}
                                {{--{{ $backup->count() == 0 ? 'disabled' : ''}}--}}
                        {{-->--}}
                            {{--<span class="badge badge-gray">{{ $backup->count() }}</span>--}}
                            {{--Откатиться--}}
                        {{--</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!-- /.col -->--}}
{{--@stop--}}

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="tabbable">
                <!-- #section:pages/faq -->
                <ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#import">
                            <i class="blue ace-icon fa fa-truck bigger-120"></i>
                            Импорт
                        </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#export">
                            <i class="green ace-icon fa fa-share bigger-120"></i>
                            Экспорт
                        </a>
                    </li>
                </ul>

                <!-- /section:pages/faq -->
                <div class="tab-content no-border padding-24">
                    <div id="import" class="tab-pane fade active in">
                        @if(Session::has('message'))
                            <div class="col-xs-7 no-pad">
                                <div class="alert alert-{{ Session::get('success') ? 'success' : 'danger' }}">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif
                        <div class="col-xs-12 no-pad">
                            <div class="col-xs-12 no-pad">
                                <div class="form-group">
                                    <h4>Импорт товаров</h4>
                                    <p class="text-warning bigger-110 orange">
                                        <i class="ace-icon fa fa-exclamation-triangle"></i>
                                        Важно дождаться полного обновления страницы и не закрывать окно браузера до завершения импорта!
                                    </p>
                                    <p>
                                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                                        Добавьте файл согласованного формата (Поля файла не должны меняться местами)
                                    </p>
                                    <p>
                                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                                        Поддерживаемые разширения файлов - .csv
                                    </p>
                                   <!--  <p>
                                        <i class="ace-icon fa fa-times bigger-110 red"></i>
                                        В случае неудачи, Вы всегда можете откатить систему до последнего импорта!
                                    <p> -->
                                </div>
                            </div>
                            <div class="col-xs-12 no-pad">
                                <div class="form-group">
                                    <form id="form-data" action="{{ route('transfer.store') }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <div class="form-group">
                                            <input name="import" type="file"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-6 no-pad">
                                <div class="form-group">
                                    <button form="form-data" type="submit" class="btn btn-sm btn-primary">
                                        <i class="ace-icon fa fa-plus"></i>
                                        Загрузить
                                    </button>
                                </div>
                            </div>
                            <div class="col-xs-6 no-pad">
                             <!--    <button type="submit"
                                        class="btn btn-sm btn-danger pull-right"
                                        {{-- $backup->count() == 0 ? 'disabled' : '' --}}
                                        id="bootbox-confirm"
                                        >
                                    <span class="badge badge-gray">{{ $backup->count() }}</span>
                                    Откатиться
                                </button> -->
                                <form action="{{ route('transfer.rollback') }}" id="rollback" name="rollback">
                                    {{--
                                        <button type="submit"
                                                class="btn btn-sm btn-danger pull-right"
                                                {{ $backup->count() == 0 ? 'disabled' : ''}}
                                                >
                                            <span class="badge badge-gray">{{ $backup->count() }}</span>
                                            Откатиться
                                        </button>
                                    --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="export" class="tab-pane fade">
                        <div class="col-xs-12 no-pad">
                            <div class="col-xs-12 no-pad">
                                <div class="form-group">
                                    <h4>Экспорт товаров</h4>
                                    <p>
                                        Выгрузить список товаров в csv файл!
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-6 no-pad">
                                <div class="form-group">
                                    <a href="{{ route('transfer.export') }}" class="btn btn-sm btn-primary">
                                        <i class="ace-icon fa fa-plus"></i>
                                        Загрузить
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
@stop
@section('bottom-scripts')
    <script src="{{ url('admin/assets/js/bootbox.min.js') }}"></script>

    <script>
        $("#bootbox-confirm").on('click', function() {
            bootbox.confirm({
                message: "<h4>Откатить систему до состояния пред последним импортом?</h4>",
                buttons: {
                  confirm: {
                     label: "Подтвердить",
                     className: "btn-primary btn-sm"
                  },
                  cancel: {
                     label: "Отменить",
                     className: "btn-sm"
                  }
                },
                callback: function(result) {
                    if(result) {
                        // if user confirm submit button
                        document.getElementById("rollback").submit();
                    }

                    return;
                }
            });
        });

    </script>
@stop






