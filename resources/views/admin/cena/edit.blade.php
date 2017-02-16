@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')

<div id="cena" class="tab-pane">
    <div class="col-md-12" id="params-section">
        <div id="cenaUpdate">
            <div class="response-field"></div>
            <form id="cena_data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $cenagrup->id }}"/>
                <h3 align="center">Редактировать группу цен</h3>
                <lable>Название группы</lable>
                <input type="text" name="name" class="form-control" value="{{ $cenagrup->name }}">
                {!! Form::label('brand_id','Бренд') !!}
                {!! Form::select('brand_id', $value = $brandsProvider->getList(), $selected = $cenagrup->brand_id, ['class'=>'form-control']) !!}
                <lable>Валюта</lable>
                <select name="valuta" class="form-control">
                    <option value="{{ $cenagrup->valuta }}">
                        @if($cenagrup->valuta == 1) Гривна
                        @elseif($cenagrup->valuta == 2) Доллар
                        @elseif($cenagrup->valuta == 3) Евро
                        @else ''
                        @endif
                    </option>
                    <option value="1">Гривна</option>
                    <option value="2">Доллар</option>
                    <option value="3">Евро</option>
                </select>
                <lable>Курс</lable>
                <input type="decimal" name="curs" class="form-control" value="{{ $cenagrup->curs }}">
                <lable>Курс опт</lable>
                <input type="decimal" name="curs_opt" class="form-control" value="{{ $cenagrup->curs_opt }}">
                <lable>Скидка</lable>
                <input type="decimal" name="skidka" class="form-control" value="{{ $cenagrup->skidka }}">
                <lable>Наценка</lable>
                <input type="decimal" name="nacenka" class="form-control" value="{{ $cenagrup->nacenka }}">
                <lable>Скидка для монтажников</lable>
                <input type="decimal" name="skidka_montaj" class="form-control" value="{{ $cenagrup->skidka_montaj }}">
                <lable>Скидка для оптовиков</lable>
                <input type="decimal" name="skidka_opt" class="form-control" value="{{ $cenagrup->skidka_opt }}">
                <lable>Комментарии</lable>
                <input type="textarea" name="coment" class="form-control" value="{{ $cenagrup->coment }}">
                <lable>Файл</lable>
                <input type="textarea" name="file" class="form-control" value="{{ $cenagrup->file }}">
                <hr>
                <button type="submit" class="btn btn-success btn-sm">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script>
    $("#cena_data").submit(function(){
        var data = $(this).serialize();
        $.ajax({
            type:'PUT',
            url:"/dashboard/cena/" + $("input[name='id']").val(),
            data:data,
            success: function (response) {
                //console.log(response);
                $("#cenaUpdate").html(response);
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