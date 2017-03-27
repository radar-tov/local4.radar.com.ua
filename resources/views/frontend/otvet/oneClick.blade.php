<div id="callorder">
    <div class="response-field"></div>
    <div class="modal-content">
        <div class="input-field col s12 center-align">
            <h3 align="center">Купить {{ $product->title }}</h3>
            <form action="#" method="POST">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="view" name="_view" value="oneclick"/>
                <input required="required" placeholder="Ваш номер телефона" id="phone" name="phone" type="text" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action"
                        onclick="yaCounter39848700.reachGoal('oneclick'); ga('send', 'event', 'Knopka', 'oneclick'); oneclick(); return false;">
                    <i class="fa fa-phone"></i>Купить в 1 клик
                </button>
            </form>
        </div>
    </div>
</div>
<script src="/frontend/js/jquery.maskedinput.min.js"></script>
<script>
    $("#phone").mask("(999)999-99-99");
    function oneclick(){
        $.ajax({
            url: '{!! route('mail.oneclick') !!}',
            data: {
                '_view': $("#view").val(),
                '_token': $("#token").val(),
                'phone': $("#phone").val(),
                'id': '{{ $product->id }}',
                'title': '{{ $product->title }}'
            },
            type: 'POST',
            success: function (response) {
                // console.log(response);
                $("#callorder").html(response);
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
{{--{{ dd($product) }}--}}