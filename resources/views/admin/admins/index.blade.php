@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-list">
                    <div class="header">
                        {{ Breadcrumbs::render('admins') }}
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="title">@lang('admin-main.admins')</h4>
                                <p class="category">this is admin user list</p>
                            </div>
                            <div class="col-md-2">
                                @can(\Lara\Permissions::CREATE_ADMIN)
                                <div class="text-center">
                                    <a href="{{ route('admins.create') }}" class="btn btn-info btn-fill btn-wd">@lang('admin-main.create')</a>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-admin-list">
                            <thead>
                            <th>ID</th>
                            <th>@lang('admin-main.name')</th>
                            <th>@lang('admin-main.email')</th>
                            <th>@lang('admin-main.function')</th>
                            </thead>
                            <tbody>
                            @foreach($userList as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="btn-function">
                                        <div class="col-xs-1">
                                            <a href="{{ route('admin.login', $user->id) }}" class="btn btn-sm btn-info admin-login btn-icon" data-toggle="tooltip" title="@lang('admin-main.enter')"><i class="ti-user"></i></a>
                                        </div>
                                        <div class="col-xs-1">
                                            <btn class="btn btn-sm btn-warning admin-permission btn-icon" data-toggle="tooltip" title="@lang('admin-main.permission')"><i class="ti-key"></i></btn>
                                            </div>
                                        <div class="col-xs-1">
                                            <a href="{{ route('admins.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-success admin-edit btn-icon" data-toggle="tooltip" title="@lang('admin-main.edit')"><i class="fa ti-pencil-alt"></i></a>
                                        </div>
                                        <div class="col-xs-1">
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
