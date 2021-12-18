@extends('layouts.frontend')
@section('content')

<section class="form-news">
    <div class="container-fluid container-padding">
        <div class="content">
            <form>
                <div class="container">
                    <div class="book-content">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 ">
                                <div class="row">
                                    <div class="new-form-detail">
                                        <div class="new-detail-title py-4 text-center">
                                            <span>{{ $news->title }} </span>
                                        </div>
                                        <div class="new-form-image">
                                            <img src="{{ asset('storage/News_image/' . $news->image) }}" alt=""
                                                width="100%" height="100%" />
                                        </div>
                                        <div class="col-12">

                                            <div class="new-detail-name pt-4">
                                                <span>{{ $news->title }}</span>
                                            </div>
                                            <div class="new-detail-content pt-4">
                                                <p>
                                                    {!! $news->detail !!}
                                                </p>
                                            </div>
                                            <hr>
                                            <div class="d-flex m-2 justify-content-between">
                                                <div class="m-2">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                    <span class="pl-2">{{ substr($news->created_at, 0, 10) }}</span>
                                                </div>
                                            </div>
                                            <hr>

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
