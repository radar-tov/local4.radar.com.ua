@extends('admin.app')

@section('top-scripts')

@stop

@section('page-title')
    Редактировать пользователя
@stop

@section('page-nav')
    <div class="row h50">
        <div class="col-xs-12">
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="0" title="Сохранить">
                <i class="ace-icon fa fa-floppy-o"></i> Сохранить
            </button>
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="1" title="Сохранить и выйти">
                <i class="ace-icon fa fa-chevron-circle-up "></i> Сохранить и выйти
            </button>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        @include('admin.partials.errors')
        {!! Form::model($page,['route'=>['dashboard.pages.update',$page->id],'method'=>'put', 'id'=>'form-data']) !!}
            @include('admin.pages.form')
        {!! Form::close() !!}
    </div>
@stop

@section('bottom-scripts')@stop