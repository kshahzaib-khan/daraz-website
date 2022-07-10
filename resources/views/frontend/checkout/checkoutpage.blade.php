@extends('layouts.frontend')
 @section('title') Checkout 
 @endsection
  @section('content')
  <style>
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
	td,th {
font-size:12px!important;

 }

 .container-fluid {
	margin-top:50px!important;
	}	
}

@media(max-width:563px) {
	.btn-center-div {
		margin:auto;
		max-width:200px;
		display:flex;
		flex-direction:column;
		justify-content:center;

	}
}

@media(max-width:576px) {
.text-right{
	margin-right:30px!important;
}
}
	</style>
	<div class="container-fluid bg-success"style="margin-top:100px;">
		<div class="row">
			<div class="col-md-12 py-3">
				<h5 class="heading-top ml-5 mt-2"><a href="/" class="text-dark">Home</a> › ChackOut</h5> </div>
		</div>
	</div>


<section class="section">
	<div class="container">
		<div class="row">
			
		<div class="col-lg-6 col-md-12 col-sm-12  mt-3">
				<div class="card">
					<div class="card-body">
						
					<form method="post" action="{{url('place_order')}}" class="require-validation" data-cc-on-file="false" id="payment-form">
					<div class="row">
						 @csrf
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{Auth::user()->name}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{Auth::user()->lname}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phone_no" class="form-control" placeholder="Enter Phone Number" value="{{Auth::user()->phone}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Alternate Number</label>
								<input type="text" name="alternate_no" class="form-control" placeholder="Enter Alternate Number" value="{{Auth::user()->alternate_phone}}"> </div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Adress 1</label>
								<input type="text" name="address_1" class="form-control" placeholder="Enter Adress" value="{{Auth::user()->addres1}}"> </div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Adress 2</label>
								<input type="text" name="address_2" class="form-control" placeholder="Enter Adress" value="{{Auth::user()->addres2}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>City</label>
								<input type="text" name="city" class="form-control" placeholder="Enter City" value="{{Auth::user()->city}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>State</label>
								<input type="text" name="state" class="form-control" placeholder="Enter State" value="{{Auth::user()->state}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" placeholder="Enter Pincode" value="{{Auth::user()->email}}"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Pincode</label>
								<input type="text" name="pincode" class="form-control" placeholder="Enter Pincode" value="{{Auth::user()->pincode}}"> </div>
						</div>
					</div>

				
                      <div class="btn-center-div">
					<button type="submit" name="place_order_btn" class="btn btn-primary btn-sm">send to order</button>
					<button type="submit" name="razerpy_py_btn" class="btn btn-info btn-sm razorpy_py_btn">Razorpay pay Online</button> @include('frontend.checkout.stripemodel')
					<button type="submit" data-toggle="modal" data-target="#StripeCardModal" name="stripe_py_btn" class="btn btn-warning btn-sm stripe_py_btn">Stripe pay Online</button>
                  </div>

				  
				</form>
				</div>
				
          </div>

               </div>


			<div class="col-lg-6 col-md-12 col-sm-12 mt-3">
				<div class="card mb-3">
					<div class="card-body"> Coupon Code
						<div class="input-group">
							<input type="text" name="coupon_code" class="form-control  form-control-sm coupon_code" placeholder="Enter Coupon Code" style="top:6px;">
							<div class="input-froup-append">
								<button class="btn btn-success btn-sm apply_coupon_btn">Apply</button>
							</div>
						</div> <small id="error_coupon" class="text-danger"></small> </div>
				</div> @if(isset($cart_data)) @if(Cookie::get('shopping_cart')) @php $total='0'@endphp
				<div class="scrolbar">
				<table class="table">
					<thead>
						<tr>
							<th>Image</th>
							<th>Name</th>
							<th>Price</th>
							<th>Qty</th>
						</tr>
					</thead>
					<tbody> @foreach ($cart_data as $data )
						<tr>
							<td class="cart-image"> <img src="{{ asset('upload/product/'.$data['item_image']) }}" width="70px" alt=""> </td>
							<input type="hidden" value="{{$data['item_image'] }}" name="hidden-product-image">
							<td>{{$data['item_name']}}</td>
							<td>{{ number_format($data['item_price'], 0) }}</td>
							<td>{{$data['item_quantity']}}</td> @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp </tr> @endforeach </tbody>
				</table>
				</div>
				<hr>
				<div class="text-right">
					<h6> Sub Total:{{number_format($total, 0)}}</h6>
					<h6>Discount: <span class="discount_price">0.00</span></h6>
					<h6>Grand Total :   <span class="grandtotal_price">{{number_format($total, 0)}}</span></h6> 
				</div>
				 @endif @else
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="shadow border py-5">
							<h4> Your Cart is Empty</h4> <a href="" class=" btn-primary btn-sm">submit</a> </div>
					</div>
				</div>
				 @endif 
				</div>




		</div>
	</div>
</section>