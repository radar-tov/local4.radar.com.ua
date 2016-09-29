<aside class="col s12 l3 hide-on-med-and-down">

    @if(Request::has('filter'))
        @include('frontend.partials.filters')
    @endif

    @include('frontend.partials.categories_nav')

</aside>