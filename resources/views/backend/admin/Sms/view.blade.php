@extends('layouts.backend')
@section('content')
    <div class="wrapper">

        @include('backend.includes.navbar-top', [
        'show' => 'Tin nhắn',
        'id' => $sms->id,
        'url' => route('backend.admin.sms.show')
        ])

        <div class="content-wrapper" style="min-height: 1602px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8" style="padding:30px;">
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Tin Nhắn</h1>
                            <a href="{{ route('backend.admin.sms.delete', $sms->id) }}"
                                class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Xóa</a>
                            <a href="{{ route('backend.admin.sms.show') }}" class="btn btn-primary float-left">Quay
                                lại danh sách</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <input type="hidden" name="id" value="{{ $sms->id }}" />
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Tên khách hàng</label>
                                <p>{{ $sms->name }}</p>
                                <label for="">Mã đặt lịch</label>
                                <p>{{ $sms->order_code }}</p>
                                <label for="">Số điện thoại</label>
                                <p>{{ $sms->phone }}</p>
                            </div>
                            <div class="col-6">
                                <label for="">Tin nhắn</label>
                                <p>{{ $sms->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
