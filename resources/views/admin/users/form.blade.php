@inject('customerGrupsProvider', 'App\ViewDataProviders\CustomerGrupsDataProvider')

<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('organization','Организация') !!}
        {!! Form::text('organization',$value = null,['placeholder'=>'Название организации','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name','Контактное имя') !!}
        {!! Form::text('name',$value = null,['placeholder'=>'Контактное имя','class'=>'form-control']) !!}
    </div>
    <div class="form-group ">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email',$value = null,['placeholder'=>'Email пользователя','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Пароль') !!}
        {!! Form::password('password',['placeholder'=>'*****','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation','Подтвердите пароль') !!}
        {!! Form::password('password_confirmation',['placeholder'=>'*****','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('permissions','Уровень доступа')!!}<br/>
        {!! Form::select('permissions',['0'=>'','-5'=>'Админ','5'=>'Монтажник','10'=>'Покупатель'], $selected = $user->permissions, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Роль')!!}<br/>
        {!! Form::select('role_id',['0'=>'', '1'=>'Админ', '2'=>'Покупатель', '3'=>'Гость','4'=>'Монтажник'], $selected = $user->role_id, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('customer_group_id','Группа скидок')!!}<br/>
        <select name="customer_group_id[]" id="customer_group_id" size="3" class="form-control" multiple>
            <option value="">Вне групп</option>
            @foreach($customerGrupsProvider->getList() as $key => $value)
                <option value="{{$key}}"
                @foreach($user->customerGroups as $customer)
                    @if($customer->id == $key) selected @endif
                @endforeach
                >{{$value}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('','Пользователь активный?')!!}<br/>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary {!!  $user->active == 1 ? 'active' : null !!}">
                {!!Form::radio('active',$value = 1, $user->active == 1 ? true : false)!!}Да</label>
            <label class="btn btn-primary {!!  $user->active == 0 ? 'active' : null !!}">
                {!!Form::radio('active',$value = 0, $user->active == 0 ? true : false)!!}Нет
            </label>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('address','Адрес')!!}<br/>
        {!! Form::text('address',$value = null, ['class'=>'form-control','placeholder'=>'Адрес пользователя']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone','Основной телефон')!!}<br/>
        {!! Form::text('phone',$value = null, ['class'=>'form-control','placeholder'=>'Основной телефон пользователя']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone_all','Доп. телефоны')!!}<br/>
        {!! Form::text('phone_all',$value = null, ['class'=>'form-control','placeholder'=>'Доп. телефоны пользователя']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city','Город')!!}<br/>
        {!! Form::text('city',$value = null, ['class'=>'form-control','placeholder'=>'Город пользователя']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country','Страна')!!}<br/>
        {!! Form::text('country',$value = null, ['class'=>'form-control','placeholder'=>'Страна пользователя']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('comments','Коментарии')!!}<br/>
        {!! Form::textarea('comments',$value = null, ['class'=>'form-control','placeholder'=>'Коментарии']) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group" id="thumb-box">
        <label for="thumbnail">Изображение</label>
        <div class="thumb-box">
            @if(is_file(public_path($user->thumbnail)))
                <img src="{!! asset($user->thumbnail) !!}" alt=""/>
            @else
                <img id="avatar"
                     class="editable img-responsive editable-click editable-empty"
                     src="{!! url('/images/users/default.jpg') !!}"
                >
            @endif
        </div>
        {!! Form::hidden('thumbnail',$value = null, ['id'=>'thumbnail', "v-model" => "loadImage"]) !!}
        <a href="{!! route('elfinder.popup',['thumbnail']) !!}" class="popup_selector btn btn-default" data-inputid="thumbnail">Выбрать Изображение</a>
    </div>
</div>