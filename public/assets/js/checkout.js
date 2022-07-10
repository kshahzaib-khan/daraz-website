
$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.apply_coupon_btn').click(function(e){

        e.preventDefault();
         var coupon_code = $('.coupon_code').val();
         if($.trim(coupon_code).length == 0){
             error_coupon = "please enter valid coupon";
             $('#error_coupon').text(error_coupon);
         }else{
            error_coupon = "";
            $('#error_coupon').text(error_coupon);
         }

         if(error_coupon != ''){
             return false;
         }
          $.ajax({
            method:'post',
            url:'/check-coupon-code',
            data:{
                'coupon_code':coupon_code
            },
            success:function(response){
                if(response.error_status == 'error')
                {
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                $('.coupon_code').val('');
                }else{
                    $('.coupon_code').prop('readonly',true);
                    var discount_price = response.discount_price;
                    var grand_toatl_price = response.grand_total_price;
                    $('.discount_price').text(discount_price);
                    $('.grandtotal_price').text(grand_toatl_price);
                }
            }
          });
    });
});

//  Start Razorpy_payment integrate
$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.razorpy_py_btn').click(function(e){
         e.preventDefault();
         var data ={
             'first_name': $('input[name=first_name]').val(),
             'last_name': $('input[name=last_name]').val(),
             'phone_no': $('input[name=phone_no]').val(),
             'alternate_no': $('input[name=alternate_no]').val(),
             'address_1': $('input[name=address_1]').val(),
             'address_2': $('input[name=address_2]').val(),
             'city': $('input[name=city]').val(),
             'state': $('input[name=state]').val(),
             'pincode': $('input[name=pincode]').val(),

         }
          $.ajax({
             type:'POST',
             url:'/confirm_razorpay_payment',
             data:data,
             success:function(response){
              if(response.status_code == 'no_data_in_cart'){
                    window.location.href = '/cart';
              }else{
                //   console.log(response.total_price);
                var options = {
                    "key": "rzp_test_5AEIUNtEJxBPvS", // Enter the Key ID generated from the Dashboard
                    "amount": (response.total_price * 100), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "name": "Ecommerce",
                    "description": "Thank you for purchasing",
                    "image": "https://example.com/your_logo",
                    // "order_id": "order_9A33XWu170gUtm",

                    "handler": function (razorpy_response){
                        // alert(razorpy_response.razorpay_payment_id);
                        $.ajax({
                            type:'POST',
                            url:'/place_order',
                            data:{
                                '_token':$('input[name=_token]').val(),
                                'razorpay_payment_id':razorpy_response.razorpay_payment_id,
                                'first_name': response.first_name,
                                'last_name': response.last_name,
                                'phone_no': response.phone_no,
                                'alternate_no': response.alternate_no,
                                'address_1':response.address_1,
                                'address_2':response.address_2,
                                'city':response.city,
                                'state':response.state,
                                'pincode':response.pincode,
                                'place_order_razorpay':true,

                            },
                             success:function(msgsasa){
                                window.location.href='/thank_you';
                             }
                        });

                    },
                    "prefill": {
                        // "name": response.first_name + response.last_name,
                        // "contact": response.phone_no,
                        // "email": response.email,

                    },

                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                    rzp1.open();
                    e.preventDefault();

              }
             }
          })
    });
});

//  End Razorpy_payment integrate
