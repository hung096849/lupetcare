
@extends('layouts.frontend')
@section('content')

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
    
<body class="scrollstyle1">
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="images d-block run_hv">
                            <img src="{{ asset('frontend/images/img-new_service.png ') }}" alt="" class="w-100" srcset="">
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="register_form">
                            <h4 class="title w-100">Tạo tài khoản</h4>
                             
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                            <form class="w-100" method="POST" action="{{ route('frontend.login.register.custom') }}">
                            {{ csrf_field() }}
                                
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputUserName" class="form-label mr-3"><i class="fa
                                            fa-user-circle-o" aria-hidden="true"></i></label>
                                    <input type="text" class="form-control" id="exampleInputUserName" name="name" placeholder= "Họ và tên" aria-describedby="UserNameHelp">
                                </div>
                                @if ($errors->has('name'))
                                            <span style="color: red; margin-left: 70px;">{{ $errors->first('name') }}</span>
                                        @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputEmail1" class="form-label mr-3"><i class="fa
                                            fa-envelope-o" aria-hidden="true"></i></label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder= "Email" aria-describedby="emailHelp">
                        
                                </div>
                                @if ($errors->has('email'))
                                            <span style="color: red; margin-left: 70px;">{{ $errors->first('email') }}</span>
                                        @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPhone" class="form-label mr-3"><i class="fa
                                            fa-phone" aria-hidden="true"></i></label>
                                    <input type="tel" class="form-control" name="phone" id="exampleInputPhone" placeholder= "Số điện thoại" aria-describedby="PhoneHelp">
                                </div>
                                @if ($errors->has('phone'))
                                            <span style="color: red; margin-left: 70px;">{{ $errors->first('phone') }}</span>
                                        @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPassword " class="form-label mr-3"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </label>
                                    <input type="password" class="form-control" name="password" placeholder= "Mật khẩu" id="exampleInputPassword">
                                </div>
                                @if ($errors->has('password'))
                                            <span style="color: red; margin-left: 70px;">{{ $errors->first('password') }}</span>
                                    @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPassword " class="form-label mr-3"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </label>
                                    <input type="password" class="form-control" name="re_password" placeholder= "Xác nhận mật khẩu" id="exampleInputPassword">
                                </div>
                               @if ($errors->has('re_password'))
                                            <span style="color: red; margin-left: 70px;">{{ $errors->first('re_password') }}</span>
                                    @endif
                               
                                <div class="forn-btn">

                                    <button type="submit" class="btn btn-primary btn-register">ĐĂNG KÝ</button>
                                    <p class="link mt-1">Nếu bạn có tài khoản , hãy <a href="{{ route('frontend.login.show') }}" class="pl-1">ĐĂNG NHẬP?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <span class="back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
       

</body>
@endsection