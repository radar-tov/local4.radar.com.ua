<div id="comment">
    <div class="response-field"></div>
    <div class="modal-content">
        <form action="{!! route('add.review') !!}" method="post" id="review-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
            <input type="hidden" name="product_id" value="{{ $id or 0 }}" id="product_id"/>
            <div class="input-field col s12">
                <input class="materialize-textarea" disabled placeholder="Ваше имя" id="name"
                       name="name" value="{{ str_replace(' ', '&nbsp;', ( Auth::check() ? Auth::user()->name : 'anonimus')) }}" type="text"/>
                <textarea class="materialize-textarea" placeholder="Отзыв" name="body" value="" id="body" required></textarea>
                <button class="btn waves-effect waves-light" type="submit"
                        onclick="yaCounter39848700.reachGoal('addComent'); ga('send', 'event', 'Knopka', 'addComent'); comment(); return false;">Отправить</button>
            </div>
        </form>
    </div>
</div>

<script>
    function comment(){
        var token = $("#token").val(),
            product_id = $("#product_id").val(),
            name = $("#name").val(),
            body = $("#body").val();

        $.ajax({
            url: '{!! route('add.review') !!}',
            data: {'product_id': product_id,  '_token': token,  'name': name, 'body': body},
            type: 'POST',
            success: function (response) {
                //console.log(response);
                $("#comment").html(response);
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