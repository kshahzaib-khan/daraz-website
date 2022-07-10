@extends('layouts.admin')
@section('title')
Create Slider
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            @if(session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{session('status')}}
          </div>
          @endif
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                   <h4> Create Slider
                       <a href="{{url('home-slider')}}" class="btn btn-primary btn-sm float-right">Back</a>
                   </h4>
                </div>
                <div class="card-body">
                      <form action="{{url('store-slider')}}"method="post"enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                             <label>Heading</label>
                             <input type="text"name="heading" class="form-control">
                         </div>

                         <div class="form-group">
                            <label>Description</label>
                            <input type="text"name="description" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Link</label>
                            <input type="text"name="link" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Link Name</label>
                            <input type="text"name="link_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Slider Image Upload</label>
                            <input type="file"name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <input type="checkbox"name="status" class="form-control">0=visible, 1=hidden
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-primary btn-sm">
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
