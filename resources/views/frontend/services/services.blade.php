@extends('layouts.frontend')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/list-service.css') }}" />

<div class="list-service loading-page">
    <div class="container-fluid container-padding">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="list_cate">
                    <ul>
                        @foreach ($categories as $item)
                                <li><a data-toggle="tab" href="#menu{{ $item->id }}">{{ $item->name }} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="pro-cate">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="item_pro-cate">
                                    <div class="images d-block run_hv"><img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="img_ w-100">
                                    </div>  
                                    <div class="item_content">
                                        <h4 class="name">
                                            <a href="{{ route('frontend.services.detail',$service->id) }}"> {{ $service->service_name }}</a>
                                        </h4>
                                        <p class="price">
                                            {{ $service->price }} VNĐ
                                        </p>
                                        <span class="time"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{ $service->time }}</span>
                                        <div class="item_btn d-flex
                                            justify-content-center mt-4">
                                            <button type="button" class="btn
                                                mr-3"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                            <a href="{{ route('frontend.order_services.order') }} " class="btn
                                                btn-info bright
                                                d-flex
                                                justify-content-center
                                                align-items-center" data-toggle="modal" data-target="#exampleModal">Đặt lịch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Lupetcare trân trọng cám ơn</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Vui lòng chọn phương thức đặt lịch 
                            </div>
                            <div class="modal-footer d-flex justify-content-center"">
                              <a name="" id="" class="btn btn-primary" href="{{ route('frontend.order_services.order-normal') }}" role="button">Đặt lịch thông thường</a>
                              <a name="" id="" class="btn btn-success" href="{{ route('frontend.order_services.order') }}" role="button">Đặt lịch ưu tiên</a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="banner-ft">
    <a href="#" class="d-block images">
        <img src="{{ asset('frontend/images/banner-ft.png') }}" alt="" class="w-100" srcset="">
    </a>
</section>

@endsection