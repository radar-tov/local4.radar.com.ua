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
        {{--{!! Form::label('phone','Основной телефон')!!}<br/>--}}
        <label for="form-field-mask-2"> Основной телефон <small class="text-warning">(999) 999-9999</small></label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="ace-icon fa fa-phone"></i>
            </span>
            {!! Form::text('phone',$value = null, [
                'class'=>'form-control form-control input-mask-phone',
                'placeholder'=>'Основной телефон пользователя',
                'id' => 'form-field-mask-2'
            ]) !!}
        </div>
        <script>
            jQuery(function($){
                $("#form-field-mask-2").mask("(999)999-99-99");
            });
        </script>
    </div>
    <div class="form-group">
        <label for="form-field-mask-2"> Телефон №1 </label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="ace-icon fa fa-phone"></i>
            </span>
            {!! Form::text('phone_1',$value = null, [
                'class'=>'form-control form-control input-mask-phone',
                'placeholder'=>'Телефон 1 пользователя',
                'id' => 'phone_1'
            ]) !!}
        </div>
        <script>
            jQuery(function($){
                $("#phone_1").mask("(999)999-99-99");
            });
        </script>
    </div>
    <div class="form-group">
        <label for="form-field-mask-2"> Телефон №2 </label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="ace-icon fa fa-phone"></i>
            </span>
            {!! Form::text('phone_2',$value = null, [
                'class'=>'form-control form-control input-mask-phone',
                'placeholder'=>'Телефон 2 пользователя',
                'id' => 'phone_2'
            ]) !!}
        </div>
        <script>
            jQuery(function($){
                $("#phone_2").mask("(999)999-99-99");
            });
        </script>
    </div>
    <div class="form-group">
        <label for="form-field-mask-2"> Телефон №3 </label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="ace-icon fa fa-phone"></i>
            </span>
            {!! Form::text('phone_3',$value = null, [
                'class'=>'form-control form-control input-mask-phone',
                'placeholder'=>'Телефон 3 пользователя',
                'id' => 'phone_3'
            ]) !!}
        </div>
        <script>
            jQuery(function($){
                $("#phone_3").mask("(999)999-99-99");
            });
        </script>
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
    <div class="form-group">
        {!! Form::label('status','Статус')!!}<br/>
        {!! Form::select('status',['0'=>'Новый','1'=>'Звонил','2'=>'Думает','3'=>'Отказался'], $selected = $user->status, ['class'=>'form-control']) !!}
    </div>
</div>