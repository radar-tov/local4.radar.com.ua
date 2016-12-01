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
        {!! Form::textarea('meta_keywords',$value = null,['rows'=>1,'placeholder'=>'Meta Keywords до 250 знаков','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('meta_description','Meta Description') !!}
        {!! Form::textarea('meta_description',$value = null,['rows'=>1,'placeholder'=>'Meta Description 150 -200 знаков','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('excerpt','Краткое описание') !!}
        {!! Form::textarea('excerpt', $value = null ,['rows'=>'5','class'=>'form-control tiny']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Полное описание') !!}
        {!! Form::textarea('content',$value = null,['rows'=>'10','class'=>'form-control tiny']) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="col-xs-12">
        <div class="form-group">
            <label for="thumbnail">Изображение</label>
            <div class="thumb-box">
                @if($article->thumbnail)
                    <img src="{!! asset($article->thumbnail) !!}" alt=""/>
                @endif
            </div>
            {!! Form::hidden('thumbnail',$article->thumbnail, ['id'=>'thumbnail']) !!}
            {{--<input type="hidden" id="thumbnail" name="thumbnail" value=""/>--}}
            <a href="{!! route('elfinder.popup',['thumbnail']) !!}" class="popup_selector btn btn-default" data-inputid="thumbnail">Выбрать Изображение</a>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('','Показывать на сайте?')!!}<br/>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary {{ $article->show == 1 ? 'active' : null }}">
                    {!!Form::radio('show',$value = 1, $article->show == 1 ? true : false)!!}Да</label>
                <label class="btn btn-primary {{ $article->show == 0 ? 'active' : null }}">
                    {!!Form::radio('show',$value = 0, $article->show == 0 ? true : false)!!}Нет</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('published_at','Когда опубликовать?') !!}
            {!! Form::text('published_at',$value = $article->published_at ? date('Y-m-d',strtotime($article->published_at)): date('Y-m-d'),['id'=>'published_at', 'class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('sitemap', 'Показывать в Sitemap.xml?') !!}
            {!! Form::select('sitemap', ['1'=> 'Да', '0'=>'Нет'], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('priority', 'Приоритет индексирования?') !!}
            {!! Form::select('priority', [
                '0,1'=> '0,1',
                '0,2'=> '0,2',
                '0,3'=> '0,3',
                '0,4'=> '0,4',
                '0,5'=> '0,5',
                '0,6'=> '0,6',
                '0,7'=> '0,7',
                '0,8'=> '0,8',
                '0,9'=> '0,9',
                '1,0'=> '1,0'
             ], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('changefreq', 'Частота индексирования?') !!}
            {!! Form::select('changefreq', [
                'always'=> 'всегда',
                'hourly'=> 'почасово',
                'daily'=> 'ежедневно',
                'weekly'=> 'еженедельно',
                'monthly'=> 'ежемесячно',
                'yearly'=> 'раз в год',
                'never'=> 'никогда'
             ], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
        </div>
    </div>
    {{--
        <div class="form-group">
            {!! Form::label('page_id', 'Показывать на странице') !!}
            {!! Form::select('page_id',$pages, $article->page_id, ['class'=>'form-control']) !!}
        </div>
    --}}

</div>