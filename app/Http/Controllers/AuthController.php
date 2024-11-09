<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data['meta_title'] = 'Login';
        return view('auth.login',  $data);
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            if(Auth::user()->is_role == 1)
            {
                return redirect()->intended('admin/dashboard');
            }
            else
            {
                return redirect('/')->with('error', 'Admin not available');
            }

        }
        else
        {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function register(Request $request)
    {
        $data['meta_title'] = 'Register';
        return view('auth.register', $data);
    }

    public function register_post(Request $request)
    {
        // dd($request->all());
       $user = request()->validate([
        'name' => 'required|min:3',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
       ]);

           //This method will register a user
           $user = New User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->remember_token = Str::random(50);
           $user->save();

           return redirect('/')->with('success', 'Register Successfully Done.');
    }

    public function forgot_password(Request $request)
    {
        $data['meta_title'] = 'Forgot Password';
        return view('auth.forgot_password', $data);
    }

   
}
