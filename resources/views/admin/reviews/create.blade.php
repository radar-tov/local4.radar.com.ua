@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Добавить Баннер
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
        {!! Form::open(['route'=>'dashboard.reviews.store','method'=>'post', 'id'=>'form-data']) !!}
            @include('admin.reviews.form')
        {!! Form::close() !!}
    </div>
@stop

