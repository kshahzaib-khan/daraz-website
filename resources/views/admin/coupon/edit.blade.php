@extends('layouts.admin')
@section('title')
Edit  Coupon
@endsection
@section('content')
<div class="container">
    <div class="row">
  <div class="col-md-12 mt-5">
      {{-- @if (session('status'))
      <div class="alert alert-success alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('status')}}
      </div>
      @endif --}}
        <div class="card">
            <div class="card-body">

                <h5 class="mb-0">Coupon edit
                    <a href="{{url('/admin-coupon-view')}}"class="btn btn-primary btn-sm float-right">Back</a>
                    <form action="{{url('coupon-update/'.$coupon->id)}}"method="post">

                        @csrf
                        @method('PUT')
                    <div class="modal-body">

                        <div class="row">

                          <div class="col-md-6">
                               <label>Offer Name</label>
                               <input type="text" name="offer_name" class="form-control"value="{{$coupon->offer_name}}">
                          </div>

                          <div class="col-md-6 ">
                            <label>Products (Optional)</label>
                            <select name="product_id" class="form-control seclect2-products">
                                <option value="">select</option>
                              @foreach ($product as $product_item)
                              <option value="{{$product_item->id}}"{{"$product_item->id" == "$product_item->product_id" ? 'selected':''}}>{{$product_item->name}}</option>
                              @endforeach

                            </select>
                          </div>

                            <div class="col-md-6 mb-2">
                              <label> Coupon Code</label>
                              <input type="text"name="coupon_code" class="form-control"value="{{$coupon->coupon_code}}">
                            </div>

                            <div class="col-md-6 mb-2">
                              <label> Coupon Limit</label>
                              <input type="text"name="coupon_limit" class="form-control"value="{{$coupon->coupon_limit}}">
                            </div>

                            <div class="col-md-6 mb-2">
                              <label> Coupon Type</label>
                              <select name="coupon_type" class="form-control">
                                <option value="">selsect your Coupon</option>
                                <option value="1"{{"$coupon->coupon_type" == "1" ? 'selected': ''}}>Precentage</option>
                                <option value="2"{{"$coupon->coupon_type" == "2" ? 'selected': ''}}>Amount</option>
                              </select>
                              </div>

                            <div class="col-md-6 mb-2">
                              <label> Coupon Price</label>
                              <input type="text"name="coupon_price" class="form-control"value="{{$coupon->coupon_price}}">
                            </div>

                            <div class="col-md-6 mb-2">
                              <label> Start Date Time</label>
                              <input type="datetime-local"name="start_datetime" class="form-control"value="{{date('Y-m-d\TH:i',strtotime($coupon->start_datetime)) }}">
                            </div>

                            <div class="col-md-6 mb-2">
                              <label>End Date Time</label>
                              <input type="datetime-local"name="end_datetime" class="form-control "value="{{date('Y-m-d\TH:i',strtotime($coupon->end_datetime)) }}">
                            </div>

                            <div class="col-md-6 mb-2">
                              <label>Status</label>
                              <input type="checkbox"name="status"{{$coupon->status == "1" ? 'checked':''}}>(0=Active, 1=Blocked)
                            </div>

                            <div class="col-md-6 mb-2">
                              <label>Visibility Status</label>
                              <input type="checkbox"name="visibility_status"{{$coupon->visibility_status == "1" ? 'checked':''}}>(0=show, 1=hide)
                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary btn-sm btn-block">save</button>
                        </div>
                    </div>
                </form>
                </h5>
            </div>
      </div>
    </div>
    </div>
  </div>
@endsection
