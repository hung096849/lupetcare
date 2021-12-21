@extends('layouts.frontend')
@section('content')

<section class="cate-home  loading-page">
    <div class="title-home">
        <img src="{{ asset('frontend/images/icon-cate-home.png') }}" alt="" class="title-icon d-block mb-3">
        <span class="title">LuPet Care</span>
    </div>
    <div class="container ">

        <div class="swiper mySwiper list-cate-swiper swiper-container-initialized swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                <div class="swiper-slide swiper-slide-active" style="width: 204px; margin-right: 30px;">

                    <div class="item">
                        <div class="d-block images">
                            <img src="{{ asset('frontend/images/img-cate-1.png') }}" alt="" class="w-100">
                        </div>
                        <a href="#" class="d-block item-title mt-3">
                            Chăm sóc cơ bản
                        </a>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-next" style="width: 204px; margin-right: 30px;">

                    <div class="item">
                        <div class="d-block images">
                            <img src="{{ asset('frontend/images/img-cate-2.png') }}" alt="" class="w-100">
                        </div>
                        <a href="#" class="d-block item-title mt-3">
                            Vệ sinh
                        </a>
                    </div>
                </div>
                <div class="swiper-slide" style="width: 204px; margin-right: 30px;">

                    <div class="item">
                        <div class="d-block images">
                            <img src="{{ asset('frontend/images/img-cate-3.png') }}" alt="" class="w-100">
                        </div>
                        <a href="#" class="d-block item-title mt-3">
                            Chăm sóc cơ bản
                        </a>
                    </div>
                </div>
                <div class="swiper-slide" style="width: 204px; margin-right: 30px;">

                    <div class="item">
                        <div class="d-block images">
                            <img src="{{ asset('frontend/images/img-cate-4.png') }}" alt="" class="w-100">
                        </div>
                        <a href="#" class="d-block item-title mt-3">
                            Làm đẹp
                        </a>
                    </div>
                </div>
                <div class="swiper-slide" style="width: 204px; margin-right: 30px;">

                    <div class="item">
                        <div class="d-block images">
                            <img src="{{ asset('frontend/images/img-cate-5.png') }}" alt="" class="w-100">
                        </div>
                        <a href="#" class="d-block item-title mt-3">
                            Combo
                        </a>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination swiper-cate-home d-none swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
</section>

<section class="new-service">
    <div class="title-home">
        <span class="title">Dịch vụ mới</span>
    </div>
    <div class="container">
        <div class="list-new-service">
            <div class="row">
                @foreach ($serviceNew as $item)
                    <div class="col-6 col-md-3">
                        <div class="item">
                            <div class="d-block images">
                                <img src="{{ asset('frontend/images/img-new_service.png') }}" alt="" class="w-100">
                            </div>
                            <a href="#" class="d-block item-title mt-3">
                                Căt tỉa cơ bản
                            </a>
                            <p class="item-price mt-2">50.000 đ</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="hot-service">
    <div class="title-home">
        <span class="title">Dịch vụ sử dụng nhiều</span>
    </div>
    <div class="container">
        <div class="list-hot-service">
            <div class="row">
                @foreach ($serviceHot as $service)
                <div class="col-6 col-md-3">
                    <div class="item">
                        <div class="d-block images">
                            <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100">
                        </div>
                        <a href="#" class="d-block item-title mt-3">
                            Căt tỉa cơ bản
                        </a>
                        <p class="item-price mt-2">50.000 đ</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

<section class="blog-home">
    <div class="container">
        <div class="blog-home_title ">
            <h4 class="title">Tin khuyến mãi</h4>

        </div>
        <div class="blog-home_container">
            <div class="swiper mySwiper slide_blog-home overflow-hidden swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-1170px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="4" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="3" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="4" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 360px; margin-right: 30px;">
                        <div class="item">
                            <div class="images d-block run_hv">
                                <img src="{{ asset('frontend/images/img-hot_service.png') }}" alt="" class="w-100" srcset="">
                            </div>
                            <div class="item_content">
                                <a href="#" class="d-block
                                    item_content_title">Giống
                                    chó Alaskan Malamute: khổng lồ liệu
                                    giá có rẻ?</a>
                                <div class="s-content d-block mb-3">
                                    <p>Giống chó Alaskan
                                        Malamute hay chó Alaska, là một
                                        trong những giống chó kéo xe cổ
                                        xưa
                                        nhất trên thế giới. Tên của
                                        giống
                                        chó này được đặt theo tên
                                        Mahlemut,
                                        một bộ tộc Eskimo sống du mục ở
                                        phía
                                        tây Alaska. Giống chó này được
                                        sử
                                        dụng làm chó kéo xe nhờ sức chịu
                                        đựng phi thường của chúng. Hiện
                                        nay
                                        chúng được nuôi chủ yếu để
                                        làm...</p>
                                </div>
                                <a href="#" class="item_btn">Đọc tiếp</a>
                            </div>
                        </div>
                    </div></div>
                <div class="swiper-pagination d-none blog-home_pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>

    </div>
</section>

<section class="user-comment">
    <div class="container-fluid p-0">
        <div class="swiper mySwiper swiper-user-comment overflow-hidden swiper-container-initialized swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                <div class="swiper-slide swiper-slide-active" style="width: 1519px;">
                    <div class="item">
                        <div class="row">
                            <div class="col-12 col-md-6 p-0">
                                <div class="images">
                                    <img src="{{ asset('frontend/images/img-customer-comment.png') }}" alt="" class="w-100">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-0">
                                <div class="content">
                                    <h3 class="title d-block">KHÁCH HÀNG
                                        NHẬN XÉT</h3>
                                    <p class="text d-block">
                                        “ It came to me that every time
                                        I lose a dog they take a piece
                                        of my heart with them, and every
                                        new dog who comes into my life
                                        gifts me with a piece of their
                                        heart. If I live long enough,
                                        all the components of my heart
                                        will be dog, and I will become
                                        as generous and loving as they
                                        are. “-
                                    </p>
                                    <span class="name">Joe - Korean
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-next" style="width: 1519px;">
                    <div class="item">
                        <div class="row">
                            <div class="col-12 col-md-6 p-0">
                                <div class="images">
                                    <img src="{{ asset('frontend/images/img-customer-comment.png') }}" alt="" class="w-100">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-0">
                                <div class="content">
                                    <h3 class="title d-block">KHÁCH HÀNG
                                        NHẬN XÉT</h3>
                                    <p class="text d-block">
                                        “ It came to me that every time
                                        I lose a dog they take a piece
                                        of my heart with them, and every
                                        new dog who comes into my life
                                        gifts me with a piece of their
                                        heart. If I live long enough,
                                        all the components of my heart
                                        will be dog, and I will become
                                        as generous and loving as they
                                        are. “-
                                    </p>
                                    <span class="name">Joe - Korean
                                    </span>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="width: 1519px;">
                    <div class="item">
                        <div class="row">
                            <div class="col-12 col-md-6 p-0">
                                <div class="images">
                                    <img src="{{ asset('frontend/images/img-customer-comment.png') }}" alt="" class="w-100">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-0">
                                <div class="content">
                                    <h3 class="title d-block">KHÁCH HÀNG
                                        NHẬN XÉT</h3>
                                    <p class="text d-block">
                                        Tôi nghĩ rằng mỗi khi tôi mất một con chó, họ sẽ mang theo một mảnh trái tim của tôi, và mỗi con chó mới bước vào đời tôi đều tặng cho tôi một mảnh trái tim của chúng. Nếu tôi sống đủ lâu, tất cả các thành phần trong trái tim tôi sẽ giống như loài chó, và tôi sẽ trở nên hào phóng và yêu thương như chúng
                                    </p>
                                    <span class="name">Joe - Korean
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next comment-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
            </div>
            <div class="swiper-button-prev comment-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true">
                <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
            </div>
            <div class="swiper-pagination comment-pagination d-none swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
</section>

<section class="images-instagram">
    <div class="title-home d-flex justify-content-center">
        <img src="{{ asset('frontend/images/icons_instagram.png') }}" alt="" class="title-icon mr-3">
        <span class="title mt-2">LuPet Care</span>
    </div>
    <div class="container-fluid p-0">
        <div class="swiper mySwiper swiper-instagram swiper-container-initialized swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                <div class="swiper-slide swiper-slide-active" style="width: 303.8px;">
                    <div class="item">
                        <img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-next" style="width: 303.8px;">
                    <div class="item">
                        <img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="swiper-slide" style="width: 303.8px;">
                    <div class="item">
                        <img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="swiper-slide" style="width: 303.8px;">
                    <div class="item">
                        <img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="swiper-slide" style="width: 303.8px;">
                    <div class="item">
                        <img src="{{ asset('frontend/images/img-in.png') }}" alt="" class="w-100">
                    </div>
                </div>


            </div>
            <div class="swiper-pagination d-none instagram-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
</section>

<section class="benefit">
    <div class="title-home d-flex justify-content-center">

        <span class="title mt-2">What your pet needs, when they need it.</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="item">
                    <div class="images">
                        <img src="{{ asset('frontend/images/phone.png') }}" alt="" class="">
                    </div>
                    <span class="title">Hỗ trợ 24/7</span>
                    <p class="sub d-block">
                        Free shipping on all US order or order above $99
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="item">
                    <div class="images">
                        <img src="{{ asset('frontend/images/icon-park_return.png') }}" alt="" class="">
                    </div>
                    <span class="title">Chăm sóc khách hàng</span>
                    <p class="sub d-block">
                        Free shipping on all US order or order above $99
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="item">
                    <div class="images">
                        <img src="{{ asset('frontend/images/icon_diamond.png') }}" alt="" class="">
                    </div>
                    <span class="title">Thanh toán qua thẻ</span>
                    <p class="sub d-block">
                        Free shipping on all US order or order above $99
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection