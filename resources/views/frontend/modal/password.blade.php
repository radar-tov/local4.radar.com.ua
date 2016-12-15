<div id="forgot">
    <div class="response-field"></div>
    <div class="modal-content">
        <form action="{{ url('password/email') }}" method="POST">
            <div class="input-field col s12 center-align">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <input placeholder="введите ваш e-mail" id="email" type="text" name="email" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="password(); return false;"> Выслать письмо <i class="fa fa-envelop"></i></button>
            </div>
        </form>
    </div>
</div>
<script>
    function password(){
        var email = $("#email").val(),
            token = $("#token").val()    ;

        $.ajax({
            url: '{!! url('password/email') !!}',
            data: {'email': email, '_token': token},
            type: 'POST',
            success: function (response) {
                console.log(response);
                $("#forgot").html('<h3 align="center">'+response+'</h3>');
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