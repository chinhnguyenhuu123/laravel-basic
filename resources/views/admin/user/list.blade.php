@extends('admin.layout.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr align="center">
                        <th style="text-align: center">ID</th>
                        <th >Name</th>
                        <th>Email</th>
                        <th>Iadmin</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr align="center">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->iadmin == 1 ? "x" : "" }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.user.delete',$item->id) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.user.edit',$item->id) }}">Edit</a></td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection