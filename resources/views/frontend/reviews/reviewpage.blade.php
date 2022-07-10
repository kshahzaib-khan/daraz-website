@extends('layouts.frontend')

@section('title','write a Review')

@section('content')
<div class="container"style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                    <h5> You are writing a review for {{$product->name}}</h5>
                    <form action="{{url('/add-review')}}"method="POST">
                        @csrf
                        <input type="hidden"name="product_id" value="{{$product->id}}">
                        <textarea class="form-control" name="user_reveiw"rows="5"placeholder="Write a review"></textarea>
                        <button type="submit"class="btn btn-primary btn-sm">Submit Review</button>
                    </form>

                    @else
                       <div class="alert alert-danger">
                           <h5>You are not eligible to review this product</h5>
                           <p>For the trusthworthiness of the reviews, only customers who purchase
                               the product can write ca review about the product.
                           </p>
                           <a href="{{url('/')}}"class="btn btn-primary btn-sm"> Go to Home Page</a>
                       </div>
                    @endif
                    {{-- <div class="alert alert-danger">
                        <h5>You are not eligible to review this product</h5>
                        <p>For the trusthworthiness of the reviews, only customers who purchase
                            the product can write ca review about the product.
                        </p>
                        <a href="{{url('/')}}"class="btn btn-primary btn-sm"> Go to Home Page</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
