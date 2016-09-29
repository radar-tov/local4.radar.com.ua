@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Акции
@stop

@section('content')
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <a href="{{ route("dashboard.sales.create") }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        Добавить акцию
                    </a>
                    <br/>
                    <br/>
                </div>
                <div>
                    <table id="sample-table-2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th class="center">Акция действительна</th>
                            <th>Начало</th>
                            <th>Конец</th>
                            <th style="width: 80px" class="center">Продуктов</th>
                            <th colspan="2" class="options">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->title }}</td>
                                <td class="center">
                                    @if($sale->is_active && $sale->stop_at >= Carbon\Carbon::now() && $sale->start_at <= Carbon\Carbon::now())
                                        <i class="fa fa-check green"></i>
                                    @else
                                        <i class="fa fa-minus"></i>
                                    @endif
                                </td>

                                <td>{{ $sale->start_at->formatLocalized('%A %d, %B %Y') }}</td>
                                <td>{{ $sale->stop_at->formatLocalized('%A %d, %B %Y')  }}</td>
                                <td class="center">{{ $sale->products->count() }}</td>
                                <!-- Options -->
                                <td class="options">
                                    <a class="green" href="{!! route('dashboard.sales.edit', $sale->id) !!}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </td>
                                <td class="options">
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        {!! Form::open(['route'=>['dashboard.sales.destroy', $sale->id],'method'=>'delete' ]) !!}
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
        </div>
    </div><!-- /.col -->
@stop

@section('bottom-scripts')@stop
