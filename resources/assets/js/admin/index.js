$(document).ready(function () {
    $(".fancybox").fancybox();

    $(".various").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getPdfList();
        }
    });

    $(".fileedit").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getPdfList();
        }
    });

    $(".parameters_add").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getParameterList();
        }
    });

    $(".parameters_selection").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getParameterList();
        }
    });

    $(".param_edit").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getParameterList();
        }
    });

    $(".param_value_edit").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getParameterList();
        }
    });


    $(".cena_create").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getCenaGrups();
        }
    });


    $(".cena_edit").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '90%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getCenaGrups();
        }
    });

    $(".cena_refresh").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function () {
            getCenaGrups();
        }
    });


    $(".order_files").fancybox({
        maxWidth: 1000,
        maxHeight: 1000,
        fitToView: false,
        width: '80%',
        height: '80%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
    });

    setInterval(getData, 15000)

});

$("body").on("click", ".buy", function () {
    var productId = $(this).attr("data-productid"), token = $("#_token").val();
    $.post("/add_to_cart", {productId: productId, _token: token}).done(function (data) {
        /*$("#_cart").find(".qty").html(data.count);
        $("#_cart").find(".qty-items").html(data.count);
        $("#_cart").find("._sum").html(data.total);
        $(".cart_empty").hide();
        $(".cart_filled").show();*/
    });
    $(this).html("<i class='ace-icon fa fa-check'></i>В корзине");
    //$(this).parents(".item").find(".buy").val("В корзине");
});

function getPdfList() {
    var token = $("input[name='_token']").val();
    var productId = $("input[name='id']").val();
    $.ajax({
        type: "GET",
        url: "/dashboard/pdf",
        data: {_token: token, id: productId}
    }).done(function (response) {
        $("#filesup").html(response);
    });
}


function getCenaGrups(){
    var token = $("input[name='_token']").val();
    $.ajax({
        type: "GET",
        url: "/dashboard/cena/list",
        data: {_token: token}
    }).done(function (response) {
        $("#cenagrupslist").html(response);
    });
}


function deletePDF(fileID, productID) {
    var token = $("input[name='_token']").val();

    $.ajax({
        type: "POST",
        url: "/dashboard/remove-pdf",
        data: {
            _token: token,
            productId: productID,
            fileId: fileID
        }
    }).done(function () {
        getPdfList(productID);
    });
}

function deleteParam(productID, paramID){
    var token = $("input[name='_token']").val()
    $.ajax({
        type: "POST",
        url: "/dashboard/parameters/delete",
        data: {
            '_token': token,
            'productID': productID,
            'paramID': paramID
        }
    }).done(function (response) {
        $('#error').html(response);
        getParameterList();
    });
    return false;
}

function getParameterList() {
    var token = $("input[name='_token']").val(),
        productId = $("input[name='id']").val();
    $.ajax({
        type: "GET",
        url: "/dashboard/parameters/list",
        data: {id: productId, _token: token}
    }).done(function (response) {
        $("#params .inner").html(response);
    });
}

function deleteCenaGrup(ID, token){
    event.preventDefault();
    if(confirm('Потвердите удаление!')){
        $.ajax({
            type: "DELETE",
            url: "/dashboard/cena/" + ID,
            data: {
                '_token': token,
                'id': ID
            }
        }).done(function (response) {
            $('.response-field').html(response)
            getCenaGrups();
            setTimeout(function(){
                $('.response-field').html('');
            }, 5000);
        });
    }
}

// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

// устанавливает cookie с именем name и значением value
// options - объект с свойствами cookie (expires, path, domain, secure)
function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}

// удаляет cookie с именем name
function deleteCookie(name) {
    setCookie(name, "", {
        expires: -1
    })
}

//Определение фокуса
var fokus;
function focusHere(){
    window.fokus = true;
}
function focusOut(){
    window.fokus = false;
}

//Выборка данных по заказам и корзине
function getData() {
    var token = $("input[name='_token']").val();
    if(window.fokus) {
        $.ajax({
            type: "GET",
            url: "/server/getdata",
            data: {_token: token}
        }).done(function (response) {
            $("#cart").html(response);
        });
    };
}