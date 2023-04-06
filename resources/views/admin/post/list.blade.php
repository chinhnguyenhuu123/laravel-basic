@extends('admin.layout.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Highlight Post</th>
                        <th>New post</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="{{ "/".$item->showimage()}}" alt="" style="width:50px;height:50px"></td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->highlight_post == 1 ? "x" : "" }}</td>
                        <td>{{ $item->new_post == 1 ? "x" : "" }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.post.delete' ,$item->id) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.post.edit' ,$item->id) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $posts->links() !!} --}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection