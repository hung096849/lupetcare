@extends('layouts.frontend')
@section('content')
        <section class="register">
            <div class="container">
                <div class="row">
                <div class="col-12 col-md-7 m-0 p-0 image-hide">
                        <div class="images d-block run_hv ">
                            <img src="{{ asset('frontend/images/img-new_service.png ') }}"
                                alt="" class="w-100" srcset="">
                        </div>

                    </div>

                    <div class="col-12 col-md-5 m-0 p-0 ">
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
                                        id="exampleInputUserName" placeholder="Email"
                                        name="email" value="{{ old('email') }}">
                                      
                                </div>
                                @if ($errors->has('email'))
                                        <span style="color: red; margin-left: 70px;">{{ $errors->first('email') }}</span>
                                    @endif
                                <div class="mb-3 d-flex">
                                    <label for="exampleInputPassword "
                                        class="form-label mr-3"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </label>
                                    <input type="password" placeholder="Mật khẩu" class="form-control" name="password"
                                        id="exampleInputPassword">
                                
                                </div>
                                @if ($errors->has('password'))
                                            <span style="color: red; margin-left: 70px;">{{ $errors->first('password') }}</span>
                                        @endif
                                <div class="forn-btn">

                                    <button type="submit" class="btn btn-primary btn-register button" onclick="this.classList.toggle('button--loading')"><span class="button__text">Đăng nhập</span></button>
                                    <p class="link mt-1">Nếu bạn chưa có tài khoản , hãy <a href="{{ route('frontend.login.register-user') }}" class="pl-1">ĐĂNG KÝ?</a></p>
                                    <p class="link mt-1"> <a href="{{ route('frontend.login.forget.password.get') }}" class="pl-1">Quên mật khẩu?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <span class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
@endsection