@extends('layouts.admin')
@section('title')
   Slider
@endsection
@section('content')
<style>
     th{
         background-color:#007BFF;
         color: white;
     }

     </style>
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
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                   <h4>Slider
                       <a href="{{url('add-slider')}}" class="btn btn-primary btn-sm float-right">Add Slider</a>
                   </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table  id="example" class="table table-bordered">
                        <thead>



                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Description</th>
                                <th >Link</th>
                                <th>Link_name</th>
                                <th>Slider_Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ( $slider as $slider_item )
                            <tr>
                                <td>{{$slider_item->id}}</td>
                                <td>{{$slider_item->heading}}</td>
                                <td >{{$slider_item->description}}</td>
                                <td >{{$slider_item->link}}</td>
                                <td>{{$slider_item->link_name}}</td>
                                <td><img src="{{asset('upload/slider/'.$slider_item->image)}}" style="width: 100px; height:50px;"></td>
                                <td>
                                    @if($slider_item->status == '1')
                                           Hidden
                                           @else
                                             Visible
                                    @endif
                                </td>

                                <td>
                                    <a href="{{url('edit-slider/'.$slider_item->id)}}"class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
     </script>
@endsection
