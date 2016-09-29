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
                <a href="{{ route("dashboard.articles.create") }}" class="btn btn-sm btn-primary">
                    <i class="ace-icon fa fa-plus"></i>Добавить статью
                </a>
                <br/>
                <br/>
            </div>
             <table id="sample-table-2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Ссылка</th>
                        <th>Публикация</th>
                        <th>Статус статьи</th>
                        {{--<th>Страница</th>--}}
                        <th colspan="2">Опции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->slug }}</td>
                            <td>{{ date('Y-m-d', strtotime($article->published_at)) }}</td>
                            <td>
                                @if($article->show)
                                    <span class="label label-sm label-success">Открыта для просмотра</span>
                                @else
                                    <span class="label label-sm label-warning">Скрыта</span>
                                @endif
                            </td>
                            {{--<td><a href="{{ route('dashboard.pages.edit',[ isset($article->page->id) ?$article->page->id : null ]) }}">{{ $article->page->title or '' }}</a></td>--}}
                            <!-- Options -->
                            <td>
                                <a class="green" href="{!! route('dashboard.articles.edit', $article->id) !!}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    {!! Form::open(['route'=>['dashboard.articles.destroy', $article->id],'method'=>'delete' ]) !!}
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
                <div class="col-xs-12 no-pad">{!! $articles->render() !!}</div>
        </div>
    </div>
@stop

@section('bottom-scripts')@stop
