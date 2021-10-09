@extends('layouts.backend')
@section('content')
views
{{-- <div class="wrapper">

    @include('backend.includes.navbar-top', [
    'show' => 'Contacts',
    'id' => $contact->id,
    'url' => route('backend.admin.contacts.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Contact View</h1>
                        <a href="{{ route('backend.admin.contacts.edit', $contact->id) }}"
                            class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('backend.admin.contacts.delete', $contact->id) }}"
                            class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Delete</a>
                        <a href="{{ route('backend.admin.contacts.show') }}" class="btn btn-primary float-left">Return
                            to List</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <input type="hidden" name="id" value="{{ $contact->id }}" />
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" value="{{ $contact->name }}" id="inputName"
                                    class="form-control" disabled />
                            </div>

                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="text" name="email" value="{{ $contact->email }}" id="inputEmail"
                                    class="form-control" disabled />
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Phone number</label>
                                <input type="text" name="text" value="{{ $contact->email }}" id="inputPhone"
                                    class="form-control" disabled />
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Content</label>
                                <input type="text" value="{{ $contact->content }}" name="content" id="content"
                                    class="form-control" disabled />
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

</div> --}}

@endsection