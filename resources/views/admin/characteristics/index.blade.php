@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Характеристики товаров
@stop

@section('page-nav')
    <div class="col-xs-12">
        <a href="{!! route('dashboard.filters.create') !!}" class="btn btn-sm btn-primary" title="Добавить Параметр Товара">
            <i class="ace-icon fa fa fa-plus"></i> Добавиль фильтр
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
                    <th>Категории</th>
                    <th>Ссылка</th>
                    <th colspan="2" class="options">Опции</th>
                </tr>
            </thead>
            <tbody>
                @foreach($characteristics as $characteristic)
                    <tr>
                        <td><a href="{!! route('dashboard.filters.edit', $characteristic->id) !!}">{{ $characteristic->title }}</a></td>
                        <td>
                            {!!
                                $characteristic->categories->map(function($item){
                                    return "<a href=\"". route('dashboard.categories.edit',[$item->id])."\">{$item->title}</a>";
                                })->implode(', ')
                            !!}
                        </td>
                        <td>{{ $characteristic->slug }}</td>
                        <!-- Options -->
                        <td class="options">
                            <a class="green" href="{!! route('dashboard.filters.edit', $characteristic->id) !!}">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="hidden-sm hidden-xs action-buttons">
                                {!! Form::open(['route'=>['dashboard.filters.destroy', $characteristic->id],'method'=>'delete' ]) !!}
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
