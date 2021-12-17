@foreach ( $news as $item)
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
    <td>{{ $item->title }}</td>
    <td>
        <a href="{{ route('backend.admin.news.view', $item->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> Chi tiết</a>
        <a
        href="{{ route('backend.admin.news.edit', $item->id) }}"
         class="btn btn-info btn-sm"><i
                class="fas fa-edit"></i> Sửa</a>
        <a
        href="{{ route('backend.admin.news.delete', $item->id) }}"
         class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>Xóa</a>
    </td>
</tr>

@endforeach
