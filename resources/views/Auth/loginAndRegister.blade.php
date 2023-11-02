<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
    <title>Weepoo Shop Login</title>
</head>
<style>
    .error{
        color: red;
        font-size: 11px;
    }
</style>

<body>
<!-- {{ request()->is('register') ? 'active' : '' }} -->
<!-- {{ Route::currentRouteName() == 'get_form_register' ? 'active' : ''  }} -->
    <div class="container {{ Route::currentRouteName() == 'get_form_register' ? 'active' : ''  }}" id="container">
        <div class="form-container sign-up">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1>Tạo tài khoản</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng email của bạn để đăng ký</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1>Đăng nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>hoặc đăng nhập tài khoản của bạn ở dưới</span>
                <input type="text" name="email" placeholder="Email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
                <a href="#">Forget Your Password?</a>
                <button>Sign In</button>
                @if(Session::has('fail'))
                    <div class="error" style="margin-top: 10px; font-size: 13px;">{{ session::get('fail') }}</div>
                @endif
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
      const container = document.getElementById('container');
      const registerBtn = document.getElementById('register');
      const loginBtn = document.getElementById('login');

      registerBtn.addEventListener('click', () => {
          container.classList.add("active");
      });

      loginBtn.addEventListener('click', () => {
          container.classList.remove("active");
      });
    </script>
</body>

</html>