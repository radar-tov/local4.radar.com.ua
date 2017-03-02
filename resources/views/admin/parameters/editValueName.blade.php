{{--{{ dump($value) }}--}}
<div id="value" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="valueUpdate">
            <div class="response-field"></div>
            <form id="param_data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" value="{{ $value->id }}"/>
                <h3 align="center">Редактировать название значения параметра</h3>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>
                            <input type="text" name="value" value="{{ $value->value }}" class="form-control">
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
            url:"/dashboard/parameters/save_value_name",
            data:data,
            success: function (response) {
                //console.log(response);
                $("#valueUpdate").html(response);
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