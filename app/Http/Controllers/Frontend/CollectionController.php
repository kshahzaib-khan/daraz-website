<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Groups;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\getBaseUrl;

// use Illuminate\Http\getBaseUrl;

use Illuminate\Http\Request;
use Stripe\Product;

class CollectionController extends Controller
{
    public function index(){
     $group = Groups::where('status','!=','0')->get();

     return view('frontend.collections.grouppage',compact('group'));
    }


        // gorup =
        // electronics product
        // fashion product
        // man product

    public function group_view($group_url){
          $group_view = Groups::where('url',$group_url)->first();
          $group_id = $group_view->id;

          $category = Categories::where('group_id',$group_id)->where('status','!=','2')
             ->where('status','0')->get();
        return view('frontend.collections.category',compact('group_view','category'));
    }

        // is se searching check krna hai

        //  subcategory =

        //  brand name nokia,samsung,vivo
        //    start this code subcategory page
    public function category_view($group_url, $cate_url){
       $category = Categories::where('url',$cate_url)->first();
       $category_id = $category->id;

        $subcategory = Subcategory::where('category_id',$category_id)
        ->where('status','!=','2')->where('status','0')->get();

        return view('frontend.collections.subcategory',compact('category','subcategory'));
    }


            // start this code related brand product view page

    public function subcategory_view( Request $request, $group_url, $cate_url,$subcate_url){
            $subcategory = Subcategory::where('url',$subcate_url)->first();

            $subcategory_id = $subcategory->id;

            $category_id = $subcategory->category_id;
            $subcategorylist = Subcategory::where('category_id',$category_id)->get();



             //   start This code product sorting

             if($request->get('sort') == 'price_asc'){

                $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('offer_price','asc')->where('status','!=','2')->where('status','0')->get();

            }elseif($request->get('sort') == 'price_desc'){

                $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('offer_price','desc')->where('status','!=','2')->where('status','0')->get();

            }elseif($request->get('sort') == 'newest'){

                $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('created_at','desc')->where('status','!=','2')->where('status','0')->get();

            }elseif($request->get('sort') == 'popularity'){

                $products = Products::where('sub_category_id', $subcategory_id)
                ->where('popular_products','1')->where('status','!=','2')->where('status','0')->get();

            }elseif($request->get('filterbrand')){

                    // start Brand product  checkbox filter
                $checked =$_GET['filterbrand'];
                $subcategory_filter = Subcategory::whereIn('name',$checked)->paginate(3);
                $subcateid =[];
                foreach($subcategory_filter as $scid_list){
                   array_push($subcateid, $scid_list->id);
                }
                $products = Products::whereIn('sub_category_id',$subcateid)
                ->where('status','0')->get();
                // end Brand product  checkbox filter

                // start  price slider filter
            }elseif($request->get('start_price')!=null && $request->get('end_price')!=null){

                $start_price = $request->get('start_price');
                $end_price = $request->get('end_price');

                $products = Products::where('offer_price','>=',$start_price)->where('offer_price','<=',$end_price)->get();
                    // end  price slider filter

                    

            } else{
                $products = Products::where('sub_category_id',$subcategory_id)
                ->where('status','!=','2')->where('status','0')->get();
            }


            //   end This code product sorting

            // $products = Products::where('sub_category_id',$subcategory_id)
            // ->where('status','!=','2')->where('status','0')->get();

            return view('frontend.collections.products',compact('products','subcategory','subcategorylist'));
            }
             // end this code related brand product view page



            public function product_detail_view($group_url, $cate_url, $subcate_url, $product_url){
                $products = Products::where('url', $product_url)->first();

                $category = Categories::where('url',$cate_url)->first();
                $product_detail_view = Products::where('url', $product_url)->where('status','!=','2')
                ->where('status','0')->first();

                $ratings = Rating::where('prod_id', $product_detail_view->id)->get();
                $rating_sum = Rating::where('prod_id', $product_detail_view->id)->sum('star_rated');
                $user_rating = Rating::where('prod_id',$product_detail_view->id)->where('user_id',Auth::id())->first();
                $review = Review::where('prod_id',$products->id)->get();
                if($ratings->count() > 0){
                    $rating_value =$rating_sum/$ratings->count();

                }else{
                    $rating_value = 0;
                }

                return view('frontend.collections.product_detail_view',compact('product_detail_view','category','ratings','rating_value','user_rating','review','products'));

            }


         public function SearchautoComplete(Request $request){
               $query = $request->get('term','');
               $products = Products::where('name','LIKE','%'.$query.'%')->where('status', '0')->get();

               $data = [];
               foreach($products as $item){
                   $data[] = [
                       'value'=>$item->name,
                       'id'=>$item->id
                   ];
               }
               if(count($data)){
               return $data;
                }else{
                     return['value'=>'No Result Found check your name','id'=>''];
                }
            }

            public function search_result(Request $request){

                  $searchingdata = $request->search_product;
                    $products = Products::where('name','LIKE','%'.$searchingdata.'%')->where('status','0')->first();



                 if($products)
                 {

                     if(isset($_POST['searchbtn'])){



                            // brand name wise search

                        return redirect('collections/'.$products->subcategory->category->group->url.'/'.
                        $products->subcategory->category->url.'/'.$products->subcategory->url);


                     }else{
                        //  product name wise search
                        return redirect('collections/'.$products->subcategory->category->group->url.'/'.
                          $products->subcategory->category->url.'/'.$products->subcategory->url.'/'.$products->url);


                     }
                 }else{
                     return redirect('/')->with('status','Product Not Available');
                 }
                }



}
