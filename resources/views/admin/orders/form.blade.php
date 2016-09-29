<style>
    textarea { resize: vertical; }
</style>
<div class="col-xs-12">
    <div class="row">
        <h4>Заказ № {{ $order->id }} </h4>
        {{ $order->created_at->diffForHumans() }}
        <br/>
        <span style="color: #808080">({{ $order->created_at }})</span>
        <table class="table table-bordered table-hover">
            <tr>
                <th>Артикул</th>
                <th>Название продукта</th>
                <th class="center">Кол-во</th>
                <th>Цена за 1 шт.</th>
                <th class="center">Скидка</th>
                <th>Цена за 1 шт. со скидкой</th>
                <th>Всего</th>
                <th class="">Удалить</th>
            </tr>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->article }}</td>
                    <td>{{ $product->title }}</td>
                    <td class="center">{{ $product->qty }}</td>
                    <td>{{ number_format($product->price_without_discount, 0, '.', ' ') }} грн</td>
                    <td class="center">
                        @if($product->stock)
                            {{--*/ $price = $product->price_without_discount - ($product->price_without_discount / 100 * $product->applied_discount) /*--}}
                            @if($price > $product->price)
                                <span class="label label-sm label-success arrowed-right">
                                    {{ $product->price_without_discount - $product->price }} грн.
                                </span>
                            @else
                                <span class="label label-sm label-success arrowed-right">
                                    {{ $product->applied_discount }} %
                                </span>
                            @endif

                        @elseif($product->applied_discount)
                            <span class="label label-sm label-success arrowed-right">
                                {{ $product->applied_discount }} %
                            </span>
                        @else
                            <i class="fa fa-minus"></i>
                        @endif
                    </td>
                    <td>{{ number_format($product->price, 0,'.', ' ') }} грн</td>
                    <td>{{ $product->getSubtotal() }} грн</td>
                    <td class="options">
                        <a class="red destroy" data-product="{{ $product->id }}" href="#" >
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <h5>Итог: <b id="total">{{ $order->getTotal() }} грн</b></h5>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
        {{--<h4>Заказ</h4>--}}
        <br/>
        <div class="col-xs-12 ">
             <div class="form-group">
                {!! Form::label('status_id', 'Статус заказа') !!}
                {!! Form::select('status_id', Config::get('order_status'), $selected = null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12">
             <div class="form-group">
                {!! Form::label('shipment_method_id', 'Способ доставки') !!}
                {!! Form::select('shipment_method_id', $shipping, $selected = null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::label('payment_method_id', 'Способ оплаты') !!}
                {!! Form::select('payment_method_id', $payments, $selected = null, ['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="col-xs-12">
             <div class="form-group">
                {!! Form::label('delivery_address', "Адрес доставки") !!}
                {!! Form::text('delivery_address', $value = $order->delivery_address ?: 'Адрес покупателя', ['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::label('comment', 'Примечание менеджера') !!}
                {!! Form::textarea('comment', $value = null, ['class' => 'form-control', 'rows' => 5]) !!}
            </div>
        </div>

    </div>

    <div class="col-xs-6 row">

        <h4>Информация о покупателе</h4>
        @if(count($order->user))
        <ul class="list-group no-padding">
            <li class="list-group-item"><b>ФИО покупателя: </b>{{ $order->user->name or 'Не указано'}}</li>
            <li class="list-group-item"><b>Телефон: </b>{{ $order->user->phone }}</li>
            <li class="list-group-item"><b>E-mail: </b>{{ $order->user->email }}</li>
            <li class="list-group-item"><b>Адрес: </b>{{ $order->user->address }}</li>
            @if($order->note)
                <li class="list-group-item">
                    <b>Примечание к заказу:</b><br/>
                    {{ $order->note }}
                </li>
            @endif
        </ul>
        @else
            <b>Пользователь не найден</b>
        @endif
    </div>
</div>
<div class="clearfix"></div>
@section('bottom-scripts')

    <script>
        $(".destroy").click(function(event){
            event.preventDefault();
            var $this = $(this);

            $.post("/dashboard/destroy_ordered_product/" + $(this).attr('data-product') ,
                    { _token: $("input[name=_token]").val(), _method: 'DELETE'}).done(function(total){
                $this.parents('tr').hide();
                $("#total").html(total)
                        console.log(total)
            })
        })
    </script>

@endsection