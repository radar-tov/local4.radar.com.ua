@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Слайдер
@stop

@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <a href="{{ route("dashboard.banners.create") }}" class="btn btn-sm btn-primary">
                        <i class="ace-icon fa fa-plus"></i>Добавить баннер</a>
                    <br/>
                    <br/>
                </div>
            <div>
                    <table id="sample-table-2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Вес</th>
                            <th>Название</th>
                            <th>Ссылка</th>
                            <th>Статус</th>
                            <th colspan="2">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{ $banner->order }}</td>
                                <td>{{ $banner->title }}</td>
                                <td>
                                    @if($banner->link)
                                        <a href="{{ $banner->link }}" target="blank">
                                            {{ $banner->link }}
                                        </a>
                                        <i class="ace-icon fa fa-external-link"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($banner->show)
                                        <span class="label label-sm label-success">Открыт для просмотра</span>
                                    @else
                                        <span class="label label-sm label-danger">Скрыт для просмотра</span>
                                    @endif
                                </td>
                                <!-- Options -->
                                <td>
                                    <a class="green" href="{!! route('dashboard.banners.edit', $banner->id) !!}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        {!! Form::open(['route'=>['dashboard.banners.destroy', $banner->id],'method'=>'delete' ]) !!}
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
