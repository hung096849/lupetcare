@foreach($categories as $category)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $category->id }}" data-id="{{ $category->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>
        <a href="{{ route('backend.admin.categories.view', $category->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> Chi tiết</a>
        <a href="{{ route('backend.admin.categories.edit', $category->id) }}" class="btn btn-info btn-sm"><i
                class="fas fa-edit"></i> Sửa</a>
        <a href="{{ route('backend.admin.categories.delete', $category->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>
            Xóa</a>
    </td>
</tr>
@endforeach
