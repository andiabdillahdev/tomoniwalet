<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/page.css') }}">

    <title>Hello, world!</title>
  </head>
  <body>

        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-lg-6"> -->
                    <div class="card_auth text-center">
                         <!-- <div class="header_auth">
                                <h1>Sign In</h1>
                         </div>    -->
                         <img src="{{ asset('assets/img/logo.png') }}" alt="" srcset="">
                         <div class="row justify-content-center form-auth-content">
                             <div class="col-lg-8">
                                <div class="form-item">
                                  <input type="text" name="nama" placeholder="Username" class="form-control form-login" id="namalengkap">
                                </div>
                                <div class="form-item">
                                  <input type="text" name="nama" placeholder="Password" class="form-control form-login" id="namalengkap">
                                </div>
                                <div class="mt-5">
                                    <button class="btn button button-primary">SIGN IN</button>
                                </div>

                                <div class="auth-social">
                                    <span>Login With</span>
                                    <div class="d-flex justify-content-center">
                                    <a href="{{ route('google.auth') }}"><img src="{{ asset('assets/img/google.png') }}" alt="" srcset=""></a>
                                    </div>
                                </div>

                                <div class="auth-social">
                                    <span>Don’t have an account?</span>
                                    <div class="d-flex justify-content-center">
                                          <a href="{{ route('homepage.page_register') }}">Sign Up Now</a>
                                    </div>
                                </div>
                                
                             </div>
                         </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>

    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>