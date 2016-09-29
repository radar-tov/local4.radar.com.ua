@extends('admin.form')

@section('page-title')
    Редактировать товар
@stop

@section('content')

    <div class="row">
        @include('admin.partials.errors')
        {!! Form::model($product,['route' => ['dashboard.products.update', $product->id], 'method' => 'PUT', 'id' => 'form-data', 'files' => true]) !!}

            @include("admin.products.form")

        {!! Form::close() !!}

    </div>

@stop
