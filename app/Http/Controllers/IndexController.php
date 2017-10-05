<?php

namespace Lara\Http\Controllers;

use Dykyi\Repository\RedisRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Lara\Files;
use Lara\User;

class IndexController extends Controller
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderList = Storage::files(Files::UPLOAD_SLIDER);
        return view('index', compact('sliderList'));
    }
}
