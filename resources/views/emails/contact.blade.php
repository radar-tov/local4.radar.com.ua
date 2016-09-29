Поступила новая заявка! <br/>

<b>Имя:</b> {{ $name or '' }}<br/>
<b>Телефон:</b> {{ $phone or '' }}<br/>
@if(isset($comment) && !empty($comment))
<b>Комментарий:</b> <br/>
{{ $comment or '' }}<br/>
@endif
{{ PHP_EOL }}
