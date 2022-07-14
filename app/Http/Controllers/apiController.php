<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class apiController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ],[
            'name.required'=>'Invalid Name',
            'email.required'=>'Invalid Email',
            'email.unique'=> 'The email has already been taken',
            'password.required'=>'Invalid Password',
            'min' => 'The :attribute must be at least :min characters',
        ]);

        $user = new User();

        $user->user_id = Str::uuid();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'member';
        $user->save();

        return response()->json([
           'status'=>'Register Success'
        ]);
    }

    public function login(Request $request){
        $credential = $request->validate([
           'email' => 'required|email',
           'password' =>  'required|min:8'
        ],[
            'email.required'=>'Invalid Email',
            'password.required'=>'Invalid Password',
            'min' => 'The :attribute must be at least :min characters',
        ]);

        if(!Auth::attempt($credential)){
            return response()->json([
                'status'=>'Login Failed'
            ]);
        }

        return response()->json([
            'status'=>'Login Success',
            'token' => $request->user()->createToken('API')->accessToken
        ]);
    }

    public function getTransactionData(Request $request){
        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required'=>'Invalid Email',
        ]);
        $dataUser = User::where('email', '=', $request->input('email'))->first();
        $data = Cart::query()->select('*')->where('user_id', '=', $dataUser->user_id)->get();
        return response()->json([
            'data'=> $data, 'user_id' => $dataUser->user_id
            // 'user_id' => $user
        ]);
    }
}
