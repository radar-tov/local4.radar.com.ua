@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')

@section('top-scripts')
    @parent
    <link rel="stylesheet" href="{!! url('admin/assets/dropzone/dist/dropzone.css') !!}"/>
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
            {!! Form::select('category_id',
                $value = $categoriesProvider->getCategoriesList(),
                $selected = null,
                [
                 'class'=>'form-control','form'=>'form-data',
                 'v-model' => 'category', 'v-on' => 'change:getFields()'
                ])
            !!}
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
                <a data-toggle="tab" href="#filters">
                    <i class="ace-icon fa fa-cogs"></i>
                    Характеристики
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#images">
                    <i class="red ace-icon fa fa-image"></i>
                    Медиа
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#files">
                    <i class="red ace-icon fa fa-file"></i>
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
                                {!! Form::label('price','Цена') !!}
                                <label for="price"></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">&#8372;</i>
                                    </span>
                                    {!! Form::text('price', $value = null, ['class' => 'form-control']) !!}

                                    {{--<input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" placeholder="Цена" class="form-control" form="form-data"/>--}}
                                </div>
                            </div>

                            <div class="col-sm-3">

                                <label for="discount">Скидка</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa  bigger-110">%</i>
                                    </span>
                                    {!! Form::text('discount', $value = null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('available', 'Товар в наличии?') !!}
                                    {!! Form::select('available', ['1'=> 'Да', '0'=>'Нет','2'=>'Под заказ'], $selected = null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="category_id">Бренд</label>
                                {!! Form::select('brand_id',
                                    $value = $brandsProvider->getList(), $selected = null, ['class'=>'form-control']) !!}
                                <br/>
                            </div>


                            <div class="col-sm-12">
                                {{--<br/>--}}
                                <label for="discount">Упаковка</label>
                                {!! Form::text('pack', $value = null, ['class' => 'form-control']) !!}
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
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
                            {{--<div class="col-lg-4">--}}
                            {{--                                {!! Form::label('','Показывать на сайте?')!!}<br/>--}}
                            {{--<label>--}}
                            {{--<input name="switch-field-1" class="ace ace-switch" type="radio">--}}
                            {{--<span class="lbl" data-lbl="Да&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Нет"></span>--}}
                            {{--</label>--}}
                            {{--<div class="btn-group" data-toggle="buttons">--}}
                            {{--<label class="btn btn-sm btn-primary {{ $product->active == 1 ? 'active' : null }}">--}}
                            {{--{!!Form::radio('show',$value = 1, $product->active == 1 ? true : false,['form'=>'form-data'])!!} Да</label>--}}
                            {{--<label class="btn btn-sm btn-primary {{ $product->active == 0 ? 'active' : null }}">--}}
                            {{--{!!Form::radio('show',$value = 0, $product->active == 0 ? true : false, ['form'=>'form-data'])!!} Нет</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>

                </div>
            </div>
            <div id="characteristic" class="tab-pane">
                <div class="col-xs-12">

                    <div class="form-group" v-repeat="field in fields | orderBy 'id' -1">
                        <label for="@{{ field.id }}">@{{ field.title }}</label>
                        <input type="text"
                               id="@{{ field.id }}"
                               name="fields[@{{ field.id }}:@{{ field.val_id }}]"
                               class="form-control"
                               value="@{{ !!field.value ? field.value : null }}"
                            />
                    </div>

                </div>
            </div>

            <!-- Filters -->
            <div id="filters" class="tab-pane">

                <label class="action-buttons pull-right" v-on="click: getFields()">
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
                        {{--*/ $pdfName = explode('/', $product->pdf);/*--}}
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
                        {{--*/ $flashName = explode('/', $product->flash_view);/*--}}
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
                        <input type="hidden" name="video" v-model="video" value="{{ $product->video or null}}"/>
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
                        <table class="table table-bordered table-hover">
                            <thead>
                            <td></td>
                            <td>Имя файла</td>
                            <td>Путь к файлу</td>
                            <td>Скачан раз</td>
                            <td></td>
                            <td></td>
                            </thead>
                            <tbody>
                            @if(isset($product->files))
                                @foreach($product->files as $file)
                                    <tr>
                                        <td>{!! ($file->show == 1) ? '' : '' !!}</td>
                                        <td>{{ $file->name }}</td>
                                        <td>{{ $file->path }}</td>
                                        <td>{{ $file->downloads }}</td>
                                        <td>
                                            <a id="otvet" class="various fancybox.ajax" href="{{ url('dashboard/pdf/'.$file->id.'/'.$product->id) }}">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-120" title="удалить PDF" v-on="click: removePDF($event, {{ $file->id }})"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <button id="otvet" class="various fancybox.ajax btn btn-success btn-sm" href="{{ url('dashboard/pdf/add', $product->id) }}">
                        Выбрать файл
                    </button>

                    {!!Form::label('pdf', "Загрузить",["class" => "btn btn-success btn-sm"]) !!}
                    <input type="hidden" v-model="PDF" value="{{ isset($pdfName) ? array_pop($pdfName) : '' }}"/>
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