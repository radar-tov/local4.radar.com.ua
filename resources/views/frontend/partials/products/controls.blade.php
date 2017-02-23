<div class="col s12 control no-padding" id="catalog">
    <div class="row">
    <div class="col s6 no-padding">
        <span class="left sort">Сортировать:</span>
        <select class="left orderBy" form="filter" name="orderBy">
            <option value="price:asc"{{ (Session::get('orderBy.'.$subcategory->id) == 'price:asc') ? 'selected' : '' }}>Сначала недорогие</option>
            <option value="price:desc"{{ (Session::get('orderBy.'.$subcategory->id) == 'price:desc') ? 'selected' : '' }}>Сначала дорогие</option>
            <option value="id:desc" {{ (Session::get('orderBy.'.$subcategory->id) == 'id:desc') ? 'selected' : '' }}>Сначала новинки</option>
            {{--<option value="id:asc"{{ (Session::get('orderBy.'.$subcategory->id) == 'id:asc') ? 'selected' : '' }}>Сначала старые</option>--}}
            <option value="title:asc"{{ (Session::get('orderBy.'.$subcategory->id) == 'title:asc') ? 'selected' : '' }}>По названию</option>
        </select>
        
    </div>
    
    <div class="col s6 no-padding _pagination" style="position: relative">
        @if(!Request::has('filter'))
            with(new \App\Services\CustomPagination($products))->render() 
        @endif
    </div>
    </div>
    <div class="clearfix"></div>
</div>