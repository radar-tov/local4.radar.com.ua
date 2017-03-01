@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
@inject('cenaProvider', 'App\ViewDataProviders\CenaDataProvider')
@inject('countryProvider', 'App\ViewDataProviders\CountryDataProvider')

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
    <div class="col-lg-12" style="padding-bottom: 20px">
        <div class="col-lg-3" style="float: left">ID: {{ $product->id }}</div>
        <div class="col-lg-3" style="float: left">Дата обновления: {{ $product->updated_at }}</div>
        <input type="hidden" name="id" value="{{ $product->id }}">
        @if(isset($product->category->parent->slug))
            <div class="col-lg-3" style="float: right">
                <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug }}" target="_blank">Страница товара</a>
            </div>
            <div class="col-lg-3" style="float: right">
                <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}" target="_blank">Страница категории</a>
            </div>
        @endif
    </div>
@endif

<div class="col-lg-12" id="productVue">

    @include('admin.products.clone_info')

    <div class="row">

        <div class="col-sm-3 no-padding">
            {!! Form::label('title', "Название товара") !!}
            {!! Form::text('title', $value = '', ['class' => 'form-control', 'v-model' => 'product.title']) !!}
        </div>

        <div class="col-sm-3">
            <a href="#" class="pull-right" v-on:click.prevent="makeSlug()">
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
                {!! Form::text('article', $value = '', ['class' => 'form-control', 'placeholder' => 'Артикул', 'v-model' => 'product.article']) !!}
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
                <a data-toggle="tab" href="#params" v-on:click="getParam()">
                    <i class="ace-icon fa fa-list"></i>
                    Параметры
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#images">
                    <i class="ace-icon fa fa-image"></i>
                    Фото
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#video">
                    <i class="ace-icon fa  fa-video-camera"></i>
                    Видео
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#files" v-on:click="getPdfList()">
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

            <li class="">
                <a data-toggle="tab" href="#np">
                    <i class="ace-icon fa fa-truck"></i>
                    Новая почта
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
                                    {!! Form::select('available', ['1'=> 'Да', '0'=>'Нет','2'=>'Под заказ'], $selected = '', ['class' => 'form-control', 'v-model' => 'product.available']) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                {!! Form::label('brand_id','Бренд') !!}
                                {!! Form::select('brand_id', $value = $brandsProvider->getList(), $selected = '', ['class'=>'form-control', 'v-model' => 'product.brand_id']) !!}
                            </div>

                            <div class="col-sm-3">
                                {!! Form::label('country_id','Страна производитель') !!}
                                <a href="/dashboard/country/add" class="order_files fancybox.ajax">  <i class="fa fa-plus"></i></a>
                                <a href="#" v-on:click="updateCountry()">  <i class="fa fa-refresh"></i></a>

                                {!! Form::select('country_id', $value = $countryProvider->getList(), $selected = '',
                                ['class'=>'form-control', 'v-model' => 'product.country_id', 'v-if' => 'countryList == null']) !!}

                                <select name="country_id" class="form-control" v-model="product.country_id" v-else>
                                    <option v-bind:value="country_id" v-for="(country_name,country_id) in countryList">@{{ country_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                {!! Form::label('name','Название тоывара в админке') !!}
                                {!! Form::text('name', $value = '', ['class' => 'form-control', 'v-model' => 'product.name']) !!}
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" style="padding-top: 15px">
                                <div class="col-sm-3">
                                        @if(isset($product->url_1)&& $product->url_1 != '')
                                        <a href="{{ $product->url_1 }}" target="_blank"><i class="fa fa-link"></i> Ссылка №1</a>
                                        @endif
                                </div>

                                <div class="col-sm-3">
                                        @if(isset($product->url_2)&& $product->url_2 != '')
                                            <a href="{{ $product->url_2 }}" target="_blank"><i class="fa fa-link"></i> Ссылка №2</a>
                                        @endif
                                </div>

                                <div class="col-sm-3">
                                        @if(isset($product->url_3)&& $product->url_3 != '')
                                            <a href="{{ $product->url_3 }}" target="_blank"><i class="fa fa-link"></i> Ссылка №3</a>
                                        @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('excerpt', 'Краткое Описание') !!}
                                {!! Form::textarea('excerpt', $value = '', ['rows'=>'3','class'=>'form-control','form'=>'form-data', 'v-model' => 'product.excerpt']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('body', 'Полное Описание') !!}
                                {!! Form::textarea('body', $value = null, ['rows'=>'40','class'=>'form-control tiny','form'=>'form-data']) !!}
                            </div>

                            <div class="col-sm-12">
                                {{--<br/>--}}
                                <label for="discount">Упаковка</label>
                                {!! Form::text('pack', $value = '', ['class' => 'form-control', 'v-model' => 'product.pack']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('url_1', 'Ссылка на производителя №1') !!}
                                @if(isset($product->url_1)&& $product->url_1 != '')
                                    <a href="{{ $product->url_1 }}" target="_blank"><i class="fa fa-link"></i></a>
                                @endif
                                {!! Form::text('url_1', $value = '', ['class'=>'form-control','form'=>'form-data', 'v-model' => 'product.url_1']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('url_2', 'Ссылка на производителя №2') !!}
                                @if(isset($product->url_2)&& $product->url_2 != '')
                                    <a href="{{ $product->url_2 }}" target="_blank"><i class="fa fa-link"></i></a>
                                @endif
                                {!! Form::text('url_2', $value = '', ['class'=>'form-control','form'=>'form-data', 'v-model' => 'product.url_2']) !!}
                            </div>

                            <div class="col-sm-12">
                                <br/>
                                {!! Form::label('url_3', 'Ссылка на производителя №3') !!}
                                @if(isset($product->url_3)&& $product->url_3 != '')
                                    <a href="{{ $product->url_3 }}" target="_blank"><i class="fa fa-link"></i></a>
                                @endif
                                {!! Form::text('url_3', $value = '', ['class'=>'form-control','form'=>'form-data', 'v-model' => 'product.url_3']) !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('active', $selected = null, '',
                                        ['class' => 'ace ace-switch ace-switch-5 form-control','form'=>'form-data']) !!}
                                        <span class="lbl">&nbsp;&nbsp;&nbsp;Показывать на сайте?</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('sitemap', $selected = null, '',
                                        ['class' => 'ace ace-switch ace-switch-5 form-control','form'=>'form-data']) !!}
                                        <span class="lbl">&nbsp;&nbsp;&nbsp;Показывать в Sitemap.xml?</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('yandex', $selected = null, '',
                                        ['class' => 'ace ace-switch ace-switch-5 form-control','form'=>'form-data']) !!}
                                        <span class="lbl">&nbsp;&nbsp;&nbsp;Показывать в Yandex.xml?</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('is_bestseller', $selected = null, '',
                                        ['class' => 'ace ace-switch ace-switch-5 form-control','form'=>'form-data']) !!}
                                        <span class="lbl">&nbsp;&nbsp;&nbsp;Отметить как хит продаж?</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('is_new', $selected = null, '',
                                        ['class' => 'ace ace-switch ace-switch-5 form-control','form'=>'form-data']) !!}
                                        <span class="lbl">&nbsp;&nbsp;&nbsp;Отметить как новинку?</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('rating', 'Оценка продукта') !!}
                                    {!! Form::select('rating', [0,1,2,3,4,5], $selected = '', ['class' => 'form-control', 'v-model' => 'product.rating']) !!}

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
                                     ], $selected = '', ['class' => 'form-control','form'=>'form-data', 'v-model' => 'product.priority']) !!}
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
                                     ], $selected = '', ['class' => 'form-control','form'=>'form-data', 'v-model' => 'product.changefreq']) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="clone_of">Клон</label>
                                {!! Form::text('clone_of', $value = '', ['class' => 'form-control', 'v-model' => 'product.clone_of']) !!}
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
                            {!! Form::text('base_price', $value = '', ['class' => 'form-control', 'v-model' => 'product.base_price']) !!}
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
                            {!! Form::text('price', $value = '', ['class' => 'form-control', 'v-model' => 'product.price']) !!}
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
                            {!! Form::text('discount', $value = '', ['class' => 'form-control', 'v-model' => 'product.discount']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <label for="nacenka">Наценка на товар</label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">%</i>
                                    </span>
                            {!! Form::text('nacenka', $value = '', ['class' => 'form-control', 'v-model' => 'product.nacenka']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('out_price','Цена со скидкой или наценкой') !!}
                        <label for="out_price"></label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">&#8372;</i>
                                    </span>
                            {!! Form::text('out_price', $value = '', ['class' => 'form-control', 'v-model' => 'product.out_price']) !!}
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
                            {!! Form::text('discount_montaj', $value = '', ['class' => 'form-control', 'v-model' => 'product.discount_montaj']) !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('cena_montaj','Цена для монтажников') !!}
                        <label for="cena_montaj"></label>
                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa  bigger-110">&#8372;</i>
                                        </span>
                            {!! Form::text('cena_montaj', $value = '', ['class' => 'form-control', 'v-model' => 'product.cena_montaj']) !!}
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
                        {!! Form::select('cenagrup_id', $value = $cenaProvider->getList(), $selected = '',
                        ['class'=>'form-control', 'style' => 'min-width: 300px', 'v-model' => 'product.cenagrup_id']) !!}
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
                <label class="action-buttons pull-right" v-on:click="getParamClik()">
                    <a href="#" id="_spin"><i class="fa fa-refresh fa-2x"></i></a>
                </label>
                <div class="inner clearfix">
                    {{--This section will be ajax loaded--}}
                </div>
                @if(isset($product))
                    <button class="parameters_add fancybox.ajax btn btn-success btn-sm"
                            href="{{ url('dashboard/parameters/add/'.$product->category_id.'/'.$product->brand_id, $product->id) }}">
                        Добавить параметр
                    </button>
                    <button class="parameters_selection fancybox.ajax btn btn-success btn-sm"
                            href="{{ url('dashboard/parameters/selection/'.$product->category_id.'/'.$product->brand_id, $product->id) }}">
                        Выбрать параметр
                    </button>
                @endif
                <div class="row">
                    <div style="padding-bottom: 200px"></div>
                </div>
            </div>
            <!-- /End Params -->

            <!-- images -->
            <div id="images" class="tab-pane">
                <input type="hidden" name="imagesIds" v-bind:value="stringImagesIds"/>
                <div class="form-group">
                    {!!Form::label('image', "Загрузить изображение",["class" => "btn btn-success btn-sm"]) !!}
                    <input type="file" name="image" id="image" v-on:change="loadImage($event)" multiple>
                </div>

                <div class="image-box clearfix" v-show="product.images">
                    <div class="thumb" v-for="image in product.images">

                        <span class="is-thumb" v-if="image.is_thumb == 1">
                            <i class="fa fa-check"></i>
                        </span>

                        <span class="is-thumb grey" v-if="image.is_thumb == 0" v-on:click="setAsThumbnail(image)">
                            <i class="fa fa-check"></i>
                        </span>

                        <span class="remove" v-on:click="removeImage(image)">
                            <i class="fa fa-remove"></i>
                        </span>
                        <img v-bind:src="image.path" alt="test"/>
                        <a class="fancybox" rel="gallery" v-bind:href="image.path"><i class="fa fa-photo"></i></a>
                    </div>

                </div>
            </div>
            <!-- /End images -->

            <!-- video -->
            <div id="video" class="tab-pane">
                <div class="row">
                    <a href="#" class="btn btn-success btn-sm" v-on:click.prevent="loadVideo($event)">Загрузить видео</a>
                    <div class="clearfix"></div>
                    <input type="hidden" name="video" v-model="product.video"/>
                    <div class="m-cont" v-if="product.video" style="margin-top: 20px">
                        @{{ product.video }}
                        <a href="#"><i class="fa fa-remove" title="удалить видео обзор" v-on:click.prevent="removeVideo($event)"></i></a>
                    </div>
                </div>
            </div>
            <!-- video -->

            <!-- Files -->
            <div id="files" class="tab-pane">
                <div id="filesup"></div>
                <hr>
                @if(isset($product))
                    <button id="otvet" class="various fancybox.ajax btn btn-success btn-sm"
                            href="{{ url('dashboard/pdf/add/'.$product->category_id.'/'.$product->brand_id, $product->id) }}">
                        Выбрать файл
                    </button>
                @endif
                {!!Form::label('pdf', "Загрузить",["class" => "btn btn-success btn-sm"]) !!}
                <input type="file" name="pdf" id="pdf" v-on:change="loadPDF($event)" multiple>
            </div>
            <!-- /End Files -->

            <!-- additionalProducts -->
            <div id="additionalProducts" class="tab-pane">
                <div class="col-xs-12">
                    {{--<div class="_cover" v-el="cover"></div>--}}
                    <h4 v-if="relOptions.selected.length > 0">Cопутствующие товары</h4>
                    <h4 v-if="relOptions.selected.length == 0">Для этого продукта не указано ни одного сопуствующего товара</h4>
                    <input type="hidden" v-model="selectedProductsIds" name="selectedProductsIds"/>
                    <table class="table table-hover pr-table" v-if="relOptions.selected.length > 0">
                        <tr>
                            <th class="mini-thumb center">Миниатюра</th>
                            <th>Название продукта</th>
                            <th>Артикул</th>
                            <th>Цена</th>
                            <th class="options">Удалить</th>
                        </tr>
                        <tr v-for="(relProduct, index) in relOptions.selected">
                            <td class="center">
                                <img v-bind:src="relProduct.thumbnail[0].path " v-if="!!relProduct.thumbnail[0]" class="mini-thumb"/>
                                <img src="/frontend/images/default.png" v-if="!relProduct.thumbnail[0]" class="mini-thumb"/>
                            </td>
                            <td>
                                @{{ relProduct.title }} <br/>
                                <small style="color: #808080">(@{{ relProduct.category.title }})</small>
                            </td>
                            <td> @{{ relProduct.article }}</td>
                            <td> @{{ relProduct.price }}</td>
                            <td class="options">
                                <a href="#" style="font-size: 18px; color:indianred" v-on:click.prevent="removeProduct(relProduct, index)"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <h4>Список всех товаров</h4>
                    <div class="well clearfix">
                        <div class="col-md-4">
                            {!! Form::select('_category', [0 => 'Все категории'] + $categoriesProvider->getCategoriesList()->all(), $selected = null,
                                ['class' => 'form-control', 'v-model' => 'relOptions.category', 'v-on:change' => 'getProducts()']) !!}
                        </div>
                        <div class="col-md-4">
                            {{--<span>Показывать по</span>--}}
                            {!! Form::select('_paginate', [
                                        20 => 'Показывать по 20 продуктов',
                                        50 => 'По 50 продуктов',
                                        100 => 'По 100 продуктов'
                                      ], $selected = '',
                             ['class' => 'form-control', 'v-model' => 'relOptions.paginate', 'v-on:change' => 'getProducts()']) !!}
                        </div>
                        <div class="col-md-4 pull-right">
                            {!! Form::text('search', $value = '',
                             ['class' => 'form-control','placeholder' => 'Поиск', 'v-model' => 'relOptions.search', 'v-on:input' => 'getProducts()']) !!}
                        </div>
                    </div>
                    <table class="table table-hover pr-table">
                        <tr>
                            <th class="mini-thumb center">Миниатюра</th>
                            <th>Название продукта</th>
                            <th>Артикул</th>
                            <th>Цена</th>
                            <th class="options">Добавить</th>
                        </tr>
                        <tr v-for="(relProduct, index) in productsList.products">
                            <td class="center">
                                <img v-bind:src="relProduct.thumbnail[0].path " v-if="!!relProduct.thumbnail[0]" class="mini-thumb"/>
                                <img src="/frontend/images/default.png" v-if="!relProduct.thumbnail[0]" class="mini-thumb"/>
                            </td>
                            <td>
                                @{{ relProduct.title }} <br/>
                                <small style="color: #808080">(@{{ relProduct.category.title }})</small>
                            </td>
                            <td> @{{ relProduct.article }}</td>
                            <td> @{{ relProduct.price }}</td>
                            <td class="options">
                                <a href="#" style="font-size: 18px" v-on:click.prevent="addProduct(relProduct, index)"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <p v-if="productsList.products.length == 0">
                        <b>Список продуктов по текущему запросу пуст</b>
                    </p>
                    <nav v-if="productsList.products.length > 0">
                        <ul class="pager">
                            <li class="previous" v-bind:class="productsList.pagination.currentPage == 1 ? 'disabled' : ''">
                                <a href="#" v-on:click.prevent="prevPage()"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                            </li>
                            <li>
                                @{{ productsList.pagination.currentPage }} / @{{ productsList.pagination.lastPage  }}
                            </li>
                            <li class="next" v-bind:class="productsList.pagination.currentPage ==  productsList.pagination.lastPage ? 'disabled' : ''" >
                                <a href="#" v-on:click.prevent="nextPage()">Следующая <span aria-hidden="true">&rarr;</span></a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
            <!-- /End additionalProducts -->

            <!-- seo -->
            <div id="seo" class="tab-pane">
                <div class="col-xs-12">
                    <div class="form-group">
                        {!! Form::label('meta_title', 'Meta Title') !!}
                        <span>@{{ coountTitle }} / от 10 до 70</span>
                        {!! Form::text('meta_title', $value = '', ['class' => 'form-control', "row"=>1,'form'=>'form-data', 'v-model' => 'product.meta_title']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_description', 'Meta Description') !!}
                        <span>@{{ coountDescription }} / от 70 до 160</span>
                        {!! Form::text('meta_description', $value = '', ['class' => 'form-control',"row"=>2,'form'=>'form-data', 'v-model' => 'product.meta_description']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                        {!! Form::text('meta_keywords', $value = '', ['class' => 'form-control',"row"=>2,'form'=>'form-data', 'v-model' => 'product.meta_keywords']) !!}
                    </div>
                </div>
            </div>
            <!-- /End seo -->

            <!-- np -->
            <div id="np" class="tab-pane">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                {!! Form::label('brutto', 'Вес с упаковкой (Брутто)') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
                                    {!! Form::text('brutto', $value = '', ['class' => 'form-control', "row"=>1,'form'=>'form-data', 'v-model' => 'product.brutto']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                {!! Form::label('height', 'Высота упаковки') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrows-v"></i></span>
                                    {!! Form::text('height', $value = '', ['class' => 'form-control', "row"=>1,'form'=>'form-data', 'v-model' => 'product.height']) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                {!! Form::label('width', 'Ширина упаковки') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrows-h"></i></span>
                                    {!! Form::text('width', $value = '', ['class' => 'form-control', "row"=>1,'form'=>'form-data', 'v-model' => 'product.width']) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                {!! Form::label('depth', 'Глубина упаковки') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-compress"></i></span>
                                    {!! Form::text('depth', $value = '', ['class' => 'form-control', "row"=>1,'form'=>'form-data', 'v-model' => 'product.depth']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding-bottom: 50px"></div>
                </div>

                <div class="col-md-12" style="padding-top: 30px">
                    <div class="form-group">
                        <div class="row">
                            <div id="np-map">
                                <button type="button" id="npw-map-open-button">НАЙБЛИЖЧЕ ВІДДІЛЕННЯ</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12" style="padding-top: 30px; min-height: 500px">
                    <div class="form-group">
                        <div class="row">
                            <div id="np-calc-body" class="np-w-br-0 np-widget-hz"
                                 style="width: 800px; min-height: 200px;">
                                <div class="np-calc-wrapper">
                                    <div class="np-calc-logotype"></div>
                                    <div class="np-hl"></div>
                                    <span id="np-calc-title">Розрахунок вартості<br>доставки</span>
                                    <div class="np-calc-list">
                                        <div class="np-calc-field" name="dispatch" role="CitySender">
                                            <input type="text" class="np-option-search-item" placeholder="Звідки">
                                            <div class="np-toggle-options-list"></div>
                                            <ul class="np-options-enter-point" role="CitySender"></ul>
                                        </div>
                                        <div id="np-arrows" name=""></div>
                                        <div class="np-calc-field" name="catch" role="CityRecipient">
                                            <input type="text" class="np-option-search-item" placeholder="Куди">
                                            <div class="np-toggle-options-list"></div>
                                            <ul class="np-options-enter-point" role="CityRecipient"></ul>
                                        </div>
                                        <div class="np-calc-field" name="weight" role="Weight">
                                            <input type="text" class="np-option-search-item-weight" placeholder="Вага посилки">
                                        </div>
                                    </div>
                                    <div class="np-line-background"></div>
                                    <button id="np-calc-submit" type="button">
                                        <span id="np-text-button">Розрахувати</span>
                                        <div id="np-load-image"></div>
                                    </button>
                                </div>
                                <div id="np-cost-field">
                                    <div class="np-cost-field-container"><p id="np-cost-number"></p> <span>грн</span>
                                    </div>
                                    <div class="np-cost-info-container"><span>Вартість доставки</span><br>
                                        <div id="np-current-city"></div>
                                        <span>вагою </span> <span id="np-current-weight"></span> <span>кг</span></div>
                                    <div class="np-mini-logo">
                                        <div class="np-line-left"></div>
                                        <div class="np-line-right"></div>
                                    </div>
                                    <a href="https://novaposhta.ua/delivery?utm_source=calc&amp;utm_medium=widget&amp;utm_term=calc&amp;utm_content=widget&amp;utm_campaign=NP" target="_blank"> Детальний розрахунок </a>
                                    <button type="button" id="np-cost-return-button">Інша посилка</button>
                                </div>
                                <div id="np-error-field">
                                    <div class="np-status-logo"><img src="https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/img/not-found.svg" alt="error icon"></div>
                                    <div class="np-error-info-container"><span>Вибачте! З технічних причин ми не змогли розрахувати Вартість посилки</span>
                                    </div>
                                    <div class="np-mini-logo">
                                        <div class="np-line-left"></div>
                                        <div class="np-line-right"></div>
                                    </div>
                                    <button type="button" id="np-error-return-button">Інша посилка</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End np -->

        </div>
        {{--tabs end--}}

    </div>

</div>

{{-- / Основной контент--}}

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="/admin/assets/js/selectize.js"></script>
    <script src="/admin/assets/js/bootbox.min.js"></script>
    <script src="/admin/assets/js/product/edit.js"></script>

    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPhm7Q29X5ldwjLtA7IMYHU_0xATiWK3A"></script>
    <link rel='stylesheet' href='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Map/styles/map.css' />
    <script type='text/javascript' src='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Map/dist/map.min.js'></script>

    <link rel='stylesheet' href='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Calc/styles/calc.css' />
    <script type='text/javascript' src='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Calc/dist/calc.min.js'></script>
@endsection