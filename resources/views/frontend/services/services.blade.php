@extends('layouts.frontend')
@section('content')

<div class="list-service">
    <div class="container-fluid container-padding">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="list_cate">
                    <ul>
                        <li class="active"><a href="#">Chăm sóc cơ
                                bản
                            </a></li>
                        <li><a href="#"> Vệ sinh </a></li>
                        <li><a href="#">Làm đẹp thú cưng</a></li>
                        <li><a href="#">Combo </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="pro-cate">

                    <div class="row">
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="item_pro-cate">
                                <div class="images d-block run_hv"><img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="img_ w-100">
                                </div>
                                <div class="item_content">
                                    <h4 class="name">
                                        <a href="{{ route('frontend.services.detail') }}">Cắt tỉa móng cơ bản</a>
                                    </h4>
                                    <p class="price">50.000</p>
                                    <span class="time"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>20 PHÚT</span>
                                    <div class="item_btn d-flex
                                        justify-content-center mt-4">
                                        <button type="button" class="btn
                                            mr-3"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        <a href="{{ route('frontend.order_services.show') }}" class="btn
                                            btn-info bright
                                            d-flex
                                            justify-content-center
                                            align-items-center">Đặt lịch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="item_pro-cate">
                                <div class="images d-block run_hv"><img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="img_ w-100">
                                </div>
                                <div class="item_content">
                                    <h4 class="name">
                                        Cắt tỉa móng cơ bản
                                    </h4>
                                    <p class="price">50.000</p>
                                    <span class="time"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>20 PHÚT</span>
                                    <div class="item_btn d-flex
                                        justify-content-center mt-4">
                                        <button type="button" class="btn
                                            mr-3"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        <a href="#" class="btn
                                            btn-info bright
                                            d-flex
                                            justify-content-center
                                            align-items-center">Đặt lịch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="item_pro-cate">
                                <div class="images d-block run_hv"><img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="img_ w-100">
                                </div>
                                <div class="item_content">
                                    <h4 class="name">
                                        Cắt tỉa móng cơ bản
                                    </h4>
                                    <p class="price">50.000</p>
                                    <span class="time"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>20 PHÚT</span>
                                    <div class="item_btn d-flex
                                        justify-content-center mt-4">
                                        <button type="button" class="btn
                                            mr-3"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        <a href="#" class="btn
                                            btn-info bright
                                            d-flex
                                            justify-content-center
                                            align-items-center">Đặt lịch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="item_pro-cate">
                                <div class="images d-block run_hv"><img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="img_ w-100">
                                </div>
                                <div class="item_content">
                                    <h4 class="name">
                                        Cắt tỉa móng cơ bản
                                    </h4>
                                    <p class="price">50.000</p>
                                    <span class="time"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>20 PHÚT</span>
                                    <div class="item_btn d-flex
                                        justify-content-center mt-4">
                                        <button type="button" class="btn
                                            mr-3"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        <a href="#" class="btn
                                            btn-info bright
                                            d-flex
                                            justify-content-center
                                            align-items-center">Đặt lịch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item ">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                          </li>
                        </ul>
                      </nav>
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