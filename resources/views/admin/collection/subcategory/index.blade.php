@extends('layouts.admin')
@section('title')
Subcategory
@endsection
@section('content')

 <style>
     th{
         background-color:#007BFF;
         color: white;
         font-size: 12px!important;
     }

     input.larger {
      width: 20px;
      height: 20px;
      margin-left: 30px;
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
            <a href="">Collection</a> / <span>Sub-Category</span>
           <a href="{{url('delete-subcategory-record')}}"class="btn btn-primary float-right py-2 btn-sm"> Delete Sub-Category  Record</a>
           <a href="{{url('add-subcategory')}}"class="btn btn-primary float-right py-2 btn-sm"> Add Sub-Category</a>

                        </div>
                </div>
          </div>

         <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">

            <div class="table-responsive">

                <table id="example" class="table table-striped table-bordered table-responsive-md" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Shwo/Hide</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($subcategory as $item)

                        <tr>

                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->Category->name}}</td>
                            {{-- <td>{{$item->category_id}}</td> --}}

                            <td><img src="{{asset('upload/subcategoryimage/'.$item->image)}}"style="width:30px;height:40px;"></td>
                            {{-- <td><img src="{{asset('upload/categoryicon/'.$item->icon)}}"style="width:30px;height:40px;"></td> --}}

                            <td><input type="checkbox" {{$item->status == '1' ? 'checked' : ''}} class="larger"></td>
                            <td><a href="{{url('edit-subcategory/'.$item->id)}}"><button  class="btn btn-success btn-sm"style="font-size:8px;">Edit</button></a></td>

                            <td><a href="{{url('delete-subcategory/'.$item->id)}}"><button  class="btn btn-danger btn-sm"style="font-size:8px;">Delete</button></a></td>
                            {{-- <td><a href="{{url('delete-group/'.$item->id)}}"><button class="btn btn-danger btn-sm">Dele</button></a></td> --}}

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
