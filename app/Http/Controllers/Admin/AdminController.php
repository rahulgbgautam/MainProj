<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class AdminController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){
            return redirect('/admin/dashboard');
        }else{
            return view('admin.auth.login');
        }
    }

    public function dashboard(Request $request){ 
        return view('admin.dashboard');
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        // return $request->all();
        $admin = User::where(['email'=>$request->email])->first();
        if($admin)
        {  
            if(!Hash::check($request->password,$admin->password))
            {  
                return back()->with('errorMessage',"Please enter correct email and password.");
            }else{ 
                    Auth::login($admin);
                    return redirect('admin/dashboard');
            }
        }else{      
            return back()->with('errorMessage',"User does not exists.");
        }

    }
    
    public function logout(Request $request){
            \Auth::logout();
         session()->flush();
         return redirect('admin');
    }
}
