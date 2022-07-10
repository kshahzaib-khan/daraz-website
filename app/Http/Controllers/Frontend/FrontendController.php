<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Products;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
     public function index(){

      $products_NewArrivals = Products::where('status','0')->where('new_arrival_products','1')
         ->orderBy('created_at','desc')->take(15)->get();

         $products_Feature = Products::where('status','0')->where('feature_products','1')
         ->orderBy('created_at','desc')->take(15)->get();


         $products_Popular = Products::where('status','0')->where('popular_products','1')
         ->orderBy('created_at','desc')->take(15)->get();


            $slider = Slider::where('status','0')->get();
         return view('frontend.index',compact('products_NewArrivals','products_Feature','products_Popular','slider'));
     }



         public function new_arrival(){
            $products = Products::where('status','0')->where('new_arrival_products','1')
            ->orderBy('created_at','desc')->paginate(8);
            return view('frontend.newarrival.arrivalpage',compact('products'));
         }

         public function new_feature(){
            $new_feature = Products::where('status','0')->where('feature_products','1')
            ->orderBy('created_at','desc')->paginate(8);
            return view('frontend.newfeature.featurepage',compact('new_feature'));
         }

         public function new_popular(){
            $new_popular = Products::where('status','0')->where('popular_products','1')
            ->orderBy('created_at','desc')->paginate(8);
            return view('frontend.newpopular.popularpage',compact('new_popular'));
         }
}
