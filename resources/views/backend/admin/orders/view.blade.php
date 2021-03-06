@extends('layouts.backend')
@section('content')

<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'list' => 'Orders',
    'url' => route('backend.admin.orders.show')
    ])

    @include('backend.components.alert')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1875.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-paw"></i> Chi tiết hóa đơn
                        </h1>
                        <a href="{{ route('backend.admin.orders.show') }}" class="btn btn-primary float-left mr-2">
                            <i class="fas fa-arrow-left"></i> Quay lại</a>
                        <a href="{{ route('backend.admin.orders.insert.service') }}" class="btn btn-success float-left mr-2">
                            <i class="fas fa-plus"></i> Thêm dịch vụ thú cưng</a>
                        {{-- <button class="btn btn-danger float-left delete_all" data-url="{{ route('backend.admin.orders.orders.delete') }}">
                            <i class="fas fa-trash"></i>  Xóa nhiều</button> --}}
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <p>
                                        <b>Họ và tên : </b> {{ $orders->customer->name }}
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b>Mã đơn hàng : </b> {{ $orders->order_code }}
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b>Số điện thoại :</b> {{ $orders->customer->phone }}
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b> Email :</b> {{ $orders->customer->email }} 
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b> Thanh toán :</b> 
                                        @if($orders->is_paid === App\Models\Order::UNPAID)
                                            <span class="text-danger">Chưa thanh toán</span>
                                        @elseif($orders->is_paid === App\Models\Order::PAID)
                                            <span class="text-info">Đã thanh toán</span>
                                        @else
                                            <span class="text-warning">Đã cọc</span>
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b> Trạng thái :</b> 
                                        @if($orders->status == App\Models\Order::STATUS_IN_PROCESS)
                                            <span class="text-warning">Chờ đặt lịch</span>
                                        @elseif($orders->status == App\Models\Order::STATUS_PROCESS)
                                            <span class="text-info">Đã xếp lịch</span>
                                        @elseif($orders->status == App\Models\Order::STATUS_PRIORITIZE)
                                            <span class="text-info">Ưu tiên</span>
                                        @else
                                            <span class="text-success">Sử dụng xong</span>
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b> Tiền cọc :</b> {{ $orders->pile == "" ? "Chưa cọc" : $orders->pile }} 
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b> Tổng tiền :</b> <span class="total_price">{{ $orders->total_price }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 ">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" id="search" data-url=""
                                            class="form-control float-right" placeholder="Tìm kiếm">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input form__check-all" type="checkbox">
                                                    </div>
                                                </div>
                                            </th>
                                            <th>Tên</th>
                                            <th>Mã</th>
                                            <th>Dịch vụ</th>
                                            <th>Giá </th>
                                            <th>Cân nặng</th>
                                            <th>Giá theo cân nặng</th>
                                            <th>Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-data">
                                        @include('backend.admin.orders.search')
                                    </tbody>
                                </table>

                                <div class="ajax-load text-center" style="display:none">
                                    <p><img src="{{ asset('backend/image/common/search.gif') }}" width="100px" />
                                    </p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <!-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div> -->
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers float-right" id="example2_paginate">
                                @include('backend.components.pagination', ['paginator' => $orders])
                            </div>
                        </div>
                    </div> --}}
                </div><!-- /.container-fluid -->
        </section>


        <!-- /.content -->
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.total_price').html();
    });
</script>
@endsection
