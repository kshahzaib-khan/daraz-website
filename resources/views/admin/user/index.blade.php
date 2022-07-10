@extends('layouts.admin')
@section('content')
@section('title')
User Regsiter
@endsection
 <style>
     th{
         background-color:#007BFF;
         color: white;
     }

     </style>
 <!--Main layout-->
 <div class="container mt-4">
     <div class="row">
         <div class=" col-xl-12 col-lg-12 col-md-12">
         <div class="card m-auto">
             <div class="card-body">
                <h5> User Register</h5>
             </div>
         </div>
        </div>

         <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
        <div class="card mb-5 crd-w">
            <div class="card-body">
                <div class="row">
                      <div class="col-md-12 d-flex">
                        <h5 class="pr-5">
                            @php $u_total = '0'; @endphp
                            @foreach($user as $item)
                            @php
                            if($item->isUserOnline()){
                                $u_total = $u_total + 1;
                            }
                            @endphp
                            @endforeach
                               Total user online :{{$u_total}}
                            </h5>


                              <form action="{{url('register-user')}}"method="GET" class="form-inline">
                                 <div class="row">
                                     <div class="col-md-12">

                                           <select name="roles" class="form-control btn-sm">
                                               @if(isset($_GET['roles']))
                                               <option value="{{$_GET['roles']}}">{{$_GET['roles']}}</option>
                                               <option value="">Default</option>
                                               <option value="admin">Admin</option>
                                               <option value="vendor">Vendor</option>
                                               <option value="user">User</option>

                                               @else
                                               <option value="">Default</option>
                                               <option value="admin">Admin</option>
                                               <option value="vendor">Vendor</option>
                                               <option value="user">User</option>

                                               @endif
                                           </select>




                                     </div>


                                 </div>
                                 <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                              </form>
                            </div>
                </div>
            <div class="table-responsive">

                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>isBan/Unban</th>
                            <th>online/offline</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($user as $item)

                        <tr>

                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role_as}}</td>

                            <td>
                                @if($item->isban == '0')
                                <label class="py-2 px-3 btn btn-primary btn-sm" style="font-size: 8px;">Approve</label>
                                @elseif($item->isban == '1')
                                <label class="py-2 px-3 btn btn-danger btn-sm" style="font-size: 7px;">Not Approve</label>
                                  @endif
                            </td>
                            <td> @if($item->isUserOnline())
                                <label class="py-2 px-3 btn btn-success btn-sm">Online</label>
                                 @else
                                 <label class="py-2 px-3 btn btn-warning btn-sm">Offline</label>
                                  @endif
                            </td>
                            <td><a href="{{url('role-edit/'.$item->id)}}"><button  class="btn btn-success btn-sm">Edit</button><a/></td>
                            <td><a href="{{url('role-delete/'.$item->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a></td>

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
