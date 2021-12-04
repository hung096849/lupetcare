@foreach ( $news as $news)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $news->id }}" data-id="{{ $news->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $news->id}}</td>
    <td>{{ $news->title }}</td>
    <td>{{ $news->slug }}</td>
    <td>
        <a href="{{ route('backend.admin.news.view', $news->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
        <a
        href="{{ route('backend.admin.news.edit', $news->id) }}"
         class="btn btn-info btn-sm"><i
                class="fas fa-edit"></i> Edit</a>
        <a
        href="{{ route('backend.admin.news.delete', $news->id) }}"
         class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>Delete</a>
    </td>
</tr>

@endforeach
