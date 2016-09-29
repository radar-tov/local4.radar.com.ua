<style>
    .chosen-container {
        margin-bottom: 200px;
    }
</style>
<div class="col-lg-8">
    <div class="form-group">
        {!! Form::label('title','Заголовок') !!}
        {!! Form::text('title',$value = null,
            ['placeholder'=>'Название категории','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug','Ссылка') !!}
        {!! Form::text('slug',$value = null,
            ['placeholder'=>'Ссылка на категорию','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('meta_title','Meta Title') !!}
        {!! Form::text('meta_title',$value = null,['placeholder'=>'Meta Title 50-80 знаков','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('meta_keywords','Meta Keywords') !!}
        {!! Form::textarea('meta_keywords',$value = null,['placeholder'=>'Meta Keywords до 250 знаков','class'=>'form-control','rows'=>4]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('meta_description','Meta Description') !!}
        {!! Form::textarea('meta_description',$value = null,['placeholder'=>'Meta Description 150 -200 знаков','class'=>'form-control','rows'=>4]) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label for="thumbnail">Изображение</label>
        <div class="thumb-box">
            @if(is_file($category->thumbnail))
                <img src="{!! asset($category->thumbnail) !!}" alt=""/>
            @endif
        </div>
        {!! Form::hidden('thumbnail',$value = null, ['id'=>'thumbnail']) !!}
        <a href="{!! route('elfinder.popup',['thumbnail']) !!}" class="popup_selector btn btn-default" data-inputid="thumbnail">Выбрать Изображение</a>
    </div>
    {!! Form::label('','Показывать на сайте?')!!}<br/>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary {{ $category->show == 1 ? 'active' : null }}">
            {!!Form::radio('show',$value = 1, $category->show == 1 ? true : false)!!} Да</label>
        <label class="btn btn-primary {{ $category->show == 0 ? 'active' : null }}">
            {!!Form::radio('show',$value = 0, $category->show == 0 ? true : false)!!} Нет</label>
    </div>
</div>


@section("bottom-scripts")
    <!--Load Thumbnail -->
    <script src="{{ url('admin/assets/js/load-thumbnail.js') }}"></script>
@endsection