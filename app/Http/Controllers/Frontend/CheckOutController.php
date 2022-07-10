<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Products;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Coupon;
use Carbon\Carbon;
// use Illuminate\Mail\PlaceorderMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\placeorderMailable;
class CheckOutController extends Controller
{
    public function index(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true );
        return view('frontend.checkout.checkoutpage',compact('cart_data'));
    }

       private function update_user($user_id ,$request){
        $user = User::find($user_id);

        $user->name = $request->first_name;
        $user->lname = $request->last_name;
        $user->phone = $request->phone_no;
        $user->alternate_phone = $request->alternate_no;
        $user->addres1 = $request->address_1;
        $user->addres2 = $request->address_2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->pincode = $request->pincode;
        return $user->save();
       }

          private function insert_orderitem($last_order_id){
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true );

            $item_in_cart =$cart_data;

              foreach($item_in_cart as $itemdata){
                  $products = Products::find($itemdata['item_id']);
                    $price_value = $products->offer_price;
                    $tax_amt = $products->tax_amt;

                   Orderitem::create([
                      'order_id'=>$last_order_id,
                      'product_id'=>$itemdata['item_id'],
                      'price'=>$price_value,
                      'tax_amt'=>$tax_amt,
                      'quantity'=>$itemdata['item_quantity'],

                       ]);

              }
          }

          public function placeorderMailable(Request $request,$trackingo)
          {
            $order_data = [
                  'first_name' => $request->input('first_name'),
                  'last_name' => $request->input('last_name'),
                  'phone_no' => $request->input('phone_no'),
                  'alternate_phone' => $request->input('alternate_no'),
                  '	addres1' => $request->input('addres_1'),
                  '	addres2' => $request->input('addres_2'),
                  'city' => $request->input('city'),
                  'status' => $request->input('status'),
                  'pincode' => $request->input('pincode'),
                  'email' => $request->input('email'),
                  'tracking_no' => $trackingo,

              ];
              $cookie_data = stripslashes(Cookie::get('shopping_cart'));
              $item_in_cart = json_decode($cookie_data, true );
            //   $to_customer_email =Auth::user()->email;
            $to_customer_email =$request->input('email');
              Mail::to($to_customer_email)->send(new PlaceorderMailable($order_data,$item_in_cart));
              return redirect()->back()->with('status','Thank you for contact us. We will get back to asap.!');
          }
    public function store_order(Request $request){

          if(isset($_POST['place_order_btn'])){

            // User Data Update
            $user_id = Auth::id();

            $this->update_user($user_id, $request);

            // Place Order
            // payment status =

            // 0 = Pending
            // 1 = cash Accepted
            // 2 = Canceled
            // 3 = continue for online

             $trackno = rand(1111,9999);
             $order = new Order;
             $order->user_id = $user_id;
             $order->tracking_no = 'ecommerce'.$trackno;
             $order->payment_mode = 'Cash on Delivery';
             $order->payment_status = '0';
             $order->order_status = '0';
             $order->notify = '0';
             $order->save();

             $last_order_id = $order->id;


            // Ordered Cart items
            $this->insert_orderitem($last_order_id);

            // Send Mail
            $this->placeorderMailable($request,$order->tracking_no);

                Cookie::queue(Cookie::forget('shopping_cart'));
                return redirect('/thank_you')->with('status','Order has been place Successfully');
          }

          if(isset($_POST['place_order_razorpay'])){
            $user_id = Auth::id();

            $this->update_user($user_id, $request);


            // payment status =

            // 0 = Nothing Paid
            // 1 = Cash Paid
            // 2 = Razorpay Payment successfull
            // 3 = Razorpay Payment failed
            // 4 = Pay Stripe

             $trackno = rand(1111,9999);
             $order = new Order;
             $order->user_id = $user_id;
             $order->tracking_no = 'ecommerce'.$trackno;
             $order->payment_mode = 'Payment by Razorpay';
             $order->payment_id = $request ->input('razorpay_payment_id');
             $order->payment_status = '2';
             $order->order_status = '0';
             $order->notify = '0';
             $order->save();

             $last_order_id = $order->id;
              $this->insert_orderitem($last_order_id);
              $this->placeorderMailable($request,$order->tracking_no);

          }

          if(isset($_POST['stipe_payment_btn'])){


            $user_id = Auth::id();

            $this->update_user($user_id, $request);

            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true );

            $item_in_cart =$cart_data;

            $item_in_cart =$cart_data;
            $total = '0';

             foreach($item_in_cart as $itemdata){
              $products = Products::find($itemdata['item_id']);
              $price_value = $products->offer_price;
              $total = $total + ($itemdata['item_quantity']* $price_value);
             }

            $stripetoken = $request->input('stripeToken');
            $STRIPE_SECRET = "pk_test_TYooMQauvdEDq54NiTphI7jx";
            Stripe::setApiKey($STRIPE_SECRET);

            \Stripe\Charge::create([
                'amount' => $total * 100,
                'currency' => 'usd',
                'description' => "Thank you for purchasing with Daraz",
                'source' => $stripetoken,
                'shipping' => [
                    'name' => Auth::user()->name,
                    'phone' => Auth::user()->phone_no,
                    'address' => [
                        'line1' => Auth::user()->addres1,
                        'line2' => Auth::user()->addres2,
                        'postal_code' => Auth::user()->pincode,
                        'city' => Auth::user()->city,
                        'state' => Auth::user()->state,
                        'country' => 'US',
                    ],
                ],
            ]);
            // payment status =

            // 0 = Nothing Paid
            // 1 = Cash Paid
            // 2 = Razorpay Payment successfull
            // 3 = Razorpay Payment failed
            // 4 = Pay Stripe

             $trackno = rand(1111,9999);
             $order = new Order;
             $order->user_id = $user_id;
             $order->tracking_no = 'ecommerce'.$trackno;
             $order->payment_mode = 'Payment by Stripe';
             $order->payment_id = $stripetoken;
             $order->payment_status = '2';
             $order->order_status = '0';
             $order->notify = '0';
             $order->save();

             $last_order_id = $order->id;
              $this->insert_orderitem($last_order_id);
              $this->placeorderMailable($request,$order->tracking_no);

              return redirect('/thank_you')->with('status','Order has been placed Successfully');

          }


    }

         //   Razorpy_payment integrate
     public function check_amount(Request $request){
          if(Cookie::get('shopping_cart')){

            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true );

            $item_in_cart =$cart_data;
            $total = '0';

             foreach($item_in_cart as $itemdata){
              $products = Products::find($itemdata['item_id']);
              $price_value = $products->offer_price;
              $total = $total + ($itemdata['item_quantity']* $price_value);
             }

             return response()->json([
               'name'=>$request->first_name,
               'lname'=>$request->last_name,
               'phone_no'=>$request->phone_no,
               'alternate_phone'=>$request->alternate_phone,
               'addres1'=>$request->addres_1,
               'addres2'=>$request->addres_2,
               'city'=>$request->city,
               'state'=>$request->state,
               'pincode'=>$request->pincode,
               'email'=>Auth::user()->email,
               'total_price'=>$total

             ]);
          }
            else{
                 return response()->json([
                   'status_code'=>'no_data_in_cart',
                   'status'=>'Your cart is empty',
                 ]);
            }
     }





     public function check_coupon_code(Request $request){

        $coupon_code = $request->input('coupon_code');
        if(Coupon::where('coupon_code', $coupon_code)->exists())
        {

            $coupon = Coupon::where('coupon_code', $coupon_code)->first();
            if(!$coupon->start_datetime <= Carbon::today()->format('Y-m-d') && Carbon::today()->format('Y-m-d') <= $coupon->end_datetime)
            {

              $totalprice = '0';
              $cookie_data = stripslashes(Cookie::get('shopping_cart'));
              $cart_data = json_decode($cookie_data, true);

               foreach($cart_data as $itemdata){
                   $products = Products::find($itemdata['item_id']);
                   $product_price =$products->offer_price;
                   $totalprice =$totalprice + ($itemdata['item_quantity'] * $product_price);

               }
                //    Coupon Type (checking percentage Or Amount)
                 if($coupon->coupon_type == '1') //1=percentage
                 {
                  $discount_price = ($totalprice / 100) * $coupon->coupon_price;
                 }
                  elseif($coupon->coupon_type == '2')//2=Amount
                  {
                      $discount_price = $coupon->coupon_price;
                  }

                  $grand_total = $totalprice - $discount_price;
                  return response()->json(['discount_price'=>$discount_price,
                          'grand_total_price'=> $grand_total]);

            }
            else{
                return response()->json(['status'=>'coupon Code has been Expired',
                'error_status'=>'error']);
            }
          }
        else{
            return response()->json(['status'=>'coupon Code does not exists',
            'error_status'=>'error']);
        }
     }









}
