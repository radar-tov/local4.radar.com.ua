{{--{{ dump($params) }}--}}
{{--{{ dump($request) }}--}}
<div id="params" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="paramsUpdate">
            <div class="response-field"></div>
            <form id="select_param">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="categoryID" name="categoryID" value="{{ $request['categoryID'] }}"/>
                <input type="hidden" id="brandID" name="brandID" value="{{ $request['brandID'] }}"/>
                <input type="hidden" id="productID" name="productID" value="{{ $request['productID'] }}"/>
                <h3 align="center">Выбрать параметр</h3>
                <table class="table table-bordered table-hover">
                @for($i=1; $i < 11; $i++ )
                    <tr>
                        <td>
                            <select id="param_{{ $i }}" name="param_{{ $i }}" class="validate form-control">
                                <option></option>
                                @foreach($params as $param)
                                    <option value="{{ $param->id }}">{{ $param->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div id="result_{{ $i }}"></div>
                            {{--<select id="value_{{ $i }}" name="value_{{ $i }}" class="'validate form-control">--}}
                                {{--<option></option>--}}

                            {{--</select>--}}
                        </td>
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
    $( ".validate" ).change(function() {
        var id = $(this).val(),
            i = $(this).attr('id').split('_')[1];
        $.ajax({
            type:'POST',
            url:'/dashboard/parameters/getvalue',
            data:{
                'id': id,
                'i': i,
                '_token': $("#_token").val()
            },
            success: function (response) {
                $("#result_"+i).html(response);
            }
        });
    });


    $("#select_param").submit(function(){
        var data = $(this).serialize();
        $.ajax({
            type:'POST',
            url:"/dashboard/parameters/save",
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