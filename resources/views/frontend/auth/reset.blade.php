<title>Mật khẩu mới</title>
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/swiper.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/register.css') }}" />

    <body class="scrollstyle1">
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 m-0 p-0">
                        <div class="images d-block run_hv">
                            <img src="{{ asset('frontend/images/img-footer.png ') }}"
                                alt="" class="w-100" srcset="">
                        </div>

                    </div>
                    <div class="col-12 col-md-5 m-0 p-0">
                        <div class="register_form">
                            <h4 class="title w-100">Nhập mật khẩu mới</h4>
                            <form class="w-100"action="{{ route('frontend.login.reset.password.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputEmail1"
                                        class="form-label "><i class="fa
                                            fa-envelope-o" aria-hidden="true"></i></label>
                                            <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Nhập lại email">

                                </div>
                                @if ($errors->has('email'))
                                        <span style="margin-left: 50px;" class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPassword "
                                        class="form-label "><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </label>
                                    <input type="password" id="password" class="form-control" name="password" required autofocus placeholder="Mật khẩu">
                                  
                                </div>
                                @if ($errors->has('password'))
                                        <span style="margin-left: 50px;" class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif 
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPassword "
                                   class="form-label "><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </label>
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus placeholder="Nhập lại mật khẩu">
                                   
                                </div>
                                @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                <div class="forn-btn">

                                    <button type="submit" class="btn btn-primary btn-register">Xác nhận</button>
                                    <p class="link mt-1">Nếu bạn có tài khoản , hãy <a href="#" class="pl-1">ĐĂNG NHẬP?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


      
    </body>

</html>
