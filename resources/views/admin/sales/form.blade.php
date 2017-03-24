@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('usersProvider', 'App\ViewDataProviders\UsersDataProvider')
@inject('categories', 'App\ViewDataProviders\CategoriesDataProvider')

@section('top-scripts')
    <link rel="stylesheet" href="{!! asset('admin/assets/css/jquery-ui.custom.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/chosen.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/datepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap-timepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/daterangepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap-datetimepicker.css') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/assets/css/colorpicker.css') !!}" />
@endsection


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
<div id="saleVue">

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



        <h4 v-if="relOptions.selected.length > 0">Товары включенные в акцию @{{ relOptions.selected.length }} шт</h4>
        <h4 v-if="relOptions.selected.length == 0">В эту акцию не входит ни один продукт</h4>
        <input type="hidden" v-model="selectedProductsIds" name="selectedProductsIds"/>
        <input type="hidden" id="token" value="{{ csrf_token() }}"/>
        <input type="hidden" id="saleId" value="{{ isset($sale) ? $sale->id : null }}"/>
        <div class="well clearfix">
            <div class="col-md-4">
                <select class="form-control" form="form-data" name="_category" v-model="options.category" v-on:change.stop="getRelatedProducts()">
                    <option value="0">Все категории</option>
                    @foreach($categories->getListForNav()->all() as $item)
                        <optgroup label="{{ $item->title }}">
                            @if(count($item->children))
                                @foreach($item->children as $child)
                                    <option value="{{ $child->id }}">{{ $child->title }}</option>
                                @endforeach
                            @endif
                        </optgroup>
                    @endforeach
                </select>


                {{--{!! Form::select('_category', [0 => 'Все категории'] + $categoriesProvider->getCategoriesList()->all(), $selected = null,
                    ['class' => 'form-control', 'v-model' => 'options.category', 'v-on:change.stop' => 'getRelatedProducts()']) !!}--}}
            </div>
            <div class="col-md-4">
                {{--<span>Показывать по</span>--}}
                {!! Form::select('_paginate', [
                            3 => 3,
                            20 => 'Показывать по 20 продуктов',
                            50 => 'По 50 продуктов',
                            100 => 'По 100 продуктов'
                          ], $selected = null,
                 ['class' => 'form-control', 'v-model' => 'options.paginate', 'v-on:change.stop' => 'getRelatedProducts()']) !!}
            </div>
            <div class="col-md-4 pull-right">
                {!! Form::text('search', $value = null,
                 ['class' => 'form-control','placeholder' => 'Поиск', 'v-model' => 'options.search', 'v-on:input.stop' => 'getRelatedProducts()']) !!}
            </div>
        </div>
        <table class="table table-hover pr-table" v-if="relOptions.selected.length > 0">
            <tr>
                <th class="mini-thumb center">Миниатюра</th>
                <th>Название продукта</th>
                <th>Артикул</th>
                <th>Цена</th>
                <th class="options">Удалить</th>
            </tr>
            <tr v-for="(relProduct, index) in relOptions.selected">
                <td class="center mini-thumb center">
                    <img v-bind:src="relProduct.thumbnail[0].path" v-if="!!relProduct.thumbnail[0]" class="mini-thumb"/>
                    <img src="/frontend/images/default.png" v-if="!relProduct.thumbnail[0]" class="mini-thumb"/>
                </td>
                <td>
                    @{{ relProduct.title }} <br/>
                    <small style="color: #808080">(@{{ relProduct.category.title }})</small>
                </td>
                <td> @{{ relProduct.article }}</td>
                <td> @{{ relProduct.price }}</td>
                <td class="options">
                    <a href="#" style="font-size: 18px; color:indianred" v-on:click.stop="removeProduct(relProduct, index)"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
        </table>

        <nav v-if="relOptions.selected.length > 0">
            <ul class="pager">
                <li class="previous" v-bind:class="pagination.currentPage == 1 ? 'disabled' : ''">
                    <a href="#" v-on:click.stop="_prevPage()"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                </li>
                <li>
                    @{{ pagination.currentPage }} / @{{ pagination.lastPage  }}
                </li>
                <li class="next" v-bind:class="pagination.currentPage ==  pagination.lastPage ? 'disabled' : ''">
                    <a href="#" v-on:click.stop="_nextPage()">Следующая <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </nav>

        <hr/>
        <h4>Список всех товаров @{{ productsList.pagination.total }} шт</h4>
        <label>
            Применить акцию ко всем товарам
            <input type="checkbox" name="all" value="1"/>
        </label>
        <div class="well clearfix">
            <div class="col-md-4">
                <select class="form-control" form="form-data" name="_category" v-model="relOptions.category" v-on:change.stop="getProducts()">
                    <option value="0">Все категории</option>
                    @foreach($categories->getListForNav()->all() as $item)
                        <optgroup label="{{ $item->title }}">
                            @if(count($item->children))
                                @foreach($item->children as $child)
                                    <option value="{{ $child->id }}">{{ $child->title }}</option>
                                @endforeach
                            @endif
                        </optgroup>
                    @endforeach
                </select>



                {{--{!! Form::select('_category', [0 => 'Все категории'] + $categoriesProvider->getCategoriesList()->all(), $selected = null,
                    ['class' => 'form-control', 'v-model' => 'relOptions.category', 'v-on:change.stop' => 'getProducts()']) !!}--}}
            </div>
            <div class="col-md-4">
                {{--<span>Показывать по</span>--}}
                {!! Form::select('_paginate', [
                            20 => 'Показывать по 20 продуктов',
                            50 => 'По 50 продуктов',
                            100 => 'По 100 продуктов'
                          ], $selected = null,
                 ['class' => 'form-control', 'v-model' => 'relOptions.paginate', 'v-on:change.stop' => 'getProducts()']) !!}
            </div>
            <div class="col-md-4 pull-right">
                {!! Form::text('search', $value = null,
                 ['class' => 'form-control','placeholder' => 'Поиск', 'v-model' => 'relOptions.search', 'v-on:input.stop' => 'getProducts()']) !!}
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
                    <a href="#" style="font-size: 18px" v-on:click.stop="addProduct(relProduct, index)"><i class="fa fa-plus"></i></a>
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
                    <a href="#" v-on:click.stop="prevPage(productsList.products)"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                </li>
                <li>
                    @{{ productsList.pagination.currentPage }} / @{{ productsList.pagination.lastPage  }}
                </li>
                <li class="next" v-bind:class="productsList.pagination.currentPage ==  productsList.pagination.lastPage ? 'disabled' : ''">
                    <a href="#" v-on:click.stop="nextPage(productsList.products)">Следующая <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>


@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/uncompressed/date-time/moment.js') !!}"></script>
    <script src="{!! url('admin/assets/js/uncompressed/date-time/daterangepicker.js') !!}"></script>
    <script src="{!! url('admin/assets/js/uncompressed/date-time/bootstrap-datepicker.js') !!}"></script>
    <script src="{!! url('admin/assets/js/chosen.jquery.min.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="{!! url('admin/assets/js/sale.js') !!}"></script>
@endsection