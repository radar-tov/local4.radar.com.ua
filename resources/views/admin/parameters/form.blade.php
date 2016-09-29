<div class="row">
    <div id="parameter" class="col-xs-12">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="title">Название</label>
                    <input
                        v-model='title'
                        type="text"
                        name="title"
                        class="form-control"
                        id="title"
                        value="{!! old('title',$parameter->title) !!}"
                        placeholder='Название параметра'
                    />
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="title">Ссылка</label>
                    <input
                        type="text"
                        name="slug"
                        class="form-control"
                        id="slug"
                        value="{!! old('slug', $parameter->slug) !!}"
                        placeholder='Ссылка'
                        v-model="slug"
                    />
                </div>
            </div>
        </div>
    </div>

    @if(isset($parameter->values))
        <hr/>
        <div class="col-xs-12">
            <h4>Значения параметров</h4>
        </div>
        <div id="values" class="col-xs-6" >
            <div class="form-group">
                <input type="hidden" value="{{ $parameter->id }}" name="parameterId" v-model="id"/>
                <div class="input-group">
                    <input
                        type="text"
                        name="value"
                        class="form-control"
                        id="slug",
                        value="{!! old('value') !!}"
                        placeholder='Значение'
                        v-model="newValue",
                        v-el="newValue"
                    />
                    <span class="input-group-btn">
                        <button v-on="click: addValue" type="button" class="btn btn-primary btn-sm" title="Добавить">
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
                    <span v-on="dblclick: editValue(v)">
                        @{{ v.value }}
                    </span>
                    <div class="pull-right">
                        <button v-on="click: editValue(v)"class="btn btn-xs btn-white btn-info"><i class="fa fa-edit"></i></button>
                        <button v-on="click: removeValue(v)"class="btn btn-xs btn-white btn-info "><i class="fa fa-times"></i></button>
                    </div>
                </li>
            </ol>

            <pre>
                @{{ $data | json }}
            </pre>
        </div>
    @endif
</div>

@section('bottom-scripts')
    @parent
    <script src="{{ url('admin/assets/js/app/parameter-values.js') }}"></script>
@endsection
