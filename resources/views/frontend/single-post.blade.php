@extends('frontend.layout')

@section('seo')
    <title>{{ $article->meta_title ?: $article->title }}</title>
    <meta name="description" content="{{ $article->meta_description ?: $article->excerpt }}"/>
    <meta name="keywords" content="{{ $article->meta_keywords ?: $article->title }}"/>
@endsection


@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/news">Новости</a></li>
                    <li class="active">{{ $article->title }}</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="content">
        <!--Simple Menu-->
        <div class="container">
            <div class="row">
                <div class="col s12 text-page no-padding">
                    <div class="col single-post s12 fadeIn animated wow" data-wow-delay="0.3s">
                        <h3>{{ $article->title }}</h3>
                        <div class="col date s12">
                            {{--<span>{{ date('m',strtotime($article->published_at)) }} </span><span> {{ date('d \'y', strtotime($article->published_at)) }} </span>--}}
                            <span>{{ $article->published_at->formatLocalized('%B %d %Y') }}</span>
                        </div>
                        <div class="col s12 m12 l6">
                            <img src="{{ url($article->thumbnail) }}" class="responsive-img" alt="{{ $article->title }}">
                        </div>
                        <div class="col s12 m12 l6">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Menu-->
    </section>
@endsection

@section('bottom-scripts')@endsection