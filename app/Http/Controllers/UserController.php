<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function getFormEditProfile()
    {
        $user = Auth::user();
        return view("User.edit_profile",["user"=> $user]);
    }

    public function updateProfile(EditProfileRequest $request,User $userID)
    {
        dd($userID,$request);
    }
    
    public function getFormChangePassword()
    {
        return view("User.change_password");
    }
}
