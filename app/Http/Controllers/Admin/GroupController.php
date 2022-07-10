<?php

namespace App\Http\Controllers\Admin;
use  App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
     public function index(){
         $group = Groups::where('status','!=','2')->get();
         return view('admin.collection.group.index',compact('group'));
     }

     public function add_group_viewpage(){

        return view('admin.collection.group.create');
     }

     public function store_group(Request $request){
           $store_group = new Groups();

           $store_group->name = $request->name;
           $store_group->url = $request->url;
           $store_group->Description = $request->Description;

            if($request->status == true){
              $store_group->status = '1';
            }else{
                $store_group->status = '0';
            }
             $store_group->save();
             return redirect()->back()->with('status','Group data Add Successfully');
     }


     public function edit_group(Request $request,$id){
        $edit_group = Groups::find($id);
        return view('admin.collection.group.edit',compact('edit_group'));
    }


     public function update_group(Request $request ,$id){
           $update_group = Groups:: find($id);

           $update_group->name = $request->name;
           $update_group->url = $request->url;
           $update_group->Description = $request->Description;
           $update_group->status = $request->status == true ? '1': '0';
           $update_group->save();
           return redirect()->back()->with('status','Group Collection is Updated');

     }

      public function delete_group(Request $request, $id){
               $delete_group = Groups::find($id);
                 $delete_group->status = '2';
                 $delete_group->update();
                 return redirect()->back()->with('status','Group  Record is Deleted');
      }

      public function delete_group_record_restore_page(){
        $delete_group_record = Groups::where('status','2')->get();
        return view('admin.collection.group.delete_record',compact('delete_group_record'));
      }


      public function  delete_restore(Request $request, $id){
        $delete_restore = Groups::find($id);
          $delete_restore->status = '0';//show = 0 / Hide = 1 / delete = 2
          $delete_restore->update();
          return redirect('group')->with('status','Group Record is Restore');
       }


         public function permently_delete(Request $request, $id){
          $permenet_delete = Groups::find($id);

          $permenet_delete->delete();
          return redirect('group')->with('status','Group Record is permently');
         }

}
