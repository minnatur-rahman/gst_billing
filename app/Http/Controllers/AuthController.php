<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
    }

    public function forgot_password(Request $request)
    {
        $data['meta_title'] = 'Forgot Password';
        return view('auth.forgot_password', $data);
    }

   
}
