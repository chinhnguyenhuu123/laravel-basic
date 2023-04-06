<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(){
        return view('admin.login.login');
    }
    public function checklogin(Request $request){
       
        $validator = Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->route('admin.login')->with('error1',$validator->errors());
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            // echo $user->iadmin;
            if($user->iadmin==1){
                return redirect()->route('admin.category.index')->with('user',Auth::user()->name);
            }
        }
        return redirect()->route('admin.login')->with('error','Incorrect Email or Password!');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
}
