<div class="center mod col">
    {!! Session::get('otvet') !!}
</div>
{{ Session::forget('from_otvet') }}
{{ Session::forget('otvet') }}