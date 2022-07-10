<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subcategory;
use App\Models\Products;
use Illuminate\Support\Facades\File;
use App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $product = Products::where('status','!=','3')->get();
        return view('admin.collection.product.index',compact('product'));

    }

     public function product_create_view(){
         $subcategory = Subcategory::where('status','=!','3')->get();
          return view('admin.collection.product.create',compact('subcategory'));
     }

         public function product_create(Request $request){
            $product_create = new Products();
            $product_create->sub_category_id = $request->sub_category_id;
            $product_create->name = $request->name;
            $product_create->url = $request->url;
            $product_create->small_description = $request->small_description;
            $product_create->sale_tag = $request->sale_tag;
            $product_create->original_price = $request->original_price;
            $product_create->offer_price = $request->offer_price;
            $product_create->quantity = $request->quantity;
            $product_create->priority = $request->priority;

                 if($request->hasfile('product_img')){
                    $img_file = $request->file('product_img');
                    $img_extension = $img_file->getClientOriginalExtension();
                    $filename = time().'.'.$img_extension;
                    $img_file-> move('upload/product/',$filename);
                     $product_create->image = $filename;



                 }

            $product_create->p_highlight_heading = $request->p_highlight_heading;
            $product_create->p_highlights = $request->p_highlights;
            $product_create->p_description_heading = $request->p_description_heading;
            $product_create->p_description = $request->p_description;
            $product_create->p_details_heading = $request->p_details_heading;
            $product_create->p_details = $request->p_details;


            $product_create->meta_title = $request->meta_title;
            $product_create->meta_description = $request->meta_description;
            $product_create->meta_keyword = $request->meta_keyword;

            $product_create->new_arrival_products = $request->new_arrival_products == true ? '1' : '0';
            $product_create->feature_products = $request->feature_products == true ? '1' : '0';
            $product_create->popular_products = $request->popular_products == true ? '1' : '0';
            $product_create->offers_products = $request->offers_products == true ? '1' : '0';
            $product_create->status = $request->status == true ? '1' : '0';

            $product_create->save();

            return redirect()->back()->with('status','Product Succesfully added');

         }


         public function product_edit_view(Request $request, $id){
            $subcategory = Subcategory::where('status','=!','3')->get();
            $product_edit_view = Products::find($id);
                 return view('admin.collection.product.edit',compact('product_edit_view','subcategory'));

                }

                public function product_update(Request $request,$id){
                    $product_update = Products::find($id);
                    $product_update->sub_category_id = $request->sub_category_id;
                    $product_update->name = $request->name;
                    $product_update->url = $request->url;
                    $product_update->small_description = $request->small_description;
                    $product_update->sale_tag = $request->sale_tag;
                    $product_update->original_price = $request->original_price;
                    $product_update->offer_price = $request->offer_price;
                    $product_update->quantity = $request->quantity;
                    $product_update->priority = $request->priority;

                         if($request->hasfile('product_img')){
                            $destination_img = 'upload/product/'.$product_update->image;
                            if(File::exists($destination_img)){
                               File::delete($destination_img);
                            }

                            $img_file = $request->file('product_img');
                            $img_extension = $img_file->getClientOriginalExtension();
                            $filename = time().'.'.$img_extension;
                            $img_file-> move('upload/product/',$filename);
                            $product_update->image = $filename;

                         }

                    $product_update->p_highlight_heading = $request->p_highlight_heading;
                    $product_update->p_highlights = $request->p_highlights;
                    $product_update->p_description_heading = $request->p_description_heading;
                    $product_update->p_description = $request->p_description;
                    $product_update->p_details_heading = $request->p_details_heading;
                    $product_update->p_details = $request->p_details;


                    $product_update->meta_title = $request->meta_title;
                    $product_update->meta_description = $request->meta_description;
                    $product_update->meta_keyword = $request->meta_keyword;

                    $product_update->new_arrival_products = $request->new_arrival_products == true ? '1' : '0';
                    $product_update->feature_products = $request->feature_products == true ? '1' : '0';
                    $product_update->popular_products = $request->popular_products == true ? '1' : '0';
                    $product_update->offers_products = $request->offers_products == true ? '1' : '0';
                    $product_update->status = $request->status == true ? '1' : '0';

                    $product_update->save();

                    return redirect()->back()->with('status','Product Succesfully updated');

                 }



                 public function delete_product(Request $request, $id){
                  $delete_Product = Products::find($id);
                  $delete_Product->status = $request->status ='3';
                  $delete_Product->update();
                  return redirect()->back()->with('status','Product Deleted Successfully');
                }
      
      
                public function delete_product_record_restore_page(){
                  $delete_product_record = Products::where('status','3')->get();
                  return view('admin.collection.product.delete_record',compact('delete_product_record'));
                }
             
             
                public function  delete_restore(Request $request, $id){
                  $delete_restore = Products::find($id);
                    $delete_restore->status = '0';//show = 0 / Hide = 1 / delete = 2
                    $delete_restore->update();
                    return redirect('product')->with('status','product Record is Restore');
             }
      



             public function permently_delete(Request $request, $id){
               $permently_delete =  Categories::find($id);
               $permently_delete->delete();
               return redirect('sub-category')->with('status','SubCategory Record is  Permently Delete');
       
            }

}
