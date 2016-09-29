@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Слайдер
@stop

@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="row h50">
                    <div class="col-md-4 col-md-offset-8 col-xs-12 no-pad">
                        <form action="{!! route('dashboard.reviews.search') !!}" id="form-data" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control search-query" name = 'q' value="{{ $q or '' }}" placeholder="">
                                <span class="input-group-btn">
                                    <button type="submit" form="form-data" type="button" class="btn btn-primary btn-sm">
                                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                        Поиск
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 hidden-lg hidden-md">&nbsp;</div>
                </div>
            <div>
                    <table id="sample-table-2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Имя Пользователя</th>
                            <th>Статус</th>
                            <th style="width:420px">Отзыв</th>
                            <th>Оставлен</th>
                            <th colspan="2">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>
                                    @if(count($review->product))
                                        <a href="{!! route('dashboard.products.edit',[$review->product->id]) !!}">{{ $review->product->title }}</a>
                                    @else
                                        <span>Продукт удален</span>
                                    @endif
                                </td>
                                <td>
                                    @if(count($review->user))
                                        <a href="{!! route('dashboard.users.show',[$review->user->id]) !!}">{{ $review->user->name }}</a>
                                    @else
                                        <span>Пользователь удален</span>
                                    @endif
                                </td>
                                <td> @if($review->active)
                                        <span class="label label-sm label-success arrowed-in">Проверен</span>
                                    @else
                                        <span class="label label-sm label-warning  arrowed-in">Ожидает модерации</span>
                                    @endif
                                </td>
                                <td>
                                    <div id="accordion" class="accordion-style1 panel-group" style="margin-bottom: 0;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $review->id }}">
                                                        <i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                        {{ str_limit($review->body,50) }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapse-{{ $review->id }}" style="height: 0px;">
                                                <div class="panel-body">
                                                    {{ $review->body }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td style="min-width: 100px;">
                                    {{ $review->created_at->diffForHumans() }}
                                </td>
                                <!-- Options -->
                                <td class="options">
                                    <a class="green" href="{!! route('dashboard.reviews.edit', $review->id) !!}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </td>
                                <td class="options">
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        {!! Form::open(['route'=>['dashboard.reviews.destroy', $review->id],'method'=>'delete' ]) !!}
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
