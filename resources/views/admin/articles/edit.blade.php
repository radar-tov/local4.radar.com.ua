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
    Редактировать статью
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
    <div class="row">
        @include('admin.partials.errors')
        {!! Form::model($article,['route'=>['dashboard.articles.update',$article->id],'method'=>'put', 'id'=>'form-data']) !!}
        @include('admin.articles.form')
        {!! Form::close() !!}
    </div>
@stop

@section('bottom-scripts')
    <!-- page specific plugin scripts -->
    <script src="{!! url('admin/assets/js/jquery-ui.min.js') !!}"></script>
    {{--{!! Html::script('admin/assets/js/jquery.ui.touch-punch.min.js') !!}--}}
    <!-- /page specific plugin scripts -->
    <script>
        $(function() {
            $( "#published_at" ).datepicker({
                showOtherMonths: true,
                selectOtherMonths: false,
                dateFormat: 'yy-mm-dd'

                //isRTL:true,

                /*
                 changeMonth: true,
                 changeYear: true,

                 showButtonPanel: true,
                 beforeShow: function() {
                 //change button colors
                 var datepicker = $(this).datepicker( "widget" );
                 setTimeout(function(){
                 var buttons = datepicker.find('.ui-datepicker-buttonpane')
                 .find('button');
                 buttons.eq(0).addClass('btn btn-xs');
                 buttons.eq(1).addClass('btn btn-xs btn-success');
                 buttons.wrapInner('<span class="bigger-110" />');
                 }, 0);
                 }
                 */
            });

            var thumbnail;
            $(document).mousemove(function(){
                thumbnail = $("#thumbnail").val()
                if(thumbnail.length > 0) {
                    var img = $('<img />', {
                        id: '',
                        src: '/'+thumbnail,
                        alt: ''
                    });
                    $('div.thumb-box').html(img);
                }
            });
        });
    </script>
@stop