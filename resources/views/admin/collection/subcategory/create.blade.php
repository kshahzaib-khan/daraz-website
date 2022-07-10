@extends('layouts.admin')
@section('title')  
Create Subcategory
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
                    <a href="">Collection</a> / <span>Sub-Category Create</span>
                    <a href="{{url('sub-category')}}"class="btn btn-primary float-right py-2 btn-sm">Back</a>

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
                {{-- @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       {{session('error')}}
                  </div>
                @endif --}}
             <div class="card">
                 <div class="card-body">
                    <form action="{{url('store-subcategory')}}"method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="Name">Category Id(Name):</label>
                              <select class="form-control" name="category_id" required>
                                  <option value="">select</option>
                                   @foreach($categories as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Name:</label>
                          <input type="text" class="form-control"name="name" placeholder="Enter Name"required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Custom URL (Slug):</label>
                          <input type="text" class="form-control"name="url" placeholder="Enter Slug" id="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="Name">Description:</label>
                            <textarea class="form-control" name="Description" required></textarea>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="Name">Image:</label>
                          <input type="file" class="form-control"name="subcategory_image"required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="priority">priority:</label>
                            <input type="number" class="form-control" name="priority" required>
                        </div>
                    </div>

                    <div class="col-md-3 mt-5">
                        <div class="form-group">
                          <label for="Name">Show/Hide:</label>
                          <input type="checkbox" name="status" class="larger">

                          {{-- <input type="checkbox" name="status"{{$edit_group->status == '1' ? 'checked' : ''}}> --}}
                        </div>
                    </div>

                    <div class="col-md-3" style="margin-top: 37px;">
                        <div class="form-group">
                          <input type="submit" class="form-control btn btn-primary btn-sm "value="Create">

                          </div>
                    </div>

                        </div>

                      </form>
                 </div>

             </div>
         </div>
     </div>
   </div>


@endsection
