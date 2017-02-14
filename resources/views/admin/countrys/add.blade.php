<div id="country" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="countryUpdate">
            <div class="response-field"></div>
            <form id="country_data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <h3 align="center">Добавить страну</h3>
                <input id="name" name="name" type="text" class="validate form-control">
                <hr>
                <button type="submit" class="btn btn-success btn-sm">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script>
    $("#country_data").submit(function(){
        var data = $(this).serialize();
        $.ajax({
            type:'POST',
            url:"/dashboard/country/save",
            data:data,
            success: function (response) {
                $("#countryUpdate").html(response);
            },
            error: function (errors) {
                $('.response-field').html(errors);
            }
        });
        return false;
    });

</script>