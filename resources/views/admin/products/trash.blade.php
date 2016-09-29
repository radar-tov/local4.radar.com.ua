@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Удаленные Товары
@stop

@section('page-nav')

    <div class="">
        <a href="{!! route('dashboard.products.index') !!}" class="btn btn-sm btn-success" title="Вернуться">
            <i class="ace-icon fa fa-arrow-left"></i> Вернуться к продуктам
        </a>
    </div>
    <div class="col-lg-12">&nbsp;</div>
@stop


@section('content')
    <div class="">
        <table id="sample-table-2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Артикул</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Скидка</th>
                <th>Категория</th>
                <th>Удален</th>
                <th colspan="3" class="options">Опции</th>
            </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->article }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="p-discount">
                            @if($product->discount)
                                <span class="label label-sm label-success arrowed arrowed-righ">{{ $product->discount }} %</span>
                            @else
                                <i class="fa fa-minus"></i>
                            @endif
                        </td>

                        <td>{{ $product->category->title or "Не указана" }}</td>
                        <td>{{ $product->deleted_at->diffForHumans()}}</td>
                        <td class="options">
                            <a class="" href="{!! url('dashboard/products/restore-from-trash', $product->id) !!}">
                                <i class="ace-icon fa fa-refresh bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <a class="green" href="{!! route('dashboard.products.edit', $product->id) !!}">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="action-buttons">
                                <label for="destroy{{ $product->id }}" class="red pointer" style="display: inline-block;">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </label>
                                {!! Form::open(['url'=>['dashboard/products/destroy-from-trash', $product->id],'method'=>'delete', 'class'=>'hide' ]) !!}
                                    {!! Form::submit('Удалить',["class" => "ace-icon fa fa-trash-o bigger-120", "id" => "destroy".$product->id, "style" => "display:none"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $products->appends(['q'])->render() !!}
        </div>
@stop


@section('bottom-scripts')

@stop
