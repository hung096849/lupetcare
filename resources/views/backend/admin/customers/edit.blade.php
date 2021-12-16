@extends('layouts.backend')
@section('content')
<div class="wrapper">

    {{-- @include('backend.includes.navbar-top', [
    'edit' => 'customers',
    'id' => $customers->id,
    'url' => route('backend.admin.customers.show')
    ]) --}}

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Sửa khách hàng</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.customers.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $customers->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên</label>
                                    <input type="text" name="name" id="title" class="form-control"
                                        value="{{old('name',$customers->name)}}" placeholder="Name ..." />
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
                                    <input type="text" name="phone" id="title" class="form-control"
                                        value="{{old('phone',$customers->phone)}}" placeholder="Phone ..." />
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
                                        value="{{old('email',$customers->email)}}" placeholder="Email ..." />
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
                                    <br>
                                    <small>Để trống để giữ nguyên</small>
                                    <input type="password" name="password" id="title" class="form-control"
                                        placeholder="Password ..." />
                                    @error('password')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nhập lai mật khẩu</label>
                                    <br>
                                    <small>Để trống để giữ nguyên</small>
                                    <input type="password" name="re_password" id="title" class="form-control"
                                        placeholder="Password ..." />
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.customers.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>

@endsection