@extends('layouts.backend')
@section('content')
    <div class="wrapper">

        @include('backend.includes.navbar-top', [
            'list' => 'Danh sách người dùng',
            'url' => route('backend.admin.users.show')
        ])

        <div class="content-wrapper" style="min-height: 1602px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6" style="padding:30px;">
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Chi tiết người dùng</h1>
                            <a href="{{ route('backend.admin.users.edit', $user->id) }}" class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Sửa</a>
                            <a href="{{ route('backend.admin.users.delete', $user->id) }}" class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Xóa</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Tên</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" disabled/>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" disabled/>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Số lần được làm việc</label>
                                        <input value="{{ $user->number_book }}"  class="form-control" disabled/>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Mật khẩu</label>
                                        <input type="password" value="{{ $user->password }}" name="password" id="password" class="form-control" disabled/>

                                    </div>

                                    <div class="form-group">
                                        <label for="inputStatus">Vai trò chính</label>
                                        <select id="inputStatus" name="role_id" class="form-control custom-select" disabled>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id == $role->id ? 'selected' : '') }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Avatar</label>
                                        <div class="input-group">
                                    
                                            <label class="form__banner form__file-presenter">
                                                <img
                                                    class="form__file-thumb"
                                                    src="{{ asset('storage/avatars/'.$user->avatar) }}"
                                                />
                                            </label>
                                        </div>
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

<!-- @include('backend.forms.delete', [
    'id' => $user->id,
    'route' => route('backend.admin.users.delete', $user->id)
]) -->