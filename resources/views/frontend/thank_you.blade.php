@extends('frontend.layout')

@section('seo')
    <title>Спасибо за покупку!</title>
@endsection


@section('content')
<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Страница благодарности</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <!--Simple Menu-->
    <div class="container">
        <div class="row">
            <div class="col s12 text-page no-padding">
                <h3>Спасибо за покупку</h3>
				<div>Мы свяжемся с вами в ближайшее время</div>
                <div class="col s12">
                    <p><span class="">Номер вашего счёта:</span> <span class="order-number">{{ $order->id }}</span></p>
                    <p><span class="">Способ оплаты:</span> <span class="order-payment">{{ $order->payment_method->title }}</span></p>
                    <p><span class="">Способ доставки:</span> <span class="order-shipping">{{ $order->shipping_method->title }}</span></p>
                    <p><span class="">Сумма покупки:</span> <span class="order-total">{{ $order->getTotal() }} грн</span></p>
                    <a href="/" class="waves-effect waves-light btn">Продолжить покупки</a>
                </div>
            </div>
        </div>
    </div>
    <!--/Menu-->
</section>

@endsection