<?php

namespace Lara\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Lara\Events\DeleteUser;
use Lara\Events\UpdateUser;
use Lara\Http\Controllers\Controller;
use Lara\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $userList = User::getUsers();
        return view('admin.users.index', compact('userList'));
    }

    public function destroy(int $id)
    {
        event(new DeleteUser(User::findOrFail($id)));
        return redirect()->route('user.index');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return View::make('admin.users.edit')->with(compact('user'));
    }

    public function update(Request $request, int $id)
    {
        event(new UpdateUser(User::findOrFail($id), $request->all()));
        return redirect()->route('user.index');
    }

    public function loginById(int $id)
    {
        Auth::loginUsingId($id);
        return redirect()->route('web.index');
    }

}
