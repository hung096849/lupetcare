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
                <form method="POST" enctype="multipart/form-data" action="{{ route('backend.admin.services.update') }}">
                    {{--  --}}
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    {{ method_field('PATCH') }}

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $services->id }}" />

                                                <label for="inputName">Danh muc</label>
                                                <select name="category_id" id="" class="custom-select">
                                                    @foreach ($categories as $categorie)
                                                        <option @if ($categorie->id == old('category_id', $services->category_id))
                                                    @endif
                                                    {{ $services->category_id === $categorie->id ? 'selected' : '' }}
                                                    value="{{ $categorie->id }}">
                                                    {{ $categorie->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Tên dịch vụ</label>
                                                <input type="text" name="service_name" id="title" class="form-control"
                                                    value="{{ old('service_name', $services->service_name) }}"
                                                    placeholder="Name ..." />
                                                @error('service_name')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Hình ảnh</label>
                                                <img id="blah" src="" width="100px" class="mt-2" />
                                                <input type="file" name="image" id="title" class="form-control"
                                                    value="{{ old('image', $services->image) }}" placeholder="" />
                                                @error('image')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <script>
                                                    function readURL(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $('#blah').attr('src', e.target.result);
                                                            }
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                    $(document).ready(function() {
                                                        $("#image").change(function(e) {
                                                            readURL(this);
                                                            console.log(this.files);
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Giá</label>
                                                <input type="text" name="price" id="title" class="form-control"
                                                    value="{{ old('price', $services->price) }}" placeholder="" />
                                                @error('price')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Giảm giá</label>
                                                <input type="text" name="price_sale" id="title" class="form-control"
                                                    value="{{ old('price_sale', $services->price_sale) }}"
                                                    placeholder="" />
                                                @error('price_sale')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Trạng thái</label>
                                                <select name="status" id="" class="custom-select">
                                                    <option value="{{ old('status', 0) }}">Hoạt động</option>
                                                    <option value="{{ old('status', 1) }}">Không hoạt động</option>
                                                </select>
                                                @error('status')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Thời gian</label>
                                                <input type="text" name="time" id="title" class="form-control"
                                                    value="{{ old('time', $services->time) }}" placeholder="" />
                                                @error('time')
                                                    <div class="mt-1 text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Chi tiết</label>
                                        <input type="text" name="detail" id="title" class="form-control"
                                            value="{{ old('detail', $services->detail) }}" placeholder="" />
                                        @error('detail')
                                            <div class="mt-1 text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Miêu tả</label>
                                        <input type="text" name="description" id="title" class="form-control"
                                            value="{{ old('description', $services->description) }}" placeholder="" />
                                        @error('description')
                                            <div class="mt-1 text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                                            <a href="{{ route('backend.admin.services.show') }}"
                                                class="btn btn-secondary float-left">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
        </div>
        </form>
        </section>
        <!-- /.content -->
    </div>

    </div>


@endsection
