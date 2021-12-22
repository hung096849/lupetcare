@extends('layouts.frontend')
@section('content')
<div class="list-service loading-page">
    <div class="container-fluid container-padding">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="list_cate ">
                    <ul class="nav nav-tabs list-group" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#all" role="tab" aria-selected="true">Tất cả</a>
                        </li>
                        @foreach ($categories as $item)
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu{{ $item->id }}" role="tab" aria-selected="false"> {{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="pro-cate">
                    <div class="tab-content">
                        <div class="tab-pane active" id="all" role="tabpanel">
                            <div class="row all">
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
                        </div>
                        <div class="tab-pane" id="menu1" role="tabpanel">
                            <div class="row menu1">
                                @foreach ($serviceBasic as $service)
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
                        </div>
                        <div class="tab-pane" id="menu2" role="tabpanel">
                            <div class="row menu2">
                                @foreach ($serviceWC as $service)
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
                        </div>
                        <div class="tab-pane" id="menu3" role="tabpanel">
                            <div class="row menu3">
                                @foreach ($serviceAdvanced as $service)
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
                        </div>
                        <div class="tab-pane" id="menu4" role="tabpanel">
                            <div class="row menu4">
                                @foreach ($serviceBeautify as $service)
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
                        </div>
                        <div class="tab-pane" id="menu5" role="tabpanel">
                            <div class="row menu5">
                                @foreach ($serviceDifferent as $service)
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
                        </div>
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