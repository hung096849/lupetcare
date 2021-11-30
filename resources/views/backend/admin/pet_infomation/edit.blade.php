@extends('layouts.backend')
@section('content')
<div class="wrapper">

    {{-- @include('backend.includes.navbar-top', [
    'edit' => 'petinfomation',
    'id' => $petinfomation->id,
    'url' => route('backend.admin.petinfomation.show')
    ]) --}}

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> petinfomation Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.petinformation.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $petinfomation->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="inputName">Mã thú cưng</label>
                                    <input type="text" class="form-control"
                                        value="{{old('name',$petinfomation->code)}}" readonly />
                                </div> --}}
                                
                                <div class="form-group">
                                    <label for="inputName">Tên thú cưng</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{old('name', $petinfomation->name)}}" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputName">Cân nặng</label>
                                    <select class="form-control" name="weight" id="">
                                        @foreach (Config::get('dataWeight.WEIGHT') as $key => $value)
                                            <option value="{{$key}}" @if($key==old('weight', $petinfomation->weight)) selected @endif >{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Giới tính</label>
                                    <select class="form-control" name="gender" id="">
                                        <option value="1" {{$petinfomation->gender == 1 ? 'selected' : '' }} >Đực</option>
                                        <option value="2" {{$petinfomation->gender == 2 ? 'selected' : '' }}>Cái</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.petinformation.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>

@endsection