@extends('layouts.app')
@section('content')
<section class="panel panel-info">
    <header class="panel-heading">
        <h2 class="panel-title">Edit User</h2>
    </header>
    <div class="panel-body">
        {!! Form::open(['route' => ['update_user',$user->id],'method' => 'put','class' => 'form-horizontal']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-2"><label>Name</label></div>
            <div class="col-sm-10"><input class="form-control" name="name" value="{{ $user->name }}"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"><label>Email</label></div>
            <div class="col-sm-10"><input class="form-control" name="email" value="{{ $user->email }}"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"><label>Password</label></div>
            <div class="col-sm-10"><a href="#" class="btn btn-warning">Change password</a></div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"><label>Role</label></div>
            <div class="col-sm-10">
                <select class="form-control" name="role">
                    <option value="user" @if ($user->role === 'user')
                            selected
                            @endif
                            >User</option>
                    <option value="admin" @if ($user->role === 'admin')
                            selected
                            @endif>Admin</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
        {!! Form::close() !!}
    </div>
</section>
@stop