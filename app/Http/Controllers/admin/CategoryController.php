<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Category;
use App\Models\admin\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
        ]);
        if($validator->fails()){
            return redirect()->route('admin.category.create')->with('error',$validator->errors());
        }
        $slug=Str::slug($request->name);
        $checkslug=Category::where('slug',$slug)->first();
        while($checkslug){
            $slug=$checkslug->slug . Str::random(5);
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>$slug,
        ]);    
        return redirect()->route('admin.category.index')->with('success','Create Successfully!');
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
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slug=Str::slug($request->name);
        $checkslug=Category::where('slug',$slug)->first();
        while($checkslug){
            $slug=$checkslug->slug . Str::random(5);
        }
        $category=Category::find($id)->update([
            'name'=>$request->name,
            'slug'=>$slug,
        ]);    
        return redirect()->route('admin.category.edit',$id)->with('success','Create Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id)->delete();
        $post=Post::where('category_id',$id)->first();
        return redirect()->route('admin.category.index')->with('success','Delete Successfully!');
    }
}
