@extends('admin.app')

@section('top-scripts')
    <!-- Jquery Ui custom styles -->
    <link rel="stylesheet" href="{!! url('admin/assets/css/jquery-ui.min.css') !!}"/>
    <!-- Add TinyMce support -->
    <script src="{!! url('packages/tinymce/tinymce.min.js') !!}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:"textarea.tiny",
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            plugins : 'image,table,colorpicker,textcolor,code,fullscreen,link',
            toolbar: [
                "undo redo | bold italic | fontselect |  fontsizeselect | alignleft aligncenter alignright | outdent indent | bullist numlist | indent | link | image | forecolor backcolor"
            ],
            tools: "inserttable",

            file_browser_callback : elFinderBrowser,
            setup : function(ed)
            {
                ed.on('init', function()
                {
                    //this.execCommand("fontName", false, "tahoma");
                    this.execCommand("fontSize", false, "14px");
                });
            }
        });
        function elFinderBrowser (field_name, url, type, win) {
            tinymce.activeEditor.windowManager.open({
                file: '{!! url("dashboard/elfinder/tinymce4") !!}',
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                title: 'elFinder 2.0',
                width: 900,
                height: 450,
                resizable: 'yes'
            }, {
                setUrl: function (url) {
                    win.document.getElementById(field_name).value = url;
                }
            });
            return false;
        }
    </script>
    <!-- /Add TinyMce support -->
@stop

@section('page-title')
    Редактировать пользователя
@stop




@section('page-nav')
    <div class="row h50">
        <div class="col-xs-12">
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="0" title="Сохранить">
                <i class="ace-icon fa fa-floppy-o"></i> Сохранить
            </button>
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="1" title="Сохранить и выйти">
                <i class="ace-icon fa fa-chevron-circle-up "></i> Сохранить и выйти
            </button>
        </div>
    </div>
@stop

@section('content')
        
        @include('admin/partials/errors')
        {!! Form::model($page,['route'=>['dashboard.static_pages.update',$page->id],'method'=>'put', 'id'=>'form-data']) !!}

        <div class="col-lg-8">
            <div class="form-group">
                {!! Form::label('title','Заголовок') !!}
                {!! Form::text('title',$value = null,['placeholder'=>'Название статьи','class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug','Ссылка') !!}
                {!! Form::text('slug',$value = null,['placeholder'=>'Ссылка на статью','class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('content','Полное описание') !!}
                {!! Form::textarea('content',$value = null,['rows'=>'10','class'=>'form-control tiny']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('meta_title','Meta Title') !!}
                {!! Form::text('meta_title',$value = null,['placeholder'=>'Meta Title 50-80 знаков','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords','Meta Keywords') !!}
                {!! Form::textarea('meta_keywords',$value = null,['placeholder'=>'Meta Keywords до 250 знаков','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description','Meta Description') !!}
                {!! Form::textarea('meta_description',$value = null,['placeholder'=>'Meta Description 150 -200 знаков','class'=>'form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
