@extends('layouts.backend')

@section('content')

<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'show' => 'news',
    'id' => $news->id,
    'url' => route('backend.admin.news.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Danh mục</h1>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <input type="hidden" name="id" value="{{ $news->id }}" />
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                    <p>{{ $news->title }}</p>
                                <label for="">Ảnh Tiêu đề</label>
                                    <p><img src="{{ asset('storage/News_image/' . $news->image) }}" alt=""
                                        style="width: 100%;"></p>
                                {!! $news->detail !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection
