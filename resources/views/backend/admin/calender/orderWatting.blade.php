@foreach ($orders as $order)
<tr>
    <td scope="row">{{ $order->order_code }}</td>
    <td>{{ $order->customer->name }}</td>
    <td>{{ $order->customer->phone }}</td>
    <td>
        {{-- {{ $order->status === App\Models\Order::STATUS_IN_PROCESS ? "Đang chờ" : "Đã xếp
        lịch" }} --}}
        @if($order->status ==  App\Models\Order::STATUS_IN_PROCESS)
        <p class="btn btn-warning btn-sm btn-warning-edit">
            Chờ đặt lịch</p>
        @elseif($order->status ==  App\Models\Order::STATUS_PROCESS)
            Đã xếp lịch
        @elseif($order->status ==  App\Models\Order::STATUS_PRIORITIZE)
            <a class="btn btn-success btn-sm btn-success-edit">
                Ưu tiên</a>
        @endif    
    </td>
    <td>
        <a href="javascript:void(0);" class="btn btn-info btn-sm schedule" data-toggle="modal"
            data-target="#exampleModal_{{ $order->id }}"><i class="fas fa-edit"></i></a>
    </td>
</tr>

<div class="modal fade" id="exampleModal_{{ $order->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Mã đơn hàng {{ $order->order_code }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Họ tên khách hàng : {{ $order->customer->name }}</p>
                <p>Số điện thoại : {{ $order->customer->phone }}</p>
                <p>
                    Thời gian khách đặt : {{ $order->date }}
                    {{-- <label for="">Thời gian bắt đầu :</label>
                    <input type="text" name="" id="start_time_{{ $order->id }}" value="{{ $order->date }}">
                    <input type="datetime-local" id="birthdaytime" name="birthdaytime" value="{{ $order->date }}"> --}}
                </p>
                <p class="">Lên lịch</p>

                <div class="row">
                    <p class="col-md-12"><label for="">Thời gian bắt đầu</label></p>
                    <div class="col-md-6">
                        <input type="time" class="form-control input-form-service time_start"
                            id="time_start_{{ $order->id }}" name="time" value="">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="date" value=""
                            class="form-control input-form-service date hasDatepicker" id="date_start_{{ $order->id }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <p class="col-md-12"><label for="">Thời gian kết thúc</label></p>
                    <div class="col-md-6">
                        <input type="time" class="form-control input-form-service time"
                            id="datetimepicker_{{ $order->id }}" name="time" value="">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="date" value=""
                            class="form-control input-form-service date hasDatepicker" id="datepicker_{{ $order->id }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" name="" id="text_{{ $order->id }}"
                        rows="3">Mã đơn hàng {{ $order->order_code }}---Số điện thoại : {{ $order->customer->phone }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Chọn nhân viên</label>
                    <select class="form-control" id="user_id">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center"">
                                            <a name="" id="" class=" btn btn-primary submit"
                data-route="{{ route('backend.admin.scheduled.show') }}" data-id="{{ $order->id }}" role="button">Đặt
                lịch</a>
                {{-- <button class="btn btn-primary submit" data-id="{{ $order->id }}">Đặt lịch</button> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Hủy</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach