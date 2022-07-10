@extends('layouts.frontend')
@section('title') New Popular 
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin-top:90px;">
			<h4 class="border-bottom">New Popular</h4> {{-- <a href="{{url('new-arrival')}}" class="btn btn-primary btn-sm">View All</a> --}} </div> 
			@foreach ($new_popular as $popular )
		<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" style="margin-top:6px;">
			<div class="card">
				<div class="view overlay"> <img src="{{asset('upload/product/'.$popular->image)}} " class="card-img-top img-fluid mt-3" alt="" style="height:170px;max-width:140px; margin:auto;">
					<a>
						<div class="mask rgba-white-slight"></div>
					</a>
				</div>
				<div class="card-body text-center">
					<a href="" class="grey-text">
						<h6 style="font-size:14px; height:20px;overflow:hidden;">{{$popular->name}}</h6> </a>
					<h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{$popular->original_price}}</s></span>
       <span class="font-weight-bold" style="font-size:14px; color:#777F88;">Rs:{{$popular->offer_price}}</span>

    </h6> <a href="{{url('collections/'.$popular->subcategory->category->group->url.'/'.$popular->subcategory->category->url.'/'.$popular->subcategory->url.'/'.$popular->url)}}" class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a> </div>
			</div>
			<!--Card-->
		</div>
		<!--Grid column-->
		@endforeach </div>
	<div style="max-width:150px;width:100%;margin:auto;"> 
	{{$new_popular->links()}} </div>
</div> @endsection