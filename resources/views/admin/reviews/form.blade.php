<div class="col-lg-8">
    <div class="form-group">
        {!! Form::label('body','Отзыв') !!}
        {!! Form::textarea('body',$value = null,['placeholder'=>'Отзыв','class'=>'form-control']) !!}
    </div>
</div>
<div class="col-lg-4">

    <div class="form-group">
        {!! Form::label('','Товар')!!}<br/>
        @if(isset($review->product->id))
            <a href="{{ route('dashboard.products.edit',[$review->product->id]) }}" class=""> {{ $review->product->title }}</a>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('','Пользователь')!!}<br/>
        @if(isset($review->user->id))
            <a href="{{ route('dashboard.users.edit',[$review->user->id]) }}" class="">{{ $review->user->name }}</a>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('','Показывать на сайте?')!!}<br/>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary {{ $review->active == 1 ? 'active' : null }}">
                {!!Form::radio('active',$value = 1, $review->active == 1 ? true : false)!!}Да</label>
            <label class="btn btn-primary {{ $review->active == 0 ? 'active' : null }}">
                {!!Form::radio('active',$value = 0, $review->active == 0 ? true : false)!!}Нет</label>
        </div>
    </div>
</div>

@section('bottom-scripts')@stop