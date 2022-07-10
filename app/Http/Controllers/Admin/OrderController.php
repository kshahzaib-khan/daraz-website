<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
// use Illuminate\Support\Facades\PDF;
class OrderController extends Controller
{
     public function index(){
        $order = Order::get()->all();
         return view('admin.order.index',compact('order'));
     }

     public function order_view($order_id){
         if(Order::where('id',$order_id)->exists()){
             $order_view = Order::find($order_id);
              return view('admin.order.view',compact('order_view'));
         }else{
             return redirect()->back()->with('status','No Order Found');
         }
     }

     public function invoice($order_id){
        if(Order::where('id',$order_id)->exists()){
            $order_view = Order::find($order_id);
            //  return view('admin.order.invoice',compact('order_view'));
            $data = [
                'order_view' => $order_view,
            ];
            $pdf = PDF::loadView('admin.order.invoice', $data);

            return $pdf->download('Ecommerce.pdf');
        }else{
            return redirect()->back()->with('status','No Order Found');
        }

     }

        public function order_proceed($order_id){
            if(Order::where('id',$order_id)->exists()){
                $order_proceed = Order::find($order_id);
                return view('admin.order.proceed',compact('order_proceed'));
            }else{
                return redirect()->back()->with('status','No Order Found');

            }
        }


        public function tracking_status(Request $request ,$order_id){
            $tracking_status = Order::find($order_id);

             if($tracking_status->order_status != '2'){
                $tracking_status->tracking_msg = $request->tracking_msg;
                $tracking_status->update();
                 return redirect()->back()->with('status','Tracking Status Update');
             }else{
                return redirect()->back()->with('status','Order is Cancelled');

             }
        }

        public function cancel_order(Request $request ,$order_id){
            $cancel_order = Order::find($order_id);

             if($cancel_order->tracking_msg != NULL){
                $cancel_order->cancel_reason = $request->cancel_reason;
                $cancel_order->tracking_msg = 'Cancelled when'.$cancel_order->tracking_msg;
                $cancel_order->order_status = '2';
                $cancel_order->update();
                 return redirect()->back()->with('status','Order Cancelled');
             }else{
                return redirect()->back()->with('status','update your tracking Status');

             }
        }

          public function complete_order(Request $request,$order_id){
            $complete_order = Order::find($order_id);
            if($complete_order->tracking_msg !=NULL){
                if($complete_order->order_status !='2') //2=order cancelled
                {
                    $complete_order->tracking_msg = "Completed when".$complete_order->tracking_msg;
                    if($complete_order->payment_status == '0'){
                        $complete_order->payment_status = $request->cash_received == TRUE ? '1':'0';
                    }
                    $complete_order->order_status = '1'; //1=order  completed
                    $complete_order->update();
                    return redirect()->back()->with('status','Order Completed');

                }else{
                    return redirect()->back()->with('status','update your tracking Status');

                }
            }else{
                return redirect()->back()->with('status','update your tracking Status');

            }
          }

}
