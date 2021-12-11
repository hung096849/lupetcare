@extends('layouts.frontend')
@section('content')

<section class="form-book-service">
    <div class="container-fluid container-padding">
        <div class="content">
            <form>
                <div class="container">
                    <div class="book-content">
                        <div class="row">
                            <div class="col-md-3 mt-2">
                                <div class="new-form">
                                    <div class="new-form-service mr-4">
                                        <div class="new-form-title">
                                            <h2 class="">Lọc theo</h2>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="new-form-delete">
                                                    <label for="Name " class="pt-2 pb-2">Xóa tất cả</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="filter-by-type">
                                            <div class="row">
                                                <div class="col-md-12 filter-title">
                                                    <label for="Name " class="pt-4 pb-2">Lọc theo kiểu</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex pt-2">
                                                    <input type="checkbox" class="mt-2" />
                                                    <label for="Name " class="ml-2">Sở thích </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex pt-1">
                                                    <input type="checkbox" class="mt-2" />
                                                    <label for="Name " class="ml-2">Sở thích </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex pt-1">
                                                    <input type="checkbox" class="mt-2" />
                                                    <label for="Name " class="ml-2">Sở thích </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-4" />
                                        <div class="filter-by-vendor ">
                                            <div class="row">
                                                <div class="col-md-12 filter-title">
                                                    <label for="Name " class="pt-4 pb-2">Lọc theo kiểu</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex pt-2">
                                                    <input type="checkbox" class="mt-2" />
                                                    <label for="Name " class="ml-2">Sở thích </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex pt-1">
                                                    <input type="checkbox" class="mt-2" />
                                                    <label for="Name " class="ml-2">Sở thích </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex pt-1">
                                                    <input type="checkbox" class="mt-2" />
                                                    <label for="Name " class="ml-2">Sở thích </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="recent-post">
                                            <div class="row">
                                                <i></i>
                                                <div class="col-md-12 filter-title">
                                                    <label for="Name " class="pt-4 pb-2">Lọc theo kiểu</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach ($listnews as $c)
                                                <div class="col-12 d-flex pt-1">
                                                    <a href="{{ route('frontend.tin-tuc.view', $c->id) }}">
                                                    <img src="{{ asset('storage/News_image/' . $c->image) }}" alt="" --}}
                                                         width="70px" height="50px" />
                                                        </a>
                                                    <div class="pl-2">
                                                        <a href="{{ route('frontend.tin-tuc.view', $c->id) }}">
                                                        <label for="Name " class="ml-2">{{ $c->title }}
                                                        </label></a>
                                                        <p class="pl-2">{{ substr($c->created_at, 0 , 10)  }}</p>
                                                    </div>
                                            </div>
                                            @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 ">
                                <div class="row">
                                    <div class="new-form-detail">
                                        <div class="col-12">
                                            <div class="new-detail-title pt-4">
                                                <span>{{ $news->title }}</span>
                                            </div>

                                            <div class="new-detail-content pt-4">
                                                <p>{!! $news->detail !!}</p>
                                            </div>
                                            <hr>
                                            <div class="d-flex m-2 justify-content-between">
                                                <div class="m-2">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                    <span class="pl-2">{{ substr($news->created_at, 0 , 10)  }}</span>
                                                </div>
                                                <div class="m-2">

                                                    <span class="pl-2">Share</span>
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="new-list-detail">
                                                <div class="new-detail-title pt-3">
                                                    <span>Tin tức liên quan</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach ($listnews as $n )
                                                <div class="col-md-6 d-flex pt-5">
                                                    <div class="col-md-3 p-0 m-0">
                                                        <img src="{{ asset('storage/News_image/' . $n->image) }}"
                                                            alt="" width="100%" height="100%" />
                                                    </div>
                                                    <div class="pl-3">
                                                        <div class="new-detail-name ">
                                                            <span>{{ $n->title }} </span>
                                                        </div>
                                                        <div class="new-detail-time pt-2">
                                                            <span>{{ substr($n->created_at, 0 , 10)  }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="col-12 mt-5">
                                                <form action="">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="new-detail-title pt-3">
                                                            <span>Bình luận</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                      <label for="Name " class="pt-5 pb-2 book-form-text"
                                                        >Tên của bạn</label
                                                      >
                                                      <input
                                                        type="text"
                                                        class="form-control input-form-service"
                                                      />
                                                    </div>
                                                    <div class="col-md-6">
                                                      <label
                                                        for="phoneNumber"
                                                        class="pt-5 pb-2 book-form-text"
                                                        >Số điện thoại</label
                                                      >
                                                      <input
                                                        type="text"
                                                        class="form-control input-form-service"
                                                      />
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <label for="ghichu " class="pt-4 pb-2 book-form-text"
                                                        >Ghi chú *</label
                                                      >
                                                      <textarea
                                                        class="form-control input-form-service"
                                                        id="exampleFormControlTextarea1"
                                                        rows="4"
                                                      ></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                                                    <a href="./book-service-cart.html">
                                                      <button type="button" class="btn btn-lg btn-info px-5">
                                                        Gửi bình luận
                                                      </button>
                                                    </a>
                                                  </div>


                                                </form>
                                            </div>
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
