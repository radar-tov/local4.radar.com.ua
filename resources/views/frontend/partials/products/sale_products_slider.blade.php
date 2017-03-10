@inject('productsProvider', 'App\ViewDataProviders\ProductsDataProvider')
<h3>Спецпредложения</h3>
<div class="slider sale_product related autoplay responsive" data-show="sale">
    @foreach($productsProvider->salesProducts as $product)
        @include('frontend.partials.products.product_template')
    @endforeach
</div>