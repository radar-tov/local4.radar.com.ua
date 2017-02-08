@section('top-scripts')

@endsection

@section('tiny')
    @parent
@endsection

@section('page-nav')
    @parent
@endsection

{{--Основной контент--}}

@if(isset($product))
    <span style="color: darkred">Дата обновления: {{ $product->updated_at }}</span>
    @if(isset($product->category->parent->slug))
        <span style="float: right">
            <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug }}" target="_blank">Страница товара</a>
        </span><br>
        <span style="float: right">
            <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}" target="_blank">Страница категории</a>
        </span>
    @endif
@endif

<div class="col-lg-12" id="productVue">

    @include('admin.products.clone_info')

    <div class="row">

        <div class="col-sm-3 no-padding">
            {!! Form::label('title', "Название товара") !!}
            {!! Form::text('title', $value = null, ['class' => 'form-control', 'v-model' => 'title']) !!}
        </div>

        <div class="col-sm-3">
            <a href="#" class="pull-right" v-on:click.prevent="makeSlug()" v-show="title">
                <small>Сгенерировать ссылку</small>
                <i class="fa fa-sort-alpha-asc"></i>
            </a>
            {!! Form::label('slug', "Ссылка") !!}
            {!! Form::text('slug', $value = null, ['class' => 'form-control','v-model' => 'slug']) !!}
        </div>



    </div>

</div>

{{-- / Основной контент--}}

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="/admin/assets/js/product/edit.js"></script>
@endsection