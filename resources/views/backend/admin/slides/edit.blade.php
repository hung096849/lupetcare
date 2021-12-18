@extends('layouts.backend')
@section('content')
    <div class="wrapper">

        @include('backend.includes.navbar-top', [
        'edit' => 'slides',
        'id' => $slides->id,
        'url' => route('backend.admin.slides.show')
        ])

        <div class="content-wrapper" style="min-height: 1602px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6" style="padding:30px;">
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Sửa slide</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form method="POST" enctype="multipart/form-data" action="{{ route('backend.admin.slides.update') }}">
                    {{--  --}}
                    @csrf
                    {{ method_field('PATCH') }}
                     <input type="hidden" name="id" value="{{ $slides->id }}" />
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
                                                    value="{{('image') }}" placeholder="" />
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
                                            <div class="form-group">
                                            <label for="inputName">Tiêu đề</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                value="{{old('title',$slides->title)}}" placeholder="Name ..." />
                                            @error('title')
                                            <div class="mt-1 text-red-500">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                        <label for="inputName">Nội dung</label>
                                        <textarea type="text" name="content" id="content" class="form-control">{{ $slides->content }}</textarea>
                                    <script>
                                        CKEDITOR.replace( 'content' );
                                    </script>
                                        @error('content')
                                            <div class="mt-1 text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                        </div>
                                       
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Sửa" class="btn btn-success float-left mr-2" />
                                            <a href="{{ route('backend.admin.slides.show') }}"
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
