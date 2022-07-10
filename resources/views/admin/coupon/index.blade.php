@extends('layouts.admin')
@section('title')
 Coupon
@endsection
@section('content')
<style>
     th{
         background-color:#007BFF;
         color: white;
     }

     </style>
<div class="container mt-4">
    <div class="row">
         <!-- The Modal -->
  <div class="modal fade" id="CouponModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form action="{{url('coupon-store')}}"method="post">
            @csrf
        <div class="modal-body">

            <div class="row">

              <div class="col-md-6">
                   <label>Offer Name</label>
                   <input type="text" name="offer_name" class="form-control"required>
              </div>

              <div class="col-md-6 ">
                <label>Products (Optional)</label>
                <select name="product_id" class="form-control seclect2-products">
                    <option value="">select</option>
                  @foreach ($product as $product_item)
                  <option value="{{$product_item->id}}">{{$product_item->name}}</option>
                  @endforeach

                </select>
              </div>

                <div class="col-md-6 mb-2">
                  <label> Coupon Code</label>
                  <input type="text"name="coupon_code" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                  <label> Coupon Limit</label>
                  <input type="text"name="coupon_limit" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                  <label> Coupon Type</label>
                  <select name="coupon_type" class="form-control">
                    <option value="">selsect your Coupon Rtpe</option>
                    <option value="1">Precentage</option>
                    <option value="2">Amount</option>
                  </select>
                  </div>

                <div class="col-md-6 mb-2">
                  <label> Coupon Price</label>
                  <input type="text"name="coupon_price" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                  <label> Start Date Time</label>
                  <input type="datetime-local"name="start_datetime" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                  <label>End Date Time</label>
                  <input type="datetime-local"name="end_datetime" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                  <label>Statu</label>
                  <input type="checkbox"name="status">(0=Active, 1=Blocked)
                </div>

                <div class="col-md-6 mb-2">
                  <label>Visibility Statu</label>
                  <input type="checkbox"name="visibility_status">(0=show, 1=hide)
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm btn-block">save</button>
            </div>
        </div>
    </form>
        <!-- Modal footer -->
      </div>
    </div>
  </div>

                @if (session('status'))
                <div class="alert alert-success alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('status')}}
                  </div>
                @endif
        <div class="">
            <div class="card">
                  <div class="card-body">
                      <h5 class="mb-0">Coupon Code
                          <a href=""class="btn btn-primary btn-sm float-right"data-toggle="modal" data-target="#CouponModal">Add Coupon</a>
                      </h5>
                  </div>
            </div>
        </div>

          <div class="card mt-4">
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Offer</th>
                              <th>Coupon Code</th>
                              <th>Expiry DateTime</th>
                              <th>Active/Disable</th>
                              <th>Edit</th>
                              <th>Delet</th>


                          </tr>
                      </thead>
                      <tbody>
                          @foreach ( $coupon as $coupon_item)


                          <tr>
                              <td>{{$coupon_item->id}}</td>
                              <td>{{$coupon_item->offer_name}}</td>
                              <td>{{$coupon_item->coupon_code}}</td>
                              <td>{{$coupon_item->end_datetime}}</td>
                               <td>
                                   @if($coupon_item->status == '1')
                                   <a class="btn btn-danger btn-sm">Disable</a>
                                      @else
                                      <a class="btn btn-success btn-sm">Active</a>

                                   @endif
                               </td>
                               <td><a  href="{{url('admin/coupon-edit/'.$coupon_item->id)}}"class="btn btn-success btn-sm">Edit</a></td>
                             <td>  <a class="btn btn-danger btn-sm">Delete</a></td>


                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>

          </div>
    </div>
</div>

@endsection


