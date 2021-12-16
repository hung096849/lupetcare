@foreach ( $slides as $slide)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $slide->id }}" data-id="{{ $slide->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $slide->id}}</td>
    <td><img src="{{ asset('storage/Service_image/' .  $slide->image) }}" alt="" style="width: 100px; height: 100px"></td>
    <td>{{ $slide->title}}</td>
    <td>{{ $slide->content}}</td>
    <td>
        <a href="{{ route('backend.admin.slides.edit', $slide->id) }}" class="btn btn-info btn-sm"><i
                class="fas fa-edit"></i> Sửa</a>
        <a href="{{ route('backend.admin.slides.delete', $slide->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>Xóa</a>
    </td>
</tr>

@endforeach
