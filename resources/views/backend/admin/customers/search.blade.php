@foreach($customers as $customer)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $customer->id }}" data-id="{{ $customer->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $customer->id }}</td>
    <td>{{ $customer->name }}</td>
    <td>{{ $customer->slug }}</td>
    <td>{{ $customer->phone }}</td>
    <td>{{ $customer->email }}</td>
    <td>{{ $customer->created_at }}</td>
    <td>  {{ $customer->status == 0 ? 'Khách hàng' : 'Thành viên' }}</td>
    <td>
        <a href="{{ route('backend.admin.customers.view', $customer->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> Xem chi tiết</a>
      
        <a href="{{ route('backend.admin.customers.delete', $customer->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>
            Xóa</a>
    </td>
</tr>
@endforeach