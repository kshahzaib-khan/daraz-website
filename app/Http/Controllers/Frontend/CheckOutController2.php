<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Products;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class CheckOutController extends Controller
{
    public function index(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true );
        return view('frontend.checkout.index',compact('cart_data'));
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
              $this->insert_orderitem($last_order_id);

            // Ordered Cart items


                Cookie::queue(Cookie::forget('shopping_cart'));
                return redirect('/thank_you')->with('status','Order has been place Successfully');
          }
    }

         //   Razerpy_payment integrate
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















}
