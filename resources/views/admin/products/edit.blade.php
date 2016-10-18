@extends('admin.form')

@section('page-title')
    Редактировать товар
@stop

@section('content')

    <div class="col-xs-6">
        <a href="{!! route('dashboard.products.create') !!}" class="btn btn-sm btn-primary" title="Добавить товар" target="_blank">
            <i class="ace-icon fa fa-plus"></i> Добавить товар
        </a>
    </div>

    <div class="row">
        @include('admin.partials.errors')
        {!! Form::model($product,['route' => ['dashboard.products.update', $product->id], 'method' => 'PUT', 'id' => 'form-data', 'files' => true]) !!}

            @include("admin.products.form")

        {!! Form::close() !!}

    </div>

@stop
