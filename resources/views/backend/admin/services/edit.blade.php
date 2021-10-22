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
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Sua dich vu</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" enctype="multipart/form-data" action="">
                {{--  --}}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label for="inputName">Danh muc</label>
                                    <select name="category_id" id="">
                                        @foreach ($categories as $categorie )
                                        <option
                                        @if ($categorie->id == old('category_id', $services->category_id))
                                        @endif {{ $services->category_id === $categorie->id ? 'selected' : '' }}
                                        value="{{ $categorie->id }}">
                                        {{ $categorie->name }}</option>


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
                                        value="{{old('service_name', $services->service_name)}}" placeholder="Name ..." />
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
                                        value="{{old('price', $services->price)}}" placeholder="" />
                                    @error('price')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">price_sale</label>
                                    <input type="text" name="price_sale" id="title" class="form-control"
                                        value="{{old('price_sale', $services->price_sale)}}" placeholder="" />
                                    @error('price_sale')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">detail</label>
                                    <input type="text" name="detail" id="title" class="form-control"
                                        value="{{old('detail' , $services->detail)}}" placeholder="" />
                                    @error('detail')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">description</label>
                                    <input type="text" name="description" id="title" class="form-control"
                                        value="{{old('description', $services->description)}}" placeholder="" />
                                    @error('description')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">status</label>
                                    <input type="text" name="status" id="title" class="form-control"
                                        value="{{old('status', $services->status)}}" placeholder="" />
                                    @error('status')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">time</label>
                                    <input type="text" name="time" id="title" class="form-control"
                                        value="{{old('time', $services->time)}}" placeholder="" />
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
                        <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                        <a href="{{ route('backend.admin.services.show') }}" class="btn btn-secondary float-left">Quay lại</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection
