@extends('layouts.app')
@section('content')
<div class="row">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <section class="panel panel-info">
            <header class="panel-heading">
                <h2 class="panel-title visible-lg-inline-block">Users List</h2>
                <a class="btn btn-default pull-right btn-xs" href="#" data-toggle="modal" data-target="#myModal">Create user</a>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Role</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('show_edit_user',$user->id)}}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a class="btn btn-danger" href="{{ route('delete_user',$user->id)}}"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'add_user','method' => 'post','class' => 'form-horizontal']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-sm-2"><label>Name</label></div>
                    <div class="col-sm-10"><input class="form-control" name="name"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2"><label>Email</label></div>
                    <div class="col-sm-10"><input class="form-control" name="email"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2"><label>Password</label></div>
                    <div class="col-sm-10"><input class="form-control" name="password" type="password"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2"><label>Role</label></div>
                    <div class="col-sm-10">
                        <select class="form-control" name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@stop