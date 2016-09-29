<div id="filter" class="row">
    <div class="col-xs-6 col-lg-6">
        <div class="form-group">
            <label for="title">Название</label>
            <input
                v-model='title'
                type="text"
                name="title"
                class="form-control"
                id="title"
                value="{!! old('title',$filter->title) !!}"
                placeholder='Название параметра'
            />
        </div>
    </div>
  {{--  <div class="col-xs-6">
        <div class="form-group">
            <a href="#" class="pull-right" v-on="click:makeSlug($event)" v-show="title">
                <small>Сгенерировать ссылку</small>
                <i class="fa fa-sort-alpha-asc"></i>
            </a>
            <label for="title">Ссылка</label>
            <input
                type="text"
                name="slug"
                class="form-control"
                id="slug"
                value="{!! old('slug', $filter->slug) !!}"
                placeholder='Ссылка'
                v-model="slug"
            />
        </div>
    </div>--}}
</div>

@if(isset($filter->values))
    <div class="col-xs-12">
        <label>Доступные значения характеристики</label>
    </div>
    <div id="values" class="col-xs-6" >
        <div class="form-group">
            <input type="hidden" value="{{ $filter->id }}" name="filterId" v-model="filterId"/>
            <div class="input-group">
                <input
                    type="text"
                    name="value"
                    class="form-control"
                    id="filterValue"
                    value="{!! old('value') !!}"
                    placeholder='Значение'
                    v-model="newValue"
                    v-el="newValue"
                />
                <span class="input-group-btn">
                    <button v-on="click: saveValue" type="button" class="btn btn-primary btn-sm" title="Добавить">
                        Добавить
                        <i class="ace-icon fa  fa-chevron-down icon-on-right bigger-110"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="dd" id="nestable">
            <ol class="list-group dd-list">
                <li v-repeat="v: values | orderBy 'order'"
                    class="list-group-item dd-item"
                    data-id="@{{ v.id }}"
                >
                    <div class="dd-handle">
                        <span v-on="dblclick: editValue($event,v)">
                            @{{ v.value }}
                        </span>
                        <div class="pull-right control">
                            <a v-on="click: editValue($event,v)"class="btn btn-xs btn-white btn-info"><i class="fa fa-edit"></i></a>
                            <a v-on="click: removeValue($event,v)"class="btn btn-xs btn-white btn-info "><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </li>
            </ol>
        </div>

    {{--
        <pre>
            @{{ $data | json }}
        </pre>
    --}}
    </div>
@endif

@section('top-scripts')
    <style>
        #nestable .dd-handle {
             background: none;
             border: none;
        }
    </style>
@endsection

@section('bottom-scripts')
    @parent
    <script src="{{ url('admin/assets/js/app/filters-values.js') }}"></script>

    <!-- Sortable -->
    <script src="{{ url('admin/assets/js/jquery.nestable.min.js') }}"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($){
            var nestable,
                    serialized,
                    settings = {maxDepth:1},
                    saveOrder = $('#saveOrder'),
                    edit = $('.edit');

            nestable = $('.dd').nestable(settings);

            jQuery('.dd').on('change', function() {
                serialized = nestable.nestable('serialize');

                $.ajax({
                    method:'POST',
                    url : "{!! route('dashboard.values.order') !!}",
                    data: { _token: "{!! csrf_token() !!}", serialized: serialized }

                }).done(function (data) {
                    //alert("Сохранено!");
                })

                console.log(serialized);
            });

            saveOrder.on('click', function(e) {
                e.preventDefault();
                serialized = nestable.nestable('serialize');

                $.ajax({
                    method:'POST',
                    url : "{!! route('dashboard.categories.order') !!}",
                    data: { _token: "{!! csrf_token() !!}", serialized: serialized }

                }).done(function (data) {
                    alert("Сохранено!");
                })
            })

            $('.dd-handle a, .dd-handle .control').on('mousedown', function(e){
                e.stopPropagation();
            });


            $('[data-rel="tooltip"]').tooltip();

        });



        //                .fail(function () {
        //                    alert('Questions could not be loaded.');
        //                });

        //  console.log(serialized);

        //          });



        //            $('[data-rel="tooltip"]').tooltip();
        //            $('[data-rel="tooltip"]').tooltip();
        //        });
    </script>

@endsection
