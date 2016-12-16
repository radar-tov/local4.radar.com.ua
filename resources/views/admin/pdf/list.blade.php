<table class="table table-bordered table-hover">
    <thead>
    <td>Имя файла</td>
    <td>Путь к файлу</td>
    <td>Скачан раз</td>
    <td>Редактировать</td>
    <td>Удалить</td>
    </thead>
    <tbody>
    @if(isset($files))
        @foreach($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->path }}</td>
                <td>{{ $file->downloads }}</td>
                <td>edit</td>
                <td>delete</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>