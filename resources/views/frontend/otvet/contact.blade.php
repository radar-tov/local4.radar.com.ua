<div class="center mod col">
    <h3>{{ Session::get('otvet') }}</h3>
</div>
{{ Session::forget('from_otvet') }}
{{ Session::forget('otvet') }}