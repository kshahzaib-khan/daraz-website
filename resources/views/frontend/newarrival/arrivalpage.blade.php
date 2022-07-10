@extends('layouts.frontend')
@section('title')
New Arrival
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"style="margin-top:90px;">
            <h4 class="border-bottom">New Arrivals</h4>
            {{-- <a href="{{url('new-arrival')}}"class="btn btn-primary btn-sm">View All</a> --}}
        </div>
  @foreach ($products as $NewArrivals )


    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4"style="margin-top:6px;">
<div class="card">
  <div class="view overlay">
    <img src="{{asset('upload/product/'.$NewArrivals->image)}} "class="card-img-top img-fluid mt-3" alt=""style="height:auto;width:150px; margin:auto;">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <div class="card-body text-center">

    <a href="" class="grey-text">
      <h6 style="font-size:14px; height:20px;overflow:hidden;">{{$NewArrivals->name}}</h6>
    </a>
    <h6>
       <span class="font-italic mr-2" style="color:#E69597;"><s>Rs:{{$NewArrivals->original_price}}</s></span>
       <span class="font-weight-bold" style="font-size:14px; color:#777F88;">Rs:{{$NewArrivals->offer_price}}</span>

    </h6>

    <a href="{{url('collections/'.$NewArrivals->subcategory->category->group->url.'/'.$NewArrivals->subcategory->category->url.'/'.$NewArrivals->subcategory->url.'/'.$NewArrivals->url)}}"class="btn btn-outline-primary btn-block btn-sm">
        View Detail
    </a>
  </div>


</div>
<!--Card-->

</div>

<!--Grid column-->
@endforeach
<script>
     wishlistload();
</script>

</div>
   <div style="margin-left:45%;">
      {{$products->links()}}
              </div>
  </div>

@endsection
