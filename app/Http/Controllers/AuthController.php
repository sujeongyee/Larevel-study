<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('id', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/bikes');
        }

        return back()->withErrors(['id' => '아이디 또는 비밀번호가 잘못되었습니다.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}