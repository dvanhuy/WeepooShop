<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPassRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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
        $user = Auth::user();
        $data = [
            'id'=> $user->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'avatar' => $user->email_verified_at,
            'email_verified_at' => $user->email_verified_at,
        ];

        return view('homepage',$data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }


    public function getFormForgotpass()
    {
        return view('Auth.forgotPassword');
    }

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Yêu cầu đặt lại mật khẩu')
            ->line('Bạn nhận được email này vì một yêu cầu đặt lại mqật khẩu đã được gửi tới tài khoản của bạn.')
            ->action('Đặt lại mật khẩu', $url)
            ->line('Nếu bạn không thực hiện yêu cầu này, bạn có thể bỏ qua email này.')
            ->salutation('Trân trọng, ' . config('app.name'));
    }

    public function sendMailResetPass(ForgotPassRequest $request){
        $user_email = $request->validated();
        $user = User::where('email',$user_email) -> first();
        if(!$user->email_verified_at){
            //email chưa được xác nhận
            return redirect()->back()->with('fail','Email chưa được xác nhận');
        };
        Password::sendResetLink($user_email);
        return redirect()->back()->with('fail','đã gửi');
    }

    public function resetpassword()
    {
        return view('Auth.resetPassword');
    }
}
