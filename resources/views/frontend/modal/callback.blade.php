<div id="callorder">
    <div class="response-field"></div>
    <div class="modal-content">
        <div class="input-field col s12 center-align">
            <form action="{!! route('mail.callback') !!}" method="POST">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="view" name="_view" value="callback"/>
                <input required="required" placeholder="Ваше имя" id="name1" name="name" type="text" class="validate">
                <input required="required" placeholder="Номер телефона" id="phone1" name="phone" type="text" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action"
                        onclick="yaCounter39848700.reachGoal('callBack'); ga('send', 'event', 'Knopka', 'callBack'); callbeck(); return false;">
                    <i class="fa fa-phone"></i>Заказать
                </button>
            </form>
        </div>
    </div>
</div>
<script src="/frontend/js/jquery.maskedinput.min.js"></script>
<script>
    $("#phone1").mask("(999) 999-99-99");

    function callbeck(){
        var token = $("#token").val(),
            view = $("#view").val(),
            name = $("#name1").val(),
            phone = $("#phone1").val();

        $.ajax({
            url: '{!! route('mail.callback') !!}',
            data: {'_view': view, 'name': name,  '_token': token,  'phone': phone},
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