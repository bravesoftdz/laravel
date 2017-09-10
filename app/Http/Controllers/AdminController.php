<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lara\Permissions;
use Lara\User;
use Spatie\Permission\Models\Permission;
use Lara\Roles;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function admins()
    {
        $users = User::all();
        $userList = [];
        foreach ($users as $user){
            if ($user->hasRole(Roles::ADMIN)){
                $userList[] = $user;
            }
        }
        return view('admin.admins', ['userList' => $userList]);
    }

    public function user()
    {
        return view('admin.user');
    }

    public function icons()
    {
        return view('admin.icons');
    }

    public function notifications()
    {
        return view('admin.notifications');
    }

    public function table()
    {
        return view('admin.table');
    }

    public function maps()
    {
        return view('admin.maps');
    }

}