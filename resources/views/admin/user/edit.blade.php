@extends('layouts.admin')
@section('content')


 <!--Main layout-->
 <div class="container mt-5">
     <div class="row">
        <div class="card mb-5">
            <div class="card-body">
                <h5>Register User Edit Role</h5>
            </div>
            </div>

         <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       {{session('status')}}
                  </div>
                @endif
                <h5>Current Role:{{$user_role->role_as}}</h5>
                  @if($user_role->isban == '0')
                  isBan Status: <label class="btn btn-primary btn-sm">Approve</label>
                  @elseif($user_role->isban == '1')
                  <label class="btn btn-danger btn-sm">Not Approve</label>
                  @endif
                <form action="{{url('role-update/'.$user_role->id)}}"method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="Name">Name:</label>
                      <input type="text" class="form-control"name="name" placeholder="Enter Name" id="Name"value="{{$user_role->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"name="email" placeholder="Enter Email" id="Name"readonly value="{{$user_role->email}}">
                      </div>
                      <div class="form-group">
                        <label for="roles">Ban and Un-Ban:</label>
                        <select name="isban" class="form-control">
                            <option value="{{$user_role->isban}}">--Select Ban and Un-Ban--</option>
                          <option value="0">Un-Ban</option>
                          <option value="1">Ban Now</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="role">Role:</label>
                        <select name="roles" class="form-control">
                            <option value="{{$user_role->role_as}}">--Select Role--</option>
                          <option value="admin">Admin</option>
                          <option value="vendor">Vendor</option>
                          <option value="user">User</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary btn-sm">Upade</button>
                  </form>
            </div>
            </div>
        </div>
     </div>
 </div>

      <!--Main layout-->
@endsection
