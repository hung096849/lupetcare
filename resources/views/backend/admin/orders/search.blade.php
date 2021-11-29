
@foreach ($orderPet as $order)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $order->id }}" data-id="{{ $order->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
                </div>
            </div>
        </td>
        <td>
            {{ $order->petInformation->name }}
        </td>
        <td>
            {{ $order->petInformation->code   }}
        </td>
        <td>
            {{ $order->petServices->service_name }}
            {{-- <div class="form-group">
                <label for=""></label>
                <select class="form-control" name="service_id">
                @foreach ($services as $service)
                    <option value="{{ $order->service_id }}" {{ $service->id == $order->service_id ? 'selected' : "" }}> {{ $service->service_name }}</option>
                @endforeach
                </select>
            </div> --}}
        </td>
        <td>
            {{ $order->petServices->price }}
        </td>
        <td>
            {{ $order->quantity }}
        </td>
        <td>
            {{ $order->petServices->price*$order->quantity }}
        </td>
        <td>
            <a href="{{ route('backend.admin.orders.delete', $order->id) }}" type="button" class="btn btn-sm btn-danger" >Xóa</a>
            <a href="{{ route('backend.admin.orders.edit', $order->id) }}" type="button" class="btn btn-warning btn-sm btn-warning-edit">Sửa</a>
            
        </td>
    </tr>
@endforeach