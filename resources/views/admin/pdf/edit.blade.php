{{ dump($file) }}
<div id="files" class="tab-pane">
    <div class="col-md-12" id="files-section">
        <div id="filesup" v-show="getPdfList">

        <form action="{!! url('') !!}" method="POST">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="fileID" name="fileID" value="{{ $file->id }}"/>
            <h3 align="center">Файл № {{ $file->id }}</h3>
            <table class="table table-bordered table-hover">
                <tr>
                    <td>{!! Form::label('name', 'Название файла') !!}</td>
                    <td>{!! Form::text('name', $value = $file->name, ['class' => 'validate']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('path', 'Путь к файлу') !!}</td>
                    <td>{!! Form::text('path', $value = $file->path, ['class' => 'validate']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('hash_name', 'Хеш') !!}</td>
                    <td>{!! Form::text('hash_name', $value = $file->hash_name, ['class' => 'validate']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('downloads', 'Скачан раз') !!}</td>
                    <td>{!! Form::text('downloads', $value = $file->downloads, ['class' => 'validate']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('show', 'Показывать на сайте') !!}</td>
                    <td>{!! Form::checkbox('show', $selected = null) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('showProduct', 'Показывать в продукте') !!}</td>
                    <td>{!! Form::checkbox('showProduct', $selected = null) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('created_at', 'Создан') !!}</td>
                    <td>{!! Form::text('created_at', $value = $file->created_at, ['class' => 'validate']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('updated_at', 'Изменён') !!}</td>
                    <td>{!! Form::text('updated_at', $value = $file->updated_at, ['class' => 'validate']) !!}</td>
                </tr>

                    {{--<input required="required" placeholder="Номер телефона" id="phone" name="phone" type="text" class="validate">--}}
                    {{----}}
                    {{--<button class="btn waves-effect waves-light" type="submit" name="action"--}}
                    {{--onclick="yaCounter39848700.reachGoal('callBack'); ga('send', 'event', 'Knopka', 'callBack'); callbeck(); return false;">--}}
                    {{--<i class="fa fa-phone"></i>Заказать--}}
                    {{--</button>--}}


                </table>
            </form>
        </div>
    </div>
</div>
