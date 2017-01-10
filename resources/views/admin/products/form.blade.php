@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
@inject('cenaProvider', 'App\ViewDataProviders\CenaDataProvider')

@section('top-scripts')
    @parent
    <link rel="stylesheet" href="{!! url('admin/assets/dropzone/dist/dropzone.css') !!}"
          xmlns:v-bind="http://symfony.com/schema/routing"/>
    <script src="{!! url('admin/assets/dropzone/dist/dropzone.js') !!}"></script>
    {!! Html::script("admin/assets/js/vue.js") !!}
    {{--<script src="{!! url('admin/assets/dropzone/dist/dropzone-amd-module.js') !!}"></script>--}}
@endsection


@section('tiny')
    <!--
        If you need tiny support
         add parent into section
          if not, leave empty
    -->
    @parent
@endsection

@section('page-nav')
    @parent
@endsection
<link rel="stylesheet" href="{!! asset('admin/assets/css/jquery-ui.custom.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('admin/assets/css/chosen.css') !!}" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.bootstrap3.min.css"/>
<script>
    var btns = document.querySelectorAll('button');
    for(var i = 0; i < btns.length; i++){
        btns[i].disabled = true;
    }
</script>
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
<div class="col-lg-12" id="product">
    {{--<pre>--}}
        {{--@{{ $data.selectedProductsIds | json }}--}}
    {{--</pre>--}}

   @include('admin.products.clone_info')

    <div class="row">

        <div class="col-sm-3 no-padding">
            {!! Form::label('title', "Название товара") !!}
            {!! Form::text('title', $value = null, ['class' => 'form-control', 'v-model' => 'title']) !!}
        </div>

        <div class="col-sm-3">
            <a href="#" class="pull-right" v-on="click:makeSlug($event)" v-show="title">
                <small>Сгенерировать ссылку</small>
                <i class="fa fa-sort-alpha-asc"></i>
            </a>
            {!! Form::label('slug', "Ссылка") !!}
            {!! Form::text('slug', $value = null, ['class' => 'form-control','v-model' => 'slug']) !!}
        </div>
        <div class="col-sm-3">
            <label for="article">Артикул</label>
            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">#</i>
                                    </span>

                {!! Form::text('article', $value = null, ['class' => 'form-control', 'placeholder' => 'Артикул',]) !!}
                {{--<input type="text" name="article" id="article" value="{{ old('article', $product->article) }}" placeholder="Артикул" class="form-control" form="form-data"/>--}}
            </div>
        </div>

        <div class="col-sm-3 no-padding">
            <label for="category_id">Категория</label>



            {{--{!! Form::select('category_id',
                $value = $categoriesProvider->getCategoriesList(),
                $selected = null,
                [
                 'class'=>'form-control','form'=>'form-data',
                 'v-model' => 'category', 'v-on' => 'change:getFields()'
                ])
            !!}--}}



            <select class="form-control" form="form-data" name="category_id" v-model="category" v-on="change:getFields()">
                <option value="0">Все категории</option>
                @foreach($categoriesProvider->getListForNav()->all() as $item)
                    <optgroup label="{{ $item->title }}">
                        @if(count($item->children))
                            @foreach($item->children as $child)
                                <option value="{{ $child->id }}"
                                        v-bind:value="{{ $child->id }}"
                                        @if(isset($product->category_id) &&  $product->category_id == $child->id)
                                        selected
                                        @endif
                                >{{ $child->title }}</option>
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
                <a data-toggle="tab" href="#filters" v-on="click:getFields();">
                    <i class="ace-icon fa fa-filter"></i>
                    Фильтры
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#characters" v-on="click:getXapacts();">
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
                <a data-toggle="tab" href="#additionalProducts" v-on="click:getProducts()">
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
        <div class="tab-content">
            <!-- Main options -->
            <div id="main" class="tab-pane active">
                <div class="col-md-9">
                    <div class="form-group">

                    </div>
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
                                {!! Form::select('brand_id',
                                    $value = $brandsProvider->getList(), $selected = null, ['class'=>'form-control', 'v-model' => 'brand']) !!}
                                <br/>
                            </div>

                            <div class="col-sm-12">
                                {!! Form::label('name','Название тоывара в админке') !!}
                                {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
                                <br/>
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

                    <!-- End my options -->
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="row">


                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('active', 'Показывать на сайте?') !!}
                                    {!! Form::checkbox('active', $selected = null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('sitemap', 'Показывать в Sitemap.xml?') !!}
                                    {!! Form::checkbox('sitemap', $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('yandex', 'Показывать в Yandex.xml?') !!}
                                    {!! Form::checkbox('yandex', $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('is_bestseller', 'Отметить как хит продаж?') !!}
                                    {!! Form::checkbox('is_bestseller', $selected = null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('is_new', 'Отметить как новинку?') !!}
                                    {!! Form::checkbox('is_new', $selected = null, ['class' => 'form-control']) !!}
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





            <!-- Cena -->
            <div id="cena" class="tab-pane">
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
                        <div style="padding-bottom: 30px"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="nacenka">Группа цен</label>
                    <div class="input-group">
                        {!! Form::select('cenagrup_id',
                                $value = $cenaProvider->getList(), $selected = null, ['class'=>'form-control', 'style' => 'min-width: 300px']) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div style="padding-bottom: 30px"></div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5>Дата последнего персчёта цен : {{ isset($product->getCena->updated_at) ? $product->getCena->updated_at : ''}}</h5>
                </div>

                <div class="col-md-12">
                    <h5>Скидка в группе : {{ isset($product->getCena->skidka) ? $product->getCena->skidka : ''}}</h5>
                </div>

                <div class="col-md-12">
                    <h5>Наценка в группе : {{ isset($product->getCena->nacenka) ? $product->getCena->nacenka : ''}}</h5>
                </div>


                <div class="col-md-12">
                    {{ isset($product->getCena->coment) ? $product->getCena->coment : ''}}
                </div>

                <div class="col-md-12">
                    {{ isset($product->getCena->file) ? $product->getCena->file : ''}}
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div style="padding-bottom: 150px"></div>
                    </div>
                </div>
            </div>

            <script>
                var curs = {{ isset($product->getCena->curs) ? $product->getCena->curs : ''}}
                    skidka = {{ isset($product->getCena->skidka) ? $product->getCena->skidka : ''}}
                    nacenka = {{ isset($product->getCena->nacenka) ? $product->getCena->nacenka : ''}}

            </script>

            <!-- /End Cena -->



            <!-- Filters -->
            <div id="filters" class="tab-pane">

                <label class="action-buttons pull-right" v-on="click: getFieldsClik()">
                    <a href="#" id="_spin"><i class="fa fa-refresh fa-2x"></i></a>
                </label>
                <div class="inner clearfix">
                    {{--This section will be ajax loaded--}}
                </div>

                <div class="row">
                    <div style="padding-bottom: 150px"></div>
                </div>
            </div>

            <!-- /End Filters -->


            <!-- characters -->
            <div id="characters" class="tab-pane">

                <label class="action-buttons pull-right" v-on="click: getXapactsClik()">
                    <a href="#" id="_spin"><i class="fa fa-refresh fa-2x"></i></a>
                </label>
                <div class="inner clearfix">
                    {{--This section will be ajax loaded--}}
                </div>

                <div class="row">
                    <div style="padding-bottom: 150px"></div>
                </div>
            </div>

            <!-- /End characters -->



            <!-- Params -->


            <div id="params" class="tab-pane">
                <div class="col-md-12" id="params-section">
                    <div id="error"></div>
                    <div id="paramsup">
                        {{--{{ dump($product->getParameters) }}--}}
                        <table class="table table-bordered table-hover">
                            <thead>
                            <td>Название</td>
                            <td>Значение</td>
                            <td></td>
                            </thead>
                            <tbody>
                            {{--{{ dump($product) }}--}}
                            @if(isset($product->getParameters))
                                {{--{{ dump($product->getParameters) }}--}}
                                @foreach($product->sortedValuesParam() as $parameters)
                                    <tr>
                                        <td>
                                            <a class="param_edit fancybox.ajax"
                                               href="{{ url('dashboard/parameters/edit_param_name/'.$parameters->parameter->id) }}"
                                               title="Редактировать название параметра">
                                                {{ $parameters->parameter->title }}
                                            </a>
                                            <a class="param_value_edit fancybox.ajax"
                                               href="{{ url('dashboard/parameters/edit_param/'.$product->category_id.'/'.$product->brand_id.'/'.$product->id.'/'.$parameters->parameter->id) }}"
                                               title="Редактировать параметр">
                                                <i class="ace-icon fa fa-pencil bigger-130" style="float: right"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="param_edit fancybox.ajax"
                                               href="{{ url('dashboard/parameters/edit_value_name/'.$parameters->id) }}"
                                               title="Редактировать название значения параметра">
                                                {{ $parameters->value }}
                                            </a>
                                            <a class="param_value_edit fancybox.ajax"
                                               href="{{ url('dashboard/parameters/edit_value/'.$product->id.'/'.$parameters->parameter->id) }}"
                                               title="Редактировать значение параметра">
                                                <i class="ace-icon fa fa-pencil bigger-130" style="float: right"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-120" title="удалить"
                                                   style="float: right" onclick="deleteParam({{ $product->id }}, {{ $parameters->parameter->id }});"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
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
                </div>
            </div>


            <!-- /End Params -->

            <div id="images" class="tab-pane">
           
                <div class="col-md-12" id="image-section">
                    
                    <input type="hidden" name="imagesIds" value="@{{ stringImagesIds }}"/>
                    <div class="form-group">
                        {!!
                        Form::label(
                        'image', "Загрузить изображение ( @{{ commonImages.length }}/15 )",
                        ["class" => "btn btn-success btn-sm", "disabled" => "@{{ isDisabled }}"]
                        ) !!}
                        <input type="file" name="image" id="image" v-on="change: loadImage($event)" multiple>
                    </div>

                    <div class="image-box clearfix" v-show="images">
                        <div class="thumb" v-repeat="image: commonImages">


                        <span class="is-thumb" v-if="image.is_thumb == 1">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="is-thumb grey" v-if="image.is_thumb == 0"
                              v-on="click: setAsThumbnail(image)">
                            <i class="fa fa-check"></i>
                        </span>

                        <span class="remove" v-on="click: removeImage(image)">
                            <i class="fa fa-remove"></i>
                        </span>
                            <img v-attr="src: image.path " alt="test"/>
                        </div>
                        {!! Form::hidden("product-id",
                        $value = isset($product->id) ? $product->id : null,
                        ["v-model" => "productId"]) !!}

                    </div>




                     

                    {{--<hr/>--}}
                    {{--{{ dd($product->pdf) }}--}}
                    {{--{!!Form::label('pdf', "Загрузить PDF",["class" => "btn btn-success btn-sm"]) !!}--}}
                    {{--@if(isset($product->pdf) && !empty($product->pdf))--}}
                        {{-- $pdfName = explode('/', $product->pdf);--}}
                    {{--@endif--}}


                    {{--<input type="hidden" v-model="PDF" value="{{ isset($pdfName) ? array_pop($pdfName) : '' }}"/>--}}
                    {{--<input type="file" name="pdf" id="pdf" v-on="change: loadPDF" v-el="pdfInput" multiple>--}}
                    {{--<div class="pdf" v-show="PDF">--}}
                        {{--<img src="/admin/assets/img/PDF-icon.png" alt="pdf file"/>--}}
                        {{--<span>@{{ PDF }}</span>--}}
                        {{--<a href="#"><i class="fa fa-remove" title="удалить PDF" v-on="click: removePDF($event)"></i></a>--}}
                    {{--</div>--}}

                    {{--<br>--}}
                    {{--<br>--}}

                    {{--<div class="form-group">--}}
                        {{--{!!--}}
                        {{--Form::label(--}}
                        {{--'cerf', "Загрузить сертификаты ( @{{ certificateImages.length }}/15 )",--}}
                        {{--["class" => "btn btn-success btn-sm", "disabled" => "@{{ isDisabled }}"]--}}
                        {{--) !!}--}}
                        {{--<input type="file" name="image" id="cerf" v-on="change: loadImage($event)" multiple>--}}
                    {{--</div>--}}

                    {{--<div class="image-box clearfix" v-show="images">--}}
                        {{--<div class="thumb" v-repeat="image: certificateImages">--}}



                        {{--<span class="remove" v-on="click: removeImage(image)">--}}
                            {{--<i class="fa fa-remove"></i>--}}
                        {{--</span>--}}
                            {{--<img v-attr="src: image.path " alt="test"/>--}}
                        {{--</div>--}}
                        {{--{!! Form::hidden("product-id",--}}
                        {{--$value = isset($product->id) ? $product->id : null,--}}
                        {{--["v-model" => "productId"]) !!}--}}

                    {{--</div>--}}

                    {{--<hr/>--}}

                    {{--{!!Form::label('flash', "Загрузить 3D просмотр",["class" => "btn btn-success btn-sm"]) !!}--}}
                    {{--@if(isset($product->flash_view) && !empty($product->flash_view))--}}
                        {{-- $flashName = explode('/', $product->flash_view);--}}
                    {{--@endif--}}

                    {{--<input type="hidden" v-model="flashObject" value="{{ isset($flashName) ? array_pop($flashName) : '' }}"/>--}}
                    {{--<input type="file" name="flash_view" id="flash" v-on="change: load3D" v-el="flashInput">--}}
                    {{--<div class="pdf" v-show="flashObject">--}}
                        {{--<img src="/admin/assets/img/3d.png" alt="3d file"/>--}}
                        {{--<span>@{{ flashObject }}</span>--}}
                        {{--<a href="#"><i class="fa fa-remove" title="удалить 3D просмотр" v-on="click: removeFlash($event)"></i></a>--}}
                    {{--</div>--}}


                    {{--<div class="col-xs-12">--}}
                        <div class="row">
                            {{--<button class="btn" id="bootbox-regular">Regular Dialog</button>--}}
                            {{--<a href="#" class="btn btn-success btn-sm" v-on="click: load3D($event)">Загрузить 3D просмотр</a>--}}
                            {{--<div class="clearcfix"></div>--}}
                            {{--<input type="hidden" name="flash_view" v-model="flashObject" value="{{  $product->flash_view or null }}"/>--}}
                            {{--<div class="m-cont flash_view" v-if="flashObject">--}}

                            {{--<div id="3dtour">--}}
                                {{--<script src="/frontend/js/3dtour.js"></script>--}}
                                {{--<div id="container">--}}
                                    {{--<div id="panoDIV" style="height:470px">--}}
                                             {{--@{{{ flashObject }}}                                    --}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>  --}}
                        {{----}}
                                {{--<a href="#"><i class="fa fa-remove" title="удалить 3D просмотр" v-on="click: removeFlash($event)"></i></a>--}}
                            {{--</div>--}}
                        </div>
                    {{--</div>--}}
                        <div class="clearfix"></div>
                    <hr/>

                    <div class="row">
                        <a href="#" class="btn btn-success btn-sm" v-on="click: loadVideo($event)">Загрузить видео</a>
                        <div class="clearfix"></div>
                        <input type="hidden" name="video" v-model="video" value="{{ isset($product->video) ? $product->video : null}}"/>
                        <div class="m-cont" v-if="video" style="margin-top: 20px">
                            @{{{ video }}}
                            <a href="#"><i class="fa fa-remove" title="удалить видео обзор" v-on="click: removeVideo($event)"></i></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <br/>
                    {{--<form action="{!! route('dashboard.products.images',[$product->id]) !!}" method="get" class="dropzone" id="my_dopzone">--}}
                    {{--{!! csrf_field() !!}--}}
                    {{--</form>--}}

                </div>


            </div>


            <div id="files" class="tab-pane">
                <div class="col-md-12" id="files-section">
                    <div id="filesup" v-show="getPdfList">
                        {{--{{ dump($product->adminFiles) }}--}}

                        <table class="table table-bordered table-hover">
                            <thead>
                            <td align="center">На сайте</td>
                            <td align="center">В товаре</td>
                            <td align="center">Название в админке (на странице)</td>
                            <td align="center">Путь к файлу</td>
                            <td align="center">Скачан раз</td>
                            <td align="center"></td>
                            <td align="center"></td>
                            </thead>
                            <tbody>
                            @if(isset($product->adminFiles))
                                @foreach($product->adminFiles as $file)
                                    <tr>
                                        <td align="center">{!! ($file->show == 1) ? '<i class="fa fa-eye green"></i>' : '<i class="fa fa-eye fa-eye-slash red"></i>' !!}</td>
                                        <td align="center"></td>
                                        <td>{{ $file->admin_name }}<br>( {{ $file->name }} )</td>
                                        <td>{{ $file->path }}</td>
                                        <td>{{ $file->downloads }}</td>
                                        <td>
                                            @if(isset($product))
                                                <a id="otvet" class="fileedit fancybox.ajax"
                                                   href="{{ url('dashboard/pdf/'.$file->id.'/'.$product->id) }}">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-120" title="удалить"
                                                   v-on="click: removePDF($event, {{ $file->id }})"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    @if(isset($product))
                        <button id="otvet" class="various fancybox.ajax btn btn-success btn-sm" href="{{ url('dashboard/pdf/add/'.$product->category_id, $product->id) }}">
                            Выбрать файл
                        </button>
                    @endif
                    {!!Form::label('pdf', "Загрузить",["class" => "btn btn-success btn-sm"]) !!}
                    <input type="hidden" v-model="PDF"/>
                    <input type="file" name="pdf" id="pdf" v-on="change: loadPDF" v-el="pdfInput" multiple>

                </div>
            </div>




            <div id="additionalProducts" class="tab-pane">
                <div class="col-xs-12">
                    <div class="_cover" v-el="cover"></div>
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
                        <tr v-repeat="relProduct: relOptions.selected">
                            <td class="center">
                                <img v-attr="src: relProduct.thumbnail[0].path " v-if="!!relProduct.thumbnail[0]" class="mini-thumb"/>
                                <img src="/frontend/images/default.png" v-if="!relProduct.thumbnail[0]" class="mini-thumb"/>
                            </td>
                            <td>
                                @{{ relProduct.title }} <br/>
                                <small style="color: #808080">(@{{ relProduct.category.title }})</small>
                            </td>
                            <td> @{{ relProduct.article }}</td>
                            <td> @{{ relProduct.price }}</td>
                            <td class="options">
                                <a href="#" style="font-size: 18px; color:indianred" v-on="click: removeProduct($event, relProduct)"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <h4>Список всех товаров</h4>
                    <div class="well clearfix">
                        <div class="col-md-4">
                            {!! Form::select('_category', [0 => 'Все категории'] + $categoriesProvider->getCategoriesList()->all(), $selected = null,
                                ['class' => 'form-control', 'v-model' => 'relOptions.category', 'v-on' => 'change: getProducts()']) !!}
                        </div>
                        <div class="col-md-4">
                            {{--<span>Показывать по</span>--}}
                            {!! Form::select('_paginate', [
                                        20 => 'Показывать по 20 продуктов',
                                        50 => 'По 50 продуктов',
                                        100 => 'По 100 продуктов'
                                      ], $selected = null,
                             ['class' => 'form-control', 'v-model' => 'relOptions.paginate', 'v-on' => 'change: getProducts()']) !!}
                        </div>
                        <div class="col-md-4 pull-right">
                            {!! Form::text('search', $value = null,
                             ['class' => 'form-control','placeholder' => 'Поиск', 'v-model' => 'relOptions.search', 'v-on' => 'input: getProducts()']) !!}
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
                        <tr v-repeat="relProduct: productsList.products">
                            <td class="center">
                                <img v-attr="src: relProduct.thumbnail[0].path " v-if="!!relProduct.thumbnail[0]" class="mini-thumb"/>
                                <img src="/frontend/images/default.png" v-if="!relProduct.thumbnail[0]" class="mini-thumb"/>
                            </td>
                            <td>
                                @{{ relProduct.title }} <br/>
                                <small style="color: #808080">(@{{ relProduct.category.title }})</small>
                            </td>
                            <td> @{{ relProduct.article }}</td>
                            <td> @{{ relProduct.price }}</td>
                            <td class="options">
                                <a href="#" style="font-size: 18px" v-on="click: addProduct($event, relProduct)"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <p v-if="productsList.products.length == 0">
                        <b>Список продуктов по текущему запросу пуст</b>
                    </p>
                    <nav v-if="productsList.products.length > 0">
                      <ul class="pager">
                        <li class="previous @{{ productsList.pagination.currentPage == 1 ? 'disabled' : '' }}">
                            <a href="#" v-on="click: prevPage($event)"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                        </li>
                        <li>
                            @{{ productsList.pagination.currentPage }} / @{{ productsList.pagination.lastPage  }}
                        </li>
                        <li class="next @{{ productsList.pagination.currentPage ==  productsList.pagination.lastPage ? 'disabled' : '' }}" >
                            <a href="#" v-on="click: nextPage($event)">Следующая <span aria-hidden="true">&rarr;</span></a>
                        </li>
                      </ul>
                    </nav>

                </div>
            </div>
            <div id="seo" class="tab-pane">
                <div class="col-xs-12">
                    <div class="form-group">
                        {!! Form::label('meta_title', 'Meta Title') !!}
                        {!! Form::text('meta_title', $value = null, ['class' => 'form-control', "row"=>1,'form'=>'form-data']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_description', 'Meta Description') !!}
                        {!! Form::text('meta_description', $value = null, ['class' => 'form-control',"row"=>2,'form'=>'form-data']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                        {!! Form::text('meta_keywords', $value = null, ['class' => 'form-control',"row"=>2,'form'=>'form-data']) !!}
                    </div>
                </div>
            </div>
    </div>
    {{--tabs end--}}

    <!-- remove status draft from products -->
    <input type="hidden" name="draft" value="0" form="form-data"/>
</div>

</div>

@section('bottom-scripts')
    @parent
    <script src="/admin/assets/js/chosen.jquery.min.js"></script>

    <script>
        $("#_spin").click(function rotate(e){
            e.preventDefault();
            var $this = $(this);

            $this.addClass('spin');

            setTimeout(function(){
                $this.removeClass('spin');
            }, 1000)

        });

    </script>
    <script src="/admin/assets/js/bootbox.min.js"></script>

    <script src="/admin/assets/js/selectize.js"></script>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>--}}
    <script src="{{ url('admin/assets/js/product.js') }}"></script>

@endsection