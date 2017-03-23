function initRating() {
    $('.rating_1').rating({
        fx: 'full',
        image: '/frontend/images/stars2.png',
        loader: '/frontend/images/ajax-loader.gif',
        url: '/rate',
        readOnly: true,
        callback: function (responce) {
            this.vote_success.fadeOut(2000);
        }
    });
    $('.rating_2').each(function () {
        var self = $(this);
        self.rating({
            fx: 'full',
            image: '/frontend/images/hover-stars.png',
            loader: '/frontend/images/ajax-loader.gif',
            url: '/rate',
            readOnly: true,
            callback: function (responce) {
                this.vote_success.fadeOut(2000);
            }
        });
    })
}
(function ($) {
    $(function () {
        $(function () {
            initRating();
        });
        $(document).ready(function () {
            $('.modal-trigger').leanModal();
            $('.tabs-wrapper').pushpin({top: $('.tabs-wrapper').offset().top});
            $('.collapsible').collapsible({accordion: false});
            $('ul.tabs').tabs();
        });
        $('.button-collapse').sideNav({menuWidth: 300});
        $(window).on('keyup', function (key) {
            if (key.keyCode === 13) {
                glide.jump(3, console.log('Wooo!'));
            }
            ;
        });
        $('.slider-arrow').on('click', function () {
            console.log(glide.current());
        });
        new WOW().init();
        jQuery(document).ready(function ($) {
            $('<style>' + '.scrollTop{ display:none; z-index:9999; position:fixed;' + 'bottom:30px; right:2%; width:50px; height:50px;' + 'background:url(/frontend/images/arrows-top.png) 0 0 no-repeat; }' + '.scrollTop:hover{ background-position:0 -60px;}' + '</style>').appendTo('body');
            var
                speed = 500, $scrollTop = $('<a href="#" class="scrollTop">').appendTo('body');
            $scrollTop.click(function (e) {
                e.preventDefault();
                $('html:not(:animated),body:not(:animated)').animate({scrollTop: 0}, speed);
            });
            function show_scrollTop() {
                ($(window).scrollTop() > 300) ? $scrollTop.fadeIn(600) : $scrollTop.fadeOut(600);
            }

            $(window).scroll(function () {
                show_scrollTop();
            });
            show_scrollTop();
        });
        var glide = $('.slider3').glide().data('api_glide');
        $(".slider3").css("display", "block");
        $('.slider2').glide({autoplay: 5000});
        var glide = $('.slider2').glide().data('api_glide');
        $('.slider2').glide({autoplay: 8000});
        $(".slider2").css("display", "block");
        $('select').material_select();
        $('.partners').slick({
            dots: true,
            speed: 300,
            autoplay: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 993,
                settings: {slidesToShow: 3, slidesToScroll: 3, infinite: true, dots: true}
            }, {breakpoint: 800, settings: {slidesToShow: 3, slidesToScroll: 1}}, {
                breakpoint: 600,
                settings: {slidesToShow: 1, slidesToScroll: 1}
            }]
        });
        $('.responsive').slick({
            dots: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 993,
                settings: {slidesToShow: 3, slidesToScroll: 3, infinite: true, dots: true}
            }, {breakpoint: 800, settings: {slidesToShow: 2, slidesToScroll: 2}}, {
                breakpoint: 600,
                settings: {slidesToShow: 1, slidesToScroll: 1}
            }]
        });
        $('.vertical-crousel').slick({
            infinite: false,
            vertical: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            responsive: [{breakpoint: 1155, settings: {slidesToShow: 3, slidesToScroll: 1}}]
        });
        $('.related-products').slick({
            dots: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 6000,
            responsive: [{
                breakpoint: 1200,
                settings: {slidesToShow: 1, slidesToScroll: 1, infinite: true, dots: false}
            }, {
                breakpoint: 993,
                settings: {slidesToShow: 2, slidesToScroll: 1, infinite: true, dots: false}
            }, {breakpoint: 600, settings: {slidesToShow: 1, slidesToScroll: 1}}, {
                breakpoint: 480,
                settings: {slidesToShow: 1, slidesToScroll: 1}
            }]
        });
        $('.similar-products').slick({
            dots: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 6000,
            responsive: [{
                breakpoint: 1200,
                settings: {slidesToShow: 1, slidesToScroll: 1, infinite: true, dots: false}
            }, {
                breakpoint: 993,
                settings: {slidesToShow: 2, slidesToScroll: 1, infinite: true, dots: false}
            }, {breakpoint: 600, settings: {slidesToShow: 1, slidesToScroll: 1}}, {
                breakpoint: 480,
                settings: {slidesToShow: 1, slidesToScroll: 1}
            }]
        });
    });
})(jQuery);