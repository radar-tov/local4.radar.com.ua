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
        height: '80%',
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