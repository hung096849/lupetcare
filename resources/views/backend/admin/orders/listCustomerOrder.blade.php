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
        <td>{{ $order->customer->name }}</td>
        <td>{{ $order->order_code }}</td>
        <td>{{ $order->pile == "" ? "Chưa cọc" : $order->pile }}</td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->status ==  App\Models\Order::IN_PROCESS ? "Chưa xác nhận" : "Xác nhận"}}</td>
        <th>
            <a href="{{ route('backend.admin.orders.export.pdf', $order->id) }}">Xuất hóa đơn</a>
        </th>
        <td>
            <a href="{{ route('backend.admin.orders.view', $order->id) }}"
                class="btn btn-warning btn-sm btn-warning-edit">
                <i class="fas fa-eye"></i> Chi tiết</a>
                <a href="{{ route('backend.admin.orders.orderDelete', $order->id) }}"
                    class="btn btn-danger btn-sm">
                    <i class="fas fa-eye"></i>Xóa</a>
        </td>
    </tr>
@endforeach