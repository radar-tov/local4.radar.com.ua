<table class="table table-bordered table-hover">
    <thead>
    <td align="center">На сайте</td>
    <td align="center">В товаре</td>
    <td align="center">Название в админке (на странице)</td>
    <td align="center">Путь к файлу</td>
    <td align="center">Скачан раз</td>
    <td align="center"></td>
    <td align="center"></td>
    </thead>
    <tbody>
    {{--{{ dump($files) }}--}}
    {{--{{ dump($getShowFileProduct) }}--}}
    @if(isset($files))
        @foreach($files as $file)
            <tr>
                <td align="center">{!! ($file->show == 1) ? '<i class="fa fa-eye green"></i>' : '<i class="fa fa-eye fa-eye-slash red"></i>' !!}</td>
                <td align="center">
                    @foreach($getShowFileProduct as $productShow)
                        @if($productShow->file_id == $file->file_id)
                            {!! ($productShow->show == 1) ? '<i class="fa fa-eye green"></i>' : '<i class="fa fa-eye fa-eye-slash red"></i>' !!}
                        @endif
                    @endforeach
                </td>
                <td>{{ $file->admin_name }}<br>( {{ $file->name }} )</td>
                <td>{{ $file->path }}</td>
                <td>{{ $file->downloads }}</td>
                <td>
                    <a id="otvet" class="fileedit fancybox.ajax" href="{{ url('dashboard/pdf/'.$file->id.'/'.$file->product_id) }}">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                </td>
                <td>
                    <a href="#">
                        <i class="ace-icon fa fa-trash-o bigger-120" title="удалить PDF" onclick="deletePDF({{ $file->id.', '.$file->product_id }})"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>