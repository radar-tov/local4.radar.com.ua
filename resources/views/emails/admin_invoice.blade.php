<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div style="font:normal 15px/140% Arial;background:#ffffff;color:#333;padding:1em 2em"><a href="{{ url() }}" target="_blank"><img src="{{ url('frontend/images/logo.png') }}" alt="«Radar»"></a><!--домен и путь к картинке здесь-->
    <p><b>Новый заказ подтверждён на вашем сайте <a href="{{ url() }}" target="_blank">Radar</a></b></p>
    <p><b>Покупатель: {{ $user->name }}</b></p>
    <p><b>Страна: {{ $user->country }}</b></p>
    <p><b>Город: {{ $user->city }}</b></p>
    <p><b>Адрес: {{ $user->address }}</b></p>
    <p><b>Номер телефона: {{ $user->phone }}</b></p>
    <p><b>E-mail: {{ $user->email }}</b></p>
    <p><b>Номер заказа: {{ $order->id }}</b></p>
    <p>Заказанные продукты:</p>
    <table cellpadding="6" cellspacing="0" style="border:1px dashed #7cb342;">
        <tbody>
        <tr style="border:1px dashed #7cb342;" >
            <th style="border:1px dashed #7cb342;">Код товара, Наименование</th>
            <th style="border:1px dashed #7cb342;">Количество</th>
            <th style="border:1px dashed #7cb342;">Сумма</th>
        </tr>

        @foreach($order->products as $product)
            <tr style="border:1px dashed #7cb342;">
                <td style="border:1px dashed #7cb342;">{{ $product->title }} {{ $product->article }}</td>
                <td style="border:1px dashed #7cb342;">{{ $product->qty }}</td>
                <td style="border:1px dashed #7cb342;">{{ $product->total_price }} грн</td>
            </tr>
        @endforeach
        </tbody></table>

    <p><b>Итого: {{ $order->getTotal() }} грн</b></p>

    <p>Оплата:  {{ $order->payment_method->title }}</p>
    <p>Доставка:  {{ $order->shipping_method->title }}</p>
</div>
</body>
</html>