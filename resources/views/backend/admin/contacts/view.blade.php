@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'show' => 'contacts',
    'id' => $contacts->id,
    'url' => route('backend.admin.contacts.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Ý kiến khách hàng</h1>
                       
                        <a href="{{ route('backend.admin.contacts.delete', $contacts->id) }}"
                            class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Xóa</a>
                        <a href="{{ route('backend.admin.contacts.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <input type="hidden" name="id" value="{{ $contacts->id }}" />
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{old('phone',$contacts->phone)}}" readonly/>
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
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{old('email',$contacts->email)}}" readonly/>
                                @error('email')
                                <div class="mt-1 text-red-500">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tiêu đề</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{old('title',$contacts->title)}}" readonly/>
                                @error('title')
                                <div class="mt-1 text-red-500">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Nội dung</label>
                                <input type="text" name="message" id="message" class="form-control"
                                    value="{{old('message',$contacts->message)}}" readonly/>
                                @error('message')
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