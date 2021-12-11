@foreach($users as $user)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $user->id }}" data-id="{{ $user->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
                </div>
            </div>
        </td>

        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" width="100px" />
        </td>
        <td>{{ $user->roles->name }}</td>
        <td>
            <a href="{{ route('backend.admin.users.view' , $user->id) }}" class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> Chi tiết</a>
            <a href="{{ route('backend.admin.users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Sửa</a>
            <a href="{{ route('backend.admin.users.delete', $user->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Xóa</a>
        </td>
    </tr>
@endforeach
