<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function authenticated(){

    // if(Auth::user()->role_as == 'admin'){
    //   return  redirect('dashboard')->with('status','Welcome to Dashboard');
    // }
    
    // if(Auth::user()->role_as == 'vendor'){
    //     return  redirect('vendor-dashboard')->with('status','Welcome to Dashboard');
    
    // }
    
    //     if(Auth::user()->role_as == 'user'){
    //         return  redirect()->back()->with('status','You are Logged in Successfully');
    
    
    //     }
    
    
    // }



                public function authenticated(Request $request ){
                    $input = $request->all();
                    $this->validate($request,[
                        'email'=>'required|email',
                        'password'=>'required'
                    ]);

                    if($request->remember===null){
                        setcookie('login_email',$request->email,100);
                        setcookie('login_pass',$request->password,100);
                     }
                     else{
                        setcookie('login_email',$request->email,time()+60*60*24*100);
                        setcookie('login_pass',$request->password,time()+60*60*24*100);
                
                     }

        if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){

            Session::put('user_session', $input['email']);

                if(Auth::user()->role_as == 'admin'){
                return  redirect('dashboard')->with('status','Welcome to Dashboard');
                }


                if(Auth::user()->role_as == 'vendor'){
                return  redirect('vendor-dashboard')->with('status','Welcome to Dashboard');

                }


                if(Auth::user()->role_as == 'user'){
                    return  redirect()->back()->with('status','You are Logged in Successfully');


                }
                }else{
                return redirect()->back()->with('error','Email and password are wrong');
  
                }

               }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
