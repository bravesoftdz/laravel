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
                                @can(\Lara\Permission::CREATE_ADMIN)
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Create Admin</button>
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
                            </thead>
                            <tbody>
                            @foreach($userList as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
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
