<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Post;

use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //create
    {   
        $this->validate($request,
        [
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        // dd($request);
        // echo $request->category_id;
        $slug=Str::slug($request->title);
        $checkslug=Category::where('slug',$slug)->first();
        while($checkslug){
            $slug=$checkslug->slug . Str::random(5);
        }
        // echo $slug;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extendsion = $file->getClientOriginalExtension();
            // echo $name_file;
            // echo "<br>";
            // echo $extendsion;
            // echo "<br>";
     
            if(strcasecmp($extendsion , 'jpg') == 0 || strcasecmp($extendsion , 'png') == 0 || strcasecmp($extendsion , 'jpeg') == 0){
                    $image = Str::random(5) . "_" . $name_file;
                    // while(file_exists("image/post") . $image){
                    //     $image = Str::random(5) . "_" . $name_file;
                    // }
                 
                    $file->move('image/post',$image);
                    Post::create(
                        [
                            'title'=>$request->title,
                            'description'=>$request->description,
                            'content'=>$request->content, 
                            'image'=>$image,
                            'view_counts'=>0,
                            'new_post'=>$request->new_post ? 1 : 0,
                            'slug'=>$slug,
                            'category_id'=>$request->category_id,
                            'highlight_post'=>$request->highlight_post ? 1 : 0
                        ]
                    ); 
                    return redirect()->route('admin.post.index')->with('success','Create Successfully!');
            }
        }  
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
        $categories=Category::all();
        $post=Post::find($id);
        return view('admin.post.edit', compact('post','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slug=Str::slug($request->title);
        $checkslug=Category::where('slug',$slug)->first();
        while($checkslug){
            $slug=$checkslug->slug . Str::random(5);
        }
        // echo $slug;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extendsion = $file->getClientOriginalExtension();
            // echo $name_file;
            // echo "<br>";
            // echo $extendsion;
            // echo "<br>";
        
            if(strcasecmp($extendsion , 'jpg') == 0 || strcasecmp($extendsion , 'png') == 0 || strcasecmp($extendsion , 'jpeg') == 0){
                    $image = Str::random(5) . "_" . $name_file;
                    // while(file_exists("image/post") . $image){
                    //     $image = Str::random(5) . "_" . $name_file;
                    // }
                    $file->move('image/post',$image);
                    Post::find($id)->update(
                        [
                            'title'=>$request->title,
                            'description'=>$request->description,
                            'content'=>$request->content, 
                            'image'=>$image,
                            'view_counts'=>0,
                            'new_post'=>$request->new_post ? 1 : 0,
                            'slug'=>$slug,
                            'category_id'=>$request->category_id,
                            'highlight_post'=>$request->highlight_post ? 1 : 0
                        ]
                    ); 
                    return redirect()->route('admin.post.index')->with('success','Update Successfully!');
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect()->route('admin.post.index')->with('success','Delete Successfully!');
    }
}
