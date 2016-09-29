@extends('frontend.layout')

@section('seo')

    <title>{{ $page->meta_title ?: $page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}"/>
    <meta name="keywords" content="{{ $page->meta_keywords }}"/>

@endsection


@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">{{ $page->title }}</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <!--Simple Menu-->
    <div class="container">
        <div class="row">
            <div class="col s12 text-page no-padding">
                <h3>{{ $page->title }}</h3>
                {!! $page->content !!}
            </div>
        </div>
    </div>
    <!--/Menu-->
</section>

@endsection