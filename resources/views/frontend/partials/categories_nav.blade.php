@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
<div class="hide-on-med-and-down">
    <h6 style="color: #fd7903;">Каталог товаров</h6>
    <ul class="side-bar card">
        @foreach($categoriesProvider->getListForNav() as $category)
            <li @if(count($category->children))class="havechild"@endif>
                <span class="link"><a href="/{{ $category->slug }}">{{ $category->title }}</a></span>

                @if(count($category->children))
                    <div class="sub-wrapper">
                    <div class="col l5">
                    <ul class="sub-categories">
                        @foreach($category->children as $child)
                            <li><a href="/{{ $category->slug }}/{{ $child->slug }}"> {{ $child->title }}</a></li>
                        @endforeach
                    </ul>
                    </div>
                    <div class="col l7">
                        <img src="/{{ $category->thumbnail }}"/>
                        </div>
                    </div>
                @endif
            </li>

        @endforeach

    </ul>
    </div>
