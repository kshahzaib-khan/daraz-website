
 // Start this code add to wishlist icon total number show

function wishlistload(){
    $.ajaxSetup({
     headers:{
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    
    $.ajax({
        url:'/load_wishlist_data',
        type:'GET',
        success: function(response){
           $('.wishlist_item_count').html('');
           var parsed = jQuery.parseJSON(response)
           var value = parsed; //single Data Viewing
           $('.wishlist_item_count').append($('<span class="badge badge-pill red">'+value['totalwishlist']+'</span>'));
        }
    
    });
    
    }
    // End this code add to wishlist icon total number show
          

          // Add wishlist
   $(document).ready(function(){
    wishlistload();
       });
        $(document).ready(function(){

        $('.add_to_wishlist_btn').click(function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajax({
        url:"/add_wishlist",

            method:'POST',
            data:{
                'product_id':product_id,
            },
            success:function(response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                wishlistload();
            }
        });
    });

});

 

   
    // // Remove wishlist
    $('.wishlist_remove_btn').click(function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
             var clickedthis =$(this);

             var wishlist_id = $(clickedthis).closest('.wishlist_content').find('.wishlist_id').val();


        $.ajax({
            url: "/remove_form_wishlist",
            method:'POST',
            data:{
                'wishlist_id':wishlist_id,
            },
            success:function(response){
                $(clickedthis).closest('.wishlist_content').remove();
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                wishlistload();
            }
        });

    });// Remove wishlist



// End wishlist
 



//      // Start this code add to cart icon total number show

     $(document).ready(function(){
          cartload();
     });

function cartload(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     $.ajax({
                   
          url:'/load_cart_data',
          type:'GET',
          success: function(response){
              $('.basket_item_count').html('');
              var parsed = jQuery.parseJSON(response)
              var value = parsed; //single Data Viewing
              $('.basket_item_count').append($('<span class="badge badge-pill red">'+value['totalcart']+'</span>'));
          }

     });

}
//  // End this code add to cart icon total number show


    // Start this code add to cart

$(document).ready(function(){

        $('.add_to_cart_btn').click(function(e){


         e.preventDefault();

          $.ajaxSetup({
              headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

             var product_id = $(this).closest('.product_data').find('.product_id').val();
             var quantity = $(this).closest('.product_data').find('.qty_input').val();


             $.ajax({

                 url:"/add_to_cart",
                  type:'post',
                 data:{
                     'quantity' : quantity,
                     'product_id': product_id,
                 },
                  success:function(response){
                      alertify.set('notifier','position','top-right');
                      alertify.success(response.status);
                      cartload();
                  },
             });


    });

});


    // End this code add to cart


// Start this code cart page increment-btn and decrement-btn
    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty_input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty_input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty_input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty_input').val(value);
            }
        });

    });

    // End this code cart page increment-btn and decrement-btn


   // Start this code cart page increment-btn and decrement-btn Update Price
    $(document).ready(function () {

        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            var thisclick =  $(this);
            var quantity = $(this).closest(".cartpage").find('.qty_input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };

            $.ajax({
                url: 'update_to_cart',
                type: 'POST',
                data: data,
                success: function (response) {

                    thisclick.closest(".cartpage").find('.cart_grand_total_price').text(response.gtprice);
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });

    });
 // End this code cart page increment-btn and decrement-btn Update Price



    //  // Delete Cart Data

     $(document).ready(function () {


        $('.delete_cart_data').click(function (e) {
            e.preventDefault();
             var thisDeletearea = $(this);
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };


            $.ajax({
                url: 'delete_from_cart',
                type: 'post',
                data: data,
                success: function (response) {
                     
                    thisDeletearea.closest(".cartpage").remove();
                   
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    cartload();


                }
            });
        });

    });

    //  // End Delete Cart Data


    //  Start Add to Cart  Clear Data

    $(document).ready(function(){

        $('.clear_cart').click(function(e){


         e.preventDefault();
        //  var thisDeletearea = $(this);

             $.ajax({
                 url: 'clear_cart',
                 method:'GET',

                   success:function(response){

                          window.location.reload();
                       alertify.set('notifier','position','top-right');
                       alertify.success(response.status);

                   }
             });


    });

});

    //  End Add to Cart  Clear Data
