@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Страницы
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div>
                 <a href="{{ route('dashboard.static_pages.create') }}" class="btn btn-sm btn-primary">
                    <i class="ace-icon fa fa-plus"></i>Добавить страницу</a>
                <br/>
                <br/> 
            </div>
            <table id="sample-table-2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Ссылка</th>
                <th style="width:80px; text-align: center">Опции</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td> 

                    <!-- Options -->
                    <td class="options">
                        <a class="green" href="{!! route('dashboard.static_pages.edit', $page->id) !!}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                    </td>
                     <td class="options">
                        <div class="action-buttons">
                            {!! Form::open(['route'=>['dashboard.static_pages.destroy', $page->id],'method'=>'delete' ]) !!}
                            <label class="red" style="display: inline-block; cursor: pointer;">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                {!! Form::submit('Удалить',
                                ["class" => "ace-icon fa fa-trash-o bigger-120", "id" => "test", "style" => "display:none"]) !!}
                                {!! Form::close() !!}
                            </label>
                        </div>
                    </td> 
                </tr>
                <!-- /End Options -->
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop


@section('bottom-scripts')

@stop
