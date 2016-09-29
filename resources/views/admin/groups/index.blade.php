@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Группы покупателей
@stop

@section('content')
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <a href="{{ route("dashboard.groups.create") }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        Добавить группу
                    </a>
                    <br/>
                    <br/>
                </div>
                <div>
                    <table id="sample-table-2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th style="width:265px" class="center">Дата создания</th>
                            <th style="width:185px" class="center">Пользователей в группе</th>
                            <th colspan="2" class="options">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->title }}</td>
                                <td class="center">{{ $group->created_at->formatLocalized('%A %d, %B %Y') }}</td>
                                <td class="center">{{ $group->customers->count() }}</td>
                                <!-- Options -->
                                <td class="options">
                                    <a class="green" href="{!! route('dashboard.groups.edit', $group->id) !!}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </td>
                                <td class="options">
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        {!! Form::open(['route'=>['dashboard.groups.destroy', $group->id],'method'=>'delete' ]) !!}
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
