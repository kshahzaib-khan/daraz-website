<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Categories;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class SubCategoryController extends Controller
{
     public Function index(){
         $subcategory = Subcategory::where('status','!=','3')->get();
         return view('admin.collection.subcategory.index',compact('subcategory'));
     }

      public function subcategory_create_view(){

        $categories = Categories::where('status','!=','3')->get();
        return view('admin.collection.subcategory.create',compact('categories'));

      }

       public function store_subcategory(Request $request){
        $store_subcategory = new Subcategory();
        $store_subcategory->category_id = $request->category_id;
        $store_subcategory->url = $request->url;
        $store_subcategory->name = $request->name;
        $store_subcategory->Description = $request->Description;
        $store_subcategory->priority = $request->priority;
        $store_subcategory->status = $request->status == true ? '1': '0' ;


        if($request->hasFile('subcategory_image')){
            $image_file = $request->file('subcategory_image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time().'.'.$image_extension;
            $image_file->move('upload/subcategoryimage/',$image_filename);
            $store_subcategory->image =  $image_filename;

        }

                $store_subcategory->save();
                return redirect()->back()->with('status','SubCategory Added Successfully');
       }


       public function edit_subcategory(Request $request,$id){
        $edit_categories = Categories::where('status','!=','3')->get();
        $edit_subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit',compact('edit_categories','edit_subcategory'));

       }

          public function update_subcategory(Request $request ,$id){
             $update_subcategory = Subcategory::find($id);
             $update_subcategory->name = $request->name;
             $update_subcategory->url = $request->url;
             $update_subcategory->category_id = $request->category_id;
             $update_subcategory->Description = $request->Description;
             $update_subcategory->priority = $request->priority;
             $update_subcategory->status = $request->status == true ? '1' : '0';

             if($request->hasFile('subcategory_image')){

                $destination_img = 'upload/subcategoryimage/'.$update_subcategory->image;
                   if(File::exists($destination_img)){
                      File::delete($destination_img);
                   }

                $image_file = $request->file('subcategory_image');
                $image_extension = $image_file->getClientOriginalExtension();
                $image_filename = time().'.'.$image_extension;
                $image_file->move('upload/subcategoryimage/',$image_filename);
                $update_subcategory->image  =  $image_filename;

            }

                 $update_subcategory->save();
                 return redirect()->back()->with('status','SubCategory Updated Successfully');
          }


          public function delete_subcategory(Request $request, $id){
            $delete_subcategory = Subcategory::find($id);
            $delete_subcategory->status = $request->status ='3';
            $delete_subcategory->update();
            return redirect()->back()->with('status','SubCategory Deleted Successfully');
          }


          public function delete_subcategory_record_restore_page(){
            $delete_subcategory_record = Subcategory::where('status','3')->get();
            return view('admin.collection.subcategory.delete_record',compact('delete_subcategory_record'));
          }
       
       
          public function  delete_restore(Request $request, $id){
            $delete_restore = Subcategory::find($id);
              $delete_restore->status = '0';//show = 0 / Hide = 1 / delete = 2
              $delete_restore->update();
              return redirect('sub-category')->with('status','SubCategory Record is Restore');
       }


       public function permently_delete(Request $request, $id){
        $permently_delete =  Categories::find($id);
        $permently_delete->delete();
        return redirect('sub-category')->with('status','SubCategory Record is  Permently Delete');

     }













}
