@extends('layouts.backend')
@section('content')
edit
{{-- <div class="wrapper">

    @include('backend.includes.navbar-top', [
    'edit' => 'Contact',
    'id' => $contact->id,
    'url' => route('backend.admin.contacts.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Contact Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.contacts.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $contact->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        value="{{old('name',$contact->name)}}" placeholder="Name ..." />
                                    @error('name')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Email</label>
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                        value="{{old('email',$contact->email)}}" placeholder="Email ..." />
                                    @error('email')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="inputPhone" class="form-control"
                                        value="{{old('phone',$contact->phone)}}" placeholder="Phone ..." />
                                    @error('phone')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea class="form-control" name="content" id="content" rows="3"
                                        placeholder="Your message">
                                        {{old('content',$contact->content)}}
                                    </textarea>
                                    @error('content')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Edit contact" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary mr-2 float-left">Cancel</a>
                        <a href="{{ route('backend.admin.contacts.show') }}" class="btn btn-primary float-left">Return
                            to List</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div> --}}

@endsection