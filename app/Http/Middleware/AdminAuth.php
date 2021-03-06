<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
use Auth;


class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(Auth::check()){
        }else{
            $request->session()->flash('Access_Denied',"You Are Not Authentic To Acces This Page");
            return redirect('admin');
        }

        return $next($request);
    }
}
