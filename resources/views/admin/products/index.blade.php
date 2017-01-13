@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
@inject('cenaGrupsProvider', 'App\ViewDataProviders\CenaGrupsDataProvider')

@extends('admin.app')

@section('top-scripts')

@stop

@section('page-title')
    Товары
@stop

@section('page-nav')


@stop


@section('content')
    <div class="row _hid" id="products">
        @{{ products }}
    </div>
@stop


@section('bottom-scripts')

    <script>
        var products = new Vue({

            el: '#products',

            data: {
                products: {
                    category: {
                        title: ''
                    },
                    pagination: {
                        currentPage: {},
                        lastPage: {},
                        pageToGet: 1
                    },
                    productList: {}
                },
                token: null,
                categoryId: 0,
                filtersList: null,
                productSel: false,
                selectedProductsIds: [],
                selectedAction: 'delete',
                loader: null,
                col: null
            },

            methods: {

            }

        })
    </script>
    {{--<!-- do not uncomment me -->--}}

    {{--<script src="{!! url('admin/assets/js/jquery.dataTables.min.js') !!}"></script>--}}
    {{--<script src="{!! url('admin/assets/js/jquery.dataTables.bootstrap.js') !!}"></script>--}}


    {{--<!-- inline scripts related to this page -->--}}
    {{--            <script type="text/javascript">
                    jQuery(function ($) {
                        var oTable1 =
                                $('#sample-table-2')
                                        .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                        .dataTable({
                                            bAutoWidth: false,
                                            "aoColumns": [
                                                {"bSortable": false},
                                                null, null, null, null, null,
                                                {"bSortable": false}
                                            ]


                                            ,
                                            "sScrollY": "200px",
                                            "bPaginate": false,

                                            "sScrollX": "100%",
                                            "sScrollXInner": "120%",
                                            "bScrollCollapse": true,
                                            Note: if you are applying horizontal scrolling(sScrollX) on a ".table-bordered"
                                            you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                            "iDisplayLength": 50
                                        });


                        $(document).on('click', 'th input:checkbox', function () {
                            var that = this;
                            $(this).closest('table').find('tr > td:first-child input:checkbox')
                                    .each(function () {
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

                            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                            return 'left';
                        }

                    })
                </script>
    }--}}
@stop