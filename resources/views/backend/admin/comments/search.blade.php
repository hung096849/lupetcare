@foreach ( $comments as $c)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $c->id }}" data-id="{{ $c->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $c->id}}</td>
    <td>{{ $c->customer->name }}</td>
    <td>{{ $c->serivce->service_name }}</td>
    <td>{{ $c->content }}</td>
    <td>
        <a
        href="{{ route('backend.admin.comments.delete', $c->id) }}"
         class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i> Xóa</a>
    </td>
</tr>

@endforeach
