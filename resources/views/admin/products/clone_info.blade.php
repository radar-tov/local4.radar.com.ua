@if(isset($product))

    @if($product->clone_of)
        <div class="alert alert-warning">
            <h4>
                Данный товар является клоном.
                <a  href="{{ route('dashboard.products.edit', $product->clone_of) }}">
                    Перейти к оригиналу
                </a>
            </h4>
        </div>
    @endif

    @if($product->clones()->count() > 0)
        <div class="alert alert-warning">
            <h4>Этот продукт имеет {{ $product->clones()->count() }} клон(ов)</h4>
            <a href="/dashboard/products?q={{ $product->article }}">Открыть клоны</a>
        </div>
    @endif

@endif