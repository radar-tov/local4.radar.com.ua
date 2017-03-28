@if (count($errors) > 0 or session('message'))
    <div class="col s6">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: indianred">{{ $error }}</li>
            @endforeach
            @if(session('message'))
               <li style="color: indianred">{{ session('message') }}</li>
            @endif
        </ul>
    </div>
@endif
<div class="col s12 offset-top-30px"></div>