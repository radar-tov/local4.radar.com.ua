@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Товары
@stop

@section('page-nav')


@stop


@section('content')
    <div class="row _hid" id="products">
        <div class="col-xs-6">
                <a href="{!! route('dashboard.products.create') !!}" class="btn btn-sm btn-primary" title="Добавить товар">
                    <i class="ace-icon fa fa-plus"></i> Добавить товар
                </a>
        </div>
        <div class="col-xs-6 ">
            <a href="{!! route('dashboard.products.trash') !!}" class="btn btn-sm btn-danger pull-right" title="Корзина">
                <i class="ace-icon fa  fa-trash"></i> Корзина
            </a>
        </div>

        <div class="col-xs-12">
            <br/>
            <div class="well">

                <div class="row">
                    <div v-if="!selectedProductsIds.length">
                    {!! Form::open(['url' => '#', 'v-on' => 'change: filterProducts()', 'v-el' => 'filterForm']) !!}

                    <div class="col-xs-3">
                        {!! Form::select('sortBy', [
                           'id' => 'Сортировка по умолчанию',
                           'price' => 'По цене',
                           'title' => 'По названию'
                           ], $selected = null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="col-xs-2">
                        {!! Form::select('categoryId', [0 => 'Все категории'] + $categoriesProvider->getCategoriesList()->all(),
                            $selected = null,
                            ['class' => 'form-control',]) !!}
                    </div>

                    <div class="col-xs-2">
                        {!! Form::select('discount', [
                           0 => 'Все',
                           1 => 'Без скидки',
                           2 => 'Со скидкой'
                           ], $selected = null, ['class' => 'form-control']) !!}
                    </div>
                    {!! csrf_field() !!}

                    <div class="col-xs-3">
                        {!! Form::select('paginate', [
                         20 => 'Показывать по 20 продуктов',
                         50 => 'По 50 продуктов',
                         100 => 'По 100 продуктов',
                        ], $selected = null, ['class' => 'form-control']) !!}
                    </div>



                    <div class="col-xs-2 pull-right">
                        {!! Form::text('search', $value = Request::get('q'),
                            ['class' => 'form-control', 'placeholder' => 'Поиск', 'v-on' => 'input: filterProducts()']) !!}
                    </div>

                    {!! Form::close() !!}



                    </div>


                        <div class="" v-if="selectedProductsIds.length">

                                {!! Form::open(['url' => '#', 'v-el' => 'actionForm', 'v-on' => 'submit: fireAction']) !!}

                                <div class="col-xs-8">
                                {{--{!! Form::label('action', 'С выбранными') !!}--}}
                                {!! Form::select('action', [
                                    'delete' => 'Удалить в корзину',
                                    'dropDiscount' => 'Убрать скидку',
                                    'markAsBestseller'  => 'Отметить как хит продаж',
                                    'unmarkAsBestseller'  => 'Убрать из хитов продаж',
                                    'markAsNew' => 'Отметить как новинку',
                                    'unmarkAsNew' => 'Убрать из новинок',
                                    'deactivate' => 'Не показывать на сайте',
                                    'activate' => 'Показывать на сайте'
                                ],
                                $selected = null, ['class' => 'form-control', 'v-model' => 'selectedAction']) !!}
                                </div>
                                <div class="col-xs-4">
                                    {!! Form::submit('Применить к выбранным', ['class' => 'btn btn-info btn-sm ']) !!}
                                </div>
                                {!! Form::close() !!}



                        </div>
                    </div>
                <div class="clearfix"></div>
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
                    <th>Артикул</th>
                    <th>Название</th>
                    <th class="p-price">Цена</th>
                    <th class="p-discount">Скидка</th>
                    <th>Категория</th>
                    <th colspan="3" class="options">Опции</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-repeat="product in products.productList">
                        <td class="options">
                            <input type="checkbox" name="selected[]" class="productSel" value="@{{ product.id }}" v-on="change: selectProduct($event)"/>
                        </td>
                        <td class="options">
                            <i class="fa fa-eye green" v-show="product.active > 0"></i>
                            <i class="fa fa-eye-slash red" v-show="product.active == 0"></i>
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
                            @{{ product.title }}
                            <small v-show="product.clone_of > 0" style="color:indianred">(копия)</small>
                        </td>
                        <td class="">@{{ product.price }} грн.</td>
                        <td class="center">
                            <span class="label label-sm label-success arrowed-right" v-show="product.discount > 0">
                                @{{ product.discount }} %
                            </span>
                            <span v-show="product.discount < 1">
                                <i class="fa fa-minus"></i>
                            </span>
                        </td>

                        <td>
                            <span>@{{ product.category.title }}</span>
                        </td>
                        <td class="options">
                            <div class="action-buttons">
                                <a class="green" href="/dashboard/products/@{{ product.id }}/edit">
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
                    <li class="previous @{{ products.pagination.currentPage == 1 ? 'disabled' : '' }}" v-on="click: prevPage()">
                        <a href="#"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                    </li>
                    <li>
                        @{{ products.pagination.currentPage }} / @{{ products.pagination.lastPage  }}
                    </li>
                    <li class="next @{{ products.pagination.currentPage ==  products.pagination.lastPage ? 'disabled' : '' }}" v-on="click: nextPage()">
                        <a href="#">Следующая <span aria-hidden="true">&rarr;</span></a>
                    </li>
                </ul>
            </nav>


            <input type="hidden" value="{{ csrf_token() }}" v-model="token"/>
            {{--{!! $products->appends(['q'])->render() !!}--}}
        </div>
@stop


@section('bottom-scripts')

    <script>

    new Vue({

        el: '#products',

        ready:function(){
            var vue = this;
            this.filterProducts();
            $(this.$el).show()
        },
        data: {
            products:{
                category: {
                    title: ''
                },
                pagination:{
                    currentPage: {},
                    lastPage: {},
                    pageToGet: 1
                },
                productList:{}
            },
            token:null,
            categoryId: 0,
            productSel:false,
            selectedProductsIds: [],
            selectedAction: 'delete'
        },

        methods:{

            getProducts: function(){
                var vue = this;
                $.ajax({
                    dataType: "json",
                    method: "GET",
                    url: '/dashboard/products',
                    cache: false,
                    success: function (response) {
                        vue.products = response.data;
                    }
                });
            },

            filterProducts: function(){
                var vue = this;
                var form = $(vue.$$.filterForm).serialize();
//                console.log(vue.products.pagination.lastPage);
                $.ajax({
                    method: "GET",
                    url: '/dashboard/products',
                    data: form + '&page=' + vue.products.pagination.pageToGet,
                    cache: false,
                    success: function (response) {
                        vue.products.productList = response.data;
                        vue.products.pagination.currentPage = response.current_page;
                        vue.products.pagination.lastPage = response.last_page;

                        if(vue.products.pagination.lastPage < vue.products.pagination.pageToGet) {
                            vue.products.pagination.pageToGet = vue.products.pagination.lastPage;
                            vue.filterProducts()
                        }
                    }
                });
            },

            markProducts:function(){
                var checks = $(".productSel"),
                    isChecked = this.$$.mainCheckbox.checked;
                this.selectedProductsIds = [];
                for(var i = 0, len = checks.length; i < len; i++){
                    $(checks[i]).prop('checked', isChecked);
                    if(isChecked){
                        this.selectedProductsIds.push(checks[i].value)
                    } else {
                        this.selectedProductsIds.splice(this.selectedProductsIds.indexOf(checks[i].value), 1);
                    }
                }
            },

            selectProduct: function (event) {
                var checkbox = event.target;
                if(checkbox.checked == true) {
                    this.selectedProductsIds.push(checkbox.value)
                } else {
                    this.selectedProductsIds.splice(this.selectedProductsIds.indexOf(checkbox.value), 1);
                }
            },

            fireAction: function(event){
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
            deleteProduct: function(product, event){
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

            nextPage: function(){
//                event.preventDefault();
//                console.log(this.products );
                if(this.products.pagination.currentPage != this.products.pagination.lastPage){
                    this.products.pagination.pageToGet = this.products.pagination.currentPage + 1;
                    this.filterProducts();
                }
            },

            prevPage: function(){
//                event.preventDefault();
                if(this.products.pagination.currentPage != 1) {
                    this.products.pagination.pageToGet = this.products.pagination.currentPage - 1;
                    this.filterProducts();
                }
            }
        }

    });
    </script>
<!-- do not uncomment me
{{--
   <script src="{!! url('admin/assets/js/jquery.dataTables.min.js') !!}"></script>
   <script src="{!! url('admin/assets/js/jquery.dataTables.bootstrap.js') !!}"></script>
--}}
{{--
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 =
                    $('#sample-table-2')
                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                            .dataTable( {
                                bAutoWidth: false,
                                "aoColumns": [
                                    { "bSortable": false },
                                    null, null,null, null, null,
                                    { "bSortable": false }
                                ]


                                //,
                                //"sScrollY": "200px",
                                //"bPaginate": false,

                                //"sScrollX": "100%",
                                //"sScrollXInner": "120%",
                                //"bScrollCollapse": true,
                                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                //"iDisplayLength": 50
                            } );



            $(document).on('click', 'th input:checkbox' , function(){
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function(){
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

                if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                return 'left';
            }

        })
    </script>
--}}
-->
@stop
