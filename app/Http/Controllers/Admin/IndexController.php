<?php

namespace Lara\Http\Controllers\Admin;

use Lara\Http\Controllers\Controller;

class IndexController extends Controller
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