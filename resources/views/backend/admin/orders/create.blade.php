@extends('layouts.backend')
@section('content')
<div class="wrapper">
    @include('backend.includes.navbar-top', [
    'add' => 'Đặt lịch',
    'url' => route('backend.admin.orders.show')
    ])

    @include('backend.components.alert')
    
    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    {{-- <div class="col-sm-6" style="padding:30px;">
                        <a href="{{ route('backend.admin.orders.create') }}" class="btn btn-success float-left mr-2"><i
                                class="fas fa-plus"></i>Thêm mới</a>
                    </div> --}}
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="form-book-service">
            <div class="container-fluid container-padding">
                <div class="content">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('backend.admin.orders.store') }}" method="POST">
                                @csrf
                                <div class="book-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Khách hàng</label>
                                                <select name="customer_id" id="" class="custom-select">
                                                    @foreach ($customers as $customer)
                                                    <option value="{{ old('customer_id', $customer->id) }}">
                                                        {{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Chọn thú cưng</label>
                                                <select class="form-control" name="pet_id">
                                                    @foreach ($petInfomation as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }} -- {{
                                                        $item->code}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <style>
                                                .select2-selection.select2-selection--single {
                                                    height: auto;
                                                    padding: 8px 12px;
                                                }
                                            </style>
                                            <div class="form-group">
                                                <label for="">Chọn dịch vụ</label>
                                                <select class="form-control js-select3" name="service_id[]" id=""
                                                    multiple>
                                                    @foreach ($services as $value)
                                                    <option value="{{ $value->id }}">{{ $value->id }}.{{ $value->service_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="row">
                                                    @foreach ($services as $service)
                                                        <input type="hidden" id="price-serv-{{ $service->id }}" value="{{ $service->price }}">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Giờ*</label>
                                                    <input type="time" class="form-control input-form-service time"
                                                        id="datetimepicker5" name="time" value="{{ old('time') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Ngày tháng*</label>
                                                    <input type="text" name="date" value="{{ old('date') }}"
                                                        class="form-control input-form-service date hasDatepicker" id="
                                                        datepicker">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Phương thức thanh toán</label>
                                                        <select class="form-control" name="payment_method" id="">
                                                            <option value="1">Tiền mặt</option>
                                                            <option value="2">Thẻ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Phương thức thanh toán</label>
                                                        <select class="form-control" name="is_paid" id="">
                                                            <option value="0">Chưa thanh toán</option>
                                                            <option value="1">Đã thanh toán</option>
                                                            {{-- <option value="3">Đã cọc</option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Trạng thái</label>
                                                        <select class="form-control" name="status" id="">
                                                            <option value="1">Xác nhận</option>
                                                            <option value="0">Chưa xác nhận</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Tiền cọc</label>
                                                        <input class="form-control" type="text" name="pile"
                                                            value="{{ old('pile') }}">
                                                    </div>
                                                </div>
                                                <div >
                                                    tổng tiền
                                                    <span class="total_price"> </span>
                                                    <input type="hidden" name="total_price_input" value="" id="total-price-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                            <button type="submit" class="btn btn-success float-left mr-2" id="btn-submit">
                                Thêm lịch
                            </button>
                            <a href="{{ route('backend.admin.orders.show') }}" class="btn btn-secondary float-left">Quay lại</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection
    @section('js')
    <script>
        $(document).ready(function () {
        $('.js-select3').select2();
    });
    </script>
    <script>
        $(function() {
        $("#datepicker").datepicker();
    } );
    var totalPrice = 0
    function action() {
        document.querySelector("#btn-submit").addEventListener("click", function (e) {
            // e.preventDefault()
            const elementList = Array.from(document.querySelectorAll(".select2-selection__choice"))
            elementList.forEach(i => {
                const value = document.querySelector(`#price-serv-${i.getAttribute("title").trim().split(".")[0]}`).value
                totalPrice += parseInt(value)
            })
            console.log(totalPrice)
            document.querySelector(".total_price").innerHTML = `${totalPrice} vnd`
            document.querySelector("#total-price-input").value = totalPrice
        })
    }
    const run = () => {action()}
    window.addEventListener("DOMContentLoaded", run)

    </script>
    @endsection