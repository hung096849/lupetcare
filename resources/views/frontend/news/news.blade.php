@extends('layouts.frontend')
@section('content')
    <section class="form-book-service">
        <div class="container-fluid container-padding">
            <div class="content">
                <div class="new-detail-titles">
                    <h2 class="text-center">Tin tức</h2>
                </div>
                <form>
                    <section class="page_new_slide">
                        <div class="container">
                            <div class="swiper mySwiper_blog_slode">
                                <div class="swiper-wrapper">
                                    @foreach ($news as $item)
                                        <div class="swiper-slide">
                                            <div class="container">
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-lg-5">
                                                        <a href="{{ route('frontend.tin-tuc.view', $item->id) }}"
                                                            class="imgs d-block">
                                                            <img src="{{ asset('storage/News_image/' . $item->image) }}"
                                                                alt="" height="100" class="img_blog w-100">
                                                        </a>
                                                    </div>
                                                    <div class="lh-col-12 col-lg-7">
                                                        <div class="blog_slide_tiem">
                                                            <div class="blog_category mb-3">
                                                                <div class="blog_list_category ">
                                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                    <span class="comma">,&nbsp;</span>
                                                                </div>
                                                                <div class="blog_date">
                                                                    {{ substr($item->created_at, 0, 10) }}
                                                                </div>
                                                            </div>
                                                            <a href="{{ route('frontend.tin-tuc.view', $item->id) }}">
                                                                <h3 class="blog_slide_title">{{ $item->title }}</h3>
                                                            </a>
                                                            <div class="blog_slide_desc">{!! substr($item->detail, 0, 200) !!}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="container lh_sw_tract">
                                    <div class="swiper-pagination swiper-pagination_blog_slode"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="container">
                        <div class="book-content">
                            <div class="row">
                                <div class="section">
                                    <div class="container">
                                        <div class="row g-5 pt-4">
                                            @foreach ($news as $item)

                                                <div class="col-lg-4">
                                                    <div class="tin-tuc d-block small-post-entry-v">
                                                        <div class="thumbnail">
                                                            <a href="{{ route('frontend.tin-tuc.view', $item->id) }}">
                                                                <img src="{{ asset('storage/News_image/' . $item->image) }}" alt="Image"
                                                                    class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <div class="post-meta mb-1 mt-3">
                                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                <span class="date">{{ substr($item->created_at, 0, 10) }}</span>
                                                            </div>
                                                            <h2 class="new-title-item mb-3"><a href="{{ route('frontend.tin-tuc.view', $item->id) }}">
                                                                {{ $item->title }}</a></h2>
                                                            <p class="chi-tiet-ngan">{!! substr($item->detail, 0, 200) !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
