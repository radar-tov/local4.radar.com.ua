@if(count($products))

    @foreach($products as $product)

        @include('frontend.partials.products.product_template')

    @endforeach

@else

    <b>К сожалению продуктов по таким критериям не найдено</b>
    <div class="clearfix"></div>

@endif