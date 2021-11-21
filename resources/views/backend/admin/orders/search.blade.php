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
    {{-- <td>{{ $order->id }}</td> --}}
    <td>
        @php
            
        @endphp
        @foreach ($order->order_pets as $order_pet)
            <p>{{ $order_pet->code }}</p>
        @endforeach
    </td>
    <td>
        @foreach ($order->order_services as $order_service)
        <p>{{ $order_service->service_name }}</p>
        @endforeach
    </td>
    <td>
        {{ $order->method === App\Models\Order::CASH ? 'Tiền mặt' : 'Thẻ' }}
    </td>
    <td>{{ empty($order->pile) ? "Chưa cọc" : number_format($order->pile) }}</td>
    <td>{{ number_format($order->total_price) }}</td>
    <td>{{ $order->date }}</td>
    <td>
        @if($order->is_paid === App\Models\Order::UNPAID)
        Chưa thanh toán
        @elseif($order->is_paid === App\Models\Order::PAID)
        Đã thanh toán
        @else
        Đã đặt cọc
        @endif
        
    </td>
    <td>
        {{ $order->status === App\Models\Order::PROCESS ? 'Xác nhận lịch' : 'Đang chờ' }}
    </td>
    <td>
        <a href="">Xuất hóa đơn</a>
    </td>
    <td>
        <p><a href="{{ route('backend.admin.orders.edit', ['order_id' => $order->id]) }}" class="btn btn-info btn-sm btn-warning"><i class="fas fa-edit"></i>
                Sửa</a></p>
        <p><a href="{{ route('backend.admin.orders.delete', $order->id) }}" class="btn btn-danger btn-sm"> <i
                    class="fas fa-trash"></i>Xóa</a></p>
    </td>
    <td>
        <p><a href="{{ route('backend.admin.orders.edit', ['order_id' => $order->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>
                Chi tiết</a></p>
    </td>
</tr>
@endforeach