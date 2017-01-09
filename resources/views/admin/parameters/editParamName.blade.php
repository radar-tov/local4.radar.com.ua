<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form id="value_data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="product_id" name="product_id" value="{{ $data['product_id'] }}"/>
                <input type="hidden" id="parameter_id" name="parameter_id" value="{{ $data['parameter_id'] }}"/>
                <input type="hidden" id="category_id" name="category_id" value="{{ $data['category_id'] }}"/>
                <input type="hidden" id="brand_id" name="brand_id" value="{{ $data['brand_id'] }}"/>
                <h3 align="center">Редактировать параметра.</h3>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>
                            Выбрать значение:
                        </td>
                        <td>
                            {{--{{ dump($params) }}--}}
                            <select name="value_1" id="value_1" class="form-control">
                                <option value="0"> </option>
                                @foreach($params as $param)
                                    <option value="{{ $param->id }},{{ $param->default_value }}">{{ $param->title }}</option>
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
                <button type="submit" class="btn btn-success btn-sm">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script>
    $("#value_data").submit(function(){
        var data = $(this).serialize();
        $.ajax({
            type:'POST',
            url:"/dashboard/parameters/save_param_name",
            data:data,
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
        return false;
    });

</script>