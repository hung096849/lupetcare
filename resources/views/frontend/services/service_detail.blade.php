@extends('layouts.frontend')
@section('content')
    <div class="service-detail">
        <div class="container-fluid container-padding">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cat Foods</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Various
                        Purina Friskies Cats</li>
                </ol>
            </nav>
            <div class="content-detail">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="images d-block">
                            <img src="{{ asset('frontend/images/img-blog-home-2.png') }}" class="w-100 img" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="content-item">
                            <h2 class="name">TẮM RỬA CƠ BẢN</h2>
                            <p class="price">Gía: 100.000</p>
                            <p class="time">Thời gian : 20 phút</p>
                            <div class="steps">
                                <p class="text">Các bước thực hiện</p>
                                <div class="s-content">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Tenetur eligendi in
                                    tempora ex rerum odio, quae optio iusto,
                                    facilis eum placeat. Facilis tempore
                                    assumenda et est nihil sit. Repellat,
                                    excepturi?
                                </div>
                            </div>
                            <div class="button-book d-flex
                            justify-content-center mt-4">
                                <div type="button" class="btn  "><i class="fa fa-heart-o" aria-hidden="true"></i>
                                </div>
                                <button type="button" class="btn btn-outline-info bright btn__book">
                                    <a href="{{ route('frontend.order_services.order', $service->id) }}">Đặt lịch</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-service">
                    <ul class="nav nav-tabs border-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#Information" role="tab"
                                aria-selected="true">THÔNG TIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#description" role="tab"
                                aria-selected="false">MÔ TẢ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#evaluate" role="tab"
                                aria-selected="false">ĐÁNH GIÁ</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Information" role="tabpanel">
                            <div class="information">
                                <div class="s-content">
                                    Chicken By-Product Meal, Brewers Rice, Animal Fat Preserved With Mixed-Tocopherols, Corn
                                    Gluten Meal, Animal Liver Flavor, Fish, Natural And Artificial Flavors, Turkey
                                    By-Product Meal, Phosphoric Acid, Calcium Carbonate, Dried Chicken Flavored Gravy, Added
                                    Color, Brewers Dried Yeast, Salt, Choline Chloride, Minerals [Zinc Sulfate, Ferrous
                                    Sulfate, Manganese Sulfate, Copper Sulfate, Calcium Iodate, Sodium Selenite], Taurine,
                                    L-Ascorbyl-2-Polyphosphate (Vitamin C), Vitamins [Vitamin E Supplement, Niacin (Vitamin
                                    B-3), Vitamin A Supplement, Calcium Pantothenate (Vitamin B-5), Thiamine Mononitrate
                                    (Vitamin B-1), Riboflavin Supplement (Vitamin B-2), Vitamin B-12 Supplement, Pyridoxine
                                    Hydrochloride (Vitamin B-6), Folic Acid (Vitamin B-9), Vitamin D-3 Supplement, Biotin
                                    (Vitamin B-7), Menadione Sodium Bisulfite Complex (Vitamin K)], Yellow 5, Red 40, Citric
                                    Acid, Blue 2, BHA (A Preservative), BHT (A Preservative). B623318.
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="description" role="tabpanel">
                            <div class="description">
                            </div>
                        </div>
                        <div class="tab-pane" id="evaluate" role="tabpanel">
                            <div class="evaluate ">
                                <section class="content-item" id="comments">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                @if (Auth::guard('customers')->check())
                                                    <form action="{{ route('frontend.service.comment', $service->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <h3 class="pull-left">New Comment</h3>
                                                        <button type="submit"
                                                            class="btn btn-primary pull-right">Đăng bình luận</button>
                                                        <fieldset>
                                                            <div class="row">
                                                                <div class="col-sm-3 col-lg-2 hidden-xs">
                                                                    <img class="img-responsive"
                                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                        alt="">
                                                                </div>
                                                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                                    <textarea class="form-control" id="message"
                                                                        name="content" required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                @endif

                                                @foreach ($comments as $c)
                                                    <div class="media">
                                                        <a class="pull-left" href="#"><img class="media-object"
                                                                src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt=""></a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ $c->customer->name }}</h4>
                                                            <p>{{ $c->content }}</p>
                                                            <ul class="list-unstyled list-inline media-detail pull-left">
                                                                <li><i class="fa fa-calendar"></i>{{ $c->created_at }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
