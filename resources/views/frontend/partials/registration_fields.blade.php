<input type="hidden" name="_token" value="{{ csrf_token() }}">
<p class="formField">
    <label for="order-name" class="col s12 m4 l4">Ваше имя:<span class="red-text"> *</span></label>
    <input class="col s12 m6 l7" id="order-name" placeholder="введите имя, фамилию и отчество" tabindex="1" name="name" type="text" value="{{ old('name') }}">
</p>
<!--<p class="formField">-->
<!--<label for="order-surname" class="col s12 m4 l4">Фамилия:<span class="red-text"> *</span></label>-->
<!--<input class="col s12 m6 l7" id="order-surname" placeholder="введите вашу фамилию" tabindex="2" name="Orders[surname]" type="text">-->
<!--</p>-->
<p class="formField">
    <label for="order-telephone" class="col s12 m4 l4">Телефон:<span class="red-text"> *</span></label>
    <input class="col s12 m6 l7" id="order-telephone" placeholder="введите номер телефона" tabindex="3" name="phone" type="text"value="{{ old('phone') }}">
</p>
<p class="col s12 no-margin note">Заполните поле "Электронная почта", так как востановление пароля происходит через почтовый ящик.</p>
<p class="formField">
    <label for="order-email" class="col s12 m4 l4">Электронная почта:</label>
    <input class="col s12 m6 l7" id="order-email" placeholder="введите ваш email" tabindex="4" name="email" type="text" value="{{ old('email') }}">
</p>
{{--<p class="formField">
    <label for="order-address" class="col s12 m4 l4">Страна:</label>
    <select class="col s12 m6 l7 no-padding" id="order-country" tabindex="5" name="country" type="text">
        <option value="Украина">Украина</option>
        <option value="Россия">Россия</option>
        <option value="США">США</option>
    </select>
</p>--}}
<p class="formField">
    <label for="order-address" class="col s12 m4 l4">Город:</label>
    <input class="col s12 m6 l7" id="order-city" placeholder="введите город" tabindex="6" name="city" type="text" value="{{ old('city') }}">
</p>
<p class="formField">
    <label for="order-address" class="col s12 m4 l4">Адрес:</label>
    <input class="col s12 m6 l7" id="order-address" placeholder="введите адрес" tabindex="7" name="address" type="text" value="{{ old('address') }}">
</p>
<p class="formField">
    <label for="order-address" class="col s12 m4 l4">Пароль:<span class="red-text"> *</span></label>
    <input class="col s12 m6 l7" name="password" placeholder="введите пароль" type="password">
</p>
<p class="formField">
    <label for="order-address" class="col s12 m4 l4">Подтвердите пароль:<span class="red-text"> *</span></label>
    <input class="col s12 m6 l7" name="password_confirmation" placeholder="подтвердите пароль" type="password">
</p>
<p class="formField">
    <div class="g-recaptcha" data-sitekey="6LfpexcUAAAAAMDrzPG75jsHxVuaJL0sfaLbWuIH"></div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</p>
<div class="col s12" style="padding-top: 100px">
    <button class="btn waves-effect waves-light" type="submit" name="action">Создать аккаунт</button>
</div>