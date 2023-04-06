<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Contact;
use App\models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::paginate(2);
        return view('admin.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
                'confirm'=>'required|same:password'

            ]
        );
        User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'iadmin'=>$request->iadmin,
            ]
        );
        return redirect()->route('admin.user.index')->with('success','Create Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=User::find($id);
        return view('admin.user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
            [
                // 'email'=>'email|unique:users',
                'password'=>'required|min:6',
                'confirm'=>'required|same:password'

            ]
        );
        User::find($id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'iadmin'=>$request->iadmin,
            ]
        );
        return redirect()->route('admin.user.index')->with('success','Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        Contact::where('user_id',$id)->delete();
        return redirect()->route('admin.user.index')->with('success','Delete Successfully!');
    }
}
