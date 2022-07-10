<style>
  .cate-none{
  display:none;
}

@media(max-width:964px){
    .navbar h6{
        font-size:5px!important;
    }
}

@media(max-width:991px){
  .navbar-collapse{
    display:flex;
    padding:0px;
    box-sizing: border-box;
    margin-left: -35px;
    flex-direction:row;
    width:100%;
   
  }

  .navbar-nav li a{
    display:flex;
    flex-direction:row;
    width:100%; 
   
  }
  .navbar{
    padding-bottom:50px!important;
  }
}
@media(max-width:774px){
  .navbar-collapse{
    display:flex;
    flex-direction:column;
    width:100%;
  }
  .catebgscren-none{
    display:none;
  }

  .cate-none{
  display:block;
}
}
@media(max-width:773px){
  .navbar{
    padding-bottom:15px!important;
  }
}

@media(max-width:586px){
  .navbar-collapse{
    margin-left:0px;
   
  }
}



  </style>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="/">
        <strong class="blue-text">Daraz</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
             <ul class="navbar-nav mr-auto catebgscren-none">

        <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        All Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @php
            $group = App\Models\Groups::where('status','!=','2')->get();
              @endphp
              @foreach($group as $group_nav_item)
          <a class="dropdown-item nav-link" href="{{url('collections/'.$group_nav_item->url)}}">{{$group_nav_item->name}}</a>
          @endforeach
        </div>
      </li>
  
         
        </ul>
        
       
         

        
        {{-- @if ( Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
   @endif
   @if ( Session::get('status'))
        <div class="alert alert-danger">
            {{ Session::get('status') }}
        </div>
   @endif --}}


        <div class="col-md-5">
          <ul class="navbar-nav mr-auto cate-none">

        <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        All Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @php
            $group = App\Models\Groups::where('status','!=','2')->get();
              @endphp
              @foreach($group as $group_nav_item)
          <a class="dropdown-item nav-link" href="{{url('collections/'.$group_nav_item->url)}}">{{$group_nav_item->name}}</a>
          @endforeach
        </div>
      </li>
  
         
        </ul>
        <form id="search-form"action="{{url('/searching')}}"method="post">
            @csrf
        <div class="input-group mt-3">
            <input type="search"name="search_product" id='search_text'class="form-control form-control-sm" placeholder="Search"style="top:6px;">

            <div class="input-group-append">
              <button  type="submit" name="searchbtn" class="btn btn-success btn-sm">Search</button>
            </div>
          </div>
        </form>
    </div>
        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">

                <a class="nav-link waves-effect" href="{{url('user/wishlist')}}">
                  <i class="fa fa-heart"></i>
                  <span class="clearfix d-sm-inline-block"> Wishlist

                     <span class="wishlist_item_count">
                         <span class="badge badge-pill red">0</span>
                     </span> 
                  </span>
                </a>


              </li>

          <li class="nav-item">
            <a class="nav-link waves-effect" href="{{url('cart')}}">
              <i class="fa fa-shopping-cart"></i>
              <span class="clearfix  d-sm-inline-block"> Cart

                 <span class="basket_item_count">
                     <span class="badge badge-pill red">0</span>
                 </span>
              </span>
            </a>
          </li>


          {{-- <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li> --}}
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
              <li class="nav-item">
              <!-- <a class="nav-link" href="{{ route('login') }}">login</a> -->

                  <a class="nav-link" href=""data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          {{-- <li class="nav-item dropdown  d-flex">
              <a id="navbarDropdown" class="nav-link">
                  {{ Auth::user()->name }}

              </a>

              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">Other Option</a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </div>

          </li> --}}
          <li class="nav-item">

            <div class="dropdown mr-5" style="width:100%;">
                <button type="button" class="btn btn-md nav-link border  rounded bg-white border-light waves-effect  dropdown-toggle" data-toggle="dropdown">
                 <small>{{Auth::user()->name}}</small>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('my-profile')}}">My Profile</a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
                </div>
              </div>

        </li>
      @endguest
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->


      
   <div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

       
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      
        <div class="modal-body">
           @if(session('error'))
                     <div class="alert alert-danger text-center  alert-dismissible mb-3 "style="width:85%; margin:auto;">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <small>{{session ('error')}}</small>

                    </div>
                    @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                    </div>
                  
                  
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">

                        <button type="submit" class="btn btn-primary btn-sm login">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
<script>
//     // Start this code add to wishlist icon total number show

//      $(document).ready(function(){
//           wishlistload();
//      });

// function wishlistload(){
//     $.ajaxSetup({
//         headers:{
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//      $.ajax({
//           url:"{{url('load_wishlist_data')}}",
//           type:'GET',
//           success: function(response){
//               $('.wishlist_item_count').html('');
//               var parsed = jQuery.parseJSON(response)
//               var value = parsed; //single Data Viewing
//               $('.wishlist_item_count').append($('<span class="badge badge-pill red">'+value['totalwishlist']+'</span>'));
//           }

//      });

// }
//  // End this code add to wishlist icon total number show
 
//    $(document).ready(function(){
//            cartload();
//      });

// function cartload(){
//     $.ajaxSetup({
//         headers:{
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//      $.ajax({
//            url:"{{url('load_cart_data')}}",
//            type:'GET',
//            success: function(response){
//               $('.basket_item_count').html('');
//               var parsed = jQuery.parseJSON(response)
//               var value = parsed; //single Data Viewing
//               $('.basket_item_count').append($('<span class="badge badge-pill red">'+value['totalcart']+'</span>'));
//            }

//      });

// }
//  // End this code add to cart icon total number show




//         // Remove wishlist
//         $(document).ready(function(){
//     $('.wishlist_remove_btn').click(function(e){
//         e.preventDefault();

//         $.ajaxSetup({
//             headers:{
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//              var clickedthis =$(this);

//              var wishlist_id = $(clickedthis).closest('.wishlist_content').find('.wishlist_id').val();


//         $.ajax({
//             url: '{{url("remove_form_wishlist")}}',
//             method:'POST',
//             data:{
//                 'wishlist_id':wishlist_id,
//             },
//             success:function(response){
//                 wishlistload();
//                 $(clickedthis).closest('.wishlist_content').remove();
//                 alertify.set('notifier','position','top-right');
//                 alertify.success(response.status);
//             }
//         });

//     });
//         });
    
//     // Remove wishlist

// // Delete Cart Data

//      $(document).ready(function () {


//         $('.delete_cart_data').click(function (e) {
//             e.preventDefault();
//              var thisDeletearea = $(this);
//             var product_id = $(this).closest(".cartpage").find('.product_id').val();

//             var data = {
//                 '_token': $('input[name=_token]').val(),
//                 "product_id": product_id,
//             };


//             $.ajax({
//                 // url: "{{url('delete_from_cart')}}",
//                 url: "delete_from_cart",
//                 type: 'post',
//                 data: data,
//                 success: function (response) {
//                      cartload();
//                   thisDeletearea.closest(".cartpage").remove();
//                     $('#totalajaxcall').load(location.href + ' .totalpricingload');
//                     alertify.set('notifier','position','top-right');
//                     alertify.success(response.status);


//                 }
//             });
//         });

//     });
 

     </script>

      </div>
    </div>
  </div>
