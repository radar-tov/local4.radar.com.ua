@inject('categoriesProvider', 'App\ViewDataProviders\CategoriesDataProvider')
@inject('brandsProvider', 'App\ViewDataProviders\BrandsDataProvider')
{{--{{ dump($file) }}--}}
{{--{{ dump($productShow) }}--}}
<div id="files" class="tab-pane">
    <div class="col-md-12" id="files-section">
        <div id="filesUpdate">
            <div class="response-field"></div>
            <form action="#" method="POST" id="form">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="fileID" name="fileID" value="{{ $file->id }}"/>
                <input type="hidden" id="productID" name="productID" value="{{ $productShow->product_id }}"/>
                <h3 align="center">Файл № {{ $file->id }}</h3>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>{!! Form::label('admin_name', 'Название для админки') !!}</td>
                        <td>{!! Form::text('admin_name', $value = $file->admin_name, ['id'=>'admin_name', 'class' => 'validate form-control']) !!}
                    </tr>
                    <tr>
                        <td>{!! Form::label('name', 'Название файла') !!}</td>
                        <td>{!! Form::text('name', $value = $file->name, ['id'=>'name', 'class' => 'validate form-control']) !!}
                    </tr>
                    <tr>
                        <td>{!! Form::label('category_id', 'Категория') !!}</td>
                        <td>{!! Form::select('category_id', $value = $categoriesProvider->getCategoriesList(), $selected = $file->category_id,
                                ['id'=>'category_id', 'class' => 'validate form-control'])!!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('brand_id', 'Бренд') !!}</td>
                        <td>{!! Form::select('brand_id', $value = $brandsProvider->getList(), $selected = $file->brand_id,
                                ['id'=>'brand_id', 'class' => 'validate form-control'])!!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('path', 'Путь к файлу') !!}</td>
                        <td>{!! Form::text('path', $value = $file->path, ['id'=>'path', 'class' => 'validate form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('hash_name', 'Хеш') !!}</td>
                        <td>{!! Form::text('hash_name', $value = $file->hash_name, ['id'=>'hash_name', 'class' => 'validate form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('downloads', 'Скачан раз') !!}</td>
                        <td>{!! Form::text('downloads', $value = $file->downloads, ['id'=>'downloads', 'class' => 'validate form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('show', 'Показывать на сайте') !!}</td>
                        <td><input type="checkbox" name="show" id="show" class="validate" {{ ($file->show == 1) ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('showProduct', 'Показывать в продукте') !!}</td>
                        <td><input type="checkbox" name="showProduct" id="showProduct" class="validate" {{ ($productShow->show == 1) ? 'checked' : '' }}></td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('created_at', 'Создан') !!}</td>
                        <td>{!! Form::text('created_at', $value = $file->created_at, ['id'=>'created_at', 'class' => 'validate form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('updated_at', 'Изменён') !!}</td>
                        <td>{!! Form::text('updated_at', $value = $file->updated_at, ['id'=>'updated_at', 'class' => 'validate form-control']) !!}</td>
                    </tr>
                </table>
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="saveFileEdit(); return false;">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    function saveFileEdit(){
        var form = $("#form").serialize();
//        var _token = $("#_token").val(),
//            category_id = $("#category_id").val(),
//            admin_name = $("#admin_name").val(),
//            fileID = $("#fileID").val(),
//            productID = $("#productID").val(),
//            name = $("#name").val(),
//            path = $("#path").val(),
//            hash_name = $("#hash_name").val(),
//            downloads = $("#downloads").val(),
//            show = $("#show").is(':checked') ,
//            showProduct = $("#showProduct").is(':checked'),
//            created_at = $("#created_at").val(),
//            updated_at = $("#updated_at").val();
//alert(name);
        $.ajax({
            url: '/dashboard/pdf',
            data : form,
//            data: {
//                '_token': _token,
//                'fileID': fileID,
//                'productID': productID,
//                'name': name,
//                'path': path,
//                'hash_name': hash_name,
//                'downloads': downloads,
//                'show': show,
//                'showProduct': showProduct,
//                'created_at': created_at,
//                'updated_at': updated_at,
//                'admin_name': admin_name,
//                'category_id': category_id
//            },
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
