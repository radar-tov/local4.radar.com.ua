@inject('fileProvider', '\App\ViewDataProviders\FileDataProvider' )

<div class="col-xs-12" id="">
    <input type="hidden" v-model="token" value="{{ csrf_token() }}"/>
    <div class="tabbable tabs-left">
        <ul class="nav nav-tabs" id="myTab3">
            <li class="active">
                <a data-toggle="tab" href="#main">
                    <i class="ace-icon fa fa-desktop"></i>
                    Основные
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#fields">
                    <i class="ace-icon fa fa-gears"></i>
                    Характеристики
                </a>
            </li>
             <li class="">
                <a data-toggle="tab" href="#seo">
                    <i class="ace-icon fa fa-bullhorn"></i>
                    SEO
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#media">
                    <i class="red ace-icon fa fa-image"></i>
                    Медиа
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Main options -->
            <div id="main" class="tab-pane active">
                <div class="col-lg-8">
                    <div class="form-group">
                        {!! Form::label('title','Название категории') !!}
                        {!! Form::text('title', $value = null,
                        ['placeholder'=>'Название категории','class'=>'form-control','v-model'=>'title']) !!}
                    </div>
                    <div class="form-group">
                        <a href="#" class="pull-right" v-on="click:makeSlug($event)">
                             <small>Сгенерировать ссылку</small>
                             <i class="fa fa-sort-alpha-asc"></i>
                        </a>

                        {!! Form::label('slug', 'Ссылка') !!}
                        {!! Form::text('slug', $value = null,
                        ['placeholder'=>'Ссылка на категорию','class'=>'form-control', 'v-model'=>'slug']) !!}
                    </div>

                    <!--<div class="row icons">
                        <br/>
                        <input type="hidden" name="icon" v-model="category.icon"/>
                        <label>Выберите иконку для категории</label>
                        <div class="clearfix"></div>
                        @foreach($fileProvider->getIconsList() as $key => $icon)

                            <div class="icon {{ $icon == $category->icon ? 'active' : '' }}"
                                 v-on="click: applyIcon('{{ $icon }}', $event)" >

                                <img src="{{ '/frontend/images/'. $icon }}"/>
                            </div>

                        @endforeach
                    </div>-->
                    <div class="row">
                        <div class="col-xs-12">
                            <br/>
                            <br/>
                            <div class="form-group">
                                {!! Form::label('header','Заголовок') !!}
                                {!! Form::text('header', $value = null, ['placeholder'=>'','class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description','Описание') !!}
                                {!! Form::textarea('description', $value = null, ['placeholder'=>'Описание','class'=>'form-control tiny']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{--<div class="form-group">--}}
                        {{--<label for="thumbnail">Изображение</label>--}}
                        {{--<div class="thumb-box">--}}
                            {{--@if(is_file($category->thumbnail))--}}
                                {{--<img src="{!! asset($category->thumbnail) !!}" alt=""/>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--{!! Form::hidden('thumbnail',$value = null, ['id'=>'thumbnail']) !!}--}}
                        {{--<a href="{!! route('elfinder.popup',['thumbnail']) !!}" class="popup_selector btn btn-default" data-inputid="thumbnail">Выбрать Изображение</a>--}}
                    {{--</div>--}}

                    <div class="btn-group" data-toggle="buttons">
                        {!! Form::label('show','Показывать на сайте?')!!}
                        <label class="btn btn-sm btn-primary {{ $category->show == 1 ? 'active' : null }}">
                            {!!Form::radio('show',$value = 1, $category->show == 1 ? true : false)!!} Да
                        </label>
                        <label class="btn btn-sm btn-primary {{ $category->show == 0 ? 'active' : null }}">
                            {!!Form::radio('show',$value = 0, $category->show == 0 ? true : false)!!} Нет
                        </label>
                        <br/>
                        <br/>
                    </div>


                    <div class="btn-group" data-toggle="buttons">
                        {!! Form::label('in_footer','Показывать в "подвале" сайта?')!!}
                        <label class="btn btn-sm btn-primary {{ $category->in_footer == 1 ? 'active' : null }}">
                            {!!Form::radio('in_footer',$value = 1, $category->in_footer == 1 ? true : false)!!} Да
                        </label>
                        <label class="btn btn-sm btn-primary {{ $category->in_footer == 0 ? 'active' : null }}">
                            {!!Form::radio('in_footer',$value = 0, $category->in_footer == 0 ? true : false)!!} Нет
                        </label>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('sitemap', 'Показывать в Sitemap.xml?') !!}
                            {!! Form::select('sitemap', ['1'=> 'Да', '0'=>'Нет'], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('yandex', 'Показывать в Yandex.xml?') !!}
                            {!! Form::select('yandex', ['Нет', 'Да'], $selected = null, ['class' => 'form-control','form'=>'form-data']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('priority', 'Приоритет индексирования?') !!}
                            {!! Form::select('priority', [
                                '0.1'=> '0.1',
                                '0.2'=> '0.2',
                                '0.3'=> '0.3',
                                '0.4'=> '0.4',
                                '0.5'=> '0.5',
                                '0.6'=> '0.6',
                                '0.7'=> '0.7',
                                '0.8'=> '0.8',
                                '0.9'=> '0.9',
                                '1.0'=> '1.0'
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

                </div>
                <!-- End my options -->
            </div>
            <div id="fields" class="tab-pane">
                <input type="hidden" name="characteristicsIds" value="@{{ characteristicsIds }}"/>


                <div class="col-xs-12">
                    <div class="alert alert-info" role="alert">
                        {{--<i class="fa fa-info" style="position: absolute;left: 0;top:0"></i>--}}
                        Тут вы можете указать список дополнительных характеристик для продуктов этой категории
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" v-model="fieldToCreate.title" v-el="charField"/>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-primary btn-sm" v-on="click:saveField($event)">
                                <i class="fa fa-plus"></i> Добавить характиристику
                            </a>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                    <div class="col-md-6">

                        <input type="hidden" v-attr="val: getRelatedFieldsIds()"/>
                        {{--<input type="hidden" name="filters" value="@{{ getFieldsForSync() }}"/>--}}
                        {{--<input type="hidden" name="sortable" id="_sort"/>--}}
                        <div class="row table-emulator">
                            <div class="clearfix">
                                <div class="col-xs-2"><b>Фильтр</b></div>
                                <div class="col-xs-2"><b>Показ.</b></div>
                                <div class="col-xs-6"><b>Характеристика</b></div>
                                <div class="col-xs-2"><b>Удалить</b></div>
                            </div>
                        </div>

                        <div class="row"></div>
                        <div class="clearfix"></div>
                        <div class="dd">
                            <ol class="list-group dd-list" id="nestable">
                                <li class="dd-item"
                                    v-repeat="field in category.fields"
                                    data-id="@{{ field.id }}"
                                >
                                    <input type="hidden" name="filters[@{{ field.id }}]"/>
                                    <div class="row dd-handle">
                                        <div class="clearfix">
                                            <div class="col-xs-2">
                                                <label>
                                                    <input
                                                            type="checkbox"
                                                            class="ace"
                                                            v-attr="checked: checked(field)"
                                                            value="1"
                                                            v-on="change: setAsFilter(field, $event)"
                                                            name="filters[@{{ field.id }}][is_filter]"
                                                            />
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <label>
                                                    <input
                                                            type="checkbox"
                                                            class="ace"
                                                            v-attr="checked: checkedIfShow(field)"
                                                            value="1"
                                                            name="filters[@{{ field.id }}][show]"
                                                            />
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <div>@{{ field.title }}</div>
                                            </div>
                                            <div class="col-xs-2 action-buttons align-right no-padding">
                                            <a class="red" href="#" v-on="click: removeField($event, field)">
                                                <i class="ace-icon fa fa-arrow-circle-o-right fa-2x"></i>
                                            </a>
                                        </div>
                                        </div>
                                    </div>

                                </li>
                            </ol>
                        </div>
                        <p v-if="!category.fields.length">
                            <b>Для этой категории пока не указаны дополнительные характеристики</b>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <table class="table" v-if="fieldList.length">
                            <tr>
                                <th class="center">Добавить</th>
                                <th>Доступные характеристики</th>
                                {{--<th class="options" colspan="2">Опции</th>--}}
                            </tr>
                            <tr v-repeat="field in fieldList | orderBy 'id' -1">
                                <td class="center action-buttons">
                                    <a href="#" class="green" v-on="click:applyField($event, field)">
                                        <i class="fa fa-arrow-circle-o-left fa-2x"></i>
                                    </a>
                                </td>
                                <td>@{{ field.title }}</td>
                            </tr>
                        </table>
                        <p v-if="!fieldList.length">
                            <b style="color:#808080">Эта категория уже включает в себя все созданные характеристики, либо еще не создано ни одной характеристики</b>
                        </p>
                    </div>
                </div>
            </div>
            <div id="seo" class="tab-pane">
                <div class="col-xs-12">
                    <div class="form-group">
                        {!! Form::label('meta_title', 'Meta Title') !!}
                        {!! Form::text('meta_title', $value = null, ['class' => 'form-control', "row"=>1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_description', 'Meta Description') !!}
                        {!! Form::text('meta_description', $value = null, ['class' => 'form-control',"row"=>1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                        {!! Form::text('meta_keywords', $value = null, ['class' => 'form-control',"row"=>1]) !!}
                    </div>
                </div>
            </div>
            <div id="media" class="tab-pane">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="thumb_link">
                            Ссылка <i class="text-muted">(на сторонние ресурсы указывайте полную ссылку!)</i>
                        </label>
                        {!! Form::text('thumb_link', $value = null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('thumb_alt', 'Alt мета тег') !!}
                        {!! Form::text('thumb_alt', $value = null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('thumb_desc', 'Описание') !!}
                        {!! Form::textarea('thumb_desc', $value = null, ['class' => 'form-control',"rows"=>2,]) !!}
                    </div>
                    <div class="form-group" id="thumb-box">
                        <label for="thumbnail">Изображение <span style="color:#C20808;font-weight:600">(размер 480x360 px)</span></label>
                        <div class="category-thumb thumb-box">
                            @if(is_file(public_path($category->thumbnail)))
                                <img src="{{ asset($category->thumbnail) }}" alt=""/>
                            @endif
                        </div>
                        {!! Form::hidden('thumbnail',$value = null, ['id'=>'thumbnail', "v-model" => "loadImage"]) !!}
                        <a href="{!! route('elfinder.popup',['thumbnail']) !!}" class="popup_selector btn btn-sm btn-default" data-inputid="thumbnail">Выбрать Изображение</a>
                        <a href="#" id="clear" class="btn btn-sm btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>

@section("bottom-scripts")
    @parent
    <!--Load Thumbnail -->
    <script src="{{ url('admin/assets/js/load-thumbnail.js') }}"></script>

    <script src="{{ url('admin/assets/js/app/categories.js') }}"></script>

    <!-- Sortable -->
    <script src="{{ url('admin/assets/js/jquery.nestable.min.js') }}"></script>

    <!-- inline scripts related to this page -->
        <script type="text/javascript">
        jQuery(function($){
            var nestable,
                serialized,
                settings = { maxDepth:1 },
                saveOrder = $('#saveOrder'),
                edit = $('.edit');

            nestable = $('.dd').nestable(settings);

            $(document.forms[0]).on('submit', function(e) {
//                e.preventDefault();
                serialized = nestable.nestable('serialize');


                var serializedString = [];
                serialized.forEach(function(item, order){
                    serializedString.push(item.id +':'+ order);
                })
                $("#_sort").val(serializedString);
            });

            setInterval(function(){
                $('.dd-handle a, .dd-handle .lbl').on('mousedown', function(e){
                    e.stopPropagation();
                });
            }, 200);


            $('[data-rel="tooltip"]').tooltip();

        });
    </script>

@endsection