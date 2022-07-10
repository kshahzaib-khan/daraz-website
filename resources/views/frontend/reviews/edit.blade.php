@extends('layouts.frontend')

@section('title','write a Review')

@section('content')
<div class="container"style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h5> You are writing a review for {{$review->product->name}}</h5>
                    <form action="{{url('/update-review')}}"method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden"name="review_id" value="{{$review->id}}">
                        <input type="hidden"name="product_id" value="{{$product->id}}">
                        

                        <textarea class="form-control" name="user_review"rows="5"placeholder="Write a review">{{$review->user_review}}</textarea>
                        <button type="submit"class="btn btn-primary btn-sm">Update Review</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
