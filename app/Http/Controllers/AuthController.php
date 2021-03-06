<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth= $auth;
    }

    public function register()
    {
        //
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $dataLogin = ['email' => $email, 'password' => $password];
        

        if(Auth::attempt($dataLogin)) {
            
           return redirect('/movie');
        }
        
        
        return redirect()->back()->with("error", "Gagal Login CahKuPluK!");
        
    }
    
    public function destroy()
    {
        Auth::logout();

        return redirect('/login');

    }
}
