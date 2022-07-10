<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
     public function Review_Form ($product_slug){

        $product = Products::where('url',$product_slug)->where('status','0')->first();

        if($product){

            $product_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('prod_id', $product_id)->first();

              if($review){
                return view('frontend.reviews.edit',compact('review'));

              }else{
                $verified_purchase = Order::where('orders.user_id',Auth::id())
                ->join('order_items','orders.id','order_items.order_id')->where('order_items.product_id',$product_id)->get();

                     return view('frontend.reviews.reviewpage',compact('verified_purchase','product'));
              }

        }else{


            return redirect()->back()->with('status','The link you followed was broken');

        }

     }



         public function Create(Request $request){
             $product_id = $request->input('product_id');
            $product = Products::where('id',$product_id)->where('status','0')->first();

            if($product){
                $user_review = $request->user_reveiw;

                $new_review = Review::create([
                      'user_id'=>Auth::id(),
                      'prod_id'=>$product_id,
                      'user_review'=> $user_review
                ]);

                //    $category_slug = $product->subcategory->url;

                //  $prod_slug = $product->url;

                 if($new_review){

                    // group_url = electronics
                    // cate_url = mobile
                    // subcate_url = samsung-brand
                    // product_url = samsung-galaxy-f22

                    // collections/electronics/mobile/samsung-brand/samsung-galaxy-f22
                    // $group_url, $cate_url, $subcate_url, $product_url

                     return redirect('collections/'.$product->subcategory->category->group->url.'/'.$product->subcategory->category->url.'/'.$product->subcategory->url.'/'.$product->url)->with('status','Thank you for writing a review');
                 }


            }else{
                return redirect()->back()->with('status','The link you followed was broken');

            }

         }



            public function edit_review($product_slug){

                $product = Products::where('url',$product_slug)->where('status','0')->first();

                if($product){

                    $product_id = $product->id;

                    $review = Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
                    if($review){

                        return view('frontend.reviews.edit',compact('review','product'));
                    }else{
                return redirect()->back()->with('status','The link you followed was broken');

            }


                }else{
                    return redirect()->back()->with('status','The link you followed was broken');

                }
            }





            public function update_review(Request $request){

                $user_review = $request->input('user_review');

                if($user_review != ''){
                    $review_id = $request->input('review_id');
                     $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();

                     $product_id = $request->input('product_id');
                     $product = Products::where('id',$product_id)->where('status','0')->first();


                    if($review){

                    $review->user_review = $request->input('user_review');
                    $review->update();
                    // dd($review);
                    return redirect('collections/'.$product->subcategory->category->group->url.'/'.$product->subcategory->category->url.'/'.$product->subcategory->url.'/'.$product->url)->with('status','Thank you for writing a review');


                    }else{
                        return redirect()->back()->with('status','The link you followed was broken');
                     }

                }else{
                    return redirect()->back()->with('status','You cannot submit emty review');

                }
            }







}
