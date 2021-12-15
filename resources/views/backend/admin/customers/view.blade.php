@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'show' => 'customers',
    'id' => $customers->id,
    'url' => route('backend.admin.customers.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i>  Khách hàng</h1>
                        <a href="{{ route('backend.admin.customers.edit', $customers->id) }}"
                            class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Sửa</a>
                        <a href="{{ route('backend.admin.customers.delete', $customers->id) }}"
                            class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Xóa</a>
                        <a href="{{ route('backend.admin.customers.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <input type="hidden" name="id" value="{{ $customers->id }}" />
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên khách hàng</label>
                                <input type="text" name="name" id="title" class="form-control"
                                    value="{{old('name',$customers->name)}}" readonly/>
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
                                    value="{{old('phone',$customers->phone)}}" readonly/>
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
                                    value="{{old('email',$customers->email)}}" readonly/>
                                @error('email')
                                <div class="mt-1 text-red-500">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Ngày khởi tạo</label>
                                <input type="datetime" name="created_at" id="title" class="form-control"
                                    value="{{old('created_at',$customers->created_at)}}" readonly/>
                                @error('created_at')
                                <div class="mt-1 text-red-500">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Trạng thái</label>
                                <input type="datetime" name="status" id="title" class="form-control"
                                    value=" {{ $customers->status == 0 ? 'Khách hàng' : 'Thành viên' }}" readonly/>
                                @error('status')
                                <div class="mt-1 text-red-500">
                                    {{$message}}
                                </div>
                                @enderror
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

</div>

@endsection