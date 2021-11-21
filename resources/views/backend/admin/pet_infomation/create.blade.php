@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'add' => 'Pet Information',
    'url' => route('backend.admin.petinformation.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i>Thêm thú cưng</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.petinformation.store') }}">
                {{--  --}}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên thú cưng</label>
                                    <input type="text" name="name" id="title" class="form-control"
                                        value="{{old('name')}}" placeholder="Tên thú cưng ..." />
                                    @error('name')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Mã thú cưng</label>
                                    <input type="text" name="code" id="title" class="form-control"
                                        value="{{old('code')}}" placeholder="1 2 3 ..." />
                                    @error('code')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Cân nặng</label>
                                    <select class="form-control" name="weight" id="">
                                    @foreach (Config::get('dataWeight.WEIGHT') as $key => $value)
                                        <option value="{{$key}}" @if($key==old('weight')) selected @endif >{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                  <label for="">Giới tính</label>
                                  <select class="form-control" name="gender" id="">
                                    <option value="1">Đực</option>
                                    <option value="2">Cái</option>
                                  </select>
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