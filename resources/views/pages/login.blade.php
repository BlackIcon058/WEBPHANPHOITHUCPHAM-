<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Form by Colorlib</title>
  <!-- Font Icon -->
  <link rel="stylesheet" href="{{asset('public/frontend/assets/register&login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
  <!-- Main css -->
  <link rel="stylesheet" href="{{asset('public/frontend/assets/register&login/css/style.css')}}">
</head>

<body>
  @if(session('status'))
  <script>
    alert("{{ session('status') }}");
  </script>
  @endif
  <div class="main">

    <section class="signup">
      <!-- <img src="images/signup-bg.jpg" alt=""> -->
      <div class="container">
        <div class="signup-content">
          <!-- class="my-login-validation" -->
          <form method="POST" id="signup-form" class="signup-form" novalidate="" action="{{URL::to('/login-customer-login')}}">
            <!-- <form method="POST" id="signup-form" class="signup-form"> -->
            {{csrf_field()}}
            <h2 class="form-title">Login</h2>
            <!-- <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div> -->
            <div class="form-group">
              <input required type="email" class="form-input" name="email_account" id="email" placeholder="Your Email" />
            </div>
            <div class="form-group">
              <input required type="text" class="form-input" name="password_account" id="password" placeholder="Password" />
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
            <div class="form-group">
              <input type="submit" name="submit" id="submit" class="form-submit" value="Login" />
            </div>
          </form>
          <p class="loginhere">
            No account? <a href="{{URL::to('/signup-customer')}}" class="loginhere-link">Register here</a>
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