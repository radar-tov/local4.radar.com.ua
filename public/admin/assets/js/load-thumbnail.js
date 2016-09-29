$(function(){
    //var thumbnail;
    //$(document).mousemove(function(){
    //    thumbnail = $("#thumbnail").val();
    //
    //    if(thumbnail.length > 0) {
    //        var img = $('<img />', {
    //            id: '',
    //            src: '/' + thumbnail,
    //            alt: ''
    //        });
    //        $('div.thumb-box').html(img);
    //    }
    //});

    var thumbThumb,
        thumb = $("#thumbnail").val();

    setInterval(function(){
        thumbThumb = $("#thumbnail").val();

        if(thumbThumb.length > 0 && (thumb !== thumbThumb)) {
            thumb = thumbThumb;
            thumbThumb = null;
            var img = $('<img />', {
                id: '',
                src: '/' + thumb,
                alt: ''
            });
            $('div.thumb-box').html(img);
        }
    },200);

    $("#clear").click(function(e){
        e.preventDefault();
        $("#thumbnail").val('')
        $('div.thumb-box').html('');
    });
});