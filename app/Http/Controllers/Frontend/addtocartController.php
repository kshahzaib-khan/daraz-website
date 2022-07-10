<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Cookie;
class addtocartController extends Controller
{

        //  start this  code add to cart product detail fetch
     public function index(){

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
     
        $cart_data = json_decode($cookie_data, true );
        return view ('frontend.collections.cart.cartpage',compact('cart_data'));

     }
        //  end this  code add to cart product detail fetch


     public function add_to_cart(Request $request){

        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                }
            }
        }
        else
        {
            $products = Products::find($prod_id);
            $prod_name = $products->name;
            $prod_image = $products->image;
            $priceval = $products->offer_price;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
     }



        public function load_cart_data_by_ajax(){

             if(Cookie::get('shopping_cart')){

             $cookie_data = stripslashes(Cookie::get('shopping_cart'));
             $cart_data = json_decode($cookie_data, true);
              $totalcart = count($cart_data);

              echo json_encode(array('totalcart' => $totalcart)); die;
              return;
             }

              else{
                  $totalcart = "0";
                  echo json_encode(array('totalcart' => $totalcart)); die;
                  return;
              }
        }




        public function update_to_cart(Request $request)
        {
            $prod_id = $request->input('product_id');
            $quantity = $request->input('quantity');

            if(Cookie::get('shopping_cart'))
            {
                $cookie_data = stripslashes(Cookie::get('shopping_cart'));
                $cart_data = json_decode($cookie_data, true);

                $item_id_list = array_column($cart_data, 'item_id');
                $prod_id_is_there = $prod_id;

                if(in_array($prod_id_is_there, $item_id_list))
                {
                    foreach($cart_data as $keys => $values)
                    {
                        if($cart_data[$keys]["item_id"] == $prod_id)
                        {
                            $cart_data[$keys]["item_quantity"] = $quantity;
                            $ttprice = ($cart_data[$keys]["item_price"]  * $quantity);

                            $grandtotalprice = number_format($ttprice);
                            $item_data = json_encode($cart_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                            return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated','gtprice'=>''.$grandtotalprice.'']);
                        }
                    }
                }
            }
        }





    public function delete_from_cart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }




    //    start add to cart clear data
      public function clear_cart(){
          cookie::queue(Cookie::forget('shopping_cart'));
          return response()->json(['status'=>'Your Cart is Cleard']);
      }
    //    end add to cart clear data




    public function thank_you(){

        return view('frontend.thank-you');
    }








}
