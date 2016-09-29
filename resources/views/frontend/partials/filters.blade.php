@inject('productsProvider', 'App\ViewDataProviders\ProductsDataProvider')
@if(isset($category))
<h3>Фильтр товаров</h3>
<form class="col s12 card" id="filter">
    <input type="hidden" value="0" name="isDirty" id="isDirty"/>
    <input type="hidden" value="{{ $category->id }}" name="categoryId"/>
    {!! csrf_field() !!}

    @foreach($category->filtersWithRelevantValues($category->id)->get() as $filter)

        <div class="filter-group">
            <div class="filter-heading">
                <div class="ft-heading-inner">
                    <span>{{ $filter->title }}</span>
                </div>
            </div>
            <div class="filter-content">
                <ul class="filter-select no-margin">
                    @foreach($filter->values as $value)
                        <li class="filter-option">
                            <input id="filter-option-{{ $value->id }}" type="checkbox" name="filters[{{ $filter->id }}][]" value="{{ $value->id }}">
                            <label for="filter-option-{{ $value->id }}" class="filter-option-label">
                                <span class="ft-opt-name">{{ $value->value }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

    @endforeach

    <div class="filter-group">
        <div class="filter-heading">
            <div class="ft-heading-inner">
                <span>Цена</span>
            </div>
        </div>
         <div class="filter-content">
		 	<div id="form">
				<input type="text" id="range" name="price" value="" name="range">
			</div>

        </div>

    </div>

</form>
@endif