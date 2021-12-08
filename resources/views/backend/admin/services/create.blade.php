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
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Danh mục</label>
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
                                            <label for="inputName">Tên dịch vụ</label>
                                            <input type="text" name="service_name" id="title" class="form-control"
                                                value="{{old('service_name')}}" placeholder="Name ..." />
                                            @error('service_name')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Hình ảnh</label>
                                            <input type="file" name="image" id="title" class="form-control"
                                                value="{{old('image')}}" placeholder="" />
                                            <img id="blah" src="" width="100px" class="mt-2" />
                                            @error('image')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
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
                                                value="{{old('price')}}" placeholder="" />
                                            @error('price')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Giảm giá</label>
                                            <input type="text" name="price_sale" id="title" class="form-control"
                                                value="{{old('price_sale')}}" placeholder="" />
                                            @error('price_sale')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Trạng thái</label>
                                            <select name="status" id="" class="custom-select">
                                                <option value="{{ old('status', 0 ) }}">Hoạt động</option>
                                                <option value="{{ old('status', 1 ) }}">Không hoạt động</option>
                                            </select>
                                            @error('status')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Thời gian</label>
                                            <input type="text" name="time" id="title" class="form-control"
                                                value="{{old('time')}}" placeholder="" />
                                            @error('time')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Chi tiết</label>

                                        <textarea type="text" name="detail" id="detail" class="form-control"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'detail' );
                                        </script>
                                    @error('detail')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Miêu tả</label>
                                    <textarea type="text" name="description" id="description" class="form-control"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'description' );
                                    </script>

                                    @error('description')
                                    <div class="mt-1 text-red-500">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Tạo mới" class="btn btn-success float-left mr-2" />
                                        <a href="{{ route('backend.admin.services.show') }}" class="btn btn-secondary float-left">Quay lại</a>
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
