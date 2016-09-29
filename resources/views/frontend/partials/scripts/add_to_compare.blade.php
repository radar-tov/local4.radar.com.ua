<script>


$("body").on("click",".compare",function()
{
     var productId = $(this).attr('data-productid');
     var token = $('#token').val();
   
      $.post('/add_to_compare', {'productId': productId, _token: token}).done(function(data){
      	
            $("#com_count").html(data.count);//(parseInt($("#com_count").html()) + 1);
        });
        $(this).val('В сравнении');
        $(this).parents('.item').find('.compare').val('В сравнении');

    });

</script>
