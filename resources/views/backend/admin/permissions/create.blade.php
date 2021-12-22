@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
        'add' => 'Quyền',
        'url' => route('backend.admin.permissions.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Thêm quyền</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.permissions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Bảng phân quyền</label>
                                    <select id="inputStatus" name="name" class="form-control custom-select" required>
                                        <option value="{{ $data['users'] }}">{{ $data['users'] }}</option>
                                        <option value="{{ $data['roles'] }}">{{ $data['roles'] }}</option>
                                        <option value="{{ $data['customers'] }}">{{ $data['customers'] }}</option>
                                        <option value="{{ $data['permissions'] }}">{{ $data['permissions'] }}</option>
                                        <option value="{{ $data['categories'] }}">{{ $data['categories'] }}</option>
                                        <option value="{{ $data['news'] }}">{{ $data['news'] }}</option>
                                        <option value="{{ $data['services'] }}">{{ $data['services'] }}</option>
                                        <option value="{{ $data['comments'] }}">{{ $data['comments'] }}</option>
                                        <option value="{{ $data['sms'] }}">{{ $data['sms'] }}</option>
                                        <option value="{{ $data['orders'] }}">{{ $data['orders'] }}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Key</label>
                                    <select id="inputStatus" name="slug" class="form-control show-permission-table" required>
                                        <option value="">Chọn quyền của bạn</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Tạo mới quyền" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection

@section('js')
    <script>
        $( ".custom-select" ).change(function() {
            var table = $(this).val();
            var html = `
                <option value="list-${table.replace('_', '-')}">list-${table.replace('_', '-')}</option>
                <option value="view-${table.replace('_', '-')}">view-${table.replace('_', '-')}</option>
                <option value="edit-${table.replace('_', '-')}">edit-${table.replace('_', '-')}</option>
                <option value="delete-${table.replace('_', '-')}">delete-${table.replace('_', '-')}</option>
                <option value="create-${table.replace('_', '-')}">create-${table.replace('_', '-')}</option>
            `
            $('.show-permission-table').html(html);
        });
    </script>
@endsection
