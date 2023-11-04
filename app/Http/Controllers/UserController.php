<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getFormRegister()
    {
        return view("Auth.loginAndRegister");
    }
    public function getFormLogin()
    {
        return view("Auth.loginAndRegister");
    }

    public function login(LoginRequest $loginRequest)
    {
        if (Auth::attempt($loginRequest->validated())) {
            $loginRequest->session()->regenerate();
            return redirect()->route('get_home_page');
        }
        return redirect()->back()->with([
            'fail' => 'Nhập sai email hoặc mật khẩu'
        ]);
    }

    public function getHomePage()
    {
        return view('homepage');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
