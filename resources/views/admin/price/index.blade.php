<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="public/admin/assets/css/price/price.css" type="text/css">
<table>
    <thead>
        <tr>
            <td colspan="3" align="center" class="title">{{ $category->title }}</td>
        </tr>
        <tr>
            <td colspan="3"> </td>
        </tr>
        <tr>
            <td> </td>
            <td class="hed" align="center">Наименование</td>
            <td class="hed" align="center">Артикул</td>
            <td class="hed" align="center">Цена</td>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td> </td>
            <td class="bod">@if($product->name != ''){{ $product->name }} @else {{ $product->title }} @endif</td>
            <td class="bod" align="left">@if($product->article != '-'){{ $product->article }} @else {{ $product->id }} @endif</td>
            <td class="bod" align="center">{{ $product->out_price }} гр</td>
        </tr>
    @endforeach
    </tbody>
</table>
