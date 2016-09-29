@extends('frontend.layout')

@section('seo')

    <title>{{ 'О нас' }}</title>
    <meta name="description" content=""/>
    <meta name="description" content=""/>

@endsection


@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">О нас</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <!--Simple Menu-->
    <div class="container">
        <div class="row">
            <div class="col s12 text-page no-padding">
                <h3>О нас</h3>
                <div class="col s12 m4">
                    <img src="/frontend/images/about-us.jpg" class="responsive-img" />
                </div>
                <div class="col s12 m8 shop-info">
          
       
                </div>
            </div>
        </div>
    </div>
    <!--/Menu-->
</section>

@endsection