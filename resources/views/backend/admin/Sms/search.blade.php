@foreach ( $sms as $item)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $item->id }}" data-id="{{ $item->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $item->id}}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->phone }}</td>
    <td>
        <a href="{{ route('backend.admin.sms.view', $item->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> Chi tiết</a>
        <a href="{{ route('backend.admin.sms.delete', $item->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>Xóa</a>
    </td>
</tr>

@endforeach
