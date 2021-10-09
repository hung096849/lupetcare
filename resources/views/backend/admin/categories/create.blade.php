@extends('layouts.backend')
@section('content')
<div class="wrapper">

    {{-- @include('backend.includes.navbar-top', [
    'add' => 'categories',
    'url' => route('backend.admin.categories.show')
    ]) --}}

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Contact Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.categories.store') }}">
                {{--  --}}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" id="title" class="form-control"
                                        value="{{old('name')}}" placeholder="Name ..." />
                                    @error('name')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="inputDescription">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required />
                                    @if ($errors->has('slug'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('slug') }}
                                    </div>
                                    @endif
                                </div> --}}

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Create new contact" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection