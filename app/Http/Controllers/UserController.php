<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function getFormEditProfile()
    {
        $user = Auth::user();
        return view("User.edit_profile",["user"=> $user]);
    }
    
    public function getFormChangePassword()
    {
        return view("User.change_password");
    }
}
