<div id="montagniki">
    <div class="modal-content">
        <div class="input-field col s12 center-align">
            <div class="col s12 m12 feedback">
                <div class="response-field">
                    <h4>Обратная связь</h4>
                    <p class="col s12 no-padding">Отправьте нам е-мейл. Все поля, помеченные *, обязательны для заполнения.</p>
                </div>
                <form action="{!! route('mail.me') !!}" id="contactForm" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <input type="hidden" name="_view" value="skidka" id="view"/>
                    <div class="row">
                        <div class="col s12 m12 no-padding">
                            <div class="form-group">
                                <input required="required" name="name" class="form-control col validate" id="name"
                                       placeholder="Ваше имя (*)" title="Name" value="" type="text">
                            </div>
                            <div class="form-group">
                                <input required="required" name="email"
                                       class="form-control col validate-email" id="email"
                                       placeholder="Ваш email (*)" title="Email" value="" type="text">
                            </div>
                            <div class="form-group">
                                <input class="input-text col form-control validate" name="phone" id="phone"
                                       placeholder="Ваш номер телефона" title="Telephone" value="" type="text">
                            </div>
                        </div>
                        <div class="col s12 m12 no-padding">
                            <div class="form-group">
                                <textarea required="required" name="comment" placeholder="Ваше сообщение (*)"
                                          id="comment" title="Comment"
                                          class="form-control col input-text validate" cols="5"
                                          rows="3"></textarea>
                            </div>

                        </div>
                        <div class="buttons-set clearfix">
                            <button class="btn waves-effect waves-light"
                                    type="submit"
                                    name="action"
                                    onclick="montagniki(); return false;">Отправить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function montagniki(){
        var token = $("#token").val(),
            view = $("#view").val(),
            name = $("#name").val(),
            phone = $("#phone").val(),
            email = $("#email").val(),
            comment = $("#comment").val();

        $.ajax({
            url: '{!! route('mail.me') !!}',
            data: {'_view': view, 'name': name,  '_token': token,  'phone': phone, 'email': email, 'comment': comment},
            type: 'POST',
            success: function (response) {
               // console.log(response);
                $("#montagniki").html(response);
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