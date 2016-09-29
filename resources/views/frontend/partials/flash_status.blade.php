@if (session('status'))
<div style="color: rgba(0, 128, 0, 0.76)">
    <b>{{ session('status') }}</b>
</div>
@endif