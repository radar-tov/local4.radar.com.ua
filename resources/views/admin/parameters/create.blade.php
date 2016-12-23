{{--{{ dump($request) }}--}}

<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form action="#" method="POST">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="brandID" name="brandID" value="{{ $request['brandID'] }}"/>
                <input type="hidden" id="productID" name="productID" value="{{ $request['productID'] }}"/>
                <input type="hidden" id="categoryID" name="categoryID" value="{{ $request['categoryID'] }}"/>
                <h3 align="center">Добавить параметр</h3>
                <table class="table table-bordered table-hover">
                    @for($i=1; $i < 11; $i++ )
                        <tr>
                            <td><input id="param_{{ $i }}" type="text" class="'validate form-control"></td>
                            <td><input id="value_{{ $i }}" type="text" class="'validate form-control"></td>
                        </tr>
                    @endfor
                </table>
                <hr>
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="addParameter(); return false;">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function addParameter(){

        var _token = $("#_token").val(),
            categoryID = $("#categoryID").val(),
            brandID = $("#brandID").val(),
            productID = $("#productID").val(),
            param_1 = $("#param_1").val(),
            param_2 = $("#param_2").val(),
            param_3 = $("#param_3").val(),
            param_4 = $("#param_4").val(),
            param_5 = $("#param_5").val(),
            param_6 = $("#param_6").val(),
            param_7 = $("#param_7").val(),
            param_8 = $("#param_8").val(),
            param_9 = $("#param_9").val(),
            param_10 = $("#param_10").val(),
            value_1 = $("#value_1").val(),
            value_2 = $("#value_2").val(),
            value_3 = $("#value_3").val(),
            value_4 = $("#value_4").val(),
            value_5 = $("#value_5").val(),
            value_6 = $("#value_6").val(),
            value_7 = $("#value_7").val(),
            value_8 = $("#value_8").val(),
            value_9 = $("#value_9").val(),
            value_10 = $("#value_10").val();

        $.ajax({
            url: '/dashboard/parameters/addparams',
            data: {
                '_token': _token,
                'categoryID': categoryID,
                'productID': productID,
                'brandID': brandID,
                'param': [param_1, param_2, param_3, param_4, param_5, param_6, param_7, param_8, param_9, param_10],
                'value': [value_1, value_2, value_3, value_4, value_5, value_6, value_7, value_8, value_9, value_10]
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