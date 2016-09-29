@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Категории
@stop

@section('content')
    <div class="">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <a href="{!! route('dashboard.categories.create') !!}"
                       class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        Добавить категорию
                    </a>
                    <a href="#" id="saveOrder" class="btn btn-sm btn-primary">Сохрнить порядок категорий</a>
                    <br/>
                    <br/>
                </div>
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach($categories as $category)
                                <li class="dd-item" data-id="{!! $category->id !!}">
                                    <div class="dd-handle">
                                        <i class="ace-icon fa fa-{{ $category->show ? 'eye green' : 'eye-slash red' }} bigger-130"></i>
                                        &nbsp;&nbsp;
                                        {{ $category->title }}
                                        <div class="pull-right action-buttons">
                                            <a class="blue" href="{!! route('dashboard.categories.edit',$category->id) !!}">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                            <a class="red" href="#">
                                                <label for="{{ $category->id }}" class="label-delete">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    {!! Form::open(['route'=>['dashboard.categories.destroy', $category->id],'method'=>'delete' ]) !!}
                                                    {!! Form::submit('Удалить',["class" => "ace-icon fa fa-trash-o bigger-120", "id" => $category->id, "style" => "display:none"]) !!}
                                                    {!! Form::close() !!}
                                                </label>
                                            </a>
                                        </div>
                                    </div>
                                    @if(count($category->children))
                                        <ol class="dd-list">
                                            @foreach($category->children as $child)
                                                <li class="dd-item" data-id="{{ $child->id }}">
                                                    <div class="dd-handle">
                                                        <i class="ace-icon fa fa-{{ $child->show ? 'unlock-alt green' : 'lock red' }} bigger-130"></i>
                                                        &nbsp;&nbsp;
                                                        {{ $child->title }}
                                                        <div class="pull-right action-buttons">
                                                            <a class="blue" href="{!! route('dashboard.categories.edit',$child->id) !!}">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            <a class="red" href="#">
                                                                <label for="{{ $child->id }}" class="label-delete">
                                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                                    {!! Form::open(['route'=>['dashboard.categories.destroy', $child->id],'method'=>'delete' ]) !!}
                                                                        {!! Form::submit('Удалить',["class" => "ace-icon fa fa-trash-o bigger-120", "id" => $child->id, "style" => "display:none"]) !!}
                                                                    {!! Form::close() !!}
                                                                </label>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
@stop

@section('bottom-scripts')
    <!-- page specific plugin scripts -->
    <script src="{{ url('admin/assets/js/jquery.nestable.min.js') }}"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($){
            var nestable,
                serialized,
                settings = {maxDepth:3},
                saveOrder = $('#saveOrder'),
                edit = $('.edit');

            nestable = $('.dd').nestable(settings);

            saveOrder.on('click', function(e) {
                e.preventDefault();
                serialized = nestable.nestable('serialize');

                $.ajax({
                    method:'POST',
                    url : "{!! route('dashboard.categories.order') !!}",
                    data: { _token: "{!! csrf_token() !!}", serialized: serialized }

                }).done(function (data) {
                    alert("Сохранено!");
                })
            })

            $('.dd-handle a').on('mousedown', function(e){
                e.stopPropagation();
            });

            $('[data-rel="tooltip"]').tooltip();

        });
    </script>

@stop
