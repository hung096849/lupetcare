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
                                                    @foreach ($news as $c)
                                                        <div class="col-12 d-flex pt-1">
                                                            <a href="{{ route('frontend.tin-tuc.view', $c->id) }}">
                                                                <img src="{{ asset('storage/News_image/' . $c->image) }}"
                                                                    alt="" --}} width="70px" height="50px" />
                                                            </a>
                                                            <div class="pl-2">
                                                                <a href="{{ route('frontend.tin-tuc.view', $c->id) }}">
                                                                    <label for="Name "
                                                                        class="ml-2">{{ $c->title }}
                                                                    </label></a>
                                                                <p class="pl-2">
                                                                    {{ substr($c->created_at, 0, 10) }}</p>
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
                                        <div class="new-form">
                                            <div class="new-list">
                                                <div class="new-list-title ">
                                                    <h2 class="py-2">Tin tức</h2>
                                                </div>
                                                @foreach ($news as $n)
                                                    <div class="row">
                                                        <div class="new-list-item py-5">
                                                            <div class="col-12 d-flex ">
                                                                <div class="col-md-6">
                                                                    <a
                                                                        href="{{ route('frontend.tin-tuc.view', $n->id) }}">
                                                                        <img src="{{ asset('storage/News_image/' . $n->image) }}"
                                                                            alt="" width="100%" height="300px" /></a>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="">
                                                                        <a
                                                                            href="{{ route('frontend.tin-tuc.view', $n->id) }}">
                                                                            <label for="Name "
                                                                                class="new-title-item ">{{ $n->title }}
                                                                            </label>
                                                                        </a>
                                                                        <br />
                                                                        <div class="d-flex m-2">
                                                                            <i class="fa fa-heart-o"
                                                                                aria-hidden="true"></i>
                                                                            <span
                                                                                class="pl-2">{{ substr($n->created_at, 0, 10) }}</span>
                                                                        </div>
                                                                        <p class="m-2 ">
                                                                            {!! substr($n->detail, 0, 150) !!}
                                                                        </p>
                                                                        <br />
                                                                        <a
                                                                            href="{{ route('frontend.tin-tuc.view', $n->id) }}">
                                                                            <button type="button"
                                                                                class="btn btn-lg btn-info m-2">
                                                                                Đọc tiếp
                                                                            </button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center">
                                                        <li class="page-item ">
                                                            <a class="page-link" href="#" tabindex="-1"
                                                                aria-disabled="true"><i class="fa fa-angle-double-left"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                        <li class="page-item active"><a class="page-link"
                                                                href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#"><i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </nav>
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
