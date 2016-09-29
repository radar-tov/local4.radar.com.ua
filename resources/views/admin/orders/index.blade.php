@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Заказы
@stop

@section('content')
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-3">
                 <div class="form-group" id="_status">
{{--            		{!! Form::label('status_id', '') !!}--}}
            		{!! Form::select('status_id',
            		[0 => 'Все'] + Config::get('order_status'), $selected = Request::get('status') ?: 0,
            		 ['class' => 'form-control']) !!}
            	</div>
            </div>


            <div class="col-lg-3 pull-right">
                {!! Form::open(['route' => 'dashboard.orders.index', 'method' => 'GET']) !!}
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="">
                          <span class="input-group-btn">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fa fa-search"></i> Поиск
                            </button>
                          </span>
                </div><!-- /input-group -->
                {!! Form::close() !!}
            </div><!-- /.col-lg-3 -->



            @if(Request::has('search'))
                <div class="col-xs-2 pull-right">
                    <a href="{{ route('dashboard.orders.index') }}" class="btn btn-primary btn-sm pull-right">
                        <i class="fa fa-chevron-left"></i> Вернуться
                    </a>
                </div>
            @endif
            <div class="col-xs-12">
                <div>
                    <table id="sample-table-2" class="table table-bordered table-hover pr-table">
                        <thead>
                        <tr>
                            <th class="center">№ Заказа</th>
                            <th>Дата заказа</th>
                            <th>Покупатель</th>
                            <th class="center">Общ. сумма</th>
                            <th>Сп. оплаты</th>
                            <th>Сп. доставки</th>
                            <th class="center">Статус</th>
                            <th class="option">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="center">
                                    <a href="{{ route('dashboard.orders.show', $order->id) }}">
                                        {{ $order->id }}
                                    </a>
                                </td>
                                <td>
                                    {{ $order->created_at->diffForHumans() }}
                                    <br/>
                                    <small style="color: #808080">({{ $order->created_at }})</small>
                                </td>
                                <td>
                                    @if(count($order->user))
                                        <a href="{{ route('dashboard.users.show', $order->user->id) }}">
                                            {{ $order->user->name }}
                                        </a>
                                        <br/>
                                        <small style="color: #808080;">{{ $order->user->email }}</small>
                                    @else
                                        Удален
                                    @endif
                                </td>
                                <td  class="center">{{ $order->getTotal() }} грн</td>
                                <td>{{ $order->payment_method->title or 'Не указано' }} </td>
                                <td>{{ $order->shipping_method->title or 'Не указано' }}</td>
                                <td class="center">
                                    <span class="status status-{{ $order->status_id }}">
                                        {{ Config::get('order_status')[ $order->status_id] }}
                                    </span>
                                </td>
                                <td class="options">
                                    <div class="action-buttons">
                                        {!! Form::open(['route' => ['dashboard.orders.destroy', $order->id], 'method'=>'delete' ]) !!}
                                        <label class="red" style="display: inline-block; cursor: pointer;">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            {!! Form::submit('Удалить',
                                            ["class" => "ace-icon fa fa-trash-o bigger-120", "id" => "test", "style" => "display:none"]) !!}
                                            {!! Form::close() !!}
                                        </label>
                                    </div>
                                </td>

                            </tr>
                            <!-- /End Options -->
                        @endforeach
                        </tbody>
                    </table>
                    {!! $orders->appends(['status' => Request::get('status')])->render() !!}
                </div>
            </div>
        </div>
    </div><!-- /.col -->
    
@stop

@section('bottom-scripts')

    <script>
        $("#_status").find('select').change(function(){
            var statusId = $(this).val();
            var url = location.href.substring(0, location.href.indexOf('?'));

            if(statusId == 0) return window.location.href = url;

            return window.location.href = url + '?status=' + statusId;
        })
    </script>

@stop
