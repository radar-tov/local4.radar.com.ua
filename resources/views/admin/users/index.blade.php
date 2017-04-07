@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Пользователи
@stop

@section('content')
    <div class="row">
        <div class="">
            <a href="{{ route("users.create") }}" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-plus"></i>Добавить пользователя</a>
            <div class="col-lg-3 pull-right no-padding">
                {!! Form::open(['route' => 'users.index', 'method' => 'GET']) !!}
                <div class="input-group">
                    {{--<select name="order" id="order">
                        <option value="ASC">По порядку</option>
                        <option value="DESC">В обратном порядке</option>
                    </select>--}}
                    <input type="text" name="search" class="form-control" placeholder="Поиск"
                           @if($search != '') value="{{ $search }}" @endif>
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
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm pull-right">
                        <i class="fa fa-chevron-left"></i> Вернуться
                    </a>
                </div>
            @endif
        </div>
        <div>
            <br/>
            <table id="sample-table-2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Организация</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефоны</th>
                    <th>Город</th>
                    <th class="center" style="width: 135px">Уровень доступа</th>
                    <th colspan="2" class="options">Опции</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->active > 0)
                                <i class="fa fa-eye green"></i>
                            @else
                                <i class="fa fa-eye red"></i>
                            @endif
                        </td>
                        <td>
                            @if($user->status == 0) Новый
                            @elseif($user->status == 1) Звонил
                            @elseif($user->status == 2) Думает
                            @elseif($user->status == 3) Отказался
                            @endif
                        </td>
                        <td>{{ $user->organization }}</td>
                        <td><a href="{!! route('users.show',[$user->id]) !!}" target="_blank">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}, {{ $user->phone_1 }}, {{ $user->phone_2 }}, {{ $user->phone_3 }}</td>
                        <td>{{ $user->city }} <small style="color: #808080;">  {{ $user->country }} </small></td>
                        <td class="center">
                            @if($user->isAdmin())
                                <span class="label label-danger arrowed">Админ</span>
                            @elseif($user->isCustomer())
                                <span class="label label-info arrowed">Покупатель</span>
                            @elseif($user->isMONTAJ())
                                <span class="label label-info arrowed">Монтажник</span>
                            @else
                                <span class="label label-default arrowed">Разовый покупатель</span>
                            @endif
                        <!-- Options -->
                        </td>
                        <td class="options">
                            <a class="green" href="{!! route('users.edit', $user->id) !!}" target="_blank">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="action-buttons">
                                {!! Form::open(['route'=>['users.destroy', $user->id],'method'=>'delete' ]) !!}
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
        <div class="">{!! $users->render() !!}</div>
    </div>
@stop

@section('bottom-scripts')

@stop
