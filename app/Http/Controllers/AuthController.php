<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data['meta_title'] = 'Login';
        return view('auth.login',  $data);
    }

    public function register(Request $request)
    {
        $data['meta_title'] = 'Register';
        return view('auth.register', $data);
    }

    public function register_post(Request $request)
    {
        // dd($request->all());
        $user = Validator::make($request->all(),[  
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            
        ]);
        if ($user->fails()){
            return redirect()->route('auth.register')->withInput()->withErrors($user);
        }

           //This method will register a user
           $user = New User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->save();

           return redirect('/');
    }

    public function forgot_password(Request $request)
    {
        $data['meta_title'] = 'Forgot Password';
        return view('auth.forgot_password', $data);
    }

   
}
