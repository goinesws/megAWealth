<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

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
        // Dapat data user yang bersangkutan dengan email ini
        $dataUser = User::where('email', '=', $request->input('email'))->first();
        $dataTrs = DB::table('transactions')
                    ->join('users', 'transactions.user_id', '=', 'users.user_id')
                    ->join('estates', 'transactions.estate_id', '=', 'estates.estate_id')
                    ->select('transactions.transaction_date', 'transactions.transaction_id', 'transactions.estate_id', 'estates.sales_type', 'estates.building_type', 'estates.price', 'estates.location', 'estates.image_link')
                    ->where('transactions.user_id', '=', $dataUser->user_id)
                    ->get();
        return response()->json([
            'data'=> $dataTrs, 'user_id' => $dataUser->user_id
        ]);
    }
}
