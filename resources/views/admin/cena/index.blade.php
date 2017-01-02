@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Группы цен
@stop

@section('page-nav')
    <div class="col-xs-12">
        <a href="{!! route('dashboard.cena.create') !!}" class="btn btn-sm btn-primary cena_create fancybox.ajax" title="Добавить группу цен">
            <i class="ace-icon fa fa fa-plus"></i> Добавить группу цен
        </a>
    </div>
    <div class="col-xs-12">&nbsp;</div>
@stop

@section('content')
    <div id="cenagrupslist"></div>
@stop

@section('bottom-scripts')
    <script>
        $(document).ready(function() {
            var token = $("input[name='_token']").val();
            $.ajax({
                type: "GET",
                url: "/dashboard/cena/list",
                data: {_token: token}
            }).done(function (response) {
                $("#cenagrupslist").html(response);
            });
        });
    </script>
@stop