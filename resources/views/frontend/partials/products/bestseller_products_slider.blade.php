@inject('productsProvider', 'App\ViewDataProviders\ProductsDataProvider')



<h3>Хиты продаж</h3>
<div class="slider autoplay responsive" data-show="bestSales">

    @foreach($productsProvider->bestsellerProducts as $product)

        @include('frontend.partials.products.product_template')

    @endforeach

</div>
