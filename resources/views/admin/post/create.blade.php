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
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all as $item)
                        {{ $item }}
                    @endforeach
                </div>
            @endif
            <!-- /.col-lg-12 -->    
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">    
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Please Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" placeholder="Please Enter Category Order" />
                    </div>
                    <div class="form-group">
                        <label>New Post</label>
                        <input type="checkbox" name="new_post" placeholder="Please Enter Category Order" />
                    </div>
                    <div class="form-group">
                        <label>Highlight Post</label>
                        <input type="checkbox" name="highlight_post" placeholder="Please Enter Category Order" />
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="demo" name="content" class="ckeditor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Post Add</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection