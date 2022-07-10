@extends('layouts.admin')
@section('content')
@section('title')
Order
@endsection
 <style>
     th{
         background-color:#007BFF;
         color: white;
         font-size: 12px!important;
     }

     input.larger {
      width: 20px;
      height: 20px;
      margin-left: 25px;
    }

     </style>
 <!--Main layout-->
 <div class="container mt-4">
     <div class="row">

          {{-- @if(session('status'))
          <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{session('status')}}
         </div>
          </div>
          @endif --}}
        <div class="col-md-12">
        <div class="card">
              <div class="card-body">
            <a href="">Collection</a> / <span>Order</span>
           {{-- <a href="{{url('')}}"class="btn btn-primary float-right py-2 btn-sm"> Delete Group Record</a>
           <a href="{{url('add-category')}}"class="btn btn-primary float-right py-2 btn-sm"> Add Category</a> --}}

                        </div>
                </div>
          </div>

         <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">


                <table id="example" class="table table-striped table-bordered table-responsive-md" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Trcaking No</th>
                            <th>C-Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Proceed</th>


                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($order as $item)

                        <tr>

                            <td>{{$item->id}}</td>
                            <td>{{$item->tracking_no}}</td>
                            <td>{{$item->users->name}}</td>
                            <td>{{$item->users->phone}}</td>

                             <td>
                                 @if($item->order_status == 0)
                                  Pendding
                                 @else
                                 @endif
                             </td>


                            {{-- <td><input type="checkbox" {{$item->status == '1' ? 'checked' : ''}} class="larger"></td> --}}
                            <td><a href="{{url('order-view/'.$item->id)}}"><button  class="btn btn-success btn-sm"style="font-size:8px;">View</button></a></td>
                            <td><a href="{{url('order-proceed/'.$item->id)}}"><button  class="btn btn-success btn-sm"style="font-size:8px;">Proceed</button></a></td>

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
 <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
     </script>
      <!--Main layout-->
@endsection
