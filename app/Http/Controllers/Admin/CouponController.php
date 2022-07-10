<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Coupon;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CouponController extends Controller
{
       public function index(){
           $coupon = Coupon::all();
           $product = Products::where('status','0')->get();
          return view("admin.coupon.index", compact('product','coupon'));
       }


       public function coupon_store(Request $request){
        $coupon_store = new Coupon();

        $coupon_store->offer_name = $request->offer_name;
        $coupon_store->product_id = $request->product_id;
        $coupon_store->coupon_code = $request->coupon_code;
        $coupon_store->coupon_limit = $request->coupon_limit;
        $coupon_store->coupon_type = $request->coupon_type;
        $coupon_store->	coupon_price = $request->coupon_price;
        $coupon_store->	start_datetime = $request->start_datetime;
        $coupon_store->	end_datetime = $request->end_datetime;
        $coupon_store->	status = $request->status == true ? '1':'0';
        $coupon_store->	visibility_status = $request->visibility_status == true ? '1':'0';
        $coupon_store->save();

        return redirect()->back()->with('status','Coupon Code added Successfuly');
       }


       public function edit($id){

           $coupon = Coupon::find($id);
            $product = Products::where('status','0')->get();
           return view('admin.coupon.edit',compact('coupon','product'));
       }

       public function coupon_update(Request $request,$id){

           $coupon_update = Coupon::find($id);
           $coupon_update->offer_name = $request->offer_name;
           $coupon_update->product_id = $request->product_id;
           $coupon_update->coupon_code = $request->coupon_code;
           $coupon_update->coupon_limit = $request->coupon_limit;
           $coupon_update->coupon_type = $request->coupon_type;
           $coupon_update->coupon_price = $request->coupon_price;
           $coupon_update->start_datetime = $request->start_datetime;
           $coupon_update->end_datetime = $request->end_datetime;
           $coupon_update->	status = $request->status == true ? '1':'0';
           $coupon_update->	visibility_status = $request->visibility_status == true ? '1':'0';
           $coupon_update->update();
           return redirect('admin-coupon-view')->with('status','Coupon Code Updated Successfuly');

       }



}
