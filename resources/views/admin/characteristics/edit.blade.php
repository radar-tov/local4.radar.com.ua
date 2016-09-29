@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Редактировать категорию
@stop

@section('page-nav')
    <div class="col-lg-12 page-nav">
        <div class="row">
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
        @include('admin.partials.errors')
        <form action="{!! route('dashboard.filters.update',[$filter->id]) !!}" method="POST" id="form-data">
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PUT">
            @include("admin.filters.form")
        </form>
@stop

