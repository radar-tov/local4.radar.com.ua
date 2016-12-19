<table class="table table-bordered table-hover">
    <thead>
    <td></td>
    <td>Имя файла</td>
    <td>Путь к файлу</td>
    <td>Скачан раз</td>
    <td>Редактировать</td>
    <td>Удалить</td>
    </thead>
    <tbody>
    @if(isset($files))
        @foreach($files as $file)
            <tr class="pdf">
                <td>{!! ($file->show == 1) ? "<img src='/admin/assets/img/PDF-icon.png' alt='pdf file'/>" : '' !!}</td>
                <td>{{ $file->name }}</td>
                <td>{{ $file->path }}</td>
                <td>{{ $file->downloads }}</td>
                <td>edit</td>
                <td><a href="#"><i class="fa fa-remove" title="удалить PDF" v-on="click: removePDF($event, {{ $file->id }})"></i></a></td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>