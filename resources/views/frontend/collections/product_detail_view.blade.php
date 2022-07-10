@extends('layouts.frontend')
<style>
.sort-font {
	color: #1C1A1C;
	font-size: 15px;
	margin: 0 10px;
}


/* rating */

.rating-css div {
	color: #FFBB33;
	font-size: 30px;
	font-family: sans-serif;
	font-weight: 800;
	text-align: center;
	text-transform: uppercase;
	padding: 20px 0;
}

.rating-css input {
	display: none;
}

.rating-css input + label {
	font-size: 60px;
	text-shadow: 1px 1px 0 #8f8420;
	cursor: pointer;
}

.rating-css input:checked + label ~ label {
	color: #b4afaf;
}

.rating-css label:active {
	transform: scale(0.8);
	transition: 0.3s ease;
}

.check {
	color: #FFBB33;
}


/* End of Star Rating */

.owl-carousel .owl-nav.disabled {
	display: block!important;
}

.owl-nav .owl-prev,
.owl-next {
	width: 40px;
	border-radius: 3px;
}

.owl-next {
	background-color: #007BFF!important;
}

/* .owl-nav span {
	font-size: 40px;
	line-height: 35px;
	top: -30px!important;
	color: #FFFFFF;
} */

.owl-nav span {
    font-size: 40px;
    line-height: 20px;
    color: #FFFFFF;
}


.owl-carousel button,
.owl-prev
.owl-next {
    height: 30px!important;
    padding-bottom: 30px!important;
    background: 0 0;
    color: inherit;
    border: none;
    font: inherit;
	
}
.owl-prev {
	background-color: #007BFF!important;
	margin-right: 15px;
}

.owl-nav {
	position: absolute;
	top: -16%;
	right: 5%;
	transform: translate(-5%, 16%);
}

@media(max-width:767px) {
	.prod_img {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		margin: auto;
	}
	.content-center {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	.custom-input-group {
		display: flex;
		/* flex-direction:column; */
		justify-content: center;
		align-items: center;
	}
}

@media(max-width:424px) {
	.prod_img img {
		height: 170px!important;
		max-width: 140px;
	}
}

@media(max-width:424px) {
	.owl-nav {
		display: none;
	}
}

@media(max-width:464px) {
	.custom-btn {
		margin-left:0px!important;
		margin-top: 10px;
		align-items: center;
		display: flex;
		width: 100%;
		flex-direction: column;
	}
	.custom-btn .btn {
		width: 60%;
	}
}

.custom-btn {
	margin-left: 24px;
}

.wish-cart {
	display: flex;
	margin: 0 auto;
	max-width: 250px;
	width: 100%;
	display: none;
}

.wish-cart span,
i {
	color: #000000;
}

@media(max-width:991px) {
	.wish-cart {
		display: block;
	}
	.cstom-card-body {
		padding: 5px!important;
	}
}

@media(max-width:773px) {
	.sec-mr-top {
		margin-top: 80px!important;
	}
}


/* @media(max-width:312px){

.custom-input-group,
.decrement-btn,
.increment-btn,
    {
      width:100%;
    }
    .custom-input-group,.qty_input{
 
  
    }
} */

@media(max-width:390px) {
	.sec-mr-top {
		margin-top: 60px!important;
	}
}

.sec-mr-top {
	margin-top: 110px;
}
</style> @section('title') {{$product_detail_view->meta_title}} Collection - Category - SubCategory - Products - Product-Detail @endsection @section('meta_desc'); {{$product_detail_view->meta_description}} @endsection @section('meta_tags'); {{$product_detail_view->meta_keyword}} @endsection @section('content')
<section class="sec-mr-top">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card ">
					<div class="card-body cstom-card-body">
						<div class="wish-cart">
							<a class="nav-link waves-effect" href="{{url('user/wishlist')}}"> <i class="fa fa-heart"></i> <span class="clearfix d-sm-inline-block"> Wishlist

                     <span class="wishlist_item_count">
                         <span class="badge badge-pill red">0</span> </span>
								</span>
							</a>
							</li>
							<a class="nav-link waves-effect" href="{{url('cart')}}"> <i class="fa fa-shopping-cart"></i> <span class="clearfix  d-sm-inline-block"> Cart

                 <span class="basket_item_count">
                     <span class="badge badge-pill red">0</span> </span>
								</span>
							</a> {{-- Collections / <span><a href="{{url('collectioFns/electronics')}}">{{$product_detail_view->subcategory->category->group->name}}</a></span> / <span><a href="{{url('collections/'.$category->group->url.'/'.$category->url)}}">{{$category->url}}</a></span> / <span><a href="{{url('collections/'.$category->group->url.'/'.$product_detail_view->subcategory->category->url.'/'.$product_detail_view->subcategory->url)}}">{{$product_detail_view->subcategory->name}}</a></span> / <span>{{$product_detail_view->name}}</span> --}} </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-3  pb-5">
		<div class="row">
			<div class="col-md-12 mb-3 sort-by"> <span class="font-weight-bold">Sort By :</span> <a href="{{URL::current()}}" class="sort-font">All</a> <a href="{{URL::current().'?sort=price_asc'}}" class="sort-font">Price - Low to High</a> <a href="{{URL::current().'?sort=price_desc'}}" class="sort-font">Price - High to Low</a> <a href="{{URL::current().'?sort=newest'}}" class="sort-font">Newest</a> <a href="{{URL::current().'?sort=popularity'}}" class="sort-font">Popular</a> </div>
		</div>
		<div class="product_data">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-md-4 col-sm-6 col-6 prod_img"> <img src="{{asset('upload/product/'.$product_detail_view->image)}}" alt="" class="card-img-top" style="height: 250px;width:190px;"> </div>
								<div class="col-md-7">
									<div class="content-center">
										<div class="py-2"> <small class="text-grey">
                                        Collections / <span><a href="{{url('collections/electronics')}}">{{$product_detail_view->subcategory->category->group->name}}</a></span> / <span><a href="{{url('collections/'.$category->group->url.'/'.$category->url)}}">{{$category->url}}</a></span> / <span><a href="{{url('collections/'.$category->group->url.'/'.$product_detail_view->subcategory->category->url.'/'.$product_detail_view->subcategory->url)}}">{{$product_detail_view->subcategory->name}}</a></span> / <span>{{$product_detail_view->name}}</span>

                                       </small> </div>
										<h5 class="mb-2 grey-text">{{$product_detail_view->name}}</h5>
										<div class="py-2"> @php $ratenum =number_format($rating_value) @endphp <small>
                                                 @if($ratings->count() > 0)
                                                 Rating:{{$ratings->count()}}

                                                   @else
                                                   No Rating
                                            @endif
                                        </small> @for($i =1; $i
											<=$ratenum; $i++) <i class="fa fa-star check"></i> @endfor @for ($j =$ratenum+1; $j
												<=5; $j++) <i class="fa fa-star"></i> @endfor <small class="font-italic text-dark badge badge-warning px-2 ml-3"> {{$product_detail_view->sale_tag}}</small> </div>
										<div class="product-price">
											<h6 class="font-italic" style="color:#E69597;"> <s>Rs:{{number_format($product_detail_view->original_price)}} </s> </h6>
											<h5 class="font-italic font-weight-bold" style="font-size:14px; color:#777F88;">Rs:{{number_format($product_detail_view->offer_price)}}</h5> </div> @if($product_detail_view->quantity > 0)
										<label class="badge bg-success">In stock</label> @else
										<label class="badge bg-danger">Out of Stock</label> @endif </div>
									<!-- <div class=" col-lg-3 col-md-12 col-sm-12">
                                            <input type="hidden" class="qty-input form-control product_id"value="{{$product_detail_view->id}}">
                                              <input type="number" class="qty_input form-control mt-1"value="1" min="1" max="100">
                                          </div> -->
									<div class="custom-input-group">
										<div class="input-group input-group-sm flex-nowrap col-lg-3 col-md-4 col-sm-4 col-7">
											<div class="input-group-prepend decrement-btn " style="cursor: pointer"> <span class="input-group-text">-</span> </div>
											<input type="hidden" class="qty-input form-control product_id" value="{{$product_detail_view->id}}">
											<input type="text" class="qty_input form-control text-center" value='1'>
											<div class="input-group-append increment-btn " style="cursor: pointer"> <span class="input-group-text">+</span> </div>
										</div>
									</div>
									<div class="row">
										<!-- <div class=" col-lg-3 col-md-12 col-sm-12">
                                            <input type="hidden" class="qty-input form-control product_id"value="{{$product_detail_view->id}}">
                                              <input type="number" class="qty_input form-control mt-1"value="1" min="1" max="100">
                                          </div> -->
										<div class="custom-btn"> @if($product_detail_view->quantity > 0)
											<button type="submit" class="btn btn-danger btn-sm add_to_cart_btn"> Add to Cart </button>
											<!-- <input type="submit" class="btn btn-danger btn-sm add_to_cart_btn " value="Add to Cart"> -->@else
											<button type="submit" class="btn btn-danger btn-sm"> No Cart </button>
											<!-- <input type="submit" class="btn btn-danger btn-sm " value="No Add to Cart"> -->@endif @guest
											<button type="button" data-toggle="modal" data-target="#LoginModal" class="btn btn-danger btn-sm text-white"> <i class="fa fa-heart text-white"></i> &nbsp;&nbsp;Wishlist </button> @else
											<button type="button" class=" add_to_wishlist_btn btn btn-danger btn-sm text-white"> <i class="fa fa-heart text-white"></i>&nbsp;&nbsp;Wishlist </button> @endguest
											<!-- Button to Open the Modal -->@if (Auth::user())
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"> Rating </button> @else
											<button type="button" data-toggle="modal" data-target="#LoginModal" class="btn btn-danger btn-sm "> Rating </button>
										</div> {{-- <small class="text-primary">  Please login for Rating</small> --}} @endif
										<!-- The Modal -->
										<div class="modal fade" id="myModal">
											<div class="modal-dialog">
												<div class="modal-content">
													<form method="POST" action="{{url('add_rating')}}"> @csrf
														<input type="hidden" name="product_id" value="{{$product_detail_view->id}}">
														<!-- Modal Header -->
														<div class="modal-header">
															<h4 class="modal-title">User Product Rating</h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<!-- Modal body -->
														<div class="modal-body">
															<div class="rating-css">
																<div class="star-icon"> @if($user_rating) @for($i =1; $i
																	<=$user_rating->star_rated; $i++)
																		<input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
																		<label for="rating{{$i}}" class="fa fa-star "></label> @endfor @for ($j =$user_rating->star_rated+1; $j
																		<=5; $j++) <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
																			<label for="rating{{$j}}" class="fa fa-star "></label> @endfor @else
																			<input type="radio" value="1" name="product_rating" checked id="rating1">
																			<label for="rating1" class="fa fa-star"></label>
																			<input type="radio" value="2" name="product_rating" id="rating2">
																			<label for="rating2" class="fa fa-star"></label>
																			<input type="radio" value="3" name="product_rating" id="rating3">
																			<label for="rating3" class="fa fa-star"></label>
																			<input type="radio" value="4" name="product_rating" id="rating4">
																			<label for="rating4" class="fa fa-star"></label>
																			<input type="radio" value="5" name="product_rating" id="rating5">
																			<label for="rating5" class="fa fa-star"></label> @endif </div>
															</div>
														</div>
														<!-- Modal footer -->
														<div class="modal-footer">
															<button type="submit" class="btn btn-success btn-sm">Rating</button>
															<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div class="border-top mt-3"> <small>{{$product_detail_view->small_description}}</small> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>

			 <!-- <div class="container"> -->
				<div class="row">

                <!-- start review -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card mt-5">
						<div class="card-header" style="font-size:30px;"> {{$product_detail_view->p_highlight_heading}} </div>
						<div class="card-body">

						<div class="row">
								<div class="col-md-4"> <a href="{{url('/add-review/'.$product_detail_view->url.'/userreview')}}" class="btn btn-primary btn-sm">Review</a> </div>
								<div class="col-md-8"> 
									@foreach ( $review as $review_item )
									<div class="user_review">
										<label>{{ $review_item->users->name.' '.$review_item->users->lname }}</label> 
										@if($review_item->user_id == Auth::id()) 
										<a href="{{url('edit-review/'.$product_detail_view->url.'/userreview')}}">edit</a> 
										@endif
										<br> @php $rating = App\Models\Rating::where('prod_id',$product_detail_view->id)->where('user_id',$review_item->users->id)->first();
										 @endphp @if ($rating) @php $user_rated = $rating->star_rated @endphp 
										 @for($i =1; $i<=$user_rated; $i++)
										 <i class="fa fa-star check"></i> 
										 @endfor
										  @for ($j =$user_rated+1; $j<=5; $j++)
											 <i class="fa fa-star"></i>
											  @endfor 
											  @endif 
											  <small>Reviewed On {{$review_item->created_at->format('d M Y')}}</small>
												<p>{{$review_item->user_review}}</p>
									</div>
									 @endforeach 
									</div>
							</div>
						</div>
						</div>
					</div>
				
				<!-- end review -->

				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card mt-5">
						<div class="card-header" style="font-size:30px;"> {{$product_detail_view->p_highlight_heading}} 
					</div>
						<div class="card-body">
							<p class="card-text">{{$product_detail_view->small_description}}</p>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card mt-5">
						<div class="card-header" style="font-size:30px;"> {{$product_detail_view->p_description_heading}} 
					</div>
						<div class="card-body">
							<p class="card-text">{{$product_detail_view->p_description}}</p>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card mt-5">
						<div class="card-header" style="font-size:30px;"> {{$product_detail_view->p_details_heading}}
					 </div>
						<div class="card-body card-body-pd">
							<p class="" style="margin:-10px;">{!!$product_detail_view->p_details!!}</p>
						</div>
					</div>
				</div>


				</div> <!-- end row div -->


			 <!-- </div>  -->
			  <!-- end container div -->
			




		
		<div class="" style="background-color:#F7F7F7;">
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-12 mt-3 d-flex">
						<h4 class="border-bottom pb-3 mr-3">Related Products</h4> </div>
					<div class="owl-carousel owl-theme" style="padding-left:10px; padding-right:10px;"> @foreach ($product_detail_view->subcategory->Products as $related_product)
						<div class="item mb-3 mt-2"> {{--
							<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mt-3"> --}}
								<div class="card">
									<div class="view overlay"> <img src="{{asset('upload/product/'.$related_product->image)}} " class="card-img-top img-fluid mt-3" alt="" style="height:170px;max-width:140px; margin:auto;">
										<a>
											<div class="mask rgba-white-slight"></div>
										</a>
									</div>
									<div class="card-body text-center">
										<a href="" class="grey-text">
											<h6 style="font-size:14px; height:20px;overflow:hidden;">{{$related_product->name}}</h6> </a>
										<h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{number_format($related_product->original_price)}}</s></span>
       <span class="font-weight-bold" style="font-size:14px; color:#777F88;">Rs:{{number_format($related_product->offer_price)}}</span>

    </h6> <a href="{{url('collections/'.$related_product->subcategory->category->group->url.'/'.$related_product->subcategory->category->url.'/'.$related_product->subcategory->url.'/'.$related_product->url)}}" class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a> </div>
								</div>
								<!--Card-->{{-- </div> --}}
							<!--Grid column-->
						</div> 
						
						@endforeach 
					</div>
				</div>
			</div>
		  <script>
                  
                  
              



     // Start this code add to cart icon total number show

    
$('.increment-btn').click(function(e) {
				e.preventDefault();
				var input_value = $('.qty_input').val();
				var value = parseInt(input_value, 10);
				value = isNaN(value) ? 0 : value;
				if(value < 10) {
					value++;
					$('.qty_input').val(value);
				}
			});
			$('.decrement-btn').click(function(e) {
				e.preventDefault();
				var input_value = $('.qty_input').val();
				var value = parseInt(input_value, 10);
				value = isNaN(value) ? 0 : value;
				if(value > 1) {
					value--;
					$('.qty_input').val(value);
				}
			});

// // Start this code cart page increment-btn and decrement-btn
//     $(document).ready(function () {

//         $('.increment-btn').click(function (e) {
//             e.preventDefault();
//             var incre_value = $(this).parents('.quantity').find('.qty_input').val();
//             var value = parseInt(incre_value, 10);
//             value = isNaN(value) ? 0 : value;
//             if(value<10){
//                 value++;
//                 $(this).parents('.quantity').find('.qty_input').val(value);
//             }

//         });

//         $('.decrement-btn').click(function (e) {
//             e.preventDefault();
//             var decre_value = $(this).parents('.quantity').find('.qty_input').val();
//             var value = parseInt(decre_value, 10);
//             value = isNaN(value) ? 0 : value;
//             if(value>1){
//                 value--;
//                 $(this).parents('.quantity').find('.qty_input').val(value);
//             }
//         });

//     });

//     // End this code cart page increment-btn and decrement-btn


//   // Start this code cart page increment-btn and decrement-btn Update Price
//     $(document).ready(function () {

//         $('.changeQuantity').click(function (e) {
//             e.preventDefault();
//             var thisclick =  $(this);
//             var quantity = $(this).closest(".cartpage").find('.qty_input').val();
//             var product_id = $(this).closest(".cartpage").find('.product_id').val();

//             var data = {
//                 '_token': $('input[name=_token]').val(),
//                 'quantity':quantity,
//                 'product_id':product_id,
//             };

//             $.ajax({
//                 url: 'update_to_cart',
//                 type: 'POST',
//                 data: data,
//                 success: function (response) {

//                     thisclick.closest(".cartpage").find('.cart_grand_total_price').text(response.gtprice);
//                     $('#totalajaxcall').load(location.href + ' .totalpricingload');
//                     alertify.set('notifier','position','top-right');
//                     alertify.success(response.status);
//                 }
//             });
//         });

//     });
//  // End this code cart page increment-btn and decrement-btn Update Price



//      // Delete Cart Data

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
//                 url: 'delete_from_cart',
//                 type: 'post',
//                 data: data,
//                 success: function (response) {

//                     thisDeletearea.closest(".cartpage").remove();
//                     $('#totalajaxcall').load(location.href + ' .totalpricingload');
//                     alertify.set('notifier','position','top-right');
//                     alertify.success(response.status);


//                 }
//             });
//         });

//     });

//      // End Delete Cart Data


//     //  Start Add to Cart  Clear Data

//     $(document).ready(function(){

//         $('.clear_cart').click(function(e){


//          e.preventDefault();
//         //  var thisDeletearea = $(this);

//              $.ajax({
//                  url: 'clear_cart',
//                  method:'GET',

//                   success:function(response){

//                           window.location.reload();
//                       alertify.set('notifier','position','top-right');
//                       alertify.success(response.status);

//                   }
//              });


//     });

// });

//     //  End Add to Cart  Clear Data

                  
                  
                  
                  
                  
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
			

</section>
 @endsection