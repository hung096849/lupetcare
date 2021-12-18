@extends('layouts.backend')
@section('content')
    <div class="wrapper">

        @include('backend.includes.navbar-top', [
        'show' => 'services',
        'id' => $services->id,
        'url' => route('backend.admin.services.show')
        ])

        <div class="content-wrapper" style="min-height: 1602px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8" style="padding:30px;">
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Danh mục</h1>
                            <a href="{{ route('backend.admin.services.edit', $services->id) }}"
                                class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Sửa</a>
                            <a href="{{ route('backend.admin.services.delete', $services->id) }}"
                                class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Xóa</a>
                            <a href="{{ route('backend.admin.services.show') }}" class="btn btn-primary float-left">Quay
                                lại danh sách</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <input type="hidden" name="id" value="{{ $services->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="">Tên dịch vụ</label>
                                        <p>{{ $services->service_name }}</p>
                                        <label for="">Danh mục</label>
                                        <p>{{ $services->categories->name }}</p>
                                        <label for="">Thời gian</label>
                                        <p>{{ $services->time }}</p>
                                    </div>
                                    <div class="col-3">
                                        <label for="">Giá</label>
                                        <p>{{ $services->price }}</p>
                                        <label for="">Giá khuyến mãi</label>
                                        <p>{{ $services->price_sale }}</p>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Ảnh</label>
                                        <p><img src="{{ asset('storage/Service_image/' . $services->image) }}" alt=""
                                                style="height: 300px;"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Chi tiết</label>
                                    <p>{!! $services->detail !!}</p>
                                    <label for="">Mô tả</label>
                                    <p>{!! $services->description !!}</p>

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
