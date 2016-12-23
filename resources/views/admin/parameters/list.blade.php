{{--{{ dump($product) }}--}}
<table class="table table-bordered table-hover">
    <thead>
    <td>Название</td>
    <td>Значение</td>
    <td></td>
    </thead>
    <tbody>
    @if(isset($product))
        @foreach($product as $parameters)
            <tr>
                <td>
                    {{ $parameters->parameter->title }}
                    <a class="param_edit fancybox.ajax"
                       href=""
                       title="Редактировать название параметра">
                        <i class="ace-icon fa fa-pencil bigger-130" style="float: right"></i>
                    </a>
                </td>
                <td>
                    {{ $parameters->value }}
                    <a class="param_value_edit fancybox.ajax"
                       href="{{ url('dashboard/parameters/edit_value/'.$product_id['id'].'/'.$parameters->parameter->id) }}"
                       title="Редактировать значение параметра">
                        <i class="ace-icon fa fa-pencil bigger-130" style="float: right"></i>
                    </a>
                </td>
                <td>
                    <a href="#">
                        <i class="ace-icon fa fa-trash-o bigger-120" title="удалить" style="float: right"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>