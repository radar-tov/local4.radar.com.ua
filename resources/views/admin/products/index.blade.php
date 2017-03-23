@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
@inject('cenaGrupsProvider', 'App\ViewDataProviders\CenaGrupsDataProvider')

@extends('admin.app')

@section('top-scripts')

@stop

@section('page-title')
    Товары
@stop

@section('page-nav')


@stop


@section('content')

    <div class="row" id="productsVue">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="col-xs-6">
            <a href="{!! route('products.create') !!}" class="btn btn-sm btn-primary" title="Добавить товар"
               target="_blank">
                <i class="ace-icon fa fa-plus"></i> Добавить товар
            </a>
        </div>

        <div class="col-xs-6 ">
            <a href="{!! route('products.trash') !!}" class="btn btn-sm btn-danger pull-right"
               title="Корзина">
                <i class="ace-icon fa  fa-trash"></i> Корзина
            </a>
        </div>

        <div class="col-xs-12">
            <br/>
            <div class="well" style="min-height: 170px; padding: 19px 0 40px 0">
                <div class="row">
                    <div v-show="!selectedProductsIds.length">

                        <form action="#" id="filterForm" onsubmit="return false">

                            <div class="col-xs-2">
                                <select name="sortBy" class="form-control" v-bind:class="{marc : params.sortBy != 'id'}"
                                        v-model="params.sortBy">
                                    <option value="id">Сортировка по умолчанию</option>
                                    <option value="title">По названию</option>
                                    <option value="price">По цене</option>
                                    <option value="out_price">По цене со скидкой</option>
                                    <option value="base_price">По базовой цене</option>
                                    <option value="discount">По скидке</option>
                                    <option value="nacenka">По наценке</option>
                                    <option value="name">По AdminName</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="sortByPor" class="form-control"
                                        v-bind:class="{marc : params.sortByPor != 'ASC'}" v-model="params.sortByPor">
                                    <option value="ASC">По возрастанию</option>
                                    <option value="DESC">По убыванию</option>
                                </select>
                            </div>

                            <div class="col-xs-2">

                                <select name="categoryId" class="form-control"
                                        v-bind:class="{marc : params.categoryId != 0}" v-model="params.categoryId">
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

                            </div>

                            <div class="col-xs-2">
                                <select name="brandID" class="form-control" v-bind:class="{marc : params.brandID != 0}"
                                        v-model="params.brandID">
                                    <option value="0">Все бренды</option>
                                    @foreach($brandsProvider->getList()->all() as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="cenagrupID" class="form-control"
                                        v-bind:class="{marc : params.cenagrupID != 0}" v-model="params.cenagrupID">
                                    <option value="0">Все ценовые группы</option>
                                    @foreach($cenaGrupsProvider->getList()->all() as  $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="discount" class="form-control"
                                        v-bind:class="{marc : params.discount != 0}"
                                        v-model="params.discount">
                                    <option value="0">Всё (скидки, наценки, без них)</option>
                                    <option value="1">Без скидки</option>
                                    <option value="2">Со скидкой</option>
                                </select>
                            </div>

                            <div style="padding-top: 50px">

                                <div class="col-xs-2">
                                    <select name="paginate" class="form-control"
                                            v-bind:class="{marc : params.paginate != 20}" v-model="params.paginate">
                                        <option value="20">Показывать по 20 продуктов</option>
                                        <option value="30">По 30 продуктов</option>
                                        <option value="50">По 50 продуктов</option>
                                        <option value="100">По 100 продуктов</option>
                                        <option value="200">По 200 продуктов</option>
                                    </select>
                                </div>

                                <div class="col-xs-2">
                                    <select name="status" class="form-control"
                                            v-bind:class="{marc : params.status != 'active.1'}"
                                            v-model="params.status">
                                        <option value="active.1">Показаные на сайте</option>
                                        <option value="active.0">Не показаные на сайте</option>
                                        <option value="available.1">В наличии</option>
                                        <option value="available.0">Нет в наличии</option>
                                        <option value="sitemap.1">Показаные в Sitemap</option>
                                        <option value="sitemap.0">Не показаные в Sitemap</option>
                                        <option value="yandex.1">Показаные в Yandex</option>
                                        <option value="yandex.0">Не показаные в Yandex</option>
                                        <option value="is_new.1">Новинки</option>
                                        <option value="is_bestseller.1">Хит продаж</option>
                                    </select>
                                </div>

                                <div class="col-xs-3">
                                    <input name="search" type="text"
                                           class="form-control" v-bind:class="{marc : params.search != ''}"
                                           placeholder="Поиск"
                                           value="{{ Request::get('q') }}" v-model="params.search"
                                           v-on:keyup.enter.stop="filterProducts()">
                                </div>

                                <div class="col-xs-1">
                                    <i class="fa fa-search-minus" v-on:click="delSearch()" style="cursor: pointer"></i>
                                </div>
                                <div class="col-xs-1">
                                    <a href="{{ url('dashboard/price/download') }}" target="_blank">
                                        <i class="fa fa-download"></i> Прайс
                                    </a>
                                </div>
                            </div>

                            <template v-if="params.categoryId != 0">

                                <div class="clearfix"></div>

                                <input type="hidden" value="0" name="isDirty" id="isDirty"/>

                                <div id="panel" style="display: none;">
                                    <div v-for="filter in filtersList" class="files">
                                        <div class="filter-group">
                                            <div class="filter-heading">
                                                <div class="ft-heading-inner">
                                                    <span>@{{ filter.title }}</span>
                                                </div>
                                            </div>
                                            <div class="filter-content">
                                                <ul class="filter-select no-margin">
                                                    <li class="filter-option" v-for="value in filter.values">
                                                        <input v-bind:id="'filter-option-' + value.id"
                                                               v-bind:name="'filters[' +  filter.id + '][]'"
                                                               v-bind:value="value.id"
                                                               v-bind:checked="value.checked"
                                                               class="filter"
                                                               type="checkbox"
                                                        >
                                                        <label v-bind:for="'filter-option-' + value.id"
                                                               class="filter-option-label">
                                                            <span class="ft-opt-name">@{{ value.value }}</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </template>

                            <div class="clearfix"></div>

                        </form>

                    </div>

                    <div class="actionform" v-if="selectedProductsIds.length">

                        <form action="#" id="actionForm">

                            <div class="col-xs-8">
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
                                ], $selected = null, ['class' => 'form-control', 'v-model' => 'selectedAction']) !!}
                            </div>
                            <div class="col-xs-4">
                                {!! Form::submit('Применить к выбранным', ['class' => 'btn btn-info btn-sm ', 'v-on:click.prevent' => 'fireAction']) !!}
                            </div>

                        </form>

                    </div>
                    <br>
                    <div class="col-xs-12" v-if="!selectedProductsIds.length">

                        <div class="col-xs-8" style="padding-bottom: 20px">
                            <nav v-if="products.productList.length > 0 && !selectedProductsIds.length" v-show="!loader">
                                <ul class="pager">
                                    <li v-bind:class="{disabled : products.pagination.currentPage == 1}"
                                        v-on:click="prevPage()">
                                        <a href="#"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                                    </li>
                                    <li>
                                <span>Показано @{{ products.productList.length }}
                                    из @{{ products.pagination.total }}</span>
                                    </li>
                                    <li>
                                <span>Страница @{{ products.pagination.pageToGet }}
                                    из @{{ products.pagination.lastPage }}</span>
                                    </li>
                                    <li
                                            v-bind:class="{disabled : products.pagination.currentPage == products.pagination.lastPage}"
                                            v-on:click="nextPage()">
                                        <a href="#">Следующая <span aria-hidden="true">&rarr;</span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-xs-1 pull-right">
                            <button class="btn btn-sm btn-danger pull-right"
                                    v-on:click.prevent="filterProducts()" v-on:keyup.enter.prevent="filterProducts()">
                                Применить
                            </button>
                        </div>
                        <div class="col-xs-2 pull-right">
                            <button class="btn btn-sm btn-primary" v-on:click.prevent="delFilters()"> Сбросить фильтры </button>
                        </div>
                        <div class="col-xs-1 pull-right" v-if="params.categoryId != 0">
                            <button class="btn btn-sm btn-primary" v-on:click.prevent="showPanel()"> Фильтры </button>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xs-12">
            <div id="errors"></div>

            <div v-show="loader" align="center"><img src='/frontend/images/loading.gif'></div>

            <table id="sample-table-2" class="table table-bordered table-hover" v-show="!loader">
                <thead>
                <tr>
                    <th class="options">
                        <input type="checkbox" id="mainCheckbox" v-on:change="markProducts($event)"/>
                    </th>
                    <th>ID</th>
                    <th>Артикул</th>
                    <th>Название</th>
                    <th>Базовая</th>
                    <th>Розница</th>
                    <th>Монт</th>
                    <th>Опт</th>
                    <th>Категория</th>
                    <th colspan="4" class="options">Опции</th>
                </tr>
                </thead>

                <tbody>

                <tr v-for="product in products.productList">

                    <td class="options middle">
                        <input type="checkbox" name="selected[]" class="productSel"
                               v-bind:value="product.id" v-on:change="selectProduct($event)"/>
                    </td>
                    <td class="middle">
                        @{{ product.id }}
                    </td>
                    <td class="middle">
                        @{{ product.article }}
                    </td>
                    <td class="p-title middle">
                        <div class="bs-label-container">
                            <i class="fa fa-eye-slash red" v-show="product.active == 0"></i>
                            <i class="fa fa-minus red" v-show="product.available == 0"></i>
                            <i class="fa fa-plus green" v-show="product.available == 1"></i>
                            <i class="fa fa-phone red" v-show="product.available == 2"></i>
                            <i class="fa fa-yc red" v-show="product.yandex == 0"></i>
                            <i class="fa fa-yc green" v-show="product.yandex == 1"></i>
                            <i class="fa fa-sitemap red" v-show="product.sitemap == 0"></i>
                            <i class="fa fa-sitemap green" v-show="product.sitemap == 1"></i>
                            <span class="label label-success bs-label"
                                  v-show="product.is_bestseller > 0">Хит продаж</span>
                            <span class="label label-danger bs-label" v-show="product.is_new > 0">Новинка</span>
                        </div>
                        <img v-bind:src="product.thumbnail[0].path " v-if="!!product.thumbnail[0]" class="mini-thumb"/>
                        <a style="color: #000000" target="_blank"
                           v-bind:href="'/dashboard/products/'+ product.id + '/edit'" v-if="product.name != ''">
                            @{{ product.name }}
                        </a>
                        <a style="color: #000000" target="_blank"
                           v-bind:href="'/dashboard/products/'+ product.id + '/edit'" v-if="product.name == ''">
                            @{{ product.title }}
                        </a>
                        <small v-show="product.clone_of > 0" style="color:indianred">(копия)</small>
                    </td>
                    <td class="middle">
                        <span>@{{ product.base_price }}</span>
                        <span v-if="product.get_cena != null">
                            <i class="fa fa-ruble" v-show="product.get_cena.valuta == 1"></i>
                            <i class="fa fa-dollar" v-show="product.get_cena.valuta == 2"></i>
                            <i class="fa fa-euro" v-show="product.get_cena.valuta == 3"></i>
                        *@{{ product.get_cena.curs }}=@{{ product.price }}</span>
                    </td>
                    <td class="middle">

                        <span class="label label-sm label-success arrowed-right" v-show="product.discount > 0">
                            - @{{ product.discount }} %
                        </span>

                        <span class="label label-lg label-pink arrowed-right" v-show="product.nacenka > 0">
                            + @{{ product.nacenka }} %
                        </span>
                        @{{ product.out_price }}
                    </td>
                    <td class="middle">
                        <span class="label label-sm label-success arrowed-right" v-show="product.discount_montaj > 0">
                            - @{{ product.discount_montaj }}%
                        </span>
                        @{{ product.cena_montaj }}
                    </td>
                    <td class="middle">
                        <span class="label label-sm label-success arrowed-right" v-show="product.opt_discount > 0">
                            - @{{ product.opt_discount }}%
                        </span>
                        @{{ product.opt_price }}
                    </td>
                    <td class="middle">
                        <span>
                            <a v-bind:href="'/' + product.category.parent.slug + '/' + product.category.slug"
                               target="_blank">@{{ product.category.admin_title }}
                            </a> /
                            <a v-bind:href="'/' + product.category.parent.slug + '/' + product.category.slug + '/' + product.slug"
                               target="_blank">
                                <i class="fa fa-eye green" v-show="product.active > 0"></i>
                            </a>
                        </span>
                    </td>
                    <td class="options middle">
                        <div class="action-buttons">
                            <a class="green" target="_blank"
                               v-bind:href="'/dashboard/products/' +  product.id + '/edit'">
                                <i class="ace-icon fa fa-pencil"></i>
                            </a>
                        </div>
                    </td>
                    <td class="options middle">
                        <div class="action-buttons">
                            <a class="buy" v-bind:data-productid="product.id" onclick="return false" style="cursor: pointer">
                                <i class="ace-icon fa fa-cart-plus green"></i>
                            </a>
                        </div>
                    </td>
                    <td class="options middle">
                        <div class="action-buttons">
                            <a class="blue" v-bind:href="'/dashboard/products/copy/' + product.id" target="_blank">
                                <i class="ace-icon fa fa-copy"></i>
                            </a>
                        </div>
                    </td>
                    <td class="options middle">
                        <div class="action-buttons">
                            <a class="red" href="#" v-on:click.prevent="deleteProduct(product, $event)">
                                <i class="ace-icon fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>


                </tr>

                </tbody>

            </table>
            <p v-if="products.productList.length == 0">
                <b>Список продуктов по текущему запросу пуст</b>
            </p>
            <nav v-if="products.productList.length > 0" v-show="!loader">
                <ul class="pager">
                    <li class="previous" v-bind:class="{disabled : products.pagination.currentPage == 1}"
                        v-on:click="prevPage()">
                        <a href="#"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                    </li>
                    <li>
                        @{{ products.pagination.currentPage }} / @{{ products.pagination.lastPage  }}
                    </li>
                    <li class="next"
                        v-bind:class="{disabled : products.pagination.currentPage == products.pagination.lastPage}"
                        v-on:click="nextPage()">
                        <a href="#">Следующая <span aria-hidden="true">&rarr;</span></a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>

@stop


@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="/admin/assets/js/product/index.js"></script>
@stop