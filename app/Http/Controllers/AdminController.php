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

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
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