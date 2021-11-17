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

<section class="my-account">
            <div class="container container-fluid container-padding">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="cate-account">
                            <div class="name d-flex align-items-center
                                justify-content-center">
                                <div class="images">
                                    <img src="theme/frontend/images/img-hot_service.png" alt="" srcset="">
                                </div>
                                <span class="title">ThuTra Mai</span>
                            </div>
                            <div class="list-cateaccount">
                                <div class="accordion my-3" id="accordionExample">

                                    <div class="card border-0 list-item">
                                        <div class="card-header p-0" id="headingOne">
                                            <h2 class="clearfix mb-0">
                                                <a class="btn btn-link d-block
                                                    text-left list-text acctive" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-user
                                                        icon-user"></i> Tài
                                                    khoản của tôi<i class="fa
                                                        fa-angle-down smooth
                                                        icon-down"></i></a>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#" class="acctive">Hồ
                                                            sơ</a></li>
                                                    <li><a href="#">Đổi thông
                                                            tin</a></li>

                                                    <li><a href="#">Đổi mật khẩu</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="./pet-acc.html" class="list-text t-lisst
                                        d-block"><i class="fa fa-paw icon-user" aria-hidden="true"></i>Thú cưng của
                                        tôi </a>
                                    <a href="./change-account.html" class="list-text t-lisst
                                        d-block"><i class="fa fa-briefcase
                                            icon-user" aria-hidden="true"></i>Đơn mua </a>
                                    <a href="./purchase-order.html" class="list-text t-lisst
                                        d-block"><i class="fa fa-bell icon-user" aria-hidden="true"></i>Thông báo
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-9">
                        <div class="content-account">
                            <div class="title-content px-4 py-4">
                                <span class="text">Thông tin của tôi</span>
                            </div>
                            <div class="content-account-list">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="item">
                                            <span class="title t-text">Tên đăng
                                                nhập :</span>
                                            <span class="sub t-text"> ThuTra Mai</span>
                                        </div>
                                        <div class="item">
                                            <span class="title t-text">Họ và tên
                                                : </span>
                                            <span class="sub t-text"> Mai Thu
                                                Trà</span>
                                        </div>
                                        <div class="item">
                                            <span class="title t-text">Email:
                                            </span>
                                            <span class="sub t-text">tramtph11386@fpt.edu.vn</span>
                                        </div>
                                        <div class="item">
                                            <span class="title t-text">Số điện
                                                thoại : </span>
                                            <span class="sub t-text">
                                                01111111111</span>
                                        </div>
                                        <div class="item">
                                            <span class="title t-text">Sinh nhật
                                                : </span>
                                            <span class="sub t-text">15 / 12/
                                                2001</span>
                                        </div>
                                        <div class="item">
                                            <span class="title t-text">Giới tính
                                                : </span>
                                            <span class="sub t-text">Nữ</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="images">

                                            <img src="theme/frontend/images/img-hot_service.png" alt="" class="img d-block">
                                            <p class="title d-block">Ảnh đại
                                                diện</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection