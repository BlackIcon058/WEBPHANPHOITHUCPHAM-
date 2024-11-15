<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/assets/img/favicon.ico')}}">
    <title>Đăng Nhập</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/register&login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/register&login/css/style.css')}}">
</head>

<body>
    <!-- @if(session('status'))
  <script>
    alert("{{ session('status') }}");
  </script>
  @endif -->

    @if(session('status'))
    <script>
        alert("{{ session('status') }}");
    </script>
    {{ session()->forget('status') }}
    @endif






    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <!-- class="my-login-validation" -->
                    <!-- <x-jet-validation-errors class="mb-4" /> -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h2 class="form-title">Đăng nhập</h2>
                        <!-- <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div> -->
                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full form-input" type="email" name="email" :value="old('email')" required autofocus />
                            <!-- <input required type="email" class="form-input" name="email_account" id="email" value="{{ __('Email') }}" placeholder="Your Email" /> -->
                        </div>
                        <div class="form-group">
                            <x-jet-label for="password" value="{{ __('Mật khẩu') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full form-input" type="password" name="password" required autocomplete="current-password" />
                            <!-- <input required type="text" class="form-input" name="password_account" id="password" placeholder="Password" /> -->
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <!-- <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        -->
                        <!-- <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login" />
                        </div> -->

                        <div class="flex items-center justify-end mt-4">
                            <!-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Quên mật khẩu?') }}
                            </a>
                            @endif -->

                            <x-jet-button class="ml-4 form-submit">
                                {{ __('Đăng nhập') }}
                            </x-jet-button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Tạo tài khoản? <a href="{{URL::to('/register')}}" class="loginhere-link">Đăng ký</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('public/frontend/assets/register&login/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/register&login/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>