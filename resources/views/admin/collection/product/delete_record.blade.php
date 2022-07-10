@extends('layouts.admin')
@section('title')
Delete Product
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
            <a href="">Collection</a> / <span>Delete Category Record</span>
            <a href="{{url('category')}}"class="btn btn-primary float-right py-2 btn-sm">back</a>

                        </div>
                </div>
          </div>

         <div class="col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered " style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Brand Name</th>
                            <th>Image</th>
                            <th>Shwo/Hide</th>
                            <th>Re-Store</th>
                            <th>Permenytly-Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($delete_product_record as $item)

                        <tr>

                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->Subcategory->name}}</td>
                            <td><img src="{{asset('upload/product/'.$item->image)}}"style="width:30px;height:40px;"></td>
                            <td><input type="checkbox" {{$item->status == '1' ? 'checked' : ''}} class="larger"></td>

                            <td><a href="{{url('restore-product/'.$item->id)}}"><button class="btn btn-danger btn-sm">Re-Store</button></a></td>
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
 </div>
 <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
     </script>
      <!--Main layout-->
@endsection
