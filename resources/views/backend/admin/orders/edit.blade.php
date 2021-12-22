@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'edit' => 'Sửa đơn hàng',
    // 'url' => route('backend.admin.orders.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.orders.updateOrder') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $order->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                          <label for="">Trạng thái</label>
                                          <select class="form-control" name="status" id="">
                                                <option value="{{ App\Models\Order::STATUS_PRIORITIZE }}" 
                                                    {{ $order->status === App\Models\Order::STATUS_PRIORITIZE ? 'selected' : '' }}>Ưu tiên</option>
                                                <option value="{{ App\Models\Order::STATUS_IN_PROCESS }}" 
                                                    {{ $order->status === App\Models\Order::STATUS_IN_PROCESS ? 'selected' : '' }}>Chờ đặt lịch</option>
                                                <option value="{{ App\Models\Order::STATUS_PROCESS }}"
                                                {{ $order->status === App\Models\Order::STATUS_PROCESS ? 'selected' : '' }}>Đã xếp lịch</option>
                                                <option value="{{ App\Models\Order::STATUS_DONE }}"
                                                {{ $order->status === App\Models\Order::STATUS_DONE ? 'selected' : '' }}>Sử dụng xong</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Thanh toán</label>
                                            <select class="form-control" name="is_paid" id="">
                                                <option value="{{ App\Models\Order::UNPAID }}" 
                                                    {{ $order->is_paid === App\Models\Order::UNPAID ? 'selected' : '' }}>Chưa thanh toán</option>
                                                <option value="{{ App\Models\Order::PAID }}" 
                                                    {{ $order->is_paid === App\Models\Order::PAID ? 'selected' : '' }}>Đã thanh toán</option>
                                                <option value="{{ App\Models\Order::PILE }}"
                                                {{ $order->is_paid === App\Models\Order::PILE ? 'selected' : '' }}>Đã thanh toán</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Cân nặng</label>
                                        <select class="form-control">
                                        @foreach (Config::get('dataWeight.WEIGHT') as $key => $value)
                                            <option value="{{$key}}" @if($key==old('weight', $orderPet->petInformation->weight)) selected @endif readonly>{{$value}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="">Chọn dịch vụ</label>
                                      <select class="form-control" name="service_id">
                                        @foreach ($services as $item)
                                            <option value="{{ $item->id }}" {{ $item->id === $orderPet->service_id ? 'selected' : "" }}>{{ $item->service_name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.orders.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </form>
        </section>
</div>
@endsection