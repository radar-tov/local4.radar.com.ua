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
                value="{!! old('title',$characteristic->title) !!}"
                placeholder='Название параметра'
            />
        </div>
    </div>
</div>

@if(isset($characteristic->values))
    <div class="col-xs-12">
        <h4>Значения параметров</h4>
    </div>
    <div id="values" class="col-xs-6" >
        <div class="form-group">
            <input type="hidden" value="{{ $characteristic->id }}" name="filterId" v-model="filterId"/>
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
                    v-on="keyup:submit | key 13"
                />
                <span class="input-group-btn">
                    <button v-on="click: saveValue" type="button" class="btn btn-primary btn-sm" title="Добавить">
                        Добавить
                        <i class="ace-icon fa  fa-chevron-down icon-on-right bigger-110"></i>
                    </button>
                </span>
            </div>
        </div>

        <ol class="list-group no-padding">
            <li v-repeat="v: values"
                class="list-group-item"
            >
                <span v-on="dblclick: editValue($event,v)">
                    @{{ v.value }}
                </span>
                <div class="pull-right">
                    <button v-on="click: editValue($event,v)"class="btn btn-xs btn-white btn-info"><i class="fa fa-edit"></i></button>
                    <button v-on="click: removeValue($event,v)"class="btn btn-xs btn-white btn-info "><i class="fa fa-times"></i></button>
                </div>
            </li>
        </ol>

        <pre>
            @{{ $data | json }}
        </pre>
    </div>
@endif

@section('bottom-scripts')
    @parent
    <script src="{{ url('admin/assets/js/app/characteristic-values.js') }}"></script>
@endsection
