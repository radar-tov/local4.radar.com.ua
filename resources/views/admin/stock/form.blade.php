@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')

<div class="col-lg-12">
    <div class="form-group">
        {!! Form::label('title','Заголовок') !!}
        {!! Form::text('title',$value = null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('active','Акция активна?') !!}
        {!! Form::select('active', $val = ['Нет', 'Да'], $selected = null, ['class'=>'form-control']) !!}
    </div>


    <div id="stock">
        <div class="col-xs-12">
            <div class="_cover" v-el="cover"></div>
            <h4 v-if="relOptions.selected.length > 0">Товары акции товары</h4>
            <h4 v-if="relOptions.selected.length == 0">Для этой акции не указано ни одного товара</h4>
            <input type="hidden" v-model="selectedProductsIds" name="selectedProductsIds"/>
            <input type="hidden" v-model="stockId" value="{{ $stock->id or 0 }}"/>

            {{--<pre>--}}
                {{--@{{ $data.relOptions.selected | json }}--}}
            {{--</pre>--}}

            <table class="table table-hover pr-table" v-if="relOptions.selected.length > 0">
                <tr>
                    <th class="mini-thumb center">Миниатюра</th>
                    <th>Название продукта</th>
                    <th>Артикул</th>
                    <th>Основной</th>
                    <th>Цена</th>
                    <th>Акционная цена</th>
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
                    <td>

                        <input type="radio"
                               name="products[@{{ relProduct.id }}][is_main]"
                               value="1"
                               v-on="change:setMain($event)"
                               class="rad"
                               v-attr="checked: relProduct.pivot.is_main == 1"
                               >
                    </td>
                    <td>
                        @{{ relProduct.price }}
                    </td>
                    <td>
                        <input type="text"
                               class="form-control"
                               placeholder="Акционная цена"
                               v-on="input: setPrice($event, relProduct)"
                               name="products[@{{ relProduct.id }}][stock_price]"
                               value="@{{ relProduct.pivot.stock_price ? relProduct.pivot.stock_price : 0 }}">
                    </td>
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

</div>

@section('bottom-scripts')
    <script src="{{ url('admin/assets/js/stock_products.js') }}"></script>
@endsection