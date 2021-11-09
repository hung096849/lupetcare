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
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Khách Hàng Đặt Lịch</h1>
                            <a href="" class="btn btn-success float-left mr-2"><i class="fas fa-plus"></i> Thêm mới</a>
                            <button class="btn btn-danger float-left delete_all" data-url="">
                                <i class="fas fa-trash"></i> Xóa hàng loạt</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="info col-3 ">

                            <div class="row">
                                <h6 class="col-6">Họ và tên :</h6>
                                <span class="col-6">{{ $customer->name }}</span>
                            </div>
                            <div class="row">
                                <h6 class="col-6">SĐT :</h6>
                                <span class="col-6">{{ $customer->phone }}</span>
                            </div>
                            <div class="row">
                                <h6 class="col-6">Email :</h6>
                                <span class="col-6">{{ $customer->email }}</span>
                            </div>

                        </div>
                        <div class=" col-8 ">
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
                                                <th scope="col">Mã đơn hàng <i class="fas fa-sort"></th>
                                                <th scope="col">Dịch vụ <i class="fas fa-sort"></th>
                                                <th scope="col">Thanh toán </th>
                                                <th scope="col">Gía <i class="fas fa-sort"></th>
                                                <th scope="col">Thời gian </th>
                                                <th scope="col">Trạng thái <i class="fas fa-sort"></th>
                                                <th scope="col">Hành động </th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-data">
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input value="{{ $order->id }}"
                                                                    data-id="{{ $order->id }}"
                                                                    class="form__check-all-target form-check-input sub_chk"
                                                                    type="checkbox">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        @foreach ($services as $service)
                                                            <p>
                                                            @if ($service->id == $order->service_id)
                                                        @endif
                                                        {{ $order->service_id === $service->id ? $service->service_name : '' }}


                                                    </p>
                                            @endforeach
                                            </td>
                                            <td><img src="{{ asset('storage/logo-vector-vnpayqr.jpg') }}" alt=""
                                                    width="100"></td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ $order->date }}</td>
                                            <td>
                                                {{ $order->status === 0 ? 'Da thanh toan' : 'Chua thanh toan' }}
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</a>
                                                <a href="{{ route('backend.admin.orders.delete', $order->id ) }}" class="btn btn-danger btn-sm"> <i
                                                        class="fas fa-trash"></i>Delete</a>
                                            </td>
                                            </tr>
                                            @endforeach
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

    @endsection
