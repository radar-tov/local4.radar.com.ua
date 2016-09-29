@extends('frontend.layout')

@section('seo')
    <title>{{ 'Информация о заказе' }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
@endsection


@section('content')

<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Информация о заказе</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <h3>Информация о заказе</h3>
            <div class="row">
                    <ul class="col s12 m6 l4 no-padding no-margin">
                        <li class="col s12 no-padding"><span class="col s6">Номер заказа</span><span class="col s6">{{ $order->id }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Дата заказа</span><span class="col s6">{{ $order->created_at->toDateString() }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Статус заказа</span><span class="col s6">{{ config('order_status')[$order->status_id] }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Примечание покупателя</span><span class="col s6">{{ $order->note or 'Нет примечания' }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Email покупателя</span><span class="col s6">{{ $order->user->email or 'Не указан' }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Страна</span><span class="col s6">{{ $order->user->country or 'Не указана'}}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Город</span><span class="col s6">{{  $order->user->city or 'Не указана' }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Адрес доставки</span><span class="col s6">{{ $order->delivery_address ?: 'Адрес покупателя' }}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Способ оплаты</span><span class="col s6">{{ $order->payment_method->title or 'Не указан'}}</span></li>
                        <li class="col s12 no-padding"><span class="col s6">Способ доставки</span><span class="col s6">{{ $order->shipping_method->title or 'Не указан' }}</span></li>
                    </ul>
                <div class="col s12 title-order">
                    <h4>Товары</h4>
                </div>
                <div class="basket-row col s12 no-padding">
                    <div class="col m1 hide-on-small-and-down">Фото</div>
                    <!-- <div class="col s1">№</div> -->
                    <div class="col m1 hide-on-small-and-down">Код</div>
                    <div class="col s5 m4">Название</div>
                    <div class="col s3 m2 center">Кол-во</div>
                    <div class="col s3 center m3">Всего</div>
                </div>

                @foreach($order->products as $product)

                <div class="basket-item col s12 no-padding">
                    <div class="col m1 hide-on-small-and-down item-image">
                        @if(count($product->original))
                            <a href="/{{ $product->original->category->slug }}/{{ $product->original->slug }}">
                                @if(isset($product->original->thumbnail) && count($product->original->thumbnail))
                                    <img src="{{ file_exists(public_path($product->original->thumbnail->first()->path)) ?
                                     $product->original->thumbnail->first()->path : '/frontend/images/default.png'}}" class="responsive-img">
                                @else
                                    <img src="/frontend/images/default.png" class="responsive-img">
                                @endif
                            </a>
                        @else
                            <img src="/frontend/images/default.png" class="responsive-img">
                        @endif
                    </div>
                    <!-- <div class="col s1"><p>{{ $product->article }}</p></div> -->   
                    <div class="col m1 hide-on-small-and-down"><p>{{ $product->article }}</p></div>

                    <div class="col s5 m4">
                        @if(count($product->original))
                            <p><a href="/{{ $product->original->category->slug }}/{{ $product->original->slug }}">{{ $product->title }}</a></p>
                        @else
                            <p>{{ $product->title }}</p>
                        @endif
                    </div>

                    <div class="col s3 m2 center">
                        <p class="qty">{{ $product->qty }}</p>
                    </div>
                    <div class="col s3 m3 center"><p>{{ $product->total_price }} <span>грн</span></p></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@endsection