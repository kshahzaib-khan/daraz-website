@extends('layouts.frontend')
<style>
.crd p {
	font-size: 20px;
	margin-top: 10px;
	text-align: center;
}

.crd img {
	margin-left: 20%;
	width: 60%;
	height: 180px;
	/* transform: translate(margin-left -20%); */
}
</style> @section('title') Collection-Category @endsection @section('content')
<section class="" style="margin-top:90px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h5>Collections / {{ $group_view->name}} </h5> </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<div class="row"> @foreach($category as $item)
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
				<a href="{{url('collections/'.$item->group->url.'/'.$item->url)}}">
					<div class="card crd">
						<div class="card-body"> <img src="{{asset('upload/categoryimage/'.$item->image)}}" alt="" class="card-img-top">
							<p>{{$item->name}}</p>
						</div>
					</div>
				</a>
			</div> 
			@endforeach 
		</div>
	</div>
</section> 
@endsection
