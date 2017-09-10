@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-list">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="title">Admin Table</h4>
                                <p class="category">this is admin user list</p>
                            </div>
                            <div class="col-md-2">
                                @can(\Lara\Permissions::CREATE_ADMIN)
                                <div class="text-center">
                                    <a href="{{ route('admins.create') }}" class="btn btn-info btn-fill btn-wd">Create Admin</a>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-admin-list">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Function</th>
                            </thead>
                            <tbody>
                            @foreach($userList as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="btn-function">
                                        <div class="col-xs-3">
                                            <btn class="btn btn-sm btn-warning admin-permission btn-icon" data-toggle="tooltip" title="Permission"><i class="ti-key"></i></btn>
                                            </div>
                                        <div class="col-xs-3">
                                            <a href="{{ route('admins.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-success admin-edit btn-icon" data-toggle="tooltip" title="Edit"><i class="fa ti-pencil-alt"></i></a>
                                        </div>
                                        <div class="col-xs-3">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['admins.destroy', $user->id]]) }}
                                        {{ Form::submit('X', ['class' => 'btn btn-sm btn-danger admin-remove btn-icon']) }}
                                        {{ Form::close() }}
                                        </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
