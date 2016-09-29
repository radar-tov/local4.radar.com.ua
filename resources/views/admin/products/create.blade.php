@extends('admin.form')

@section('page-title')
    Добавить Товар
@endsection

@section('top-scripts')
    @parent
@endsection

@section('content')
    <div class="row">
        @include('admin.partials.errors')
        {!! Form::open(['route' => 'dashboard.products.store', 'method' => 'POST', 'files' => true, 'id' => 'form-data']) !!}

            @include("admin.products.form")

        {!! Form::close() !!}
    </div>
@endsection

