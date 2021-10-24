@foreach($contacts as $contact)
<tr>
    <td>
        <div class="form-group">
            <div class="form-check">
                <input value="{{ $contact->id }}" data-id="{{ $contact->id }}"
                    class="form__check-all-target form-check-input sub_chk" type="checkbox">
            </div>
        </div>
    </td>
    <td>{{ $contact->id }}</td>
    <td>{{ $contact->name }}</td>
    <td>{{ $contact->phone }}</td>
    <td>{{ $contact->email }}</td>
    <td>
        <a href="{{ route('backend.admin.contacts.view', $contact->id) }}"
            class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
      
        <a href="{{ route('backend.admin.contacts.delete', $contact->id) }}" class="btn btn-danger btn-sm"> <i
                class="fas fa-trash"></i>
            Delete</a>
    </td>
</tr>
@endforeach