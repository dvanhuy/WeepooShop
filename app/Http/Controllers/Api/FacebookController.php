<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //
    public function callApiFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            // dd($googleUser);
            $existingUser = User::where('email', $facebookUser->email)->first();
            if ($existingUser) {
                // đã tồn tại trong hệ thống -> đăng nhập vô
                Auth::login($existingUser, true);
                return redirect()->route('get_home_page');
            };
            //chưa vô lần nào -> tạo acc
            $userinfor = [
                'email' => $facebookUser->email,
                'name' => $facebookUser->name,
                'social_id'=> $facebookUser->id,
                'social_type' => 'facebook',
                'password' => bcrypt($facebookUser->id),
                'avatar' => $facebookUser->avatar,
            ];

            $user = User::create($userinfor);
            if ($user) {
                Auth::login($user, true);
                dd($user);
                return redirect()->route('get_home_page');
            }

            return redirect()->back()->with([
                'fail' => 'Có lỗi khi đăng nhập bằng facebook',
            ]);

        } catch (\Exception $exception) {
            return redirect("/login")->with([
                'fail' => 'Có lỗi '.$exception,
            ]);
        }
    }
}
