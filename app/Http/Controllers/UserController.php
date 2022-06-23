<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_login()
    {
        return view('login');
    }

    public function login()
    {

    }

    public function index_register()
    {
        return view('register');
    }

    public function register()
    {

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
