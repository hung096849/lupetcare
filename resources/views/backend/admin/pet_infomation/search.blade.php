@foreach($petInfomations as $key => $petinfor)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $petinfor->id }}" data-id="{{ $petinfor->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $petinfor->id }}</td>
    <td>{{ $petinfor->name }}</td>
    <td>{{ $petinfor->code }}</td>
    <td>
        <a href="{{ route('backend.admin.petinformation.view', $petinfor->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i>Chi tiết</a>
            <a href="{{ route('backend.admin.petinformation.edit', $petinfor->id) }}"
                class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Sửa</a>
        <a href="{{ route('backend.admin.petinformation.delete', $petinfor->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>
            Xóa</a>
    </td>
</tr>
@endforeach