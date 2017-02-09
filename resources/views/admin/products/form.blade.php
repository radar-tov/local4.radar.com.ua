@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
@inject('cenaProvider', 'App\ViewDataProviders\CenaDataProvider')


@section('top-scripts')
@endsection

@section('tiny')
    @parent
@endsection

@section('page-nav')
    @parent
@endsection

{{--Основной контент--}}

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.bootstrap3.min.css"/>

@if(isset($product))
    <span style="color: darkred">ID: {{ $product->id }}</span>
    <span style="color: darkred">Дата обновления: {{ $product->updated_at }}</span>
    <input type="hidden" name="id" value="{{ $product->id }}">
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
            {!! Form::text('title', $value = '', ['class' => 'form-control', 'v-model' => 'product.title']) !!}
        </div>

        <div class="col-sm-3">
            <a href="#" class="pull-right" v-on:click.prevent="makeSlug()" v-show="product.title">
                <small>Сгенерировать ссылку</small>
                <i class="fa fa-sort-alpha-asc"></i>
            </a>
            {!! Form::label('slug', "Ссылка") !!}
            {!! Form::text('slug', $value = '', ['class' => 'form-control','v-model' => 'product.slug']) !!}
        </div>

        <div class="col-sm-3">
            <label for="article">Артикул</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa  bigger-110">#</i></span>
                {!! Form::text('article', $value = null, ['class' => 'form-control', 'placeholder' => 'Артикул',]) !!}
            </div>
        </div>

        <div class="col-sm-3 no-padding">
            <label for="category_id">Категория</label>
            <select class="form-control" form="form-data" name="category_id" v-model="product.category_id" v-on:change="getFields()">
                <option value="0">Все категории</option>
                @foreach($categoriesProvider->getListForNav()->all() as $item)
                    <optgroup label="{{ $item->title }}">
                        @if(count($item->children))
                            @foreach($item->children as $child)
                                <option value="{{ $child->id }}">{{ $child->title }}</option>
                            @endforeach
                        @endif
                    </optgroup>
                @endforeach
            </select>
            <br/>
        </div>
    </div>

    <div class="tabbable tabs-left">

        <ul class="nav nav-tabs" id="myTab3">
            <li class="active">
                <a data-toggle="tab" href="#main">
                    <i class="ace-icon fa fa-desktop"></i>
                    Основные
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#cena">
                    <i class="ace-icon fa fa-dollar"></i>
                    Цены
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#filters" v-on:click="getFields();">
                    <i class="ace-icon fa fa-filter"></i>
                    Фильтры
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#characters" v-on:click="getXapacts();">
                    <i class="ace-icon fa fa-cogs"></i>
                    Характеристики
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#params">
                    <i class="ace-icon fa fa-list"></i>
                    Параметры
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#images">
                    <i class="ace-icon fa fa-image"></i>
                    Медиа
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#files">
                    <i class="ace-icon fa fa-file"></i>
                    Файлы
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#additionalProducts" v-on:click="getProducts()">
                    <i class="ace-icon fa fa-cart-plus"></i>
                    Сопутств. товары
                </a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#seo">
                    <i class="ace-icon fa fa-bullhorn"></i>
                    SEO
                </a>
            </li>
        </ul>

        {{-- tabs --}}
        <div class="tab-content">

            <!-- Main options -->
            <div id="main" class="tab-pane active">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('available', 'Товар в наличии?') !!}
                                    {!! Form::select('available', ['1'=> 'Да', '0'=>'Нет','2'=>'Под заказ'], $selected = null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="category_id">Бренд</label>
                                {!! Form::select('brand_id', $value = $brandsProvider->getList(), $selected = '', ['class'=>'form-control', 'v-model' => 'product.brand_id']) !!}
                            </div>

                            <div class="col-sm-6">
                                {!! Form::label('name','Название тоывара в админке') !!}
                                {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('url_1', 'Ссылка на производителя №1') !!}
                                @if(isset($product->url_1)&& $product->url_1 != '')
                                    <a href="{{ $product->url_1 }}" target="_blank"><i class="fa fa-link"></i></a>
                                @endif
                                {!! Form::text('url_1', $value = null, ['class'=>'form-control','form'=>'form-data']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('url_2', 'Ссылка на производителя №2') !!}
                                @if(isset($product->url_2)&& $product->url_2 != '')
                                    <a href="{{ $product->url_2 }}" target="_blank"><i class="fa fa-link"></i></a>
                                @endif
                                {!! Form::text('url_2', $value = null, ['class'=>'form-control','form'=>'form-data']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('url_3', 'Ссылка на производителя №3') !!}
                                @if(isset($product->url_3)&& $product->url_3 != '')
                                    <a href="{{ $product->url_3 }}" target="_blank"><i class="fa fa-link"></i></a>
                                @endif
                                {!! Form::text('url_4', $value = null, ['class'=>'form-control','form'=>'form-data']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('excerpt', 'Краткое Описание') !!}
                                {!! Form::textarea('excerpt', $value = null, ['rows'=>'3','class'=>'form-control','form'=>'form-data']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('body', 'Полное Описание') !!}
                                {!! Form::textarea('body', $value = null, ['rows'=>'40','class'=>'form-control tiny','form'=>'form-data']) !!}
                            </div>

                            <div class="col-sm-12">
                                {{--<br/>--}}
                                <label for="discount">Упаковка</label>
                                {!! Form::text('pack', $value = null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::checkbox('active', $selected = null, ['class' => 'form-control']) !!}
                                    {!! Form::label('active', 'Показывать на сайте?') !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::checkbox('sitemap', $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                                    {!! Form::label('sitemap', 'Показывать в Sitemap.xml?') !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::checkbox('yandex', $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                                    {!! Form::label('yandex', 'Показывать в Yandex.xml?') !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::checkbox('is_bestseller', $selected = null, ['class' => 'form-control']) !!}
                                    {!! Form::label('is_bestseller', 'Отметить как хит продаж?') !!}
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::checkbox('is_new', $selected = null, ['class' => 'form-control']) !!}
                                    {!! Form::label('is_new', 'Отметить как новинку?') !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('rating', 'Оценка продукта') !!}
                                    {!! Form::select('rating', [0,1,2,3,4,5], $selected = isset($product) ? $product->rates()->avg('rate') : 0, ['class' => 'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('priority', 'Приоритет индексирования?') !!}
                                    {!! Form::select('priority', [
                                        '0.1'=> '0.1',
                                        '0.2'=> '0.2',
                                        '0.3'=> '0.3',
                                        '0.4'=> '0.4',
                                        '0.5'=> '0.5',
                                        '0.6'=> '0.6',
                                        '0.7'=> '0.7',
                                        '0.8'=> '0.8',
                                        '0.9'=> '0.9',
                                        '1.0'=> '1.0'
                                     ], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('changefreq', 'Частота индексирования?') !!}
                                    {!! Form::select('changefreq', [
                                        'always'=> 'всегда',
                                        'hourly'=> 'почасово',
                                        'daily'=> 'ежедневно',
                                        'weekly'=> 'еженедельно',
                                        'monthly'=> 'ежемесячно',
                                        'yearly'=> 'раз в год',
                                        'never'=> 'никогда'
                                     ], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="clone_of">Клон</label>
                                {!! Form::text('clone_of', $value = null, ['class' => 'form-control']) !!}
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- / End Main options -->

            <!-- Cena -->
            <div id="cena" class="tab-pane">
                <h3>Базовая цена</h3>
                <div class="col-xs-12">
                    <div class="col-sm-3">
                        @if(isset($product->getCena->valuta))
                            @if($product->getCena->valuta == 1) {!! Form::label('base_price','Базовая цена в гривне') !!}
                            <i class="fa fa-ruble"></i>
                            @elseif($product->getCena->valuta == 2) {!! Form::label('base_price','Базовая цена в долларах') !!}
                            <i class="fa fa-dollar"></i>
                            @elseif($product->getCena->valuta == 3) {!! Form::label('base_price','Базовая цена в евро') !!}
                            <i class="fa fa-euro"></i>
                            @endif
                        @else
                            {!! Form::label('base_price','Базовая цена') !!}
                        @endif
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">&#8372;</i>
                                    </span>
                            {!! Form::text('base_price', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-1"><h3> * {{ isset($product->getCena->curs) ? $product->getCena->curs : '1'}}</h3></div>
                    <div class="col-sm-3">
                        {!! Form::label('price','Цена без скидки или наценки') !!}
                        <label for="price"></label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">&#8372;</i>
                                    </span>
                            {!! Form::text('price', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div style="padding-bottom: 50px"></div>
                    </div>
                </div>
                <h3>Цена для покупателей</h3>
                <div class="col-xs-12">
                    <div class="col-sm-3">
                        <label for="discount">Скидка на товар</label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">%</i>
                                    </span>
                            {!! Form::text('discount', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <label for="nacenka">Наценка на товар</label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">%</i>
                                    </span>
                            {!! Form::text('nacenka', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('out_price','Цена со скидкой или наценкой') !!}
                        <label for="out_price"></label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">&#8372;</i>
                                    </span>
                            {!! Form::text('out_price', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div style="padding-bottom: 50px"></div>
                    </div>
                </div>
                <h3>Цена для монтажников</h3>
                <div class="col-xs-12">
                    <div class="col-sm-3">
                        {!! Form::label('discount_montaj','Скидка для монтажников') !!}
                        <label for="discount_montaj"></label>
                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa  bigger-110">%</i>
                                        </span>
                            {!! Form::text('discount_montaj', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('cena_montaj','Цена для монтажников') !!}
                        <label for="cena_montaj"></label>
                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa  bigger-110">&#8372;</i>
                                        </span>
                            {!! Form::text('cena_montaj', $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div style="padding-bottom: 50px"></div>
                    </div>
                </div>
                <h3>Группа цен</h3>
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::select('cenagrup_id',
                                $value = $cenaProvider->getList(), $selected = null, ['class'=>'form-control', 'style' => 'min-width: 300px']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div style="padding-bottom: 50px"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5>Дата последнего персчёта цен : {{ isset($product->getCena->updated_at) ? $product->getCena->updated_at : ''}}</h5>
                </div>
                <br>
                <div class="col-md-12">
                    <h5>Скидка в группе : {{ isset($product->getCena->skidka) ? $product->getCena->skidka : ''}}</h5>
                </div>
                <br>
                <div class="col-md-12">
                    <h5>Наценка в группе : {{ isset($product->getCena->nacenka) ? $product->getCena->nacenka : ''}}</h5>
                </div>
                <br>
                <div class="col-md-12">
                    {{ isset($product->getCena->coment) ? $product->getCena->coment : ''}}
                </div>
                <br>
                <div class="col-md-12">
                    {{ isset($product->getCena->file) ? $product->getCena->file : ''}}
                </div>

            </div>
            <!-- / End Cena -->

            <!-- Filters -->
            <div id="filters" class="tab-pane">
                <label class="action-buttons pull-right" v-on:click="getFieldsClik()">
                    <a href="#" id="_spin"><i class="fa fa-refresh fa-2x"></i></a>
                </label>
                <div class="inner clearfix">
                    {{--This section will be ajax loaded--}}
                </div>

                <div class="row">
                    <div style="padding-bottom: 200px"></div>
                </div>
            </div>
            <!-- /End Filters -->

            <!-- characters -->
            <div id="characters" class="tab-pane">
                <label class="action-buttons pull-right" v-on:click="getXapactsClik()">
                    <a href="#" id="_spin"><i class="fa fa-refresh fa-2x"></i></a>
                </label>
                <div class="inner clearfix">
                    {{--This section will be ajax loaded--}}
                </div>

                <div class="row">
                    <div style="padding-bottom: 200px"></div>
                </div>
            </div>
            <!-- /End characters -->

            <!-- Params -->
            <div id="params" class="tab-pane">

            </div>
            <!-- /End Params -->

            <!-- Files -->
            <div id="files" class="tab-pane">

            </div>
            <!-- /End Files -->

            <!-- additionalProducts -->
            <div id="additionalProducts" class="tab-pane">

            </div>
            <!-- /End additionalProducts -->

            <!-- seo -->
            <div id="seo" class="tab-pane">

            </div>
            <!-- /End seo -->

        </div>
        {{--tabs end--}}

    </div>

</div>

{{-- / Основной контент--}}

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="/admin/assets/js/selectize.js"></script>
    <script src="/admin/assets/js/product/edit.js"></script>
@endsection