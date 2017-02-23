@inject('productsProvider', '\App\ViewDataProviders\ProductsDataProvider')
<script>
@if($subcategory->id == 143)
var maxPrice = null;
@else
var maxPrice = Math.round({{ $productsProvider->getMaxPrice($subcategory->id) }})
@endif
@if(Session::get('price.'.$subcategory->id) != null)
arr = '{{ Session::get('price.'.$subcategory->id) }}'.split(';')
var filtrPrice = Math.round(arr[1])
@else
var filtrPrice = null
@endif
</script>