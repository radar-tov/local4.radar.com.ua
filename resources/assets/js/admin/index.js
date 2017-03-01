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

    setTimeout(function () {
        alert(getCookie('menu'));
        if(getCookie('menu') == 'false'){
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        }
        if(getCookie('menu') == 'true'){
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        }
    }, 1000);
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

function menuCookie() {
    var value = null,
        options = {};

    if(getCookie('menu') == 'false'){
        try{
            ace.settings.check('sidebar' , 'fixed');
            value = 'true';
        }catch(e){
            value = 'false';
        }

    }
    if(getCookie('menu') == 'true'){
        try{
            ace.settings.check('sidebar' , 'collapsed');
            value = 'false';
        }catch(e){
            value = 'true';
        }
    }

    setCookie('menu', value, options)
    alert(getCookie('menu'));
}
