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
                      <p>Mã đơn hàng {{ $order->order_code }}</p>
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
                <a href="" class="list-text t-lisst
                                  d-block"><i class="fa fa-paw icon-user" aria-hidden="true"></i>Thú cưng của
                  tôi </a>
                <a href="{{ route('frontend.order.customer') }}" class="list-text t-lisst
                                  d-block"><i class="fa fa-briefcase
                                      icon-user" aria-hidden="true"></i>Đơn hàng của tôi </a>
                <a href="./purchase-order.html" class="list-text t-lisst
                                  d-block"><i class="fa fa-bell icon-user" aria-hidden="true"></i>Thông báo
                </a>
              </div>
            </div>
          </div>
  
        </div>
        <div class="col-12 col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Mã</th>
                        <th>Dịch vụ sử dụng</th>
                        <th>Giá</th>
                        <th>Cân nặng</th>
                        <th>Giá theo cân nặng</th>
                    </tr>
                </thead>
          @foreach ($orderPet as $item)
                <tbody>
                    <tr>
                        <td> {{ $item->petInformation->name }}</td>
                        <td> {{ $item->petInformation->code }}</td>
                        <td> {{ $item->petServices->service_name }}</td>
                        <td> {{ $item->petServices->price }}</td>
                        <td> Loại {{ $item->petInformation->weight }}</td>
                        <td> {{ $item->petServices->price*$item->quantity }}</td>
                    </tr>
                </tbody>
          @endforeach
            </table>
        </div>
      </div>
    </div>
  </section>

@endsection
