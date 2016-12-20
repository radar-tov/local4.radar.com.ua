<table class="table table-bordered table-hover">
    <thead>
    <td></td>
    <td>Имя файла</td>
    <td>Путь к файлу</td>
    <td>Скачан раз</td>
    <td></td>
    <td></td>
    </thead>
    <tbody>
    @if(isset($files))
        @foreach($files as $file)
            <tr>
                <td>{!! ($file->show == 1) ? '1' : '0' !!}</td>
                <td>{{ $file->admin_name }}</td>
                <td>{{ $file->path }}</td>
                <td>{{ $file->downloads }}</td>
                <td>
                    <a id="otvet" class="fileedit fancybox.ajax" href="{{ url('dashboard/pdf/'.$file->id.'/'.$file->product_id) }}">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                </td>
                <td>
                    <a href="#">
                        <i class="ace-icon fa fa-trash-o bigger-120" title="удалить PDF" onclick="deletePDF({{ $file->id }})"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>