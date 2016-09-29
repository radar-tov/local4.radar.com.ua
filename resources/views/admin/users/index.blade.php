@extends('admin.app')

@section('top-scripts')@stop

@section('page-title')
    Пользователи
@stop

@section('content')
    <div class="row">
        <div class="">
            <a href="{{ route("dashboard.users.create") }}" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-plus"></i>Добавить пользователя</a>
            <div class="col-lg-3 pull-right no-padding">
                {!! Form::open(['route' => 'dashboard.users.index', 'method' => 'GET']) !!}
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
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary btn-sm pull-right">
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
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Город</th>
                    <th class="center" style="width: 135px">Уровень доступа</th>
                    <th colspan="2" class="options">Опции</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{!! route('dashboard.users.show',[$user->id]) !!}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->city }} <small style="color: #808080;">  {{ $user->country }} </small></td>
                        <td class="center">
                            @if($user->isAdmin())
                                <span class="label label-danger arrowed">Админ</span>
                            @elseif($user->isCustomer())
                                <span class="label label-info arrowed">Покупатель</span>
                            @else
                                <span class="label label-default arrowed">Разовый покупатель</span>
                            @endif
                        <!-- Options -->
                        </td>
                        <td class="options">
                            <a class="green" href="{!! route('dashboard.users.edit', $user->id) !!}">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="action-buttons">
                                {!! Form::open(['route'=>['dashboard.users.destroy', $user->id],'method'=>'delete' ]) !!}
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
