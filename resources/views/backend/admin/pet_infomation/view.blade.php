@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'show' => 'Pet Information',
    'id' => $petInfomation->id,
    'url' => route('backend.admin.petinformation.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Danh sách khách hàng</h1>
                        <a href="{{ route('backend.admin.petinformation.edit', $petInfomation->id) }}"
                            class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Sửa</a>
                        <a href="{{ route('backend.admin.petinformation.delete', $petInfomation->id) }}"
                            class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Xóa</a>
                        <a href="{{ route('backend.admin.petinformation.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <input type="hidden" name="id" value="{{ $petInfomation->id }}" />
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên thú cưng</label>
                                <input type="text" name="name" id="title" class="form-control"
                                    value="{{old('name',$petInfomation->name)}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Mã thú cưng</label>
                                <input type="text" name="name" id="title" class="form-control"
                                    value="{{old('name',$petInfomation->code)}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Cân nặng</label>
                                <input type="text" name="name" id="title" class="form-control"
                                    value="{{old('name',$petInfomation->weight)}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Cân nặng</label>
                                <input type="text" name="name" id="title" class="form-control"
                                    value="{{old('name',$petInfomation->gender)}}" readonly/>
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