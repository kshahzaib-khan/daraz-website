@extends('layouts.frontend')
@section('title') New Feature
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin-top:90px;">
			<h4 class="border-bottom">New Festure</h4>
			 {{-- <a href="{{url('new-feature')}}" class="btn btn-primary btn-sm">View All</a> --}}
		 </div>
			 @foreach ($new_feature as $feature )
		<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" style="margin-top:6px;">
			<div class="card">
				<div class="view overlay"> <img src="{{asset('upload/product/'.$feature->image)}} " class="card-img-top img-fluid mt-3" alt="" style="height:170px;max-width:140px; margin:auto;">
					<a>
						<div class="mask rgba-white-slight"></div>
					</a>
				</div>
				<div class="card-body text-center">
					<a href="" class="grey-text">
						<h6 style="font-size:14px; height:20px;overflow:hidden;">{{$feature->name}}</h6> </a>
					<h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{$feature->original_price}}</s></span>
       <span class="font-weight-bold" style="font-size:14px; color:#777F88;">Rs:{{$feature->offer_price}}</span>

    </h6> <a href="{{url('collections/'.$feature->subcategory->category->group->url.'/'.$feature->subcategory->category->url.'/'.$feature->subcategory->url.'/'.$feature->url)}}" class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a> </div>
			</div>
			<!--Card-->
		</div>
		<!--Grid column-->
		@endforeach 
	</div>
	<div style="max-width:150px;width:100%;margin:auto;"> 
	{{$new_feature->links()}} </div>
</div> @endsection