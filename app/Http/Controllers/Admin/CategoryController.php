<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Groups;
use  App\Models\Categories;
// use PHPUnit\TextUI\XmlConfiguration\Group;

class CategoryController extends Controller
{
   public function index(){
       $fetch_category = Categories::where('status','!=','3')->get();

       return view('admin.collection.category.index',compact('fetch_category'));
   }

   public function category_create_view(){
       $create = Groups::where('status','!=','3')->get();
    return view('admin.collection.category.create',compact('create'));
   }

   public function store_category(Request $request){
       $store_category = new Categories();

       $store_category->name = $request->name;
       $store_category->url = $request->url;
       $store_category->Description = $request->Description;
       $store_category->group_id = $request->group_id;
       $store_category->status = $request->status == true ? '1': '0';

       if($request->hasFile('category_image')){
           $image_file = $request->file('category_image');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time().'.'.$image_extension;
           $image_file->move('upload/categoryimage/',$image_filename);
           $store_category->image =  $image_filename;

       }

       if($request->hasFile('category_icon')){
        $icon_file = $request->file('category_icon');
        $icon_extension = $icon_file->getClientOriginalExtension();
        $icon_filename = time().'.'.$icon_extension;
        $icon_file->move('upload/categoryicon/',$icon_filename);
        $store_category->icon =  $icon_filename;


    }
          $store_category->save();
       return redirect()->back()->with('status',' category Added Successfully');

         }

   public function edit_category(Request $request, $id){
    $edit_group = Groups::where('status','!=','3')->get();
    $edit_category = Categories::find($id);
    return view('admin.collection.category.edit',compact('edit_group','edit_category'));
         }


          public function update_category(Request $request, $id){
          $update_category = Categories::find($id);
          $update_category->name = $request->name;
          $update_category->url = $request->url;
          $update_category->group_id = $request->group_id;
          $update_category->Description = $request->Description;
          $update_category->status = $request->status == true ? '1': '0';


          if($request->hasfile('category_image')){
            $destination_img = 'upload/categoryimage/'.$update_category->image;

            if(File::exists($destination_img)){
                File::delete($destination_img);
            }

            $image_file = $request->file('category_image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time().'.'.$image_extension;
            $image_file->move('upload/categoryimage/',$image_filename);
            $update_category->image =  $image_filename;

        }


        if($request->hasfile('category_icon')){

            $destination_icon = 'upload/categoryicon/'.$update_category->icon;
            if(File::exists($destination_icon)){
                File::delete($destination_icon);
            }

         $icon_file = $request->file('category_icon');
         $icon_extension = $icon_file->getClientOriginalExtension();
         $icon_filename = time().'.'.$icon_extension;
         $icon_file->move('upload/categoryicon/',$icon_filename);
         $update_category->icon =  $icon_filename;


            }
               $update_category->save();

              return redirect()->back()->with('status','Category is Updated');

          }


            public function delete_category(Request $request, $id){

                $delete_category = Categories::find($id);
                $delete_category->status = '3';
                $delete_category->update();
                return redirect()->back()->with('status', 'Category is deleted');
            }



            public function delete_category_record_restore_page(){
                $delete_category_record = Categories::where('status','3')->get();
                return view('admin.collection.category.delete_record',compact('delete_category_record'));
            }


            public function  delete_restore(Request $request, $id){
                $delete_restore = Categories::find($id);
                $delete_restore->status = '0';//show = 0 / Hide = 1 / delete = 2
                $delete_restore->update();
                return redirect('category')->with('status','Category Record is Restore');
            }


             public function permently_delete(Request $request, $id){
                $permently_delete =  Categories::find($id);
                $permently_delete->delete();
                return redirect('category')->with('status','Category Record is  Permently Delete');

             }



    }
