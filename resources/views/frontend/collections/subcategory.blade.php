@extends('layouts.frontend')
<style>
.crd p {
	font-size: 20px;
	margin-top: 10px;
	text-align: center;
}

.crd img {
	margin-left: 20%;
	width: 55%;
	height: auto;
	border-radius: 3px;
	/* height: 170px; */
	/* transform: translate(margin-left -20%); */
}
</style> @section('title') Collection - Category - SubCategory @endsection @section('content')
<section class="" style="margin-top:90px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body"> Collections / <span> <a href="{{url('collections'.'/'.$category->group->url)}}">{{ $category->group->name}}</a></span> / <span>{{ $category->name}}</span> </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<div class="row "> @foreach( $subcategory as $subcate)
			<div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2">
				<a href="{{url('collections/'.$subcate->Category->group->url.'/'.$subcate->category->url.'/'.$subcate->url)}}">
					<div class="card crd">
						<div class="card-body"> <img src="{{asset('upload/subcategoryimage/'.$subcate->image)}}" alt="" class="card-img-top">
							<p>{{$subcate->name}}</p>
						</div>
					</div>
				</a>
			</div>
      
       @endforeach 
      
      </div> 
  
  </div>
</section> @endsection