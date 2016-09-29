@extends('admin.app')

@section('top-scripts')
    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{!! asset('admin/assets/css/jquery-ui.custom.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/chosen.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/datepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap-timepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/daterangepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap-datetimepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/colorpicker.css') !!}" />


    <!-- Add TinyMce support -->
    <script src="{!! url('packages/tinymce/tinymce.min.js') !!}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:"textarea.tiny",
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            plugins : 'image,table,colorpicker,textcolor,code,fullscreen,link',
            toolbar: [
                "undo redo | bold italic | fontselect |  fontsizeselect | alignleft aligncenter alignright | outdent indent | bullist numlist | indent | link | image fullscreen | forecolor backcolor"
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
@endsection

@section('page-title')
    Редактировать категорию
@stop

@section('page-nav')
    <div class="row h60">
        <div class="col-lg-12">
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
    <div id="categories" class="row">
        @include('admin.partials.errors')
        {!! Form::model($category,['route'=>['dashboard.categories.update',$category->id],'method'=>'put', 'id'=>'form-data']) !!}
            @include("admin.categories.form")
        {!! Form::close() !!}
    </div>
@stop
