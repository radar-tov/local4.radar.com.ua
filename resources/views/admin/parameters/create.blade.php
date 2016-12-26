{{--{{ dump($request) }}--}}

<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form id="param_data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="brandID" name="brandID" value="{{ $request['brandID'] }}"/>
                <input type="hidden" id="productID" name="productID" value="{{ $request['productID'] }}"/>
                <input type="hidden" id="categoryID" name="categoryID" value="{{ $request['categoryID'] }}"/>
                <h3 align="center">Добавить параметр</h3>
                <table class="table table-bordered table-hover">
                    @for($i=1; $i < 11; $i++ )
                        <tr>
                            <td><input id="param_{{ $i }}" name="param_{{ $i }}" type="text" class="validate form-control"></td>
                            <td><input id="value_{{ $i }}" name="value_{{ $i }}" type="text" class="validate form-control"></td>
                        </tr>
                    @endfor
                </table>
                <hr>
                <button type="submit" class="btn btn-success btn-sm">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script>
    $("#param_data").submit(function(){
        var data = $(this).serialize();
        $.ajax({
            type:'POST',
            url:"/dashboard/parameters/addparams",
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