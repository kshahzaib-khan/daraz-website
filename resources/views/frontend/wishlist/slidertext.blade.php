<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
 <link rel="stylesheet" href=" {{asset('assets/css/owl.carousel.min.css')}}">




    {{-- <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.js"></script> --}}


    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

<style>
.owl-nav .owl-prev ,.owl-next{
    width: 40px;
    border-radius: 3px;


}
.owl-next{
    background-color: #007BFF!important;

}
.owl-nav span{
    font-size: 40px;
    line-height:25px;
    color: #FFFFFF;
}
.owl-prev{
    background-color: #007BFF!important;
    margin-right: 15px;
}
.owl-nav{
    margin-right: 30px;
   position: relative;
   margin-top: -270px;
   float: right;
}


</style>
</head>
<body>


<div class="container">

<div class="row">
    <div class="owl-carousel" style="margin-top:100px;">
        <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
          <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
          <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
          <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
          <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
          <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
          <div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">John Doe</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
  </div>
</div>
</div>





    <script>
        $(document).ready(function(){


            $('.owl-carousel').owlCarousel({
             loop:true,

             margin:10,
             nav:true,
             dots:false,
             responsive:{
                 0:{
                     items:1

                 },
                 600:{
                     items:3
                 },
                 1000:{
                     items:4
                 }
             }
         });
        });
         </script>
</body>

</html>
