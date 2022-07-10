@extends('layouts.frontend')
@section('title') Wishlist 
 @endsection
 
<style>

@media(max-width:511px) {
	table th,
	td {
		font-size: 12px!important;
	}
}

@media(max-width:767px) {
	.scrolbar {
		overflow-x: scroll;
	}
}
@media(max-width:773px) {
	.container-fluid {
	margin-top:60px!important;
	}	
}
@media(max-width:390px) {


 .container-fluid {
	margin-top:50px!important;
	}	
}

</style>


<div class="container-fluid bg-success"style="margin-top:100px;">
		<div class="row">
			<div class="col-md-12 py-3">
				<h5 class="heading-top ml-5 mt-2"><a href="/" class="text-dark">Home</a> › Wishlist</h5> </div>
		</div>
	</div>
<section class="py-5 higpgtop">
	<div class="container">
		<div class="row">
			<div class=" col-lg-12 col-md-12 col-sm-12  col-12"> @if($wishlist->count()> 0) @foreach ($wishlist as $item) @if (isset($item->products))
				<div class="scrolbar">
					<table class="table table-bordered-0 text-center shadow wishlist_content">
						<thead>
							<tr>
								<th class="cth">Product Image</th>
								<th class="cth">Name</th>
								<th>Price</th>
								<th>Product Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<input type="hidden" class="wishlist_id" value="{{$item->id}}">
								<td> <img src="{{asset('upload/product/'.$item->products->image)}}" class="img-fluid" style="max-width:100px;height:100px;"></td>
								<td>{{$item->products->name}}</td>
								<td>{{$item->products->offer_price}}</td>
								<td>
									<button type="button" class="btn btn-danger btn-sm wishlist_remove_btn">Remove</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div> @endif
                 @endforeach 
            </div>
             @else
			<div class="row">
				<div class="col-md-12 mycard py-5 text-center">
					<div class="mycards">
						<h4>Your Wishlist is currently empty.</h4> <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a> </div>
				</div>
			</div> 
            @endif 
        </div>
	</div>
	
	 
</section> 

