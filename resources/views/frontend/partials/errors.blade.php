@if (count($errors) > 0)
    <div class="col s6">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: indianred">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col s12 offset-top-30px"></div>