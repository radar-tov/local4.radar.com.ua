@extends('admin.app')

@section('top-scripts')
    {!! Html::script("admin/assets/js/vue.js") !!}
@stop

@section('page-title')
    Районы
@stop

@section('content')
    <div class="col-xs-12">
        <div class="row"  id="areas">
            {{--<pre>--}}
            {{--@{{ $data | json }}--}}
            {{--</pre>--}}
            <div class="col-xs-12">
                <div class="row">
                        <div class="col-xs-7">
                             <div class="form-group">
                                <div class="col-xs-4">
                                     {!! Form::text('area', $value = null, ['class' => 'form-control',
                                            "placeholder" => "Район",
                                            'v-on' => 'keyup:save | key enter',
                                            'v-model' => 'area.name', "v-el" => "input"]) !!}

                                     <input type="hidden" value="{{ csrf_token() }}" v-model="token"/>
                                    </div>
                                 <div class="col-xs-4">
                                     {!! Form::select("city", [0 => "Выберите город"] + $citiesList, $value = null, ['class' => 'form-control',
                                                  'v-model' => 'city']
                                  ) !!}
                                 </div>
                                 <button v-on="click: save" class="btn btn-sm btn-primary">Сохранить</button>
                        	</div>
                        </div>
                        <div class="col-md-7">
                            @if(!!$areas->render())
                            <ul class="pager pull-right">
                                <li><a href="@{{ prev }}" rel="prev" v-on="click: index($event)">«</a></li>
                                <li><a href="@{{ next }}" rel="next" v-on="click: index($event)">»</a></li>
                            </ul>
                            @endif
                        </div>

                </div>
                   <table class="table" v-if="areas">
                       <thead>
                       <tr>
                           <th>Район</th>
                           <th>Город</th>
                           <th colspan="2" class="options">Опции</th>
                       </tr>
                       </thead>
                       <tbody>
                           <tr v-repeat="area: areas | orderBy 'name' ">
                               <td>
                                   @{{ area.name }}
                               </td>
                               <td>
                                   @{{ area.city.name }}
                               </td>
                               <td class="options">
                                   <a class="green" href="#" v-on="click: editArea(area, $event)"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
                               </td>
                                <td class="options">
                                   <a class="red" href="#" v-on="click: deleteArea(area, $event)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                               </td>
                           </tr>

                       </tbody>
                   </table>

            </div>
        </div>
    </div><!-- /.col -->
@stop

@section('bottom-scripts')
    {!! Html::script("admin/assets/js/areas.js") !!}
@stop
