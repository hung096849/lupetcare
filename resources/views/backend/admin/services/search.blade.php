@foreach ( $services as $service)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $service->id }}" data-id="{{ $service->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $service->id}}</td>
    <td>{{ $service->service_name }}</td>
    <td><img src="{{ asset('storage/Service_image/' .  $service->image) }}" alt="" style="width: 100px; height: 100px"></td>
    <td>{{ $service->status }}</td>
    <td>{{ $service->slug }}</td>
    <td>
        <a href="{{ route('backend.admin.services.view', $service->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
        <a href="{{ route('backend.admin.services.edit', $service->id) }}" class="btn btn-info btn-sm"><i
                class="fas fa-edit"></i> Edit</a>
        <a href="{{ route('backend.admin.services.delete', $service->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>Delete</a>
    </td>
</tr>

@endforeach