@extends('layouts.frontend')
@section('content')

        <section class="register loading-page">
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
                            <span class="sub mb-4">Nhập địa chỉ email được liên kết với tài khoản của
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
                                   
                                </div>
                                @if ($errors->has('email'))
                                        <span style="margin-left: 50px;" class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                               

                                <div class="forn-btn">

                                <button type="submit" class="btn btn-primary btn-register button" onclick="this.classList.toggle('button--loading')"><span class="button__text">Tiếp tục</span></button>
                                   
                                    <p class="link mt-1"> <a href="{{ route('frontend.login.show') }}" class="pl-1"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Quay lại trang đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <span class="back-to-top" style="display: none;"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
@endsection