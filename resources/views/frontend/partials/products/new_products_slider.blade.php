@inject('productsProvider','App\ViewDataProviders\ProductsDataProvider')
<h3>Новинки</h3>
<div class="slider new_product autoplay responsive" data-show="new">

    @foreach($productsProvider->newProducts as $product)

        @include('frontend.partials.products.product_template')

    @endforeach

</div>