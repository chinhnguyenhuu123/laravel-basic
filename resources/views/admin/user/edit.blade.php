@extends('admin.layout.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1> 
            </div>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all as $item)
                        {{ $item }}
                    @endforeach
                </div>
            @endif --}}
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.user.update',$users->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" value="{{ $users->name }}" type="text" name="name" placeholder="Please Enter Name"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" value="{{ $users->email }}" type="email" name="email" placeholder="Please Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>PassWord</label> 
                        <input class="form-control" type="password" name="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control"  type="password" name="confirm" placeholder="Please Enter Confirm Password" />
                    </div>
                    <div class="form-group">
                        <label>Iadmin</label>
                        <label class="radio-inline">
                            <input name="iadmin" value="1" @if ($users->idamin)
                                @checked(true) 
                            @endif checked type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="iadmin" value="0" @if (!$users->iadmin)
                                @checked(true) 
                            @endif  type="radio">User
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">User Update</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection