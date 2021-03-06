@extends('layouts.frontend')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1,
            viewport-fit=cover" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/my-account.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme/frontend/css/loading.css') }}">


    <body class="scrollstyle1 ">
        <section class="my-account  loading-page">
            <div class="container container-fluid container-padding">
                <div class="row">
                    <div class="col-12 col-lg-3 mt-3">
                        <div class="cate-account">
                            <div class="name d-flex align-items-center
                                justify-content-center">
                                <div class="images">
                                    <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" srcset="">
                                </div>
                                <span class="title">{{ Auth::guard('customers')->user()->name }}</span>
                            </div>
                            <div class="list-cateaccount">
                                <div class="accordion my-3"
                                    id="accordionExample">

                                    <div class="card border-0 list-item">
                                        <div class="card-header p-0"
                                            id="headingOne">
                                            <h2 class="clearfix mb-0">
                                                <a class="btn btn-link d-block
                                                    text-left list-text acctive"
                                                    data-toggle="collapse"
                                                    data-target="#collapseOne"
                                                    aria-expanded="true"
                                                    aria-controls="collapseOne"><i
                                                        class="fa fa-user
                                                        icon-user"></i> T??i
                                                    kho???n c???a t??i<i class="fa
                                                        fa-angle-down smooth
                                                        icon-down"></i></a>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse"
                                            aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="{{ route('frontend.customers.profile') }}">H???
                                                            s??</a></li>
                                                   

                                                    <li><a href="{{ route('frontend.customers.show') }}">?????i m???t kh???u</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <a href="{{ route('frontend.order.customer') }}" class="list-text t-lisst
                                    d-block"><i class="fa fa-briefcase
                                        icon-user"
                                        aria-hidden="true"></i>????n h??ng </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-9 mt-3">
                        <div class="content-account">
                            <div class="title-content px-4 py-4">
                                <span class="text">Th??ng tin c???a t??i</span>
                            </div>
                            <div class="content-account-list">
                                    <div class="row">
                                        <div class="col-12 col-md-6 p-0 m-0">
                                            <form class="form-change"method="POST" action="{{ route('frontend.customers.changeProfile') }}">
                                                @csrf
                                            <div class="form-group d-flex
                                                align-items-center">
                                                <label for="exampleInputName">H???
                                                    v?? t??n:</label>
                                                <input type="text"
                                                    class="form-control"
                                                    id="exampleInputName"
                                                    name="name"
                                                    value="{{old('name', Auth::guard('customers')->user()->name)}}">
                                            </div>
                                            <div class="form-group d-flex
                                                align-items-center">
                                                <label for="exampleInputPhone">S???
                                                    ??i???n tho???i:</label>
                                                <input type="phone"
                                                     name="phone"
                                                    class="form-control"
                                                    id="exampleInputPhone"
                                                    value="{{old('phone', Auth::guard('customers')->user()->phone)}}">
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <button type="submit" class="btn btn-info px-5 py-2 button"onclick="this.classList.toggle('button--loading')"><span class="button__text">L??u</span></button>
                                            </form>
                                    </div>
                                           
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="images">
                                              <img src="{{ asset('frontend/images/img-hot_service.png') }}" class="img d-block">
                                            </div>
                                          </div>
                                    </div>

                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
@endsection        