function initRating(){
    $('.rating_1').rating({
        fx: 'full',
        image: '/frontend/images/stars2.png',
        loader: '/frontend/images/ajax-loader.gif',
        url: '/rate',/*обработка результатов голосования*/
        readOnly: true,
        callback: function(responce){

            this.vote_success.fadeOut(2000);
        }
    });
    $('.rating_2').each(function(){
        var self = $(this);
        self.rating({
            fx: 'full',
            image: '/frontend/images/hover-stars.png',
            loader: '/frontend/images/ajax-loader.gif',
            url: '/rate',
            readOnly: true,
            callback: function(responce){

                this.vote_success.fadeOut(2000);
            }
        });
    })

}

(function($){
  $(function(){

      //Script for Rating. First function is used for rating which is visible in the simple item card, last one is shown in the hover card.
      $(function(){

         initRating();

      });



     
			  
			$('.tabs-wrapper').pushpin({ top: $('.tabs-wrapper').offset().top });  
			
			// Initialize collapse button
			 $('.collapsible').collapsible({
              accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
			 });
		  
		    var glide = $('.slider2').glide().data('api_glide');
			$('.slider2').glide({
				autoplay: 10000
			});
		  
			$(".slider2").css("display", "block");
    
			$('select').material_select();
 
			$('ul.tabs').tabs();
      });


      $('.button-collapse').sideNav({
          menuWidth: 300
      });
      

      $(window).on('keyup', function (key) {
          if (key.keyCode === 13) {
              glide.jump(3, console.log('Wooo!'));
          };
      });

      $('.slider-arrow').on('click', function() {
          console.log(glide.current());
      });
      new WOW().init();

       $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
              $('.modal-trigger').leanModal();



          jQuery(document).ready(function($){

              /**
               * Back to top - jQuery.
               */
              $('<style>'+
              '.scrollTop{ display:none; z-index:9999; position:fixed;'+
              'bottom:30px; right:2%; width:50px; height:50px;'+
              'background:url(/frontend/images/arrows-top.png) 0 0 no-repeat; }' +
              '.scrollTop:hover{ background-position:0 -60px;}'
              +'</style>').appendTo('body');
              var
                  speed = 500,
                  $scrollTop = $('<a href="#" class="scrollTop">').appendTo('body');

              $scrollTop.click(function(e){
                  e.preventDefault();

                  $( 'html:not(:animated),body:not(:animated)' ).animate({ scrollTop: 0}, speed );
              });

              //появление
              function show_scrollTop(){
                  ( $(window).scrollTop() > 300 ) ? $scrollTop.fadeIn(600) : $scrollTop.fadeOut(600);
              }
              $(window).scroll( function(){ show_scrollTop(); } );
              show_scrollTop();

          });


      /*SLICK*//*
      $('.responsive').slick({
          dots: true,
          speed: 300,
          slidesToShow:4 ,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [
         
              {
                  breakpoint: 993,
                  settings: {
                      slidesToShow: 4,
                      slidesToScroll: 1,
                      infinite: true,
                      dots: true
                  }
              },
              {
                  breakpoint: 800,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                  }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
          ]
      });*/
      $('.vertical-crousel').slick({
          infinite: false,
          vertical: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: false,
          responsive: [
              {
                  breakpoint: 1155,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1
                  }
              }]
      });
	  
	$('.related-products').slick({
              dots: true,
              speed: 300,
              slidesToShow: 4,
              slidesToScroll: 4,
              autoplay: true,
              autoplaySpeed: 2000,
              responsive: [
                  {
                      breakpoint: 1200,
                      settings: {
                          slidesToShow: 4,
                          slidesToScroll: 4,
                          infinite: true,
                          dots: true
                      }
                  },
                  {
                      breakpoint: 600,
                      settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2
                      }
                  },
                  {
                      breakpoint: 480,
                      settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1
                      }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
              ]
	});
 
  }); // end of document ready
  
})(jQuery); // end of jQuery name space