<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupet Spa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.includes.style')
</head>
<body>
    {{-- <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="POST" action="{{ route('backend.auth.login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                        required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                    Remember Me
                  </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div> --}}

    <body class="scrollstyle1">
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="images d-block run_hv">
                            <img src="{{ asset('frontend/images/img-new_service.png ') }}"
                                alt="" class="w-100" srcset="">
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="register_form">
                            <h4 class="title w-100">Đăng nhập</h4>

                            <form class="w-100" method="POST" action="{{ route('backend.auth.login') }}">
                                @csrf
                                <div class="mb-3 d-flex">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                </div>
                              
                                <div class="mb-3 d-flex">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                </div>
                                
                                <div class="forn-btn">
                                    <button type="submit" class="btn btn-primary btn-register">Đăng nhập</button>
                                    {{-- <p class="link mt-1">Nếu bạn chưa có tài khoản , hãy <a href="{{ route('frontend.login.register-user') }}" class="pl-1">ĐĂNG Ký?</a></p>
                                    <p class="forgot_pass mt-1"> <a href="{{ route('frontend.login.forget.password.get') }}" class="pl-1">Quên mật khẩu?</a></p> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @include('backend.includes.footer')


    @include('backend.includes.script')
    @yield('js')
</body>


</html>
