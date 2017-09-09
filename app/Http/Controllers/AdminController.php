<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();

        $users = User::role(Roles::SUPER_ADMIN)->get();
        $role = Roles::findByName(Roles::SUPER_ADMIN);
        $role->givePermissionTo(\Lara\Permission::CREATE_ADMIN);


       // $user->givePermissionTo('create admin');
        $perm = $user->getAllPermissions();
        dd($perm);

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