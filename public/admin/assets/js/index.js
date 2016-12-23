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

});

function getPdfList() {
    var token = $("input[name='_token']").val(),
        productId = $("input[name='product-id']").val();
    $.ajax({
        type: "GET",
        url: "/dashboard/pdf",
        data: {_token: token, id: productId}
    }).done(function (response) {
        $("#filesup").html(response);
    });
}

function deletePDF(fileID) {
    var token = $("input[name='_token']").val(),
        productId = $("input[name='product-id']").val(),
        fileId = $("input[name='fileId']").val();

    $.ajax({
        type: "POST",
        url: "/dashboard/remove-pdf",
        data: {
            _token: token,
            productId: productId,
            fileId: fileID
        }
    }).done(function () {
        getPdfList();
    });
}

function getParameterList() {
    var token = $("input[name='_token']").val(),
        productId = $("input[name='product-id']").val();
    $.ajax({
        type: "GET",
        url: "/dashboard/parameters/list",
        data: {id: productId, _token: token}
    }).done(function (response) {
        $("#paramsup").html(response);
    });
}