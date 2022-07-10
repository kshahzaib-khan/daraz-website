<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    public function index(Request $request){

            $name = $request->roles;
            // $name = Auth::user()->id;
        $user = User::where('role_as','like','%'.$name.'%')->get();

        return view('admin.user.index')->with('user',$user);
    }

     public function edit($id){
        $user_role = User::find($id);
        return view ('admin.user.edit',compact('user_role'));
     }

     public function update(Request $request, $id){
         $update_role = User::find($id);


          $update_role->name = $request->name;
          $update_role->email = $request->email;
          $update_role->role_as = $request->roles;
          $update_role->isban = $request->isban;
          $update_role->save();

          return redirect()->back()->with('status','Roles is Update');
     }

     public function delete(Request $request, $id){
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back()->with('status','Roles is Delete');

     }
}
