<script>
    //alert("OK!")
//    $(".animProduct").click(function(){
    /*$("body").on('click', '.addtocart-button', function(){
        var parentPrice = $(".pricesBlock").css("position","relative"),
            clone = $(".item-prices").clone().addClass("clone").css({"position":"absolute","transition":"none"}),
            helicopter='<div class="helicopter"></div>';
        console.log(object);
        parentPrice.append(clone, helicopter);
        var object=$(".helicopter");
        //console.log(clone.attr('class'));
        object.animate({
            top: '+=560'
        }, 1500, function(){
            clone.animate({
                top: '-=500'
            }, 1500, function() {
                clone.remove();
            });
            object.animate({
                top: '-=500'
            }, 1500, function() {
                object.remove();
            });
        });

    });
   $("body").on('click', '.addtocart-button-hover', function(){
            console.log(this)
            var productId = $(this).attr('data-productid'),
                    token = $("#token").val(),
                    areaHidden = $(".slick-slide").attr('aria-hidden'),
                    clone=$(".cardAnim"+productId).clone().addClass("clone").css({"opacity":"1","transition":"none"}),
                    parent=$(".itemAnim"+productId),
                    helicopter='<div class="helicopter"></div>';
            if (areaHidden){
                //var dataShow = $(this).parents(".slick-slider").attr('data-show');
                //alert($(parent).parent(".slick-slide"));
            }
            else{
                parent.append(clone, helicopter);
                var object=$(".helicopter"),
                    body = $("body"),
                    scrollBody= body.scrollTop(),
                    scrollBlock = clone.offset().top,
                    minus = scrollBlock - scrollBody;
                if(minus>-200 && minus<200){
                    body.stop().animate({
                        'scrollTop': scrollBody - 200
                    });
                }
                else if(minus<0) {
                    body.stop().animate({
                        'scrollTop': scrollBody + minus*2
                    });
                }
                object.animate({
                    top: '+=635'
                }, 1800, function(){
                    clone.animate({
                        top: '-=1000'
                    }, 1500, function() {
                        clone.remove();
                    });
                    object.animate({
                        top: '-=1000'
                    }, 1500, function() {
                        object.remove();
                        if(minus>-200 && minus<200){
                            body.stop().animate({
                                'scrollTop': scrollBody + 100
                            });
                        }
                        else if (minus < 0){
                            body.stop().animate({
                                'scrollTop': scrollBody - minus
                            });
                        }
                    });
                });}
});*/

        $("body").on('click', '.buy', function(){
            var productId = $(this).attr('data-productid'),
                    token = $("#token").val();

        $.post('/add_to_cart', {'productId': productId, _token: token}).done(function(data){
            $("#_cart").find('.qty').html(data.count);
            $("#_cart").find('.qty-items').html(data.count);

            $("#_cart").find('._sum').html(data.total);
            $('.cart_empty').hide();
            $('.cart_filled').show();
        });
        $(this).val('В корзине');
        $(this).parents('.item').find('.buy').val('В корзине');

    });


  $(".buySet").click(function(){
// console.log(this);
// console.log($(this).attr('data-stockid'));
    var stockId = $(this).attr('data-stockid'),
        token = $("#token").val();

      $.post('/add_set_to_cart', {'stockId': stockId, _token: token}).done(function(data){
//          console.log(data);
          $("#_cart").find('.qty').html(data.count);
          $("#_cart").find('.qty-items').html(data.count);

          $("#_cart").find('._sum').html(data.total);
          $('.cart_empty').hide();
          $('.cart_filled').show();
      });

      $(this).val('В корзине');
      $(this).parents('.item').find('.buy').val('В корзине');
  })

</script>
