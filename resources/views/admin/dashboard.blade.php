@extends('layouts.admin')
@section('content')
@section('title')
Dashboard
 @endsection
 

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4> Hi {{Auth::user()->name}}</h4>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection