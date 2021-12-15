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
                    <div class="col-12 col-md-7 m-0 p-0 image-hide">
                        <div class="images d-block run_hv">
                            <img src="{{ asset('frontend/images/img-new_service.png ') }}" alt="" class="w-100" srcset="">
                        </div>

                    </div>
                    <div class="col-12 col-md-5 m-0 p-0">
                        <div class="register_form">
                            <h4 class="title w-100">QUÊN MẬT KHẨU</h4>
                            <span class="sub mb-4">Nhập địa chỉ email hoặc số điện
                                thoại di động được liên kết với tài khoản của
                                bạn.</span>
                                
                      @if (Session::has('message'))
                           <div class="alert alert-success" role="alert">
                              {{ Session::get('message') }}
                          </div>
                      @endif
                            <form class="w-100"action="{{ route('frontend.login.forget.password.post') }}" method="POST">
                            @csrf
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputEmail1" class="form-label "><i class="fa
                                            fa-envelope-o" aria-hidden="true"></i></label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                               

                                <div class="forn-btn">

                                    <button type="submit" class="btn btn-primary
                                        btn-register">Tiếp Tục</button>
                                   
                                    <p class="link mt-1"> <a href="{{ route('frontend.login.show') }}" class="pl-1"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Quay lại trang đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <span class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
       
    

</body>
@endsection