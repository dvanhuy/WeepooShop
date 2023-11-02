<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
