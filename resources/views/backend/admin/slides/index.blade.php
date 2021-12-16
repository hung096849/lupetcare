
@extends('layouts.backend')
@section('content')

<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'list' => 'Slide',
    'url' => route('backend.admin.slides.show')
    ])

    @include('backend.components.alert')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1875.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Slide</h1>
                        <a href="{{ route('backend.admin.slides.create') }}"
                            class="btn btn-success float-left mr-2"><i class="fas fa-plus"></i>Thêm mới</a>
                        <button class="btn btn-danger float-left delete_all"
                            data-url="{{ route('backend.admin.slides.slides.delete') }}">
                            <i class="fas fa-trash"></i>Xóa hàng loạt</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
        
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input form__check-all" type="checkbox">
                                                    </div>
                                                </div>
                                            </th>
                                            <th>Số thứ tự</th>
                                            <th>Ảnh</th>
                                        </tr>
                                    </thead>
                                </table>

                                <div class="ajax-load text-center" style="display:none">
                                    <p><img src="{{ asset('backend/image/common/search.gif') }}" width="100px" /></p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <!-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div> -->
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers float-right" id="example2_paginate">
                            @include('backend.components.pagination', ['paginator' => $slides])
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <div id="sidebar-overlay"></div>
</div>
@endsection
