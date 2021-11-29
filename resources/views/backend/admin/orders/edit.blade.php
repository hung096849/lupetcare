@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'edit' => 'Sửa dịch vụ',
    // 'url' => route('backend.admin.orders.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.orders.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $orderPet->id }}" />
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Tên thú cưng</label>
                                        <input type="text" class="form-control"
                                            value="{{ $orderPet->petInformation->name }}" readonly />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Mã thú cưng</label>
                                        <input type="text" class="form-control"
                                            value="{{ $orderPet->petInformation->code }}" readonly />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Cân nặng</label>
                                        <select class="form-control">
                                        @foreach (Config::get('dataWeight.WEIGHT') as $key => $value)
                                            <option value="{{$key}}" @if($key==old('weight', $orderPet->petInformation->weight)) selected @endif readonly>{{$value}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="">Chọn dịch vụ</label>
                                      <select class="form-control" name="service_id">
                                        @foreach ($services as $item)
                                            <option value="{{ $item->id }}" {{ $item->id === $orderPet->service_id ? 'selected' : "" }}>{{ $item->service_name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.orders.show') }}" class="btn btn-primary float-left">Quay lại danh sách</a>
                    </div>
                </div>
            </form>
        </section>
</div>
@endsection