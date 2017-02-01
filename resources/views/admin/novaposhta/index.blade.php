@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Новая почта
@stop

@section('content')
    {{--{{dump($data)}}--}}
    <div id="novaposhtaVue">
        <div class="col-xs-12">
            <div class="row">
                <button v-on:click.prevent="areaUpdate()">
                    Обновить области
                </button>
            </div>
        </div>
        <pre>
            @{{ $data.response}}
        </pre>
    </div>

@stop

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="/admin/assets/js/novaposhta/index.js"></script>
@stop