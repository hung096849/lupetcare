@extends('layouts.backend')
@section('content')
<div class="wrapper">

    {{-- @include('backend.includes.navbar-top', [
    'add' => 'customers',
    'url' => route('backend.admin.customers.show')
    ]) --}}

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Danh sách </h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.customers.store') }}">
                {{--  --}}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên</label>
                                    <input type="text" name="name" id="title" class="form-control"
                                        value="{{old('name')}}" placeholder="Tên ..." />
                                    @error('name')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Số điện thoại</label>
                                    <input type="number" name="phone" id="title" class="form-control"
                                        value="{{old('phone')}}" placeholder="Số điện thoại ..." />
                                    @error('phone')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <input type="email" name="email" id="title" class="form-control"
                                        value="{{old('email')}}" placeholder="Email ..." />
                                    @error('email')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Mật khẩu</label>
                                    <input type="password" name="password" id="title" class="form-control"
                                        value="{{old('password')}}" placeholder="Mật khẩu ..." />
                                    @error('password')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Xác nhận mật khẩu</label>
                                    <input type="password" name="re_password" id="title" class="form-control"
                                        value="{{old('re_password')}}" placeholder="Xác nhận mật khẩu ..." />
                                    @error('re_password')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Tạo mới" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.customers.show') }}" class="btn btn-secondary float-left">Quay lại</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection