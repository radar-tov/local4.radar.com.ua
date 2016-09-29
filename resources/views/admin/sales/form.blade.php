@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('usersProvider', 'App\ViewDataProviders\UsersDataProvider')
@inject('categories', 'App\ViewDataProviders\CategoriesDataProvider')



<div class="col-lg-5">
    <div class="form-group">
        {!! Form::label('title','Заголовок') !!}
        {!! Form::text('title',$value = null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="col-sm-2">

    <label for="discount">Скидка</label>
    <div class="input-group">
    <span class="input-group-addon">
        <i class="fa  bigger-110">%</i>
    </span>
        {!! Form::text('discount', $value = null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="col-xs-2">
     <div class="form-group">
		{!! Form::label('is_active', 'Акция активна?') !!}
		{!! Form::select('is_active', ['Нет', 'Да'], $selected = null, ['class' => 'form-control']) !!}
	</div>
</div>


<div class="col-xs-3">
    <label for="date">Дата проведения акции</label>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-calendar bigger-110"></i>
        </span>
        <input class="form-control" type="text" name="date" id="date" value="{{ isset($sale) ? getFormattedDateForInput($sale) : null }}">
    </div>
</div>

<div class="col-xs-12">
    <label for="groups[]">
        Укажите группы покупателей, для которых будет дейстовать данная акция
        <br/>
        <small style="color:grey">Если не указано ни одной группы, акция будет действовать для всех пользователей</small>
    </label>
    {!! Form::select('groups[]', $usersProvider->getCustomersGroupsList()->all(),
        $selected = isset($sale->id) ? $usersProvider->getAttachedGroupsList($sale->id) : null,
        [
        'class' => 'form-control chosen-select ', 'multiple', 'name' => 'groups[]',
        'form-field-select-4', 'data-placeholder' => 'Группы покупателей'
        ]) !!}
</div>

<div class="col-xs-12">
    <br/><hr/>
</div>
<div id="sale">

    {{--<pre>--}}

        {{--@{{ $data.options | json }}--}}
    {{--</pre>--}}
    <div class="col-xs-12">

        {{--<label for="groups[]">--}}
            {{--Укажите категории, на который будет распространяться скидка--}}
            {{--<br/>--}}
            {{--<small style="color:grey">После сохранения к товарам этих категорий будет применена акция</small>--}}
        {{--</label>--}}
        {{--{!! Form::select('groups[]', $categoriesProvider->getCategoriesList()->all(),--}}
            {{--$selected = isset($sale->id) ? $usersProvider->getAttachedGroupsList($sale->id) : null,--}}
            {{--[--}}
            {{--'class' => 'form-control chosen-select ', 'multiple', 'name' => 'groups[]',--}}
            {{--'form-field-select-4', 'data-placeholder' => 'Группы покупателей'--}}
            {{--]) !!}--}}
        {{--<br/>--}}



        <h4 v-if="relOptions.selected.length > 0">Товары включенные в акцию</h4>
        <h4 v-if="relOptions.selected.length == 0">В эту акцию не входит ни один продукт</h4>
        <input type="hidden" v-model="selectedProductsIds" name="selectedProductsIds"/>
        <input type="hidden" v-model="token" value="{{ csrf_token() }}"/>
        <input type="hidden" v-model="saleId", value="{{ isset($sale) ? $sale->id : null }}"/>
        {{--<div class="well clearfix"  v-if="relOptions.selected.length > 0">
            <div class="col-md-4">
                {!! Form::select('_category', [0 => 'Все категории'] + $categoriesProvider->getCategoriesList()->all(), $selected = null,
                    ['class' => 'form-control', 'v-model' => 'options.category', 'v-on' => 'change: getRelatedProducts()']) !!}
            </div>
            <div class="col-md-4">
                --}}{{--<span>Показывать по</span>--}}{{--
                {!! Form::select('_paginate', [
                            3 => 3,
                            20 => 'Показывать по 20 продуктов',
                            50 => 'По 50 продуктов',
                            100 => 'По 100 продуктов'
                          ], $selected = null,
                 ['class' => 'form-control', 'v-model' => 'options.paginate', 'v-on' => 'change: getRelatedProducts()']) !!}
            </div>
            <div class="col-md-4 pull-right">
                {!! Form::text('search', $value = null,
                 ['class' => 'form-control','placeholder' => 'Поиск', 'v-model' => 'options.search', 'v-on' => 'input: getRelatedProducts()']) !!}
            </div>
        </div>--}}
        <table class="table table-hover pr-table" v-if="relOptions.selected.length > 0">
            <tr>
                <th class="mini-thumb center">Миниатюра</th>
                <th>Название продукта</th>
                <th>Артикул</th>
                <th>Цена</th>
                <th class="options">Удалить</th>
            </tr>
            <tr v-repeat="relProduct: relOptions.selected">
                <td class="center mini-thumb center">
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

        <nav v-if="relOptions.selected.length > 0">
            <ul class="pager">
                <li class="previous @{{ pagination.currentPage == 1 ? 'disabled' : '' }}">
                    <a href="#" v-on="click: _prevPage($event)"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                </li>
                <li>
                    @{{ pagination.currentPage }} / @{{ pagination.lastPage  }}
                </li>
                <li class="next @{{ pagination.currentPage ==  pagination.lastPage ? 'disabled' : '' }}" >
                    <a href="#" v-on="click: _nextPage($event)">Следующая <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </nav>

        <hr/>
        <h4>Список всех товаров</h4>
        <label>
            Применить акцию ко всем товарам
            <input type="checkbox" name="all" value="1"/>
        </label>
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
                    <a href="#" v-on="click: prevPage($event, productsList.products)"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                </li>
                <li>
                    @{{ productsList.pagination.currentPage }} / @{{ productsList.pagination.lastPage  }}
                </li>
                <li class="next @{{ productsList.pagination.currentPage ==  productsList.pagination.lastPage ? 'disabled' : '' }}" >
                    <a href="#" v-on="click: nextPage($event, productsList.products)">Следующая <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>


<script src="/admin/assets/js/uncompressed/date-time/moment.js"></script>
<script src="/admin/assets/js/uncompressed/date-time/daterangepicker.js"></script>
<script src="/admin/assets/js/uncompressed/date-time/bootstrap-datepicker.js"></script>


{{--@section('top-scripts')--}}
    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{!! asset('admin/assets/css/jquery-ui.custom.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/chosen.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/datepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap-timepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/daterangepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap-datetimepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/colorpicker.css') !!}" />




{{--@stop--}}

@section('bottom-scripts')

    <script src="/admin/assets/js/chosen.jquery.min.js"></script>

    <script>
        moment.lang('fr', {
            months : "январь_февраль_март_апрель_март_июнь_июль_август_сентябрь_октябрь_ноябрь_декабрь".split("_"),
            monthsShort : "янв._фев._март_апр._май_июнь._июль_авг._сент_окт._нояб._дек.".split("_"),
            weekdays : "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
            weekdaysShort : "пн._вт._ср._чт._пт._сб._вс.".split("_"),
            weekdaysMin : "Пн._Вт._Ср._Чт._Пт._Сб._Вс.".split("_"),
            longDateFormat : {
                LT : "HH:mm",
                L : "DD-MM-YYYY",
                LL : "DD-MM-YYYY",
                LLL : "DD-MM-YYYY",
                LLLL : "DD-MM-YYYY"
            },
            week : {
                dow : 1, // Monday is the first day of the week.
                doy : 4  // The week that contains Jan 4th is the first week of the year.
            }
        });

        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('#date').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            'format': 'DD.MM.YYYY',
            'separator':' - ',
            locale: {
                applyLabel: 'ОК',
                cancelLabel: 'Отмена',
                fromLabel: 'От',
                toLabel: 'До',
                weekLabel: 'Неделя',
                customRangeLabel: 'тест',
                daysOfWeek: moment()._lang._weekdaysMin,
                monthNames: moment()._lang._monthsShort,
                firstDay: 0
            }
        })
        .prev().on(ace.click_event, function(){
            $(this).next().focus();
        });



//        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true});
            //resize the chosen on window resize

            $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            });


            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });
//        }



    </script>

    <script>

        new Vue({

            el: "#sale",
            ready:function(){
                var vue = this;
                this.getRelatedProducts();
                setTimeout(function(){
                    vue.getProducts();
                }, 1000)

            },

            data: {
                saleId: null,
                images: [],
                disabled: false,
                productId: null,
                category: null,
                token: null,
                productsList:{
                    products:{},
                    pagination:{
                        currentPage: {},
                        lastPage: {},
                        pageToGet: 1
                    }
                },
                relOptions:{
                    category:0,
                    paginate: 20,
                    search: null,
                    selected: []
                },
                options: {
                    category:0,
                    paginate: 20,
                    search: null,
                    selected: []
                },

                pagination:{
                    currentPage: {},
                    lastPage: {},
                    pageToGet: 1
                },

                selectedProductsIds: []
            },

            methods: {

                getRelatedProducts: function(){
                    var vue = this;
                    $.post('/dashboard/product-actions/getProductsBySale', {
                        _token: this.token,
                        saleId: this.saleId,
                        categoryId: vue.options.category,
                        paginate: vue.options.paginate,
                        search: vue.options.search,
                        selected: vue.selectedProductsIds,
                        page: vue.pagination.pageToGet
                    })
                    .done(function(response){
                        if(response.paginatedProducts.data.length)

                            vue.relOptions.selected = response.paginatedProducts.data;

                            if(vue.selectedProductsIds.length == 0)
                                vue.selectedProductsIds = response.productsIds;

                            vue.pagination.currentPage = response.paginatedProducts.current_page;
                            vue.pagination.lastPage = response.paginatedProducts.last_page;
                            if(vue.pagination.lastPage < vue.pagination.pageToGet) {
                                vue.pagination.pageToGet = vue.pagination.lastPage;
                                vue.getRelatedProducts()
                            }
                    })
                },


                getProducts: function(){
                    var vue = this;
//                    console.log(this.selectedProductsIds);
                    $.ajax({
                        dataType: "json",
                        method: "POST",
                        url: '/dashboard/product-actions/getProductsForSale',
                        cache: false,
                        data: {
                            categoryId: vue.relOptions.category,
                            paginate: vue.relOptions.paginate,
                            search: vue.relOptions.search,
                            selected: vue.selectedProductsIds,
                            page: vue.productsList.pagination.pageToGet,
                            saleId: vue.saleId,
                            _token: vue.token
                        },
                        success: function (response) {
                            vue.productsList.products = response.data;
                            vue.productsList.pagination.currentPage = response.current_page;
                            vue.productsList.pagination.lastPage = response.last_page;
                            if(vue.productsList.pagination.lastPage < vue.productsList.pagination.pageToGet) {
                                vue.productsList.pagination.pageToGet = vue.productsList.pagination.lastPage;
                                vue.getProducts()
                            }
                        }
                    });
                },

                nextPage: function(event){
                    event.preventDefault();
                    if(this.productsList.pagination.currentPage != this.productsList.pagination.lastPage){
                        this.productsList.pagination.pageToGet = this.productsList.pagination.currentPage + 1;
                        this.getProducts();
                    }
                },




                prevPage: function(event){
                    event.preventDefault();
                    if(this.productsList.pagination.currentPage != 1) {
                        this.productsList.pagination.pageToGet = this.productsList.pagination.currentPage - 1;
                        this.getProducts();
                    }
                },

                _nextPage: function(event){
                    event.preventDefault();
                    if(this.pagination.currentPage != this.pagination.lastPage){
                        this.pagination.pageToGet = this.pagination.currentPage + 1;
                        this.getRelatedProducts();
                    }
                },

                _prevPage: function(event){
                    event.preventDefault();
                    if(this.pagination.currentPage != 1) {
                        this.pagination.pageToGet = this.pagination.currentPage - 1;
                        this.getRelatedProducts();
                    }
                },

                addProduct: function(event, relProduct){
                    event.preventDefault();
                    this.productsList.products.$remove(relProduct)
                    this.relOptions.selected.push(relProduct)
                    this.selectedProductsIds.push(relProduct.id);
                    this.getProducts();
//                    this.syncProducts();
                },

                removeProduct: function(event, relProduct){
                    event.preventDefault();
                    this.relOptions.selected.$remove(relProduct);
                    this.selectedProductsIds.$remove(relProduct.id);
                    this.getRelatedProducts();
                    this.getProducts();
//                    this.syncProducts();
                },

                getSelectedProductsIds: function(){
                    var productsIds = [];
//                    console.log(this.relOptions.selected);
                    this.relOptions.selected.forEach(function(product){
                        productsIds.push(product.id);
                    });

//                    console.log(productsIds)
                    return productsIds;
                },

                syncProducts: function(){
//                    this.selectedProductsIds = this.getSelectedProductsIds();
                }

            }

        });

    </script>



@endsection