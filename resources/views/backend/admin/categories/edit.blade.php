@extends('layouts.backend')
@section('content')
<div class="wrapper">

    {{-- @include('backend.includes.navbar-top', [
    'edit' => 'categories',
    'id' => $categories->id,
    'url' => route('backend.admin.categories.show')
    ]) --}}

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> categories Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.categories.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $categories->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên danh mục</label>
                                    <input type="text" name="name" id="title" class="form-control"
                                        value="{{old('name',$categories->name)}}" placeholder="Name ..." />
                                    @error('name')
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
                        <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.categories.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>

@endsection