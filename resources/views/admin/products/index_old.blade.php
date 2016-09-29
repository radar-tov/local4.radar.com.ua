@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Товары
@stop


@section('content')

    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <a href="{{ route("dashboard.products.create") }}" class="btn btn-sm btn-primary" title="Добавить"><i class="fa fa-2x fa-plus-circle"></i></a>
                    <br/>
                    <br/>
                </div>
                <div>
                    <table id="sample-table-2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Артикул</th>
                            <th>Название</th>
                            <th>Ссылка</th>
                            <th colspan="2" class="options">Опции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->article }}</td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    @if($product->show)
                                        <span class="label label-sm label-success">Открыта для просмотра</span>
                                    @else
                                        <span class="label label-sm label-warning">Скрыта</span>
                                    @endif
                                </td>
                                <!-- Options -->
                                <td class="options">
                                    <a class="green" href="{!! route('dashboard.products.edit', $product->id) !!}">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                </td>
                                <td class="options">
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        {!! Form::open(['route'=>['dashboard.products.destroy', $product->id],'method'=>'delete' ]) !!}
                                        <label class="red" style="display: inline-block; cursor: pointer;">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            {!! Form::submit('Удалить',
                                            ["class" => "ace-icon fa fa-trash-o bigger-120", "id" => "test", "style" => "display:none"]) !!}
                                            {!! Form::close() !!}
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <!-- /End Options -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
@stop


@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! url('admin/assets/js/jquery.dataTables.bootstrap.js') !!}"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 =
                    $('#sample-table-2')
                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                            .dataTable( {
                                bAutoWidth: false,
                                "aoColumns": [
                                    { "bSortable": false },
                                    null, null,null, null, null,
                                    { "bSortable": false }
                                ]


                                //,
                                //"sScrollY": "200px",
                                //"bPaginate": false,

                                //"sScrollX": "100%",
                                //"sScrollXInner": "120%",
                                //"bScrollCollapse": true,
                                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                //"iDisplayLength": 50
                            } );



            $(document).on('click', 'th input:checkbox' , function(){
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function(){
                            this.checked = that.checked;
                            $(this).closest('tr').toggleClass('selected');
                        });
            });


            $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('table')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                //var w2 = $source.width();

                if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                return 'left';
            }

        })
    </script>

@stop
