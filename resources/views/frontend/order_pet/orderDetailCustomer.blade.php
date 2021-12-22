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
          {{-- <div class="list-cateaccount">
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
              <a href="{{ route('frontend.order.customer') }}" class="list-text t-lisst d-block"><i
                  class="fa fa-briefcase icon-user" aria-hidden="true"></i>Đơn hàng </a>
              </a>
            </div>
          </div> --}}

          <div class="list-cateaccount">
            <div class="accordion my-3" id="accordionExample">

              <div class="card border-0 list-item">
                <div class="card-header p-0" id="headingOne">
                  <h2 class="clearfix mb-0">
                    <a class="btn btn-link d-block
                                        text-left list-text acctive" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-user icon-user"></i> Tài khoản<i
                        class="fa fa-angle-down smooth icon-down"></i></a>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
      <div class="col-12 col-md-9">
        <h2>
          <p class="">Mã đơn hàng : {{ $order->order_code }}</p>
          <p>Trạng thái : 
            @if($order->status == App\Models\Order::STATUS_IN_PROCESS)
                <span class="text-warning">Chờ đặt lịch</span>
            @elseif($order->status == App\Models\Order::STATUS_PROCESS)
                <span class="text-info">Đã xếp lịch</span>
            @elseif($order->status == App\Models\Order::STATUS_PRIORITIZE)
                <span class="text-info">Ưu tiên</span>
            @else
                <span class="text-success">Sử dụng xong</span>
            @endif
          </p>
          <p>
            Thanh toán : 
            @if($order->is_paid === App\Models\Order::UNPAID)
                <span class="text-danger">Chưa thanh toán</span>
            @elseif($order->is_paid === App\Models\Order::PAID)
                <span class="text-info">Đã thanh toán</span>
            @else
                <span class="text-warning">Đã cọc</span>
            @endif
          </p>
          <p>
            Tổng tiền : {{ number_format($order->total_price) }} VNĐ
          </p>
        </h2>
        <table class="table text-center">
          <thead>
            <tr class="font-weight-bold">
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
              <td>
                @php
                $weight = "";
                foreach (Config::get('dataWeight.WEIGHT') as $key => $value) {
                if($item->quantity === $key) $weight = $value;
                }
                @endphp
                Loại : {{ $weight }}</td>
              <td> {{ $item->petServices->price*$item->quantity }} VNĐ</td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</section>

@endsection