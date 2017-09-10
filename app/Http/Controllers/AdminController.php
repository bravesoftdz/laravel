<?php

namespace Lara\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Lara\Events\DeleteUser;
use Lara\User;
use Lara\Roles;

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

        return redirect(route('admins.index'));
    }

    public function edit(int $id)
    {
        $user   = User::find($id);
        return View::make('admin.admins.edit')->with(compact('user'));
    }

    public function create()
    {
        $user = new User;
        return View::make('admin.admins.create')->with(compact('user'));
    }

    public function store(Request $request)
    {
        $member = $request->all();
        $member['password'] = Hash::make(str_random(8));
        $member['active'] = 1;
        // TODO: send to email
        User::create($member);
        // TODO: show user result after redirect
        return redirect(route('admins.index'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        // TODO: show user result after redirect
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