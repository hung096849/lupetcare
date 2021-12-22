@foreach ($orders as $order)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $order->id }}" data-id="{{ $order->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $order->customer->name }}</td>
    <td>{{ $order->order_code }}</td>
    <td>{{ $order->pile == "" ? "Chưa cọc" : $order->pile }}</td>
    <td>{{ number_format($order->total_price) }}</td>
    <td>
        @if($order->status == App\Models\Order::STATUS_IN_PROCESS)
        <a href="{{ route('backend.admin.scheduled.show') }}" class="btn btn-warning btn-sm btn-warning-edit">
            Chờ đặt lịch</a>
        @elseif($order->status == App\Models\Order::STATUS_PROCESS)
        <a href="javascript:void(0);" class="btn btn-info btn-sm btn-bg-info-edit">
            Đã xếp lịch</a>
        @elseif($order->status == App\Models\Order::STATUS_PRIORITIZE)
        <a href="{{ route('backend.admin.scheduled.show') }}" class="btn btn-primary btn-sm btn-primary-edit">
            Ưu tiên</a>
        @else
        <a href="javascript:void(0);" class="btn btn-success btn-sm btn-success-edit">
            Sử dụng xong</a>
        @endif
    </td>
    <th>
        <a href="{{ route('backend.admin.orders.export.pdf', $order->id) }}" target="_blank">Xuất hóa đơn</a>
    </th>
    <td>
        <a href="{{ route('backend.admin.orders.edit', $order->id) }}" class="btn btn-info btn-sm">
            <i class="fas fa-edit"></i> Sửa</a>
        <a href="{{ route('backend.admin.orders.view', $order->id) }}" class="btn btn-warning btn-sm btn-warning-edit">
            <i class="fas fa-eye"></i> Chi tiết</a>
        <a href="{{ route('backend.admin.orders.orderDelete', $order->id) }}" class="btn btn-danger btn-sm">
            <i class="fas fa-eye"></i>Xóa</a>
    </td>
</tr>
@endforeach