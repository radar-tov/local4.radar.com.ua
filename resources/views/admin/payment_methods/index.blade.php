@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Способы оплаты
@stop

@section('content')
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <a href="{{ route("dashboard.payments.create") }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        Добавить способ оплаты
                    </a>
                    <br/>
                    <br/>
                </div>
                <div>
                    <table id="sample-table-2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th colspan="2" class="options">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($methods as $method)
                            <tr>
                                <td>{{ $method->title }}</td>
                                <!-- Options -->
                                <td class="options">
                                    <a class="green" href="{!! route('dashboard.payments.edit', $method->id) !!}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </td>
                                <td class="options">
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        {!! Form::open(['route'=>['dashboard.payments.destroy', $method->id],'method'=>'delete' ]) !!}
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
