@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'add' => 'services',
    'url' => route('backend.admin.services.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i>Them dich vu</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" enctype="multipart/form-data" action="{{ route('backend.admin.services.store') }}">
                {{--  --}}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">Danh muc</label>
                                    <select name="category_id" id="" class="custom-select">
                                        @foreach ($categories as $categorie )
                                            <option  value="{{ old('category_id',$categorie->id ) }}">{{ $categorie->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Ten dich vu</label>
                                    <input type="text" name="service_name" id="title" class="form-control"
                                        value="{{old('service_name')}}" placeholder="Name ..." />
                                    @error('service_name')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">image</label>
                                    <input type="file" name="image" id="title" class="form-control"
                                        value="{{old('image')}}" placeholder="" />
                                    @error('image')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">price</label>
                                    <input type="text" name="price" id="title" class="form-control"
                                        value="{{old('price')}}" placeholder="" />
                                    @error('price')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">price_sale</label>
                                    <input type="text" name="price_sale" id="title" class="form-control"
                                        value="{{old('price_sale')}}" placeholder="" />
                                    @error('price_sale')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">detail</label>
                                    <input type="text" name="detail" id="title" class="form-control"
                                        value="{{old('detail')}}" placeholder="" />
                                    @error('detail')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">description</label>
                                    <input type="text" name="description" id="title" class="form-control"
                                        value="{{old('description')}}" placeholder="" />
                                    @error('description')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">status</label>
                                    <input type="text" name="status" id="title" class="form-control"
                                        value="{{old('status')}}" placeholder="" />
                                    @error('status')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">time</label>
                                    <input type="time" name="time" id="title" class="form-control"
                                        value="{{old('time')}}" placeholder="" />
                                    @error('time')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
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
                        <a href="{{ route('backend.admin.services.show') }}" class="btn btn-secondary float-left">Quay lại</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection
