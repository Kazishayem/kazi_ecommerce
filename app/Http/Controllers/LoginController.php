<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginFormView(){
        return view('backend.pages.login');

    }

    public function login(Request $req){

        $validated = $req->validate([

            'email' => 'bail |required | string | email | max:255 | exists:users,email',

            'password' => 'bail |required | string',

        ]);

        $credentials = [
            'email' => $req->email,
            'password' => $req->password,
        ];

        if(Auth::attempt($credentials , $req->filled('remember'))){

            $req->session()->regenerate();

            return redirect()->intended('admin/dashboard');

        }

        return back()->withErrors([
            'email' => 'wrong input',
        ])->onlyInput('email');



    }

    public function logout(Request $req){

        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('login');



    }
}
