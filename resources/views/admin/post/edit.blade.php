@extends('admin.layout.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->    
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">    
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" @if ($post->category_id == $item->id)
                                @selected(true)
                            @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Please Enter Title Name" value="{{ $post->title }}"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"  name="description">{{ $post->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>New Post</label>
                        <input type="checkbox" name="new_post" placeholder="Please Enter Category Order"  @if ( $post->new_post)
                            @checked(true)                            
                        @endif/>
                    </div>
                    <div class="form-group">
                        <label>Highlight Post</label>
                        <input type="checkbox" name="highlight_post" placeholder="Please Enter Category Order"  @if ($post->highlight_post)
                            @checked(true)
                        @endif/>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="demo" name="content" class="ckeditor" >{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Update Add</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection