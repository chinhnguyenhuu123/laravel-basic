<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::Where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json(
                [
                    'message'=>'User not exist!'
                ],
                404
            );
        }
       
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(
            [
                'access_token'=>$token,
                'type_token'=>'bearer'
            ],
            404
        );
    }
    
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'email|required|unique:users',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'message'=>$validator->errors()
                ],
                404
            );
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'idamin'=>1
        ]);
        return response()->json(
            [
                'message'=>'Created Success!'
            ],
            200
        );
    }
    public function logout(Request $request){
        $user=$request->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Logout Success!']);
    }
    public function forgotpassword(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required',
            'new_password'=>'required',
            'confirm_new_password'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'message'=>$validator->errors()
                ],
                404
            );
        }
        $user = User::Where('email',$request->email)->first();
        if(!$user||!Hash::check($request->password,$user->password)){
            return response()->json(
                [   
                    'message'=>'Incorrect Email or Password!'
                ]
            );
        }
        if($request->new_password!=$request->confirm_new_password){
            return response()->json(
                [   
                    'message'=>'Password Incorrect!'
                ]
            );
        }
        $user->tokens()->delete();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        return response()->json(
            [
                'message'=>'Update password Susscess!'
            ]
        );        
    }
    public function changepassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password'=>'required',
            'new_password'=>'required',
            'confirm_new_password'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'message'=>$validator->errors()
                ],
                404
            );
        }
        $user = $request->user();
        if(!Hash::check($request->password,$user->password)){
            return response()->json(
                [   
                    'message'=>'Incorrect Password!'
                ]
            );
        }
        if($request->new_password!=$request->confirm_new_password){
            return response()->json(
                [   
                    'message'=>'Confirm Password Incorrect!'
                ]
            );
        }
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        return response()->json(
            [
                'message'=>'Changepassword Susscess!'
            ]
        );        
    }
}