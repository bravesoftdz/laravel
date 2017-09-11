<?php

namespace Lara\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Lara\Events\DeleteUser;
use Lara\Permissions;
use Lara\User;
use Lara\Roles;
use Session;
use Auth;

class AdminsController extends Controller
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
        $password = str_random(8);
        $member = $request->all();
        $member['password'] = Hash::make($password);
        $member['active'] = 1;

        /** @var User $user */
        $user = User::create($member);
        $message = __('messages.create-error');
        if ($user){
            $user->assignRole(Roles::ADMIN);
            $user->givePermissionTo(Permissions::CREATE_ADMIN);
            $message =  __('messages.create-ok',['name' => $user->name]);

            // TODO: send password to email
        }

        Session::flash('message-success', $message);
        return redirect()->route('admins.index');
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        if($user->update($request->all())){
            Session::flash('message-success', __('messages.update-ok',['name' => $user->name]));
        }
        return redirect()->route('admins.index');
    }

    public function loginById(int $id)
    {
        Auth::loginUsingId($id);
        return redirect()->route('admin.index');
    }

}