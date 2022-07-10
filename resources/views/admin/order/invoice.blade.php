<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daraz</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Daraz</h1>
                </div>
                <div class="col-6">
                    <!-- <div class="company-details">
                        <p class="text-white">assdad asd  asda asdad a sd</p>
                        <p class="text-white">assdad asd asd</p>
                        <p class="text-white">+91 888555XXXX</p>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="">
                <div class="">
                    <h2 class="heading">Invoice No.: {{$order_view->id}}</h2>
                    <p class="sub-heading">Tracking No. {{$order_view->tracking_no}} </p>
                    <p class="sub-heading">Order Date: {{$order_view->created_at->format('d-m-y')}}  </p>
                    <p class="sub-heading">Email Address: {{$order_view->users->email}}  </p>
                </div>
                <div class="">
                    <p class="sub-heading">Full Name: {{$order_view->users->name.''.$order_view->users->lname}} </p>
                    <p class="sub-heading">Address: {{$order_view->users->addres1.''.$order_view->users->addres2}} </p>
                    <p class="sub-heading">Phone Number: {{$order_view->users->phone}} </p>
                    <p class="sub-heading">City,State,Pincode:
                        {{$order_view->users->city}},
                        {{$order_view->users->state}},
                        {{$order_view->users->pincode}}
                    </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total ='0'; @endphp
                    @foreach ($order_view->orderitems as $item )


                  <tr>
                    <td>{{$item->products->name}}</td>
                    <td>{{number_format($item->price,0)}}</td>

                    <td>{{$item->quantity}}</td>
                    {{-- <td>{{number_format($item->price,0)}}</td> --}}
                    <td>{{$item->price * $item->quantity}}</td>
                  </tr>
                       @php $total = $total + ($item->price * $item->quantity) @endphp
                  @endforeach
                    <tr>

                        <td colspan="3"class="text-right">Sub Total</td>
                    <td>{{number_format($total, 0)}}</td>
                    </tr>
                  <tr>


                        <td colspan="3"class="text-right">Tax Amount</td>
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
                       
                    <td colspan="3"class="text-right">Grand Total</td>
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
            <br>
            <h3 class="heading">Payment Status: {{$order_view->payment_mode}}</h3>
            <h3 class="heading">Payment Mode:

                 @if($order_view->payment_status=='0')
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

                     @endif


            </h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Daraz. All rights reserved.
                <a href="http://localhost:8000/" class="float-right">www.Daraz.com</a>
            </p>
        </div>
    </div>

</body>
</html>
