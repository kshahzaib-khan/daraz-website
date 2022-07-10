@extends('layouts.frontend')
<style>
.sort-font {
	color: #1C1A1C;
	font-size: 15px;
	margin: 0 10px;
}

@media (max-width: 767.98px) {
	.border-sm-start-none {
		border-left: none !important;
	}
}

.bg-image img {
	height: auto;
}

@media (max-width:767px) {
	.bg-image img {
		margin-left: 24%!important;
	}
}

@media(max-width:767px) {
	.text_content_center2 {
		max-width: 80px;
		width: 100%;
		display: flex;
		justify-content: center;
		margin: auto;
	}
	.text_content_center {
		justify-content: center;
	}
	.content_center3 {
		text-align: center;
	}
	.content_center4 {
		height: 95px;
		overflow: hidden;
		text-align: center;
	}
}

@media(max-width:773px) {
	.sec-mr-top-mis {
		margin-top: 80px!important;
	}
}

@media(max-width:390px) {
	.sec-mr-top-mis {
		margin-top: 60px!important;
	}
}

@media(max-width:992px) {
	.tmg {
		margin-top: 10px!important;
	}
}

.sec-mr-top-mis {
	margin-top: 110px;
}

.wish-cart {
	display: flex;
	margin: 0 auto;
	max-width: 250px;
	width: 100%;
	display: none;
}

@media(max-width:991px) {
	.wish-cart {
		display: block;
	}
	.cstom-card-body {
		padding: 5px!important;
	}
}

.sub-prod-link2 {
	border-radius: 10px;
	padding: 5px;
	background-color: #00b712;
	background-image: linear-gradient(60deg, #1ECF13 0%, #00C851 74%);
	color: white;
}

.sub-prod-link2 a {
	color: white;
}

.sub-prod-link1 {
	() border-radius: 10px;
	padding: 5px;
	background-color: #00C851;
	color: white;
}

.sub-prod-link1 a {
	color: white;
}

@media(max-width:989px) {
	.custom-container {
		max-width: 600px!important;
	}
}

@media(max-width:496px) {
	.sub-prod-link2,
	.sort-font {
		font-size: 12px!important;
	}
}
</style> @section('title') Collection - Category - SubCategory - Products @endsection @section('content')
<section class="sec-mr-top-mis">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body cstom-card-body">
						<div class="wish-cart">
							<a class="nav-link waves-effect" href="{{url('user/wishlist')}}"> <i class="fa fa-heart" style="color:#000000;"></i> <span class="clearfix d-sm-inline-block" style="color:#000000;"> Wishlist

                     <span class="wishlist_item_count">
                         <span class="badge badge-pill red">0</span> </span>
								</span>
							</a>
							</li>
							<a class="nav-link waves-effect" href="{{url('cart')}}"> <i class="fa fa-shopping-cart" style="color:#000000;"></i> <span class="clearfix  d-sm-inline-block" style="color:#000000;"> Cart

                 <span class="basket_item_count">
                     <span class="badge badge-pill red">0</span> </span>
								</span>
							</a>
						</div>
						<!-- Collections / <span><a href="{{url('collections'.'/'.$subcategory->category->group->url)}}">{{$subcategory->category->group->name}}</a></span> / <span><a href="{{url('collections'.'/'.$subcategory->category->group->url.'/'.$subcategory->category->url)}}">{{$subcategory->category->name}}</a> </span> / <span>{{$subcategory->name}}</span> --></div>
				</div>
			</div> {{-- @if ( Session::get('status'))
			<div class="alert alert-success"> {{ Session::get('status') }} </div> @endif @if ( Session::get('status'))
			<div class="alert alert-danger"> {{ Session::get('status') }} </div> @endif --}} </div>
	</div>
	<div class="container mt-3 custom-container">
		<div class="row">
			<div class="col-md-12 mb-3" style="width:100%;"> <span class="font-weight-bold">Sort By :</span> <a href="{{URL::current()}}" class="sort-font">All</a> <a href="{{URL::current().'?sort=price_asc'}}" class="sort-font">Price - Low to High</a> <a href="{{URL::current().'?sort=price_desc'}}" class="sort-font">Price - High to Low</a> <a href="{{URL::current().'?sort=newest'}}" class="sort-font">Newest</a> <a href="{{URL::current().'?sort=popularity'}}" class="sort-font">Popular</a> <span class="sub-prod-link2"> Collections / <a href="{{url('collections'.'/'.$subcategory->category->group->url)}}">{{$subcategory->category->group->name}}</a> /<a href="{{url('collections'.'/'.$subcategory->category->group->url.'/'.$subcategory->category->url)}}"> {{$subcategory->category->name}}</a>  / {{$subcategory->name}}</span>
				<!-- <span class="sub-prod-link"> Collections / <a href="{{url('collections'.'/'.$subcategory->category->group->url)}}">{{$subcategory->category->group->name}}</a></span> <span class="sub-prod-link">/<a href="{{url('collections'.'/'.$subcategory->category->group->url.'/'.$subcategory->category->url)}}">{{$subcategory->category->name}}</a> </span> <span class="sub-prod-link"> / {{$subcategory->name}}</span> --></div>
			<div class="col-lg-3">
				<form action="{{URL::current()}}" method="GET">
					<div class="card">
						<div class="card-header">
							<h5>Brands
                                   <button type="submit" class="btn btn-primary btn-sm float-right">Filter</button>
                               </h5> </div>
						<div class="card-body"> @foreach ( $subcategorylist as $itemcate ) @php $checked = []; if(isset($_GET['filterbrand'])){ $checked = $_GET['filterbrand']; } @endphp
							<div class="mb-1">
								<input type="checkbox" class="checkbox-mr" name="filterbrand[]" value="{{$itemcate->name}}" @if (in_array($itemcate->name, $checked)) checked @endif /> <span class="checkbox-font">{{$itemcate->name}}</span> </div> @endforeach </div>
					</div>
				</form>
				<div class="card">
					<div class="card-body">
						<p>
							<label for="amount">Price range:</label>
						</p>
						<form>
							<div id="slider-range"></div>
							<br>
							<input type="text" id="start_amount" name="start_price" size="2" value="<?=isset($_GET['start_price'])?$_GET['start_price']:''?>"placeholder="0">
							<input type="text" id="end_amount" name="end_price" size="2" value="<?=isset($_GET['end_price'])?$_GET['end_price']:''?>"placeholder="100000"style="width:80px;">
							<button onclick="price_range_slider()" class="btn btn-primary btn-sm" type="">Filter</button>
						</form>
						<script>
						$(function() {
							$("#slider-range").slider({
								range: true,
								min: 0,
								max: 100000,
								values: [75, 100000],
								slide: function(event, ui) {
									$("#start_amount").val(ui.values[0]);
									$("#end_amount").val(ui.values[1]);
								}
							});
						});
						</script>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div id="updateDiv">
					<div class="row"> @foreach( $products as $products_item)
						<div class=" col-md-12 col-sm-6 col-12 tmg mb-4 ">
							<div class="card shadow border rounded-3 product_data">
								<div class="card-body">
									<div class="row">
										<div class="col-md-4 col-lg-3 col-sm-8 col-8 col-xl-3 mb-4 mb-lg-0 m-md-auto">
											<div class="bg-image hover-zoom ripple rounded ripple-surface"> <img src="{{asset('upload/product/'.$products_item->image)}}" class="img-fluid" /> </div>
										</div>
										<div class="col-md-4 col-lg-6 col-xl-6 ">
											<a href="{{url('collections/'.$products_item->subcategory->category->group->url.'/'.$products_item->subcategory->category->url.'/'.$products_item->subcategory->url.'/'.$products_item->url)}}">
												<h5 class="grey-text content_center3">{{$products_item->name}}</h5>
												<p class="text-muted content_center4" style="font-size: 13px;"> {!! $products_item->p_highlights!!} </p>
											</a>
										</div>
										<div class="col-md-4 col-lg-3 col-xl-3 border-sm-start-none border-start">
											<div class="text_content_center2">
												<h6 class="font-italic text-dark badge badge-warning px-3"> {{$products_item->sale_tag}}</h6> </div>
											<div class="d-flex flex-row align-items-center mb-1 text_content_center">
												<h4 class="mb-1 me-1">{{number_format($products_item->offer_price)}}</h4> <span class="text-danger"><s>{{number_format($products_item->original_price)}}</s></span> </div>
											<div class="d-flex flex-column mt-4"> <a href="{{url('collections/'.$products_item->subcategory->category->group->url.'/'.$products_item->subcategory->category->url.'/'.$products_item->subcategory->url.'/'.$products_item->url)}}" class="btn btn-primary btn-sm btn-block mb-1">
                                            View Details
                                             </a> {{--
												<button class="btn btn-primary btn-sm" type="button">Details</button> --}} {{--
												<button class="btn btn-outline-primary btn-sm mt-2" type="button"> Add to wishlist </button> --}}
												<div class="wishlist-content">
													<input type="hidden" class="product_id" value="{{$products_item->id}}"> @guest
													<button type="button" data-toggle="modal" data-target="#LoginModal" class="btn btn-danger btn-sm btn-block" style="color:white!important;"> <i class="fa fa-heart"> &nbsp;Add to Wishlist</i> </button> @else
													<button type="button" class=" add_to_wishlist_btn btn btn-danger btn-sm btn-block"> <i class="fa fa-heart"> &nbsp;Add to Wishlist</i> </button> @endguest </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> @endforeach 
            {{--
						<div style="margin: 0 auto;"> {{$products->links()}} </div>--}} </div>
				</div>
			</div>
		</div>
	</div>
	


</section> @endsection