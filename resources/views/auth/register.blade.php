<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/assets/img/favicon.ico')}}">
    <title>Đăng ký</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/register&login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/register&login/css/style.css')}}">
</head>

<body>

    <!-- @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errors = @json($errors -> all());
            var errorMessage = errors.join('\n');
            alert(errorMessage);
        });
    </script>
    @endif -->

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <!-- <form method="post" class="my-login-validation" novalidate="" action="{{ URL::to('/add-customer') }}"> -->
                    <x-jet-validation-errors class="mb-4" style="text-align: center; color: red;" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2 class="form-title">Đăng ký</h2>
                        <div class="form-group">
                            <x-jet-label for="name" value="{{ __('UserName') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="form-group">
                            <x-jet-label for="fullname" value="{{ __('Họ và Tên') }}" />
                            <x-jet-input id="fullname" class="block mt-1 w-full form-input" type="text" name="fullname" :value="old('fullname')" required />
                        </div>

                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full form-input" type="email" name="email" :value="old('email')" required />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="password" value="{{ __('Mật khẩu') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full form-input" type="password" name="password" :value="old('password')" required autocomplete="new-password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <x-jet-label for="password_confirmation" value="{{ __('Xác nhận mật khẩu') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <span toggle="#password_confirmation" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <!-- <input type="password" class="form-input" name="repass" id="re_password" placeholder="Repeat your password" /> -->
                        </div>

                        <div class="form-group">
                            <x-jet-label for="phone" value="{{ __('Số điện thoại') }}" />
                            <x-jet-input id="phone" class="block mt-1 w-full form-input" type="tel" name="phone" :value="old('phone')" required />
                            <!-- <input type="password" class="form-input" name="repass" id="re_password" placeholder="Repeat your password" /> -->
                        </div>

                        <div class="form-group">
                            <x-jet-label for="address" value="{{ __('Địa chỉ') }}" />
                            <x-jet-input id="address" class="block mt-1 w-full form-input" type="text" name="address" :value="old('address')" required />
                            <!-- <input type="password" class="form-input" name="repass" id="re_password" placeholder="Repeat your password" /> -->
                        </div>

                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="customer_phone" id="phone" placeholder="Your Number Phone" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                        </div> -->
                        <div class="form-group">
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms" />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Đã có tài khoản?') }}
                                </a> -->

                                <x-jet-button class="ml-4 form-submit">
                                    {{ __('Đăng ký') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </form>
                    <p class="loginhere">
                        Đã có tài khoản ? <a href="{{URL::to('/login')}}" class="loginhere-link">Đăng nhập</a>
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