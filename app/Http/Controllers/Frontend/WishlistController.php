<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        $products = new Products();
        return view('frontend.wishlist.wishlistpage',compact('wishlist','products'));
    }

    public function add_wishlist(Request $request){
          $product_id = $request->product_id;
          if(Wishlist::where('user_id',Auth::id())->where('product_id', $product_id)->exists() ){
              //already add
              return response()->json(['status'=>'Product is already Added to Wishlist']);
          }else{
                $wishlist = new  Wishlist();
                $wishlist->user_id = Auth::id();
                $wishlist->product_id = $product_id;
                $wishlist->save();
                return response()->json(['status'=>'Product is Added to Wishlist']);

          }
    }

         public function remove_wishlist_item(Request $request){

            $wishlist_id = $request->wishlist_id;

            if(Wishlist::where('user_id',Auth::id())->where('id',$wishlist_id)->exists()){

                $wishlist = Wishlist::where('user_id',Auth::id())->where('id',$wishlist_id)->first();
                $wishlist->delete();
                return response()->json(['status'=>'Item Removed from Wishlist']);
            }else{
                return response()->json(['status'=>'No Item Found in  Wishlist']);

            }

         }
            public function load_wishlist_data_by_ajax(){
            
                      
                    $wishlist = Wishlist::where('user_id',Auth::id())->get();
            
                         $totalwishlist = count($wishlist);
            
                         echo json_encode(array('totalwishlist' =>  $totalwishlist)); die;
                         return;
                        
                   }



          public function slidertext(){

            return view('frontend.wishlist.slidertext');
          }

}
