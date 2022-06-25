<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();

        $user->user_id = Str::uuid();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'member';
        $user->save();

        return redirect()->route('index_login');
    }

    public function index_register()
    {
        return view('register');
    }

    public function index_login()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);


        if(Auth::attempt($credentials)){
            Cookie::queue('LoginCookie', $request->input('email'), 5);
            Cookie::queue('PasswordCookie', $request->input('password'), 5);
            // $request->session()->regenerate();
            // dd(Auth::check());
            return redirect()->route('homepage');
        }
        else{
            return redirect()->back()->withErrors(['creds' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index_login');
    }
}
