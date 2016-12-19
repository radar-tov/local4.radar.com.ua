$(document).ready(function() {
    $(".fancybox").fancybox();

    $(".various").fancybox({
        maxWidth	: 1000,
        maxHeight	: 1000,
        fitToView	: false,
        width		: '80%',
        height		: '80%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

});