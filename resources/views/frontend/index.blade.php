@extends('layouts.frontend')
 @section('title') Home 
 @endsection
  @section('content')
   @include('frontend.slider.slider')
<style>
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

.owl-nav span {
	font-size: 40px;
	line-height: 25px;
	color: #FFFFFF;
}

.owl-prev {
	background-color: #007BFF!important;
	margin-right: 15px;
}

.owl-nav {
	position: absolute;
	top: -15%;
	right: 5%;
	transform: translate(-5%, 14%);
}

.navbar ul li a{
margin-top:8px!important;

}
@media(max-width:991px) {
	.navbar {
		padding-bottom:12px!important;
	}
}
@media(max-width:424px) {
	.owl-nav {
		display: none;
	}
}

@media(max-width:390px) {
	.btn-higt a {
		margin-top: 0px!important;
		height: 20px!important;
		padding: 6px!important;
		font-size: 7px!important;
	}
}
</style>

              <!-- start New Arrivals code -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-3 d-flex btn-higt">
				<h4 class="border-bottom pb-3 mr-3">New Arrivals</h4> <a href="{{url('new-arrival')}}" class="btn btn-primary btn-sm " style="height: 30px;">View All</a> </div>
			<div class="owl-carousel owl-theme" style="background-color:#F7F7F7; padding-left:10px; padding-right:10px;">
			 @foreach ($products_NewArrivals as $NewArrivals )
				<div class="item mb-3 mt-2"> {{--
					<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mt-3"> --}}
						<div class="card">
							<div class="view overlay"> <img src="{{asset('upload/product/'.$NewArrivals->image)}} " class="card-img-top img-fluid mt-3" alt="" style="height:190px;width:160px; margin:auto;">
								<a>
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<div class="card-body text-center">
								<a href="" class="grey-text">
									<h6 style="font-size:16px; height:20px;overflow:hidden;">{{$NewArrivals->name}}</h6> </a>
								<h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{number_format($NewArrivals->original_price)}}</s></span>
       <span class="font-weight-bold"style="font-size:14px; color:#777F88;">Rs:{{number_format($NewArrivals->offer_price)}}</span>

    </h6> 
	<a href="{{url('collections/'.$NewArrivals->subcategory->category->group->url.'/'.$NewArrivals->subcategory->category->url.'/'.$NewArrivals->subcategory->url.'/'.$NewArrivals->url)}}" class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a> 
          </div>
       </div>
						
					<!--Grid column-->
				</div> 
				
				@endforeach
			 </div>
		</div>
				</div>
				</div>
				<!-- end New Arrivals code -->



				  <!-- start New products_Feature code -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-3 d-flex btn-higt">
				<h4 class="border-bottom pb-3 mr-3">New Feature</h4> <a href="{{url('new-feature')}}" class="btn btn-primary btn-sm " style="height: 30px;">View All</a> </div>
			<div class="owl-carousel owl-theme" style="background-color:#F7F7F7; padding-left:10px; padding-right:10px;"> 
			@foreach ($products_Feature as $feature )
				<div class="item mb-3 mt-2"> 
					{{--<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mt-3"> --}}
					
						<div class="card">
							<div class="view overlay"> <img src="{{asset('upload/product/'.$feature->image)}} " class="card-img-top img-fluid mt-3" alt="" style="height:190px;width:160px; margin:auto;">
								<a>
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<div class="card-body text-center">
								<a href="" class="grey-text">
									<h6 style="font-size:16px; height:20px;overflow:hidden;">{{$feature->name}}</h6> </a>
								<h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{number_format($feature->original_price)}}</s></span>
       <span class="font-weight-bold"style="font-size:14px; color:#777F88;">Rs:{{number_format($feature->offer_price)}}</span>

    </h6> 
	<a href="{{url('collections/'.$feature->subcategory->category->group->url.'/'.$feature->subcategory->category->url.'/'.$feature->subcategory->url.'/'.$feature->url)}}" class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a> 
          </div>
       </div>
						
					<!--Grid column-->
				</div> 
				
				@endforeach
			 </div>
		</div>
				</div>
				</div>
				<!-- end New products_Feature code -->


				<!-- start New products_Feature code -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-3 d-flex btn-higt">
				<h4 class="border-bottom pb-3 mr-3">New Popular</h4> <a href="{{url('new-popular')}}" class="btn btn-primary btn-sm " style="height: 30px;">View All</a> </div>
			<div class="owl-carousel owl-theme" style="background-color:#F7F7F7; padding-left:10px; padding-right:10px;"> 
			@foreach ($products_Popular as $Popular )
				<div class="item mb-3 mt-2"> 
					{{--<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mt-3"> --}}
					
						<div class="card">
							<div class="view overlay"> <img src="{{asset('upload/product/'.$Popular->image)}} " class="card-img-top img-fluid mt-3" alt="" style="height:190px;width:160px; margin:auto;">
								<a>
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<div class="card-body text-center">
								<a href="" class="grey-text">
									<h6 style="font-size:16px; height:20px;overflow:hidden;">{{$Popular->name}}</h6> </a>
								<h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{number_format($Popular->original_price)}}</s></span>
       <span class="font-weight-bold"style="font-size:14px; color:#777F88;">Rs:{{number_format($Popular->offer_price)}}</span>

    </h6> 
	<a href="{{url('collections/'.$Popular->subcategory->category->group->url.'/'.$Popular->subcategory->category->url.'/'.$Popular->subcategory->url.'/'.$Popular->url)}}" class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a> 
          </div>
       </div>
						
					<!--Grid column-->
				</div> 
				
				@endforeach
			 </div>
		</div>
				</div>
				</div>
				<!-- end New products_Feature code -->
			<script>
			$(document).ready(function() {
				$('.owl-carousel').owlCarousel({
					loop: true,
					margin: 10,
					nav: true,
					dots: false,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 3
						},
						1000: {
							items: 4
						}
					}
				});
			});
			</script> 
			
			@endsection