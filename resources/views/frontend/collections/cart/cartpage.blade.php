@extends('layouts.frontend')
@section('title') Cart
@endsection

<style>
@media(max-width:992px) {
	.delete_cart_data {
		font-size: 8px!important;
		width: 100%;
	}
}

@media(max-width:760px) {
	table th,
	td {
		font-size: 12px!important;
	}
	.cart-product-description {
		font-size: 12px!important;
	}
	.btn-warning {
		font-size: 10px!important;
		width: 130px;
		padding: 7px!important;
	}
	.cart-subtotal-name,
	.cart-subtotal-name,
	.cart-subtotal-price,
	.cart-grand-price-viewajax,
	.cart-grand-name,
	.cart-grand-price,
	.cart-grand-price-viewajax {
		font-size: 12px!important;
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
/* @media(max-width:390px) {
	.cstm-p {
		max-height: 40px;
		padding-top: 0px!important;
	}
	.heading-top {
		margin-top: 10px!important;
	}
} */
</style>
<div class="container-fluid bg-success"style="margin-top:100px;">
		<div class="row">
			<div class="col-md-12 py-3">
				<h5 class="heading-top ml-5 mt-2"><a href="/" class="text-dark">Home</a> › Cart</h5> </div>
		</div>
	</div>
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12"> @if(isset($cart_data)) @if(Cookie::get('shopping_cart')) @php $total="0" @endphp
				<div class="shopping-cart">
					<div class="shopping-cart-table">
						<div class="table-responsive">
							<div class="col-md-12 text-right mb-3"> <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a> </div>
							<table class="table table-bordered my-auto  text-center ">
								<thead>
									<tr>
										<th class="cart-description">Image</th>
										<th class="cart-product-name">Name</th>
										<th class="cart-price">Price</th>
										<th class="cart-qty">Quantity</th>
										<th class="cart-total">Grandtotal</th>
										<th class="cart-romove">Remove</th>
									</tr>
								</thead>
								<tbody class="my-auto"> @foreach ($cart_data as $data)
									<tr class="cartpage">
										<td class="cart-image">
											<a class="entry-thumbnail" href="javascript:void(0)"> <img src="{{ asset('upload/product/'.$data['item_image']) }}" width="70px" alt=""> </a>
										</td>
										<td class="cart-product-name-info">
											<h6 class='cart-product-description'>
                                                        <a href="javascript:void(0)">{{ $data['item_name'] }}</a>
                                                    </h6> </td>
										<td class="cart-product-sub-total"> <span class="cart-sub-total-price">{{ number_format($data['item_price'], 0) }}</span> </td>
										<td class="cart-product-quantity" width="135px">
											<input type="hidden" class="product_id" value="{{ $data['item_id'] }}">
											<div class="input-group input-group-sm flex-nowrap quantity">
												<div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer"> <span class="input-group-text">-</span> </div>
												<input type="text" class="qty_input form-control text-center" maxlength="2" max="10" value="{{$data['item_quantity']}}" style="width:40px;">
												<div class="input-group-append increment-btn changeQuantity" style="cursor: pointer"> <span class="input-group-text">+</span> </div>
											</div>
										</td>
										<td class="cart-product-grand-total"> <span class="cart_grand_total_price">{{ number_format($data['item_quantity'] * $data['item_price'], 0) }}</span> </td>
										<td style="font-size: 20px;">
											<button type="button" class="delete_cart_data btn btn-danger btn-sm"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
										</td> @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp </tr> @endforeach </tbody>
							</table>
							<!-- /table -->
						</div>
					</div>
					<!-- /.shopping-cart-table -->
					<div class="row">
						<div class="col-md-7 estimate-ship-tax">
							<div> <a href="{{ url('/') }}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a> </div>
						</div>
						<!-- /.estimate-ship-tax -->
						<div id="totalajaxcall" class="col-md-5 col-sm-12 mt-3">
							<div class="totalpricingload">
								<div class="cart-shopping-total">
									<div class="row">
										<div class="col-md-6">
											<h6 class="cart-subtotal-name">Subtotal</h6> </div>
										<div class="col-md-6">
											<h6 class="cart-subtotal-price">
                                                    Rs.
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                </h6> </div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<h6 class="cart-grand-name">Grand Total</h6> </div>
										<div class="col-md-6">
											<h6 class="cart-grand-price">
                                                    Rs.
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                </h6> </div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="cart-checkout-btn text-center"> @if (Auth::user()) <a href="{{ url('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a> @else <a href="" data-toggle="modal" data-target="#loginModal" class="btn btn-success checkout-btn">PROCCED TO CHECKOUT</a> {{-- you add a pop modal for making a login --}} @endif
												<h6 class="mt-3">Checkout with Daraz</h6> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.shopping-cart -->
                @endif @else
				<div class="row">
					<div class="col-md-12 mycard py-5 text-center">
						<div class="mycards">
							<h4>Your cart is currently empty.</h4> <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a> </div>
					</div>
				</div>
                 @endif
                 </div>
		</div>
		<!-- /.row -->
	</div>
	
	<!-- /.container -->
</section> 
