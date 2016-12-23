<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form action="#" method="POST">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="productID" name="productID" value="{{ $data['productID'] }}"/>
                <input type="hidden" id="parameterID" name="parameterID" value="{{ $param->id }}"/>
                <h3 align="center">Редактировать значение для параметра: {{ $param->title }}</h3>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>
                            Выбрать значение:
                        </td>
                        <td>
                            <select name="value_1" id="value_1" class="form-control">
                                @foreach($values as $value)
                                    <option value="{{ $value->id }}">{{ $value->value }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Добавить значение:
                        </td>
                        <td>
                            <input type="text" name="value_2" id="value_2" class="form-control">
                        </td>
                    </tr>
                </table>
                <button onclick="saveParameter(); return false" class="btn btn-success btn-sm">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script>
    function saveParameter(){

        var _token = $("#_token").val(),
            parameterID = $("#parameterID").val(),
            productID = $("#productID").val(),
            value_1 = $("#value_1").val(),
            value_2 = $("#value_2").val();

        $.ajax({
            url: '/dashboard/parameters/save_value',
            data: {
                '_token': _token,
                'parameterID': parameterID,
                'productID': productID,
                'value': [value_1, value_2]
            },
            type: 'POST',
            success: function (response) {
                //console.log(response);
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