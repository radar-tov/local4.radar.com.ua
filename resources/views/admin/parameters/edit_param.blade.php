{{--{{ dump($param) }}--}}
<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form id="param_data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="parameterID" name="parameterID" value="{{ $param->id }}"/>
                <h3 align="center">Редактировать параметр</h3>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>
                            <input type="text" name="param" value="{{ $param->title }}" class="form-control">
                        </td>
                    </tr>
                </table>
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
            url:"/dashboard/parameters/save_param",
            data:data,
            success: function (response) {
                //console.log(response);
                $("#paramsUpdate").html(response);
                $.fancybox.close();
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