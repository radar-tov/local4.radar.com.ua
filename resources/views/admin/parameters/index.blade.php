@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Параметры товаров
@stop

@section('page-nav')
    <div class="col-xs-12">
        <a href="{!! route('dashboard.parameters.create') !!}" class="btn btn-sm btn-primary" title="Добавить Параметр Товара">
            <i class="ace-icon fa fa-2x fa-plus-circle"></i>
        </a>
    </div>
    <div class="col-xs-12">&nbsp;</div>
@stop

@section('content')
    <div class="col-xs-12">
        <table id="sample-table-2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Ссылка</th>
                    <th>Категории</th>
                    <th colspan="2" class="options">Опции</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parameters as $parameter)
                    <tr>
                        <td>{{ $parameter->title }}</td>
                        <td>{{ $parameter->slug }}</td>
                        <td>''</td>
                        <!-- Options -->
                        <td class="options">
                            <a class="green" href="{!! route('dashboard.parameters.edit', $parameter->id) !!}">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="hidden-sm hidden-xs action-buttons">
                                {!! Form::open(['route'=>['dashboard.parameters.destroy', $parameter->id],'method'=>'delete' ]) !!}
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
    </div><!-- /.col -->
@stop

@section('bottom-scripts')

@stop
