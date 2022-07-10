@extends('layouts.admin')
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
           <a href="{{url('genereate_invoice/'.$order_view->id)}}"class="btn btn-primary float-right py-2 btn-sm"> Genereate Invoice</a>
           {{-- <a href="{{url('add-category')}}"class="btn btn-primary float-right py-2 btn-sm"> Add Category</a> --}}

                        </div>
                </div>
          </div>

         <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">
             <h4>Order Detailes</h4>

               <div class="row">

                   <div class="col-md-4 mt-3">
                       <div class="border  border-secondary p-2">
                       <label class="text-muted"> tracking_no</label>
                        <h6>{{$order_view->tracking_no}}</h6>
                    </div>
               </div>

               <div class="col-md-8 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted"> tracking msg</label>
                 <h6>{{isset($order_view->tracking_msg) == true ? $order_view->tracking_msg :'Nothing Updated'}}</h6>
             </div>
             </div>

             <div class="col-md-4 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted"> Payment Mode</label>
                 <h6>{{isset($order_view->payment_mode) == true ? $order_view->payment_mode :'COD Payment - No Id'}}</h6>
             </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="border  border-secondary p-2">
            <label class="text-muted"> Payment Status</label>
             <h6> @if($order_view->payment_status=='0')
             COD Pendding
              @elseif($order_view->payment_status == '1')
              COD Paid
              @elseif($order_view->payment_status == '2')
              Razorpay Successful
              @elseif($order_view->payment_status == '3')
              Razorpay Failed
              @elseif($order_view->payment_status == '4')
              Stripe Successful
              @elseif($order_view->payment_status == '5')
              Stripe Failed
            </h6>
              @endif
         </div>
    </div>
    <div class="col-md-4 mt-3">
        <div class="border  border-secondary p-2">
        <label class="text-muted"> Payment Id</label>
        <h6>{{isset($order_view->payment_id) == true ? $order_view->payment_id :'COD Payment - No Id'}}</h6>

     </div>
</div>


                <div class="col-md-4 mt-3">
                       <div class="border  border-secondary p-2">
                           {{-- 0 = pendding
                           1 = complete
                           2 = Rejected/cancel --}}
                       <label class="text-muted"> Order Status</label>
                        <h6>
                            @if($order_view->order_status=='0')
                                 COD Pendding
                          @elseif($order_view->order_status == '1')
                               COD Paid
                           @elseif($order_view->order_status == '2')
                           Rejected/cancel
                           @endif
                        </h6>
                    </div>
               </div>

               <div class="col-md-8 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted"> Cancelled Reason</label>
                 <h6>{{isset($order_view->cancel_reason) == true ? $order_view->cancel_reason :'Not Cancel'}}</h6>
             </div>
             </div>
            </div>

            <hr>
            <h4>Order Items</h4>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>GrandTotal</th>
                  </tr>
                </thead>
                <tbody>
                    @php $total ='0'; @endphp
                    @foreach ($order_view->orderitems as $item )


                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->products->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->price,0)}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                  </tr>
                       @php $total = $total + ($item->price * $item->quantity) @endphp
                  @endforeach
                    <tr>
                    {{-- <td></td>
                    <td></td>
                    <td></td> --}}
                        <td colspan="4"class="text-right">Sub Total</td>
                    <td>{{number_format($total, 0)}}</td>
                    </tr>
                  <tr>

                    {{-- <td></td>
                    <td></td>
                    <td></td> --}}
                        <td colspan="4"class="text-right">Tax Amount</td>
                        {{-- Grand_total = total_amount * Tax / 100 --}}
                        <td>

                          @if(isset($item->tax_amt))
                          @php
                            $tax = $item->tax_amt;
                            $tax_total =  ($total * $tax)/ 100;


                          @endphp
                          {{number_format($tax_total, 0)}}
                          @else
                          0
                          @endif
                        </td>

                      </tr>
                      <tr>
                        {{-- <td></td>

                        <td></td>
                        <td></td> --}}
                    <td colspan="4"class="text-right">Grand Total</td>
                    <td>
                          @if (isset($item->tax_amt))

                          @php  $grandtotal = $tax_total + $total  @endphp

                            {{ number_format($grandtotal, 0)}}

                            @else
                            {{number_format($total, 0)}}
                          @endif

                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
        </div>
     </div>

       {{-- customer detail --}}

       <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
        <div class="card mb-5">
            <div class="card-body">
             <h4>Customer Detailes</h4>

               <div class="row">

                   <div class="col-md-4 mt-3">
                       <div class="border  border-secondary p-2">
                       <label class="text-muted"> First Name</label>
                        <h6>{{$order_view->users->name}}</h6>
                    </div>
               </div>

               <div class="col-md-4 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted"> Last Name</label>
                 <h6>{{$order_view->users->lname}}</h6>
             </div>
             </div>

             <div class="col-md-4 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted">Email id</label>
                 <h6>{{$order_view->users->email}}</h6>
             </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="border  border-secondary p-2">
            <label class="text-muted"> Address 1</label>
             <h6>{{$order_view->users->addres1}}</h6>
         </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="border  border-secondary p-2">
        <label class="text-muted"> Address 2</label>
         <h6>{{$order_view->users->addres2}}</h6>
     </div>
</div>


                <div class="col-md-4 mt-3">
                       <div class="border  border-secondary p-2">
                       <label class="text-muted"> City</label>
                        <h6>{{$order_view->users->city}}</h6>
                    </div>
               </div>

               <div class="col-md-4 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted"> State</label>
                 <h6>{{$order_view->users->state}}</h6>
             </div>
             </div>

             <div class="col-md-4 mt-3">
                <div class="border  border-secondary p-2">
                <label class="text-muted"> Pincode</label>
                 <h6>{{$order_view->users->pincode}}</h6>
             </div>
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
