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
<link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/my-account.css') }}">

<section class="my-account">
    <div class="container container-fluid container-padding">
        <div class="row">
            <div class="col-12 col-md-3 mt-3">
                <div class="cate-account">
                    <div class="name d-flex align-items-center
                                justify-content-center">
                        <div class="images">
                            <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" srcset="">
                        </div>
                        <span class="title">{{ Auth::guard('customers')->user()->name }}</span>
                    </div>
                    <div class="list-cateaccount">
                        <div class="accordion my-3" id="accordionExample">

                            <div class="card border-0 list-item">
                                <div class="card-header p-0" id="headingOne">
                                    <h2 class="clearfix mb-0">
                                        <a class="btn btn-link d-block
                                                    text-left list-text acctive" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne"><i class="fa fa-user icon-user"></i> Tài khoản<i class="fa fa-angle-down smooth icon-down"></i></a>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="{{ route('frontend.customers.profile') }}">Hồ sơ</a></li>
                                            <li><a href="{{ route('frontend.customers.showProfile') }}">Đổi thông tin</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('frontend.order.customer') }}" class="list-text t-lisst
                                    d-block"><i class="fa fa-briefcase
                                        icon-user" aria-hidden="true"></i>Đơn hàng </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-9 mt-3">
                <div class="content-account">
                    <div class="title-content px-4 py-4">
                        <span class="text">Đổi mật khẩu</span>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <div class="content-account-list">
                        <form class="form-change" method="POST" action="{{ route('frontend.customers.changepass') }}">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach
                            <div class="row">
                                <div class="col-12 col-md-8 p-0 m-0">
                                    <div class="form-group d-flex
                                                align-items-center">
                                        <label for="password">Mật khẩu cũ </label>
                                        <input type="password" class="form-control" id="password" value=""
                                            name="current_password">

                                    </div>
                                    <div class="form-group d-flex
                                                align-items-center">
                                        <label for="password">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="password" value=""
                                            name="new_password">
                                    </div>
                                    <div class="form-group d-flex
                                                align-items-center">
                                        <label for="password">Xác nhận lại mật khẩu</label>
                                        <input type="password" class="form-control" id="password" value=""
                                            name="new_confirm_password">
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex align-items-center
                                        justify-content-center mt-3">
                                <button type="submit" class="btn
                                            btn-info px-5 py-2">Thay đổi</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection