@extends('layouts.admin')
@section('title')
Delete Group
@endsection
@section('content')

 <style>
     th{
         background-color:#007BFF;
         color: white;
         font-size:12px!important;
     }

     input.larger {
      width: 20px;
      height: 20px;
      /* margin: auto; */
      margin-left: 50px;
    }

     </style>
 <!--Main layout-->
 <div class="container mt-4">
     <div class="row">
          {{-- @if(session('status'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{session('status')}}
         </div>
          @endif --}}
        <div class="col-md-12">
        <div class="card">
              <div class="card-body">
            <a href="">Collection</a> / <span>Delete Group Record</span>
            <a href="{{url('group')}}"class="btn btn-primary float-right py-2 btn-sm">back</a>

                        </div>
                </div>
          </div>

         <div class="col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">


                <table id="example" class="table table-striped table-bordered table-responsive-md" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Shwo/Hide</th>
                            <th>Re-Store</th>
                            <th>Permenytly-Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($delete_group_record as $item)

                        <tr>

                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->Description}}</td>

                            <td><input type="checkbox" {{$item->status == '1' ? 'checked' : ''}} class="larger"></td>

                            {{-- <td><a href="{{url('edit-group/'.$item->id)}}"><button  class="btn btn-success btn-sm">Edit</button><a/></td> --}}
                            <td><a href="{{url('restore-group/'.$item->id)}}"><button class="btn btn-danger btn-sm">Re-Store</button></a></td>
                            <td><a href="{{url('permently-delete/'.$item->id)}}"><button class="btn btn-danger btn-sm">Permently-Delete</button></a></td>


                        </tr>
                        @endforeach


                    </tbody>

                </table>
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
      <!--Main layout-->
@endsection
