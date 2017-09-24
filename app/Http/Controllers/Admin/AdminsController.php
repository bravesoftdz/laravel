<?php

namespace Lara\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Lara\Events\DeleteUser;
use Lara\Events\UpdateUser;
use Lara\Http\Controllers\Controller;
use Lara\Mail\createUser;
use Lara\User;
use Lara\Roles;
use Session;
use Auth;
use Mail;

class AdminsController extends Controller
{
    public function index()
    {
        $userList = User::getAdminUsers();
        return view('admin.admins.index', compact('userList'));
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        event(new DeleteUser($user));

        return redirect(route('admin.index'));
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
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
        $message = __('admin/messages.create-error');
        if ($user){
            $user->assignRole(Roles::ADMIN);
            $message =  __('admin/messages.create-ok',['name' => $user->name]);

            Mail::to($user)->queue(new createUser($user));
        }

        Session::flash('message-success', $message);
        return redirect()->route('admin.index');
    }

    public function update(Request $request, int $id)
    {
        event(new UpdateUser(User::findOrFail($id), $request->all()));
        return redirect()->route('admin.index');
    }

    public function loginById(int $id)
    {
        Auth::loginUsingId($id);
        return redirect()->route('adminka.index');
    }

}