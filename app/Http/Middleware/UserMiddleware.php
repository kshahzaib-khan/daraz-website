<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //  if(Auth::check() && Auth::user()->isban){
        //      $banned = Auth::user()->isban == '1';
        //      Auth::logout();

        //      if($banned == 1){
        //          $message = 'Your account has been Banned. Please Contact Administrator';
        //      }
        //        return redirect()->back()->with('status',$message)->withErrors(['email'=>'Your account has been Banned.Please contact administrator']);
        //  }

        if(auth()->check()&& auth()->user()->isban == 1){

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error','Your account has been Banned. Please Contact Administrator');


        } elseif(auth()->check()&& auth()->user()->email_verified == 0){

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error','You need to confirm your account. We have sent you an activation link, please check your email');


        }

          if(Auth::check()){
              $expiresAt = Carbon::now()->addMinutes(1);
              Cache::put('user-is-online'. Auth::user()->id, true, $expiresAt);
          }
        return $next($request);
    }
}
