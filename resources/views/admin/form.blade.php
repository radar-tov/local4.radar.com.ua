@extends('admin.app')

@section('top-scripts')
        <!-- Page specific plugin styles -->
{{--
    <link rel="stylesheet" href="{!! url('admin/assets/css/jquery-ui.custom.min.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/chosen.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/datepicker.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/bootstrap-timepicker.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/daterangepicker.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/bootstrap-datetimepicker.css') !!}" />
    <link rel="stylesheet" href="{!! url('admin/assets/css/colorpicker.css') !!}" />
--}}
<!-- End Page specific plugin styles -->
@stop

@section('tiny')
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
@stop

@section('page-title')

@endsection

@section('page-nav')
    <div class="row">
    <div class="col-lg-12 page-nav">
        <div class="row">
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="0" title="Сохранить">
                <i class="ace-icon fa fa-floppy-o"></i> Сохранить
            </button>
            <button form="form-data" class="btn btn-sm btn-primary" name="button" value="1" title="Сохранить и выйти">
                <i class="ace-icon fa fa-chevron-circle-up "></i> Сохранить и выйти
            </button>
        </div>
    </div>
    {{--<div class="clearfix"></div>--}}
    </div>
@endsection

    @section('bottom-scripts')
            <!-- Page specific plugin scripts -->
    {{--<script src="{!! url('admin/assets/js/jquery-ui.custom.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/jquery.ui.touch-punch.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/chosen.jquery.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/fuelux/fuelux.spinner.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/date-time/bootstrap-datepicker.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/date-time/bootstrap-timepicker.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/date-time/moment.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/date-time/daterangepicker.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/date-time/bootstrap-datetimepicker.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/bootstrap-colorpicker.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/jquery.knob.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/jquery.autosize.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/jquery.inputlimiter.1.3.1.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/jquery.maskedinput.min.js')!!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/bootstrap-tag.min.js')!!}"></script>--}}
    <!--/ End page specific plugin scripts -->

@endsection