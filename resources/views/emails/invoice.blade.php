<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div style="font:normal 15px/140% Arial;background:#ffffff;color:#333;padding:1em 2em"><a href="{{ url() }}" target="_blank"><img src="{{ url('frontend/images/logo.png') }}" alt="«Radar»"></a><!--домен и путь к картинке здесь-->
    <p><b>Спасибо за Ваш заказ. Для уточнения деталей заказа с Вами в ближайшее рабочее время свяжется менеджер нашего Call-центра</b></p>
    <p><b>Номер заказа: {{ $order->id }}</b></p>
    <p>Заказанные продукты:</p>
    <table cellpadding="6" cellspacing="0" style="border:1px dashed #7cb342;">
        <tbody>
        <tr style="border:1px dashed #7cb342;" >
            <th style="border:1px dashed #7cb342;">Наименование, Код товара</th>
            <th style="border:1px dashed #7cb342;">Количество</th>
            <th style="border:1px dashed #7cb342;">Сумма</th>
        </tr>
        @foreach($order->products as $product)
            <tr style="border:1px dashed #7cb342;">
                <td style="border:1px dashed #7cb342;">{{ $product->title }} {{ $product->article }}</td>
                <td style="border:1px dashed #7cb342;">{{ $product->qty }}</td>
                <td style="border:1px dashed #7cb342;">{{ $product->total_price }}</td>
            </tr>
        @endforeach
        </tbody></table>
    <p><b>Итого: {{ $order->getTotal() }} грн</b></p>
    {{--<p>Стоимость доставки: UAH 0.00 грн.</p>--}}
    {{--<p><b>Итого c доставкой: UAH 8990 грн</b></p>--}}

    <p>Покупатель:  {{ $user->name }} </p>
    <p>Оплата: {{ $order->shipping_method->title }}</p>
    <p>Доставка: {{ $order->payment_method->title }}</p>

    @if(Auth::check())
        <p>Вы можете <a href="{{ route('order', $order->id) }}" target="_blank">посмотреть статус вашего</a> заказа и историю его обработки онлайн.</p>
    @endif

    <hr>
    <p style="color:#666;font-size:12px">Данное письмо создано автоматически, пожалуйста, не отвечайте на него.<br>С уважением, администрация «Radar»</p>
</div>
</body>
</html>