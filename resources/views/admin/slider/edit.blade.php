@extends('layouts.admin')
@section('title')
Edit Slider
@endsection
@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-12 mt-5">
            @if(session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{session('status')}}
          </div>
          @endif
        </div> --}}

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                   <h4> Create Slider
                       <a href="{{url('home-slider')}}" class="btn btn-primary btn-sm float-right">Back</a>
                   </h4>
                </div>
                <div class="card-body">
                      <form action="{{url('update-slider/'.$slider->id)}}"method="post"enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                         <div class="form-group">
                             <label>Heading</label>
                             <input type="text"name="heading" class="form-control"value="{{$slider->heading}}">
                         </div>
                            </div>

                            <div class="col-md-6">
                         <div class="form-group">
                            <label>Description</label>
                            <input type="text"name="description" class="form-control"value="{{$slider->description}}">
                        </div>
                            </div>

                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text"name="link" class="form-control"value="{{$slider->link}}">
                        </div>
                            </div>

                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Link Name</label>
                            <input type="text"name="link_name" class="form-control"value="{{$slider->link_name}}">
                        </div>

                            </div>

                           <div class="col-md-6">
                        <div class="form-group">
                            <label>Slider Image Upload</label>
                            <input type="file"name="image" class="form-control">
                            <img src="{{asset('upload/slider/'.$slider->image)}}"style="width: 200px; height:70px;margin-top:10px;">

                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Slider Image</label>
                            <img src="{{asset('upload/slider/'.$slider->image)}}"style="width: 100px; height:50px;">
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            0=visible, 1=hidden
                                   <div style="border:solid 1px #CED4DA; border-radius:3px;">
                            <input type="checkbox"name="status" class="form-control"{{$slider->status == '1' ? 'checked':''}}>
                       </div>
                        </div>
                    </div>
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
