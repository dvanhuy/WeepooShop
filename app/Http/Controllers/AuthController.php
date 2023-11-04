<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
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

    public function getFormRegister()
    {
        return view("Auth.loginAndRegister");
    }

    public function register(RegisterRequest $request)
    {
        $params = $request->validated();
        $params['passwordreg'] = bcrypt($params['passwordreg']);
        //vì tên biến khác
        $user = User::create([
            'name' => $params['namereg'],
            'email' => $params['emailreg'],
            'password' => $params['passwordreg']
        ]);


        if ($user) {
            return redirect()->route('get_form_login')->with('emailfill',$params['emailreg']);
        }

        return redirect()->back()->with([
            'failreg' => 'Có lỗi khi tạo tài khoản'
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
