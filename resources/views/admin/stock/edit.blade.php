@extends('admin.app')


@section('page-title')
    Редактировать акцию
@stop

@section('page-nav')
    <div class="row h50">
        <div class="col-xs-12">
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="0" title="Сохранить" disabled>
                <i class="ace-icon fa fa-floppy-o"></i> Сохранить
            </button>
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="1" title="Сохранить и выйти" disabled>
                <i class="ace-icon fa fa-chevron-circle-up "></i> Сохранить и выйти
            </button>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        @include('admin.partials.errors')
        {!! Form::model($stock, ['route'=> ['dashboard.stock.update',$stock->id], 'method'=>'put', 'id'=>'form-data']) !!}
        @include('admin.stock.form')
        {!! Form::close() !!}
    </div>
@stop

