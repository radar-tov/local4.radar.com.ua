@extends('frontend.layout')

@section('seo')
    @if(isset($category->meta_title) && !empty($category->meta_title))
        <title>{{ $category->meta_title }}</title>
    @else
        <title>{{ isset($category->title) ? $category->title : $header }}</title>
    @endif

    <meta name="description" content="{{ isset($category->meta_description) ?  $category->meta_description : ''}}"/>
    <meta name="keywords" content="{{ isset($category->meta_keywords) ?  $category->meta_keywords : ''}}"/>
@endsection

@section('content')
               


<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                {{--<li><a href="index.html">Родитель</a></li>--}}
                <li class="active">{{ isset($category->title) ? $category->title : $header }}</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <!--Simple Menu-->
    <div class="container">
        <div class="row">

            @include('frontend.partials.sidebar')

            <div class="col s12 m12 l9 catalog ">
                <h3>{{ isset($category->title) ? $category->title : $header }}</h3>

                @include('frontend.partials.products.controls')

                <div id="products">
                    @if(!Request::has('filter'))

                        @foreach($products as $product)
                            @include('frontend.partials.products.product_template')
                        @endforeach

                    @endif
                </div>

                <div class="col s12 no-padding _pagination" style="position: relative">
        @if(!Request::has('filter'))
            with(new \App\Services\CustomPagination($products))->render() 
        @endif
    </div>

                @if(isset($category))
                    
                    @if($category->description)
                   
                        <div class="col s12 shop-info sport-girl">
                            {!! $category->description !!}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <!--/Menu-->
</section>


@endsection

@section('filter_handler')

    @include('frontend.partials.scripts.filter_handler')

@endsection

@section('bottom-scripts')

    <div id="video" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
            <div class="video-container"></div>
        </div>
    </div>
    @include('frontend.partials.scripts.add_to_cart')
    @include('frontend.partials.scripts.add_to_compare')
    <script>
        $("body").on('click', '.video-review', function(e){
            e.preventDefault();
            var video = $(this).siblings('._video').html();
            $('#video').find('.video-container').html(video);
        })
    </script>
@endsection