<div class="col-lg-8">
    <div class="form-group">
        {!! Form::label('title','Заголовок') !!}
        {!! Form::text('title',$value = null,['placeholder'=>'Название статьи','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug','Ссылка') !!}
        {!! Form::text('slug',$value = null,['placeholder'=>'Ссылка на статью','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('meta_title','Meta Title') !!}
        {!! Form::text('meta_title',$value = null,['placeholder'=>'Meta Title 50-80 знаков','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('meta_keywords','Meta Keywords') !!}
        {!! Form::textarea('meta_keywords',$value = null,['placeholder'=>'Meta Keywords до 250 знаков','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('meta_description','Meta Description') !!}
        {!! Form::textarea('meta_description',$value = null,['placeholder'=>'Meta Description 150 -200 знаков','class'=>'form-control']) !!}
    </div>
</div>
<div class="col-lg-4">
    {!! Form::label('','Показывать на сайте?')!!}<br/>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary {!! $page->show == 1 ? 'active' : null !!}">
            {!!Form::radio('show',$value = 1, $page->show == 1 ? true: false)!!}Да</label>
        <label class="btn btn-primary {!! $page->show == 0 ? 'active' : null !!}">
            {!!Form::radio('show',$value = 0, $page->show == 0 ? true: false)!!}Нет</label>
    </div>
</div>