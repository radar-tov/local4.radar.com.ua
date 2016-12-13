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

@section('top-scripts')

@endsection


@section('content')

    <!--Simple Menu-->
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l3 catalog no-padding main-sidebar2">
                @include('frontend.partials.categories_nav')
            </div>
            <div class="col s12 m12 l9 catalog ">
                <h3>{{ isset($category->title) ? $category->title : $header }}</h3>

               

               <div class="row">
               @foreach($categories as $cat)
                    <div class="col s12 m6 l4">
                    <a href="/{{ $category->slug }}/{{$cat->slug}}">
                    <div class="cat_box">
                    <img src="{{$cat->thumbnail}}"/>
                    <p>{{$cat->title}}</p>
                    </div>
                    </a>
                    </div>
                @endforeach
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

@section('bottom-scripts')

@endsection