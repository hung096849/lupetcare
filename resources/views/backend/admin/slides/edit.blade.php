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
                                       
                                        </div>
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
