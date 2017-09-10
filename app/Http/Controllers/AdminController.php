<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lara\Events\DeleteUser;
use Lara\Permissions;
use Lara\User;
use Spatie\Permission\Models\Permission;
use Lara\Roles;
use Spatie\Permission\Models\Role;
use Symfony\Component\Debug\Debug;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $userList = [];
        foreach ($users as $user){
            if ($user->hasRole(Roles::ADMIN)){
                $userList[] = $user;
            }
        }
        return view('admin.admins.index', ['userList' => $userList]);
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        event(new DeleteUser($user));
//        $pusher->trigger('my-channel', 'my-event', ['message' => 'test1']);
        return redirect(route('admins.index'));
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