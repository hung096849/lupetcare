@foreach ( $services as $service)
<td>
    <div class="form-group">
        <div class="form-check">
            <input value="{{ $service->category_id }}" data-id="{{ $service->category_id }}"
                class="form__check-all-target form-check-input sub_chk" type="checkbox">
        </div>
    </div>
</td>
<td>{{ $service->category_id}}</td>
<td>{{ $service->service_name }}</td>
<td><img src="{{ $service->service_name }}" alt="" style="width: 100"></td>
<td>{{ $service->price }}</td>
<td>{{ $service->price_sale }}</td>
<td>{{ $service->status }}</td>
<td>{{ $service->time }}</td>
<td>{{ $service->slug }}</td>
<td>
    <a href=""
        class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
    <a href="" class="btn btn-info btn-sm"><i
            class="fas fa-edit"></i> Edit</a>
    <a href="" class="btn btn-danger btn-sm"> <i
            class="fas fa-trash"></i>
        Delete</a>
</td>

@endforeach
