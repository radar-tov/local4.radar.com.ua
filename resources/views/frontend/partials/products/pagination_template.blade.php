{{--{!! with(new \App\Services\CustomPagination($products, 'default'))->render() !!}--}}
{!! $products->links('frontend.partials.products.pagination') !!}