<section class="header">
    <div class="header-top smooth">
        <div class="container-fluid">
            <div class="row align-content-center
                justify-content-between">
                <div class="col-4 lo-go-none d-block d-lg-none">
                    <a href="/" title="Trang chủ" class="img_
                        d-block logo-1"> <img loading="lazy" src="{{ asset('frontend/images/logo.png') }}" alt="" title=""> </a>
                </div>

                <div class="col-4 d-flex d-lg-none align-items-center
                    justify-content-end">

                    <i class="fa fa-bars
                        show_menu h-icon" aria-hidden="true"></i> </div>
            </div>
        </div>
    </div>
    <div class="header-body">
        <div class="container-fluid container-padding">
            <div class="row nav-menu">
                <div class="col-12 col-lg-2">
                    <a href="/" title="Trang chủ" class="img_ d-block
                        logo"> <img loading="lazy" src="{{ asset('frontend/images/logo.png') }}" alt="" title=""> </a>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="menu menu-desktop">
                        <ul>
                            <li><a rel="" class="active" href="/">Trang
                                    chủ</a></li>
                            <li>
                                <a href="#">Sản Phẩm</a>
                                <ul>
                                    <li>
                                        <a rel="" href="#">Sản Phẩm 11 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Sản Phẩm 2.1</a>
                                        <ul>
                                            <li><a rel="" href="#">Sản
                                                    Phẩm 2-2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('frontend.services.show') }}">Dịch Vụ</a></li>
                            <li><a rel="" href="#">Tin tức</a></li>
                            <li><a rel="" href="{{ route('frontend.contact_sendmail.show') }}">Liên hệ</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-12 col-lg-3">

                    <div class="header-icon container">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="search d-flex
                                    align-items-center">
                                    <input class="form-control me-2
                                        form-input" type="search" placeholder="Tìm kiếm ..." aria-label="Search">
                                    <i class="fa fa-search icon-search" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex
                                justify-content-center">
                                <a href="./shoppingcart.html">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-md-2 d-flex
                                justify-content-center">
                              
                                    <i class="fa fa-user icon-hd icon-login" aria-hidden="true" onclick="showSearch()"></i>
                                        <div class="header__notify">
                                            <header class="header__notify-header">
                                            
                                            </header>
                                            <ul class="header__notify-list">
                                                <li class="header__notify-item header__notify-item--viewed">
                                                    <a href="{{ route('frontend.login.register-user') }}" class="header__notify-link">
                                                        <i class="fa fa-user icon-hd icon-login " aria-hidden="true"></i>
                                                        <div class="header__notify-info">
                                                        
                                                            <span class="header__notify-name">Đăng kí </span>
                                                     
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="header__notify-item">
                                                    <a href="{{ route('frontend.login.show') }}" class="header__notify-link">
                                                        <i class="fa fa-user icon-hd icon-login " aria-hidden="true"></i>
                                                            <div class="header__notify-info">
                                                                
                                                                <span class="header__notify-name">Đăng nhập </span>
                                                          
                                                            </div>
                                                    </a>
                                                </li>
                                       
                                            </ul>
                                            <!-- <div class="header__notify-footer">
                                                <a href="" class="header__notify-footer-btn">
                                                    Xem tất cả
                                                </a>
                                            </div> -->
                                        </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
            <div class="bg-menu"> <i class="fa fa-times"></i> </div>
        </div>

    </div>

</section>

<!-- <section class="banner">
    <div class="swiper mySwiper swiper-banner overflow-hidden swiper-container-initialized swiper-container-horizontal">
        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-4557px, 0px, 0px);"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="2" style="width: 1519px;">
                <div class="images">
                    <img src="{{ asset('frontend/images/banner-home_-_3.png') }}" class="w-100" alt="">
                </div>
            </div>
            <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="0" style="width: 1519px;">
                <div class="images">
                    <img src="{{ asset('frontend/images/banner-home_-_1.png') }}" class="w-100" alt="">
                </div>
            </div>
            <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" style="width: 1519px;">
                <div class="images">
                    <img src="{{ asset('frontend/images/banner-home_-_2.png') }}" class="w-100" alt="">
                </div>
            </div>
            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" style="width: 1519px;">
                <div class="images">
                    <img src="{{ asset('frontend/images/banner-home_-_3.png') }}" class="w-100" alt="">
                </div>
            </div>


        <div class="swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="0" style="width: 1519px;">
                <div class="images">
                    <img src="{{ asset('frontend/images/banner-home_-_1.png') }}" class="w-100" alt="">
                </div>
            </div></div>
        <div class="swiper-button-next d-none banner-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
        <div class="swiper-button-prev d-none banner-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
        <div class="swiper-pagination d-none banner-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</section> -->