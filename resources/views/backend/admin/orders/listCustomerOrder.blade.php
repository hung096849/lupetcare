@foreach ($customers as $customer)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $customer->customer_id }}"
                        data-id="{{ $customer->customer_id }}"
                        class="form__check-all-target form-check-input sub_chk"
                        type="checkbox">
                </div>
            </div>
        </td>
        <td>{{ $customer->total }}</td>
        <td>{{ $customer->customer->name }}</td>
        <td>
            <a href="{{ route('backend.admin.orders.view', $customer->customer_id) }}"
                class="btn btn-warning btn-sm btn-warning-edit"><i
                    class="fas fa-eye"></i> View</a>
        </td>
    </tr>
@endforeach