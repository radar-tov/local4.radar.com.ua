<div class="col-lg-8">
    <div class="form-group">
        {!! Form::label('title','Заголовок') !!}
        {!! Form::text('title',$value = null,['placeholder'=>'Название','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('caption','Описание') !!}
        {!! Form::text('caption',$value = null,['placeholder'=>'Описание','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('link','Ссылка') !!}
        {!! Form::text('link',$value = null,['placeholder'=>'Ссылка','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <a href="{!! route('elfinder.popup',['thumbnail']) !!}" class="popup_selector btn btn-default" data-inputid="thumbnail">Выбрать Изображение</a>
        <br/>
        <br/>
        <div class="banner-box">
            @if(is_file($banner->thumbnail))
                <img src="{!! asset($banner->thumbnail) !!}" alt=""/>
            @endif
        </div>
        {!! Form::hidden('thumbnail',$banner->thumbnail, ['id'=>'thumbnail']) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        {!! Form::label('alt','Alt мета-тег') !!}
        {!! Form::text('alt',$value = null,['placeholder'=>'Alt мета-тег','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('order','Сортировка') !!}
        {!! Form::text('order',$value = null,['placeholder'=>'Сортировка от большего к меньшему','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('','Показывать на сайте?')!!}<br/>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary {{ $banner->show == 1 ? 'active' : null }}">
                {!!Form::radio('show',$value = 1, $banner->show == 1 ? true : false)!!}Да</label>
            <label class="btn btn-primary {{ $banner->show == 0 ? 'active' : null }}">
                {!!Form::radio('show',$value = 0, $banner->show == 0 ? true : false)!!}Нет</label>
        </div>
    </div>

</div>

@section('bottom-scripts')
    <script>
        $(function() {
            var thumbnail;
            $(document).mousemove(function(){
                thumbnail = $("#thumbnail").val()
                if(thumbnail.length > 0) {
                    var img = $('<img />', {
                        id: '',
                        src: '/'+thumbnail,
                        alt: ''
                    });
                    $('div.banner-box').html(img);
                }
            });
        });
    </script>
@stop