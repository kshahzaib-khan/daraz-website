<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
  public function my_profile(){
        return view('frontend.user.profile');
  }

   public function profileupdate(Request $request){
      $user_id = Auth::user()->id;
      $user = User::findOrFail( $user_id);
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->addres1 = $request->addres1;
      $user->addres2 = $request->addres2;
      $user->city = $request->city;
      $user->state = $request->state;
      $user->pincode = $request->pincode;
      $user->phone = $request->phone;
      $user->alternate_phone = $request->alternate_phone;

         $destination = 'upload/profile'.$user->image;
         if(File::exists($destination)){
             File::delete($destination);
         }

       if($request->hasFile('image')){
           $file = $request->file('image');
           $Extension= $file->getClientOriginalExtension();
           $filename = time() .'.'.$Extension;
           $file->move('upload/profile',$filename);
           $user->image = $filename;

       }
            $user->update();
            return redirect()->back()->with('status','Profile is Update');

   }
}
