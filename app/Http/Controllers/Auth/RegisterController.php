<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\userverifyemailMailable;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    function register(Request $request){

        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           
           'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_as = 'user';
        $user->password = Hash::make($request->password);
        $user->save();

 

         $last_id = $user->id;
         $token = $last_id.hash('sha256', \Str::random(120));
         $verifyURL = route('verify',['token'=>$token,'service'=>'Email_verification']);

         UserVerifyEmail::create([
             'user_id'=>$last_id,
             'token'=>$token,
         ]);

         $message = 'Dear <b>'.$request->name.'</b>';
         $message.= 'Thanks for signing up, we just need you to verify your email address to complete setting up your account.';

         $mail_data = [
             'recipient'=>$request->email,
             'fromEmail'=>'kshahzaib046@gamil.com',
             'subject'=>'Email Verification',

             'body'=>$message,
             'actionLink'=>$verifyURL,
         ];
         
          $to_customer_email =$request->input('email');
          Mail::to($to_customer_email)->send(new userverifyemailMailable($mail_data));


        //  Mail::send('emails.email-template', $mail_data, function($message) use ($mail_data){
        //             $message->to($mail_data['recipient'])
                    
        //             ->from($mail_data['fromEmail'])
     
        //              ->subject($mail_data['subject']);
        //  });


         if( $user->save()){

           return redirect()->back()->with('success','You need to verify your account. We have sent you an activation link, please check your email.');
       }else{
            return redirect()->back()->with('error','Failed to register');
        }

   }


   public function verify(Request $request){
       $token = $request->token;
       $verifyUser = UserVerifyEmail::where('token', $token)->first();
       if(!is_null($verifyUser)){
           $user = $verifyUser->user;

           if(!$user->email_verified){
               $verifyUser->user->email_verified = 1;
               $verifyUser->user->save();

               return redirect()->route('login')->with('success','Your email is verified successfully. You can now login')->with('verifiedEmail', $user->email);
           }else{
                return redirect()->route('login')->with('success','Your email is already verified. You can now login')->with('verifiedEmail', $user->email);
           }
       }
   }

   

}
