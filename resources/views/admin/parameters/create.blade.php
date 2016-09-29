@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Добавить категорию
@stop

@section('page-nav')
    <div class="col-xs-12">
        <button form="form-data" class="btn btn-sm btn-primary" name="button" value="0" title="Сохранить">
            <i class="ace-icon fa fa-floppy-o"></i> Сохранить
        </button>
        <button form="form-data" class="btn btn-sm btn-primary" name="button" value="1" title="Сохранить и выйти">
            <i class="ace-icon fa fa-chevron-circle-up "></i> Сохранить и выйти
        </button>
    </div>
    <div class="col-xs-12">&nbsp;</div>

    {{--
        <div class="col-xs-12">
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="0" title="Сохранить">
                <i class="ace-icon fa fa-2x fa-floppy-o"></i>
            </button>
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="1" title="Сохранить и выйти">
                <i class="ace-icon fa fa-2x fa-chevron-circle-up "></i>
            </button>
        </div>
        <div class="col-xs-12">&nbsp;</div>
    --}}
@stop

@section('content')
    <div id="parameters" class="col-xs-12">
        @include('admin.partials.errors')
        <form action="{!! route('dashboard.parameters.store') !!}" method="POST" id="form-data">
            {!! csrf_field() !!}
            @include("admin.parameters.form")
        </form>
    </div>
@stop
