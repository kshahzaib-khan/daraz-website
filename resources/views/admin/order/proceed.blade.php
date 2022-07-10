@extends('layouts.admin')
@section('content')
<div class="modal fade"id="CompleteOrderModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"id="">Complete Order</h5>
                <button type="button"class="close"data-dismiss="modal"aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('order/complete-order/'.$order_proceed->id)}}"method="POST">
              {{ csrf_field() }}
              {{method_field('PUT')}}
              <div class="modal-body">
                  @if ($order_proceed->payment_status == '0')
                    <h6>
                        <input type="checkbox"name="cash_received" required>Recevied Payment (Cash on Delivery)
                    </h6>
                    <p>Check the Box to Confirm that you received the Cash from customer Close this Order</p>
                    @else
                    <h5>The Payment has been done Online</h5>
                  @endif
              </div>
              <div class="modal-footer">
                  <button type="button"class="btn btn-secondary"data-dismiss="modal">No</button>
                  <button type="submit"class="btn btn-primary">Yes</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
              @if(session('status'))
          <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{session('status')}}
         </div>
          </div>
          @endif
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <h5 class="mb-0">Orders Status</h5>
                      </div>
                      <div class="col-md-6">
                          <a href="{{url('orders')}}"class="float-right py-1">Back</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5>Orders Details</h5>
                            </div>
                            <div class="col-md-6">
                                <span class="float-right">
                                    <label class="bg-warning py-1 px-2 text-dark">Tracking Id:&nbsp;{{$order_proceed->tracking_no}}</label>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow-sm ">
                                    <h6 class="card-header bg-white">Tracking Status</h6>
                                    <div class="card-body">
                                        <p>
                                            @if ($order_proceed->tracking_msg ==NULL)
                                                  No Status Update.
                                                  @else
                                                  {{$order_proceed->tracking_msg}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm ">
                                    <h6 class="card-header bg-white">Current Status</h6>
                                    <div class="card-body">
                                        <p>
                                            @if ($order_proceed->payment_mode ==NULL)
                                                  Order Pendding.
                                                  @else
                                                  {{$order_proceed->payment_mode}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm ">
                                    <h6 class="card-header bg-white">Payment Status</h6>
                                    <div class="card-body">
                                        <p>
                                            @if ($order_proceed->payment_status =='0')
                                                       Status: {{_('Payment Pending')}}<br>
                                                       Mode: {{$order_proceed->payment_mode}}
                                                  @elseif($order_proceed->payment_status == '1')
                                                        Status: {{_('Paid on Delivery')}}
                                                                Mode: {{$order_proceed->payment_mode}}
                                                                @else
                                                                {{_('Paid Online')}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
             <div class="col-md-6">
                 <div class="card mt-3">
                     <div class="card-body">
                       <h5>Tracking Status Update</h5>
                       <hr>
                       @if ($order_proceed->order_status == '1')
                          {{ $order_proceed->tracking_msg}}
                          @elseif ($order_proceed->order_status == '2')
                          {{ $order_proceed->tracking_msg}}
                          @else
                          <form action="{{url('order/update-tracking-status/'. $order_proceed->id)}}"method="POST">
                             {{ csrf_field() }}
                             {{method_field('PUT')}}
                             <div class="input-group mb-3">
                                 <select name="tracking_msg"class="custom-select"required id="inputGroupSelect02">
                                     <option value="">--Select--</option>
                                     <option value="Pending"{{$order_proceed->tracking_msg == 'Pending' ? 'selected':''}}>Pending</option>
                                     <option value="Packed"{{$order_proceed->tracking_msg == 'Packed' ? 'selected':''}}>Packed</option>
                                     <option value="Shipped"{{$order_proceed->tracking_msg == 'Shipped' ? 'selected':''}}>Shipped</option>
                                     <option value="Delivered"{{$order_proceed->tracking_msg == 'Delivered' ? 'selected':''}}>Delivered</option>



                                 </select>
                                 <div class="input-group-append">
                                     <button type="submit" class="input-group-text bg-info text-white">Update</button>
                                 </div>
                             </div>
                          </form>
                       @endif
                     </div>
                 </div>
             </div>

             <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                      <h5>Order Cancelled</h5>
                      <hr>
                      @if ($order_proceed->order_status == '1')
                            Order - Completed
                         @elseif ($order_proceed->order_status == '2')
                         {{ $order_proceed->cancel_reason}}
                         @else
                         <form action="{{url('order/cancel-order/'. $order_proceed->id)}}"method="POST">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="input-group mb-3">
                                <select name="cancel_reason"class="custom-select"required id="inputGroupSelect02">
                                    <option value="">--Select--</option>
                                    <option value="Customer Not Available">Customer Not Available</option>
                                    <option value="Product Damage">Product Damage</option>
                                    <option value="No response">No response</option>
                                    <option value="Delayed">Delayed</option>

                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-info text-white">Cancel</button>
                                </div>
                            </div>
                         </form>
                      @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Complete Order</h5>
                        <hr>
                        @if ($order_proceed->order_status == '0')
                        <a href="javacsript:void(0)"data-toggle="modal"data-target="#CompleteOrderModal"class="btn btn-primary btn-sm">Proceed to fish this Order</a>
                        @elseif ($order_proceed->order_status == '1')
                        Order Completed
                        @elseif ($order_proceed->order_status == '2')
                          Order Cancelled.! So not allowed to complete this order
                          @else
                          Nothing
                        @endif
                    </div>
                </div>
            </div>

          </div>
</div>
@endsection
