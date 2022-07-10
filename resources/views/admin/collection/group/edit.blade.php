@extends('layouts.admin')
@section('title')
Edit Group
@endsection
<style>

input.larger {
      width: 20px;
      height: 20px;
    }
    </style>
@section('content')


   <div class="container mt-5">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-body">
                    <a href="">Collection</a> / <span>Group Edit</span>
                    <a href="{{url('group')}}"class="btn btn-primary float-right py-2 btn-sm">back</a>

                </div>
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-md-12 mt-4">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       {{session('status')}}
                  </div>
                @endif
             <div class="card">
                 <div class="card-body">
                    <form action="{{url('update-group/'.$edit_group->id)}}"method="POST"enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Name:</label>
                          <input type="text" class="form-control"name="name" placeholder="Enter Name" id="Name"value="{{$edit_group->name}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Custom URL (Slug):</label>
                          <input type="text" class="form-control"name="url" placeholder="Enter Slug" id="Name"value="{{$edit_group->url}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Description:</label>
                            <textarea class="form-control" name="Description">{{$edit_group->Description}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Show/Hide:</label>
                          <input type="checkbox" name="status"{{$edit_group->status == '1' ? 'checked' : ''}}class="larger">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="submit" class="form-control btn btn-primary btn-sm "value="Update">

                          </div>
                    </div>



                      </form>
                 </div>

             </div>
         </div>
     </div>
   </div>


@endsection
