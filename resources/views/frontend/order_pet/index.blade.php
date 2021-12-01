@extends('layouts.frontend')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/my-account.css') }}">

<section class="my-account">
  <div class="container container-fluid container-padding">
    <div class="row">
      <div class="col-12 col-md-3">
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
                      data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-user
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

                      <li><a href="{{ route('frontend.customers.show') }}">Đổi mật khẩu</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <a href="{{ route('frontend.profile-pet') }}" class="list-text t-lisst
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
        @foreach ($orders as $item)
        <div class="content-account">
          <div class="title-content d-flex justify-content-between px-4 py-4">
            <span class="text">Đơn hàng : {{ $item->order_code }}</span>
            <span class="sub"> {{ $customer->name }}
              <i class="fa fa-heart pl-2 text-danger" aria-hidden="true"></i></span>
          </div>
          <div class="content-account-list">
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="item">
                  <span class="title t-text">Tổng tiền :</span>
                  <span class="sub t-text">{{ $item->total_price }} <b>VNĐ</b></span>
                </div><br>
                <div class="item">
                  <span class="title t-text">Ngày :</span>
                  <span class="sub t-text">{{ $item->created_at }}</span>
                </div>
                <div class="item">
                  <span class="title t-text">Xem chi tiết</span>
                  <span class="sub t-text"><a href="">Click</a></span>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="images">
                  <img src="{{ asset('frontend/images/img-hot_service.png') }}" class="img d-block" />
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection