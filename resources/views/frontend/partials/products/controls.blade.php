<div class="col s12 control no-padding" id="catalog">
    <div class="row">
    <div class="col s6 no-padding">
        <span class="left sort">Сортировать:</span>
        <select class="left orderBy" form="filter" name="orderBy">
            <option value="price:asc">Сначала дешевые</option>
            <option value="price:desc">Сначала дорогие</option>
            <option value="id:desc" {{ Request::is('new') ? 'selected' : '' }}>Сначала новые</option>
            <option value="id:asc">Сначала старые</option>
            <option value="title:asc">По названию</option>
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