{{--{{ dump($params) }}--}}
{{--{{ dump($request) }}--}}
<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form action="#" method="POST">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="categoryID" name="categoryID" value="{{ $request['categoryID'] }}"/>
                <input type="hidden" id="brandID" name="brandID" value="{{ $request['brandID'] }}"/>
                <input type="hidden" id="productID" name="productID" value="{{ $request['productID'] }}"/>
                <h3 align="center">Выбрать параметр</h3>
                <table class="table table-bordered table-hover">
                @for($i=1; $i < 11; $i++ )
                    <tr>
                        <td>
                            <select id="param_{{ $i }}" name="param_{{ $i }}" class="'validate form-control">
                                <option></option>
                                @foreach($params as $param)
                                    <option value="{{ $param->id }}">{{ $param->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select id="value_{{ $i }}" name="value_{{ $i }}" class="'validate form-control">
                                <option></option>
                                {{--@foreach($params->getValues as $value)--}}
                                    {{--<option value="{{ $value->id }}">{{ $value->title }}</option>--}}
                                {{--@endforeach--}}
                            </select>
                        </td>
                    </tr>
                @endfor
                </table>
                <hr>
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="selectionParam(); return false;">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function selectionParam(){
        var _token      =   $("#_token").val(),
            productID   =   $("#productID").val(),
            categoryID   =   $("#categoryID").val(),
            brandID   =   $("#brandID").val(),
            param_1 = $("#param_1").val(),
            param_2 = $("#param_2").val(),
            param_3 = $("#param_3").val(),
            param_4 = $("#param_4").val(),
            param_5 = $("#param_5").val(),
            param_6 = $("#param_6").val(),
            param_7 = $("#param_7").val(),
            param_8 = $("#param_8").val(),
            param_9 = $("#param_9").val(),
            param_10 = $("#param_10").val();


        $.ajax({
            url: '{{ url('/dashboard/parameters/save') }}',
            data: {
                '_token': _token,
                'productID': productID,
                'categoryID': categoryID,
                'brandID': brandID,
                'param': [param_1, param_2, param_3, param_4, param_5, param_6, param_7, param_8, param_9, param_10]
            },
            type: 'POST',
            success: function (response) {
                // console.log(response);
                $("#paramsUpdate").html(response);
            },
            error: function (errors) {
                output = "<div class='alert alert-danger'><ul>";
                $.each(errors.responseJSON, function(index, error){
                    output += "<li>" + error + "</li>";
                });
                output += "</ul></div>";
                $('.response-field').html(output);
                //console.log(errors);
            }
        });
    }

</script>