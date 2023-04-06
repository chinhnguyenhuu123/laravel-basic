<?php

namespace App\Http\Controllers;
use App\Models\admin\Contact;
use App\Models\admin\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WedController extends Controller
{
    public function home(){
        $highlights =Post::where('highlight_post',1)->take(3)->inRandomOrder()->get();
        $posts = Post::where('new_post',1)->take(10)->inRandomOrder()->get();
        // $posts = Post::where('new_post',1)->paginate(5);
        return view('wed.wedsite.home',compact('highlights','posts'));
    }
    public function contact(){
        return view('wed.wedsite.contact');
    }
    public function post($slug){
        $posts=Post::where('slug', $slug)->first();
        $post_id=Post::where('category_id',$posts->category_id)->take(3)->inRandomOrder()->get();
        $dem =$posts->view_counts;
        $posts->update([
            'view_counts' =>  $dem++
        ]);
        return view('wed.wedsite.post',compact('posts','post_id'));
    }
    public function sendcontact(Request $request){
        $this->validate($request,
            [
                "name"=>'required',
                "email"=>'required||email',
                'phone'=>'required',
                'subject'=>'required',
                'message'=>'required'
            ]
        );
        Contact::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'subject'=>$request->subject,
                'message'=>$request->message,
            ]
        );
        return redirect()->route('wed.contact')->with('success','Contact Successfully!');
    }
    public function login(){
        return view('wed.wedsite.login');
    }
    public function comment(Request $request ,$slug){
        $comment=$request->comment;
        // $sl=$slug;
        return view('wed.wedsite.login',compact('slug','comment'));
    }
    public function checklogin(Request $request,$comment,$slug){
        $validator = Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->route('wed.login')->with('error1',$validator->errors());
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            // echo $user->iadmin;
            if($user->iadmin==1){
                return redirect()->route('wed.login',compact('slug','comment'));
                // return redirect()->route('admin.category.index')->with('user',Auth::user()->name);
            }
        }
        return redirect()->route('admin.login')->with('error','Incorrect Email or Password!');
    }
}
