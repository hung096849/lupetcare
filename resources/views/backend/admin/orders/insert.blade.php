@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'add' => 'Thêm dịch vụ pet',
    // 'url' => route('backend.admin.categories.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i>Thêm dịch vụ</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.orders.insert.service.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="">Tên thú cưng</label>
                                  <select class="form-control" name="pet_id" id="">
                                      @foreach ($petInfo as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }} --- {{ $item->code }}</option>
                                      @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Dịch vụ</label>
                                  <select class="form-control" name="service_id" id="">
                                      @foreach ($services as $item)
                                        <option value="{{ $item->id }}"> {{ $item->service_name }}</option>
                                      @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Mã hóa đơn</label>
                                  <select class="form-control" name="order_id" id="">
                                      @foreach ($order as $item)
                                        <option value="{{ $item->id }}"> {{ $item->order_code }}</option>
                                      @endforeach
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
                        <a href="{{ route('backend.admin.orders.show') }}" class="btn btn-secondary float-left">Quay lại</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection