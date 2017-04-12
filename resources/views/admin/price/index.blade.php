<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="public/admin/assets/css/price/price.css" type="text/css">
<table>
    <thead>
        <tr>
            <td colspan="4" align="center" class="title">{{ $category->title }}</td>
        </tr>
        <tr>
            <td colspan="4"> Интернет магазин <a href="https://radar.com.ua"></a>Radar.com.ua</td>
        </tr>
        <tr>
            <td colspan="10">Наши телефоны: (063)881-83-83; (095)881-83-83; (068)881-83-83</td>
        </tr>
        <tr>
            <td colspan="10">Для просмотра цены товара на сайте сначало авторизуйтесь.</td>
        </tr>
        <tr>
            <td colspan="10">Логин: Ваш номер телефона - (ххх)ххх-хх-хх, Пароль: последние 7 цифр Вашего телефона - ххххххх</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td> </td>
            <td class="hed" align="center">Наименование</td>
            <td class="hed" align="center">Производитель</td>
            <td class="hed" align="center">Страна</td>
            <td class="hed" align="center">Артикул</td>
            <td class="hed" align="center">Розница</td>
            <td class="hed" align="center">Ваша цена</td>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td> </td>
            <td class="bod">
                @if($product->name != '')
                    <a href="https://radar.com.ua/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug }}">{{ $product->name }}</a></li>
                @else
                    <a href="https://radar.com.ua/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug }}">{{ $product->title }}</a></li>
                @endif
            </td>
            <td class="bod" align="left">
                @if(isset($product->brand->title))
                    {{ $product->brand->title}}
                @endif
            </td>
            <td class="bod" align="left">
                @if(isset($product->country->name))
                    {{ $product->country->name}}
                @endif
            </td>
            <td class="bod" align="left">
                @if($product->article != '-')
                    {{ $product->article }}
                @else {{ $product->id }}
                @endif
            </td>
            <td class="bod" align="center">
                {{ $product->out_price }} гр
            </td>
            <td class="bod" align="center">
                @if($product->hasDiscount())
                    {{ round($product->getNewPriceYandex()) }}
                @else {{ $product->cena_montaj }}
                @endif
                    гр
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
