{{ dump($request) }}

<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form action="#" method="POST">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="productID" name="productID" value="{{ $request->productID }}"/>
                <input type="hidden" id="categoryID" name="productID" value="{{ $request->categoryID }}"/>
                <h3 align="center">Добавить параметр</h3>

                @for($i=1; $i < 5; $i++ )


                    <select id="{{ 'fileID_'.$i }}" name="{{ 'fileID_'.$i }}" class="'validate form-control">
                        <option></option>
                        @foreach($file as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    <br>

                @endfor


                <hr>
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="addFileEdit(); return false;">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function addFileEdit(){
        var _token      =   $("#_token").val(),
                productID   =   $("#productID").val(),
                fileID_1    =   $("#fileID_1").val(),
                fileID_2    =   $("#fileID_2").val(),
                fileID_3    =   $("#fileID_3").val(),
                fileID_4    =   $("#fileID_4").val();

        $.ajax({
            url: '',
            data: {
                '_token': _token,
                'productID': productID,
                'fileID': [fileID_1, fileID_2, fileID_3, fileID_4]
            },
            type: 'POST',
            success: function (response) {
                // console.log(response);
                $("#filesUpdate").html(response);
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