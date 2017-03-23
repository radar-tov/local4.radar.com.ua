@extends('admin.form')

@section('page-title')
    {{ $product->name }} - Редактирование
@stop

@section('content')

    <div class="row">
        @include('admin.partials.errors')
        {!! Form::model($product,['route' => ['products.update', $product->id], 'method' => 'PUT', 'id' => 'form-data', 'files' => true]) !!}

            @include("admin.products.form")

        {!! Form::close() !!}

    </div>

@stop
