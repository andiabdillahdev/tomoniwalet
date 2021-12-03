<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="host_url" content="{{ url('/') }}">       
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/toastr/toastr.min.css') }}">
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
                                <form id="regis-form">
                                    <div class="form-item">
                                      <input type="text" name="name" placeholder="Nama" class="form-control form-login" id="namalengkap">
                                       <small class="text-danger error-notif" id="name"></small>
                                    </div>
                                    <div class="form-item">
                                        <input type="email" name="email" placeholder="E-mail" class="form-control form-login" id="email_">
                                        <small class="text-danger error-notif" id="email"></small>
                                    </div>
                                    <div class="form-item">
                                        <input type="password" name="password" placeholder="Password" class="form-control form-login" id="password_">
                                        <small class="text-danger error-notif" id="password"></small>
                                    </div>
                                    <div class="form-item">
                                        <input type="password" name="confirm_password" placeholder="Ulangi Password" class="form-control form-login" id="confirm_password_">
                                        <small class="text-danger error-notif" id="confirm_password"></small>
                                    </div>
                                </form>
                                <div class="mt-5">
                                    <button onclick="post_auth('regis-form','page-register-post')" class="btn button button-primary" >SIGN UP</button>
                                </div>

                                <div class="auth-social">
                                    <span>SIgn Up With</span>
                                    <div class="d-flex justify-content-center">
                                    <a href="{{ route('google.auth') }}"><img src="{{ asset('assets/img/google.png') }}" alt="" srcset=""></a>
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
    <script src="{{ asset('admin/vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/page.js') }}"></script>
  </body>
</html>