<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') | Daraz</title>
  <meta name="description" content="@yield('meta_desc') ">
  <meta name="keywords" content="@yield('meta_tags') ">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token"content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/alertify.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">

  <link rel="stylesheet" href=" {{asset('assets/css/jquery-ui.css')}}">
 <link rel="stylesheet" href=" {{asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/mdb.css')}}">



  <script src="{{asset('assets/js/jquery.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
<!-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->
   <script src="{{asset('assets/js/checkout.js')}}"></script> 
 <!-- <script src="{{asset('assets/js/stripe_checkout.js')}}"></script> -->
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

  <script src="{{asset('assets/js/alertify.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/mdb.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>

  <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> 

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script> 
   <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>  -->

</head>
<style>
 

 
  @media(max-width:390px){

    .btn-higt{
      font-size:10px!important;
    }
    .card-body-pd{
    margin-top:4px;
      margin-left:-17px!important;
      padding: 10px!important;
    }
    h4{
      font-size:15px!important;  
    }
    h5,h6{
      font-size:12px!important;  
    }

    .content_center3{
      font-size:13px!important; 
    }
    .content_center4{
      font-size:10px!important; 
    }
     s,span{
      font-size:12px!important;  
    }

    .checkbox-font{
      font-size:10px!important;  
    }

    .checkbox-mr{
      height: 8.8px;
    }

    /* .product-price h6{
      font-size:13px!important; 
    } */
    .sort-by span,a{
      font-size:11px!important; 
    }
    p{
      font-size:12px!important;  
      
    }
    .card-header{
      
      font-size:15px!important;
    }
    .card-text{
      
      font-size:10px!important;
    }

    .card-body ul li{
      
      font-size:10px!important;
    }

    .border-top small{
      font-size:10px!important;
    }

     /* .sec-mr-top{
      margin-top:60px!important;
    }

    .sec-mr-top-mis{
      margin-top:60px!important;
    }  */
  }

  /* @media(max-width:991px){

    .sec-mr-top{
      margin-top:70px!important;
    }

    .sec-mr-top-mis{
      margin-top:70px!important;
    }  
  } */


  </style>
<body>

@include('layouts.front-navbar')
<main>
  @yield('content')
  <main>
  @include('layouts.front-footer')



  
  <script>
      @error('email')
      $('#loginModal').modal('show');
      @enderror


      

      @if(session('status'))
      alertify.set('notifier','position','top-right');
      alertify.success("{{session('status')}}");
      @endif
  </script>

   

  <script>
    $(document).ready(function(){

        src ="{{route('searchproductajax')}}";
        $("#search_text").autocomplete({
      source: function(request, response){

            $.ajax({
               url:src,
               data:{
                   term: request.term
               },
               dataType: "json",
               success: function(data){
                 response(data);
                //    alert(response);


               }
           });
      },
      minLenght: 1,
    });

     $(document).on('click', '.ui-menu-item', function(){

         $('#search-form').submit();
     });

    });


</script>

</body>

</html>
