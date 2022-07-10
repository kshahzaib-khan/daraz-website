@extends('layouts.admin')
@section('content')
@section('title')
Group
@endsection
 <style>
     th{
         background-color:#007BFF;
         color: white;
         font-size:12px!important;
     }
     input.larger {
      width: 20px;
      height: 20px;

      margin-left: 35px;
    }
     </style>
 <!--Main layout-->
 <div class="container mt-4">
     <div class="row">

          @if(session('status'))
          <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{session('status')}}
         </div>
          </div>
          @endif
        <div class="col-md-12">
        <div class="card">
              <div class="card-body">
            <a href="">Collection</a> / <span>Group</span>
           <a href="{{url('delete-group-record')}}"class="btn btn-primary float-right py-2 btn-sm"> Delete Group Record</a>
           <a href="{{url('add-group')}}"class="btn btn-primary float-right py-2 btn-sm"> Add Group</a>

                        </div>
                </div>
          </div>

         <div class="col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">

            <div class="table-responsive">

                <table id="example" class="table table-striped table-bordered table-responsive-md" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Shwo/Hide</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($group as $item)

                        <tr>

                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->Description}}</td>

                            <td><input type="checkbox" {{$item->status == '1' ? 'checked' : ''}} class="larger"></td>

                            <td><a href="{{url('edit-group/'.$item->id)}}"><button  class="btn btn-success btn-sm">Edit</button><a/></td>
                            <td><a href="{{url('delete-group/'.$item->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a></td>

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
      <!--Main layout-->
@endsection
