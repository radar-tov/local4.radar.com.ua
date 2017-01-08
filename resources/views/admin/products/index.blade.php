@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
@inject('cenaGrupsProvider', 'App\ViewDataProviders\CenaGrupsDataProvider')

@extends('admin.app')

@section('top-scripts')
    <style>
        .files {
            float: left;
            padding: 20px 20px 10px 10px;
        }
        li {
            list-style-type: none; !important
        }
    </style>
@stop

@section('page-title')
    Товары
@stop

@section('page-nav')


@stop


@section('content')
    <div class="row _hid" id="products">
        <div class="col-xs-6">
            <a href="{!! route('dashboard.products.create') !!}" class="btn btn-sm btn-primary" title="Добавить товар" target="_blank">
                <i class="ace-icon fa fa-plus"></i> Добавить товар
            </a>
        </div>
        <div class="col-xs-6 ">
            <a href="{!! route('dashboard.products.trash') !!}" class="btn btn-sm btn-danger pull-right"
               title="Корзина">
                <i class="ace-icon fa  fa-trash"></i> Корзина
            </a>
        </div>

        <div class="col-xs-12">
            <br/>
            <div class="well">

                <div class="row">
                    <div v-if="!selectedProductsIds.length">
                        {!! Form::open(['url' => '#', 'v-on' => 'change: filterProducts()', 'v-el' => 'filterForm']) !!}
                        {!! csrf_field() !!}

                        <div class="col-xs-2">
                            {!! Form::select('sortBy', [
                               'id'         => 'Сортировка по умолчанию',
                               'price'      => 'По цене',
                               'out_price'  => 'По цене со скидкой',
                               'base_price' => 'По базовой цене',
                               'discount'   => 'По скидке',
                               'nacenka'    => 'По наценке',
                               'title'      => 'По названию',
                               'name'       => 'По AdminName'
                               ], $selected = Session::get('admin_sortBy'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-xs-2">
                            {!! Form::select('sortByPor', [
                               'ASC'  => 'По возрастанию',
                               'DESC' => 'По убыванию'
                               ], $selected = Session::get('admin_sortByPor'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-xs-2">
                            <select name="categoryId" class="form-control" selected="{{ Session::get('admin_categoryId') }}" v-model="categoryId">
                                <option value="0">Все категории</option>
                                @foreach($categoriesProvider->getListForNav()->all() as $item)
                                    <optgroup label="{{ $item->title }}">
                                        @if(count($item->children))
                                            @foreach($item->children as $child)
                                                <option value="{{ $child->id }}"
                                                        v-bind:value="{{ $child->id }}"
                                                        @if(Session::get('admin_categoryId') == $child->id)
                                                            selected
                                                        @endif
                                                >{{ $child->title }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xs-2">
                            {!! Form::select('brandID', [0 => 'Все бренды'] + $brandsProvider->getList()->all(),
                                $selected = Session::get('admin_brandID'),
                                ['class' => 'form-control',]) !!}
                        </div>

                        <div class="col-xs-2">
                            {!! Form::select('cenagrupID', [0 => 'Все ценовые группы'] + $cenaGrupsProvider->getList()->all(),
                                $selected = Session::get('admin_cenagrupID'),
                                ['class' => 'form-control',]) !!}
                        </div>

                        <div class="col-xs-2">
                            {!! Form::select('discount', [
                               0 => 'Без скидки и наценки',
                               1 => 'Без скидки',
                               2 => 'Со скидкой'
                               ], $selected = Session::get('admin_discount'), ['class' => 'form-control']) !!}
                        </div>

                        <div style="padding-top: 50px">
                            <div class="col-xs-2">
                                {!! Form::select('paginate', [
                                 20 => 'Показывать по 20 продуктов',
                                 30 => 'По 30 продуктов',
                                 50 => 'По 50 продуктов',
                                 100 => 'По 100 продуктов',
                                 200 => 'По 200 продуктов',
                                ], $selected = Session::get('admin_paginate'), ['class' => 'form-control']) !!}
                            </div>

                            <div class="col-xs-3">
                                {!! Form::text('search', $value = Request::get('q'),
                                    ['class' => 'form-control', 'placeholder' => 'Поиск', 'v-on' => 'input: filterProducts()']) !!}
                            </div>

                            <div class="col-xs-1 pull-right">
                                <button class="btn btn-sm btn-primary" v-on="click:delFilters($event)">Сбросить фильтры</button>
                            </div>

                            <div class="col-xs-1 pull-right">
                                {!! Form::submit('Обновить', ['class' => 'btn btn-sm btn-primary']) !!}
                            </div>

                        </div>




                        <template v-if="categoryId != 0">

                            <div class="col-xs-1 pull-right">
                                <button class="btn btn-sm btn-primary" v-on="click:showPanel($event)">Фильтры</button>
                            </div>

                            <div class="clearfix"></div>

                            <input type="hidden" value="0" name="isDirty" id="isDirty"/>
                            {{--<input type="hidden" value="{{ $subcategory->id }}" name="categoryId"/>--}}

                            <div id="panel" style="display: none;">
                                <div v-repeat="filter in filtersList" class="files">
                                    <div class="filter-group">
                                        <div class="filter-heading">
                                            <div class="ft-heading-inner">
                                                <span>@{{ filter.title }}</span>
                                            </div>
                                        </div>
                                        <div class="filter-content">
                                            <ul class="filter-select no-margin">
                                                <li class="filter-option" v-repeat="value in filter.values">
                                                    <input  id="filter-option-@{{ value.id }}"
                                                            type="checkbox"
                                                            name="filters[@{{ filter.id }}][]"
                                                            value="@{{ value.id }}"
                                                            checked="@{{ value.checked }}"
                                                    >
                                                    <label for="filter-option-@{{ value.id }}" class="filter-option-label">
                                                        <span class="ft-opt-name">@{{ value.value }}</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--<pre>
                            @{{ $data.filtersList | json }}
                            </pre>--}}
                        </template>

                        <div class="clearfix"></div>



                        {!! Form::close() !!}



                    </div>


                    <div class="" v-if="selectedProductsIds.length">

                        {!! Form::open(['url' => '#', 'v-el' => 'actionForm', 'v-on' => 'submit: fireAction']) !!}

                        <div class="col-xs-8">
                            {{--{!! Form::label('action', 'С выбранными') !!}--}}
                            {!! Form::select('action', [
                                'sklad-true' => 'Есть на складе',
                                'sklad-false' => 'Нет на складе',
                                'sklad-custom' => 'Под заказ',
                                'deactivate' => 'Не показывать на сайте',
                                'activate' => 'Показывать на сайте',
                                'delete' => 'Удалить в корзину',
                                'dropDiscount' => 'Убрать скидку',
                                'markAsBestseller'  => 'Отметить как хит продаж',
                                'unmarkAsBestseller'  => 'Убрать из хитов продаж',
                                'markAsNew' => 'Отметить как новинку',
                                'unmarkAsNew' => 'Убрать из новинок',
                                'sitemap-true' => 'Показывать в Sitemap.xml',
                                'sitemap-false' => 'Не показывать в Sitemap.xml',
                                'yandex-true' => 'Показывать в Yandex.xml',
                                'yandex-false' => 'Не показывать в Yandex.xml'

                            ],
                            $selected = null, ['class' => 'form-control', 'v-model' => 'selectedAction']) !!}
                        </div>
                        <div class="col-xs-4">
                            {!! Form::submit('Применить к выбранным', ['class' => 'btn btn-info btn-sm ']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>


            </div>{{--/well--}}
        </div>{{--/col-xs-12--}}


        <div class="col-xs-12">

            {{--<pre>--}}
            {{--@{{ $data.products.pagination | json }}--}}
            {{--</pre>--}}

            <table id="sample-table-2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="options">
                        <input type="checkbox" v-on="change:markProducts()" v-el="mainCheckbox"/>
                    </th>
                    <th class="options"><i class="fa fa-eye"></i></th>
                    <th class="options"><i class="fa fa-plus"></i></th>
                    <th class="options"><i class="fa fa-yc"></i></th>
                    <th class="options"><i class="fa fa-sitemap"></i></th>
                    <th class="options"><i class="fa fa-camera"></i></th>
                    <th>ID</th>
                    <th>Артикул</th>
                    <th>Название</th>
                    <th class="p-base-price">Базовая цена</th>
                    <th class="p-price">Цена</th>
                    <th class="p-discount">Скидка</th>
                    <th class="p-nacenka">Наценка</th>
                    <th class="p-out-price">Цена +- скидка</th>
                    <th>Категория</th>
                    <th colspan="3" class="options">Опции</th>
                </tr>
                </thead>
                <tbody>
                <tr v-repeat="product in products.productList">
                    <td class="options">
                        <input type="checkbox" name="selected[]" class="productSel" value="@{{ product.id }}"
                               v-on="change: selectProduct($event)"/>
                    </td>
                    <td class="options">
                        <a href="/@{{ product.category.parent.slug }}/@{{ product.category.slug }}/@{{ product.slug }}" target="_blank">
                            <i class="fa fa-eye green" v-show="product.active > 0"></i>
                        </a>
                        <i class="fa fa-eye-slash red" v-show="product.active == 0"></i>
                    </td>
                    <td class="options">
                        <i class="fa fa-minus red" v-show="product.available == 0"></i>
                        <i class="fa fa-plus green" v-show="product.available == 1"></i>
                        <i class="fa fa-phone red" v-show="product.available == 2"></i>
                    </td>
                    <td class="options">
                        <i class="fa fa-yc red" v-show="product.yandex == 0"></i>
                        <i class="fa fa-yc green" v-show="product.yandex == 1"></i>
                    </td>
                    <td class="options">
                        <i class="fa fa-sitemap red" v-show="product.sitemap == 0"></i>
                        <i class="fa fa-sitemap green" v-show="product.sitemap == 1"></i>
                    </td>
                    <td class="options">
                        {{--<img src="..@{{ product.path }}" style="max-height: 26px">--}}
                    </td>
                    <td>
                        @{{ product.id }}
                    </td>
                    <td>
                        @{{ product.article }}
                    </td>
                    <td class="p-title">
                        <div class="bs-label-container">
                            <span class="label label-success bs-label" v-show="product.is_bestseller > 0">Хит продаж</span>
                            <span class="label label-danger bs-label" v-show="product.is_new > 0">Новинка</span>
                        </div>
                        {{--<i class="fa fa-line-chart"></i>--}}
                        <a style="color: #000000" target="_blank" href="/dashboard/products/@{{ product.id }}/edit">
                            @{{ product.name }} - @{{ product.title }}
                        </a>
                        {{--<small v-show="product.clone_of > 0" style="color:indianred">(копия)</small>--}}
                    </td>
                    <td class="">
                        @{{ product.base_price }}
                        <i class="fa fa-ruble" v-show="product.get_cena.valuta == 1"></i>
                        <i class="fa fa-dollar" v-show="product.get_cena.valuta == 2"></i>
                        <i class="fa fa-euro" v-show="product.get_cena.valuta == 3"></i>
                        * @{{ product.get_cena.curs }}
                    </td>
                    <td class="">@{{ product.price }}</td>
                    <td class="center">
                            <span class="label label-sm label-success arrowed-right" v-show="product.discount > 0">
                                @{{ product.discount }} %
                            </span>
                            <span v-show="product.discount < 1">
                                <i class="fa fa-minus"></i>
                            </span>
                    </td>
                    <td class="center">
                            <span class="label label-sm label-success arrowed-right" v-show="product.nacenka > 0">
                                @{{ product.nacenka }} %
                            </span>
                            <span v-show="product.nacenka < 1">
                                <i class="fa fa-minus"></i>
                            </span>
                    </td>
                    <td class="">@{{ product.out_price }}</td>
                    <td>
                        <span>
                            <a href="/@{{ product.category.parent.slug }}/@{{ product.category.slug }}"
                               target="_blank">@{{ product.category.title }}</a>
                        </span>
                    </td>
                    <td class="options">
                        <div class="action-buttons">
                            <a class="green" target="_blank" href="/dashboard/products/@{{ product.id }}/edit">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </div>
                    </td>
                    <td class="options">
                        <div class="action-buttons">
                            <a class="red" href="#" v-on="click: deleteProduct(product, $event)">
                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                            </a>
                        </div>
                    </td>
                    <td class="options">
                        <div class="action-buttons">
                            <a class="blue" href="/dashboard/products/copy/@{{ product.id }}">
                                <i class="ace-icon fa fa-copy bigger-120"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
            <p v-if="products.productList.length == 0">
                <b>Список продуктов по текущему запросу пуст</b>
            </p>
            <nav v-if="products.productList.length > 0">
                <ul class="pager">
                    <li class="previous @{{ products.pagination.currentPage == 1 ? 'disabled' : '' }}"
                        v-on="click: prevPage()">
                        <a href="#"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                    </li>
                    <li>
                        @{{ products.pagination.currentPage }} / @{{ products.pagination.lastPage  }}
                    </li>
                    <li class="next @{{ products.pagination.currentPage ==  products.pagination.lastPage ? 'disabled' : '' }}"
                        v-on="click: nextPage()">
                        <a href="#">Следующая <span aria-hidden="true">&rarr;</span></a>
                    </li>
                </ul>
            </nav>
            {{--<pre>--}}
            {{--@{{ $data.products | json }}--}}
            {{--</pre>--}}

            <input type="hidden" value="{{ csrf_token() }}" v-model="token"/>
            {{--{!! $products->appends(['q'])->render() !!}--}}
        </div>
        @stop


        @section('bottom-scripts')

            <script>
                new Vue({

                    el: '#products',

                    ready: function () {
                        var vue = this;
                        this.filterProducts();
                        $(this.$el).show()
                    },
                    data: {
                        products: {
                            category: {
                                title: ''
                            },
                            pagination: {
                                currentPage: {},
                                lastPage: {},
                                pageToGet: 1
                            },
                            productList: {}
                        },
                        token: null,
                        categoryId: 0,
                        filtersList: null,
                        productSel: false,
                        selectedProductsIds: [],
                        selectedAction: 'delete'
                    },

                    methods: {

                        delFilters: function (event) {
                            event.preventDefault();
                            var vue = this;
                            var $selectbox = $('.form-control');
                            $selectbox.prop('selectedIndex', 0);
                            vue.filterProducts()
                        },

                        getProducts: function () {
                            var vue = this;
                            $.ajax({
                                dataType: "json",
                                method: "GET",
                                url: '/dashboard/products',
                                cache: false,
                                success: function (response) {
                                    console.log(response.data);
                                    vue.products = response.data;
                                }
                            });
                        },

                        filterProducts: function () {
                            var vue = this;
                            var form = $(vue.$$.filterForm).serialize();
                            //console.log(vue.products.pagination.lastPage);
                            $.ajax({
                                method: "GET",
                                url: '/dashboard/products',
                                data: form + '&page=' + vue.products.pagination.pageToGet,
                                cache: false,
                                success: function (response) {
                                    vue.filtersList = response.filters;
                                    vue.products.productList = response.products.data;
                                    vue.products.pagination.currentPage = response.products.current_page;
                                    vue.products.pagination.lastPage = response.products.last_page;

                                    if (vue.products.pagination.lastPage < vue.products.pagination.pageToGet) {
                                        vue.products.pagination.pageToGet = vue.products.pagination.lastPage;
                                        vue.filterProducts()
                                    }
                                }
                            });
                        },

                        markProducts: function () {
                            var checks = $(".productSel"),
                                    isChecked = this.$$.mainCheckbox.checked;
                            this.selectedProductsIds = [];
                            for (var i = 0, len = checks.length; i < len; i++) {
                                $(checks[i]).prop('checked', isChecked);
                                if (isChecked) {
                                    this.selectedProductsIds.push(checks[i].value)
                                } else {
                                    this.selectedProductsIds.splice(this.selectedProductsIds.indexOf(checks[i].value), 1);
                                }
                            }
                        },

                        selectProduct: function (event) {
                            var checkbox = event.target;
                            if (checkbox.checked == true) {
                                this.selectedProductsIds.push(checkbox.value)
                            } else {
                                this.selectedProductsIds.splice(this.selectedProductsIds.indexOf(checkbox.value), 1);
                            }
                        },

                        fireAction: function (event) {
                            event.preventDefault();
                            var vue = this;
                            $.ajax({
                                method: "POST",
                                url: '/dashboard/product-actions/' + vue.selectedAction,
                                data: {ids: this.selectedProductsIds, _token: vue.token},
                                cache: false,
                                success: function () {
                                    vue.filterProducts();
                                    vue.selectedProductsIds = [];
                                    vue.$$.mainCheckbox.checked = false;
                                }
                            });
                        },
                        deleteProduct: function (product, event) {
                            event.preventDefault();
                            var vue = this;
                            $.ajax({
                                method: "POST",
                                url: '/dashboard/products/' + product.id,
                                data: {_token: vue.token, _method: 'DELETE'},
                                cache: false,
                                success: function () {
                                    vue.filterProducts();
                                    vue.selectedProductsIds = [];
                                    vue.$$.mainCheckbox.checked = false;
                                }
                            });
                        },

                        nextPage: function () {
                            //event.preventDefault();
                            //console.log(this.products );
                            if (this.products.pagination.currentPage != this.products.pagination.lastPage) {
                                this.products.pagination.pageToGet = this.products.pagination.currentPage + 1;
                                this.filterProducts();
                            }
                        },

                        prevPage: function () {
                            //event.preventDefault();
                            if (this.products.pagination.currentPage != 1) {
                                this.products.pagination.pageToGet = this.products.pagination.currentPage - 1;
                                this.filterProducts();
                            }
                        },

                        showPanel: function(event){
                            event.preventDefault();
                            $("#panel").slideToggle('slow');
                        }

                    }

                });
            </script>
            {{--<!-- do not uncomment me -->--}}

            {{--<script src="{!! url('admin/assets/js/jquery.dataTables.min.js') !!}"></script>--}}
            {{--<script src="{!! url('admin/assets/js/jquery.dataTables.bootstrap.js') !!}"></script>--}}


            {{--<!-- inline scripts related to this page -->--}}
{{--            <script type="text/javascript">
                jQuery(function ($) {
                    var oTable1 =
                            $('#sample-table-2')
                                    .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                    .dataTable({
                                        bAutoWidth: false,
                                        "aoColumns": [
                                            {"bSortable": false},
                                            null, null, null, null, null,
                                            {"bSortable": false}
                                        ]


                                        ,
                                        "sScrollY": "200px",
                                        "bPaginate": false,

                                        "sScrollX": "100%",
                                        "sScrollXInner": "120%",
                                        "bScrollCollapse": true,
                                        Note: if you are applying horizontal scrolling(sScrollX) on a ".table-bordered"
                                        you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                        "iDisplayLength": 50
                                    });


                    $(document).on('click', 'th input:checkbox', function () {
                        var that = this;
                        $(this).closest('table').find('tr > td:first-child input:checkbox')
                                .each(function () {
                                    this.checked = that.checked;
                                    $(this).closest('tr').toggleClass('selected');
                                });
                    });


                    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                    function tooltip_placement(context, source) {
                        var $source = $(source);
                        var $parent = $source.closest('table')
                        var off1 = $parent.offset();
                        var w1 = $parent.width();

                        var off2 = $source.offset();
                        //var w2 = $source.width();

                        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                        return 'left';
                    }

                })
            </script>--}}
}
@stop