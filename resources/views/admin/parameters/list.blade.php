{{--{{ dump($parameters) }}--}}
<table class="table table-bordered table-hover">
    <thead>
    <td>Название</td>
    <td>Значение</td>
    <td></td>
    </thead>
    <tbody>
    @if(isset($product))
        @foreach($product->sortedValuesParam() as $parameter)
            <tr>
                <td>
                    <a class="param_edit fancybox.ajax"
                       href="{{ url('dashboard/parameters/edit_param_name/'.$parameter->parameter->id) }}"
                       title="Редактировать название параметра">
                        {{ $parameter->parameter->title }}
                    </a>
                    <a class="param_value_edit fancybox.ajax"
                       href="{{ url('dashboard/parameters/edit_param/'.$product->category_id.'/'.$product->brand_id.'/'.$product->id.'/'.$parameter->parameter->id) }}"
                       title="Редактировать параметр">
                        <i class="ace-icon fa fa-pencil bigger-130" style="float: right"></i>
                    </a>
                </td>
                <td>
                    <a class="param_edit fancybox.ajax"
                       href="{{ url('dashboard/parameters/edit_value_name/'.$parameter->id) }}"
                       title="Редактировать название значения параметра">
                        {{ $parameter->value }}
                    </a>
                    <a class="param_value_edit fancybox.ajax"
                       href="{{ url('dashboard/parameters/edit_value/'.$product->id.'/'.$parameter->parameter->id) }}"
                       title="Редактировать значение параметра">
                        <i class="ace-icon fa fa-pencil bigger-130" style="float: right"></i>
                    </a>
                </td>
                <td>
                    <a href="#">
                        <i class="ace-icon fa fa-trash-o bigger-120" title="удалить"
                           style="float: right" onclick="deleteParam( {{ $product->id }}, {{ $parameter->parameter->id }});"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>