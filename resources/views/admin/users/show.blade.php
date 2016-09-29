@extends('admin.app')

@section('top-scripts')

@stop

@section('page-title')@stop

@section('page-nav')
    <div class="row h50">
        <div class="col-xs-12">
            <a class="btn btn-sm btn-primary" title="Назад" href="javascript:return false;" onclick="window.history.back()">
                <i class="ace-icon fa fa-chevron-circle-up"></i> Назад
            </a>
            <a href="{!! route('dashboard.users.edit',[$user->id]) !!}" class="btn btn-sm btn-primary" title="Редактировать пользователя">
                <i class="ace-icon fa fa-edit "></i> Редактировать пользователя
            </a>
        </div>
    </div>
@stop

@section('content')
    <div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-3 center">
            <div>
                <!-- #section:pages/profile.picture -->
                    @if(!empty($user->thumbnail))
                        <span class="profile-picture">
                            <img id="avatar"
                                 class=" img-responsive -click -empty"
                                 alt="{{ $user->name }}"
                                 src="{!! url($user->thumbnail) !!}"
                            >
                        </span>
                    @else
                        <span class="profile-picture">
                            <img id="avatar"
                                 class=" img-responsive -click -empty"
                                 alt="{{ $user->name }}"
                                 src='/frontend/images/no-photo.png'
                            >
                        </span>
                    @endif
                <!-- /section:pages/profile.picture -->
                <div class="space-4"></div>
                <div    class="width-80 label
                        @if(-5 === (int)$user->permissions)
                            label-danger
                        @elseif(10 === (int)$user->permissions)
                            label-info
                        @else
                            label-warn
                        @endif
                        label-xlg arrowed-in arrowed-in-right"
                >
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label">
                            <span class="white">{{ $user->name }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="space-6"></div>

            <!-- /section:pages/profile.contact -->

            <div class="hr hr12 dotted"></div>

            <!-- /section:custom/extra.grid -->
            <div class="hr hr16 dotted"></div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <!-- #section:pages/profile.info -->
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Имя  </div>

                    <div class="profile-info-value">
                        <span class=" -click" id="username">{{ $user->name }}</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> E-mail  </div>

                    <div class="profile-info-value">
                        <span class=" -click" id="username">{{ $user->email }}</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Адрес </div>
                    <div class="profile-info-value">
                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                        @if($user->country)
                            <span class=" -click" id="country">{{ $user->country }}</span>
                        @endif
                        @if($user->country)
                            <span class=" -click" id="city">{{ $user->city }}</span>
                        @endif
                        @if($user->address)
                            <span class=" -click" id="city">{{ $user->address }}</span>
                        @endif
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Телефон </div>

                    <div class="profile-info-value">
                        <span class=" -click" id="age"> {{ $user->phone }}</span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Зарегистрирован </div>

                    <div class="profile-info-value">
                        <span class="   " id="signup"> {{ $user->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Уровень доступа </div>
                    <div class="profile-info-value">
                        @if($user->isAdmin())
                            <span class="label label-danger arrowed">Админ</span>
                        @elseif($user->isCustomer())
                            <span class="label label-info arrowed">Покупатель</span>
                        @else
                            <span class="label label-default arrowed">Разовый покупатель</span>
                        @endif

                    </div>
                </div>
            </div>
            </div>
            {{--<div class="hr hr2 hr-double"></div>--}}

        <div class="col-xs-12">
            <h4>Заказы пользователя</h4>
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
                @foreach($user->orders as $order)
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


            <h4>Отзывы пользовалетя</h4>

            <table id="sample-table-2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Товар</th>
                    <th>Статус</th>
                    <th style="width:420px">Отзыв</th>
                    <th>Оставлен</th>
                    <th colspan="2">Опции</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->reviews as $review)
                    <tr>
                        <td>
                            @if(count($review->product))
                                <a href="{!! route('dashboard.products.edit',[$review->product->id]) !!}">{{ $review->product->title }}</a>
                            @else
                                <span>Продукт удален</span>
                            @endif
                        </td>
                        <td> @if($review->active)
                                <span class="label label-sm label-success arrowed-in">Проверен</span>
                            @else
                                <span class="label label-sm label-warning  arrowed-in">Ожидает модерации</span>
                            @endif
                        </td>
                        <td>
                            <div id="accordion" class="accordion-style1 panel-group" style="margin-bottom: 0;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $review->id }}">
                                                <i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                                {{ str_limit($review->body,50) }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse-{{ $review->id }}" style="height: 0px;">
                                        <div class="panel-body">
                                            {{ $review->body }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td style="min-width: 100px;">
                            {{ $review->created_at->diffForHumans() }}
                        </td>
                        <!-- Options -->
                        <td class="options">
                            <a class="green" href="{!! route('dashboard.reviews.edit', $review->id) !!}">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="hidden-sm hidden-xs action-buttons">
                                {!! Form::open(['route'=>['dashboard.reviews.destroy', $review->id],'method'=>'delete' ]) !!}
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
        </div>

        </div>
@stop
