@extends('layouts.frontend')
@section('content')
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1,
            viewport-fit=cover" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/font-awesome.css') }}">
        <!-- <link rel="stylesheet" href="theme/frontend/fancybox/dist/jquery.fancybox.min.css) }}"> -->
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/swiper.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/home.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/register.css') }}" />
    </head>

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

                            @if(Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                    @php
                                        Session::forget('fail');
                                    @endphp
                                </div>
                            @endif

                            <form class="w-100" method="POST" action="{{ route('frontend.login.login-user') }}">
                            {{ csrf_field() }}
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputUserName"
                                        class="form-label mr-3"><i class="fa
                                            fa-user-circle-o"
                                            aria-hidden="true"></i></label>
                                    <input type="email" class="form-control"
                                        id="exampleInputUserName"
                                        name="email" value="{{ old('email') }}">
                                    
                                </div>
                                @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPassword "
                                        class="form-label mr-3"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </label>
                                    <input type="password" class="form-control" name="password"
                                        id="exampleInputPassword">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                </div>
                                
                                <div class="forn-btn">

                                    <button type="submit" class="btn btn-primary btn-register">ĐĂNG nhập</button>
                                    <p class="link mt-1">Nếu bạn chưa có tài khoản , hãy <a href="{{ route('frontend.login.register-user') }}" class="pl-1">ĐĂNG Ký?</a></p>
                                    <p class="forgot_pass mt-1"> <a href="{{ route('frontend.login.forget.password.get') }}" class="pl-1">Quên mật khẩu?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <span class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
        <script src="theme/frontend/js/jquery-3.4.1.min.js" defer=""></script>
        <script src="theme/frontend/js/bootstrap.min.js" defer=""></script>
        <script src="theme/frontend/js/wow.min.js" defer=""></script>
        <!-- <script src="theme/frontend/fancybox/dist/jquery.fancybox.min.js" defer></script> -->
        <script src="theme/frontend/js/swiper.min.js" defer=""></script>
        <script src="theme/frontend/js/script.js" defer=""></script>
    </body>


@endsection