@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Статьи
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div>
                <a href="{{ route("dashboard.stock.create") }}" class="btn btn-sm btn-primary">
                    <i class="ace-icon fa fa-plus"></i>Добавить комплект
                </a>
                <br/>
                <br/>
            </div>
             <table id="sample-table-2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Актив.</th>
                        <th>Дата создания</th>
                        <th colspan="2" class="options">Опции</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($stockProducts as $stock)
                        <tr>
                            <td>{{ $stock->title }}</td>
                            <td>{{ $stock->active ? 'Да' : 'Нет' }}</td>
                            <td>{{ date('Y-m-d', strtotime($stock->created_at)) }}</td>
                            {{--<td><a href="{{ route('dashboard.pages.edit',[ isset($stock->page->id) ?$stock->page->id : null ]) }}">{{ $stock->page->title or '' }}</a></td>--}}
                            <!-- Options -->
                            <td class="options">
                                <a class="green" href="{!! route('dashboard.stock.edit', $stock->id) !!}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            <td class="options">
                                <div class="action-buttons">
                                    {!! Form::open(['route'=>['dashboard.stock.destroy', $stock->id],'method'=>'delete' ]) !!}
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
                <div class="col-xs-12 no-pad">{!! $stockProducts->render() !!}</div>
        </div>
    </div>
@stop

@section('bottom-scripts')@stop
