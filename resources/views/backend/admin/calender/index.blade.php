<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xếp lịch</title>

    <link rel="stylesheet" href="{{ asset('backend/css/css.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- Ckeditor -->
    <script type="text/javascript" src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>

    {{-- <script src="{{ asset('backend/js/schedule/dhtmlxscheduler.js') }}"></script>
    <script src="{{ asset('backend/js/schedule/dhtmlxscheduler_recurring.js') }}"></script>
    <link href="{{ asset('backend/css/schedule/dhtmlxscheduler.css') }}" rel="stylesheet"> --}}

    <script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
    <script src="https://cdn.dhtmlx.com/scheduler/edge/ext/dhtmlxscheduler_recurring.js"></script>
    <link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.css" rel="stylesheet">
    <style type="text/css">
        html,
        body {
            height: 100%;
            padding: 0px;
            margin: 0px;
            overflow: hidden;
        }

        .timeline {
            min-height: 900px;
        }
    </style>

</head>

<body>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('backend.admin.dashboard.show') }}" class="brand-link">
            <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">LupetCare</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="{{ route('backend.admin.dashboard.show') }}" class="nav-link active">
                            {{-- {{ route('Request') }} --}}
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Trang điều khiển
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Người dùng & Quyền
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.users.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Người dùng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.role.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vai trò</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.permissions.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Quyền</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.customers.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Khách hàng
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Dịch vụ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.categories.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục dịch vụ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.services.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dịch vụ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.contacts.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-phone"></i>
                            <p>
                                Liên hệ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.petinformation.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>
                                Thông tin thú cưng
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Đơn hàng
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.orders.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.scheduled.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Xếp lịch
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.news.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Tin Tức
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.comments.show') }}" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Bình luận
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    {{-- @extends('layouts.backend')
    @section('content') --}}
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 1875.69px;">

            <div class="row">
                <div class="col-md-7 timeline">
                    <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:83%;'>
                        <div class="dhx_cal_navline">
                            <div class="dhx_cal_prev_button">&nbsp;</div>
                            <div class="dhx_cal_next_button">&nbsp;</div>
                            {{-- <div class="dhx_cal_today_button"></div> --}}
                            <div class="dhx_cal_date"></div>
                            <div class="dhx_cal_tab" name="day_tab"></div>
                            <div class="dhx_cal_tab" name="week_tab"></div>
                            <div class="dhx_cal_tab" name="month_tab"></div>
                        </div>
                        <div class="dhx_cal_header"></div>
                        <div class="dhx_cal_data"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên</th>
                                <th>SĐT</th>
                                <th>Trạng thái</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @include('backend.admin.calender.orderWatting')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('backend/js/common.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<!-- Toastr App -->
<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('backend/js/permission.js') }}"></script>
<!-- Toastr App -->
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>

<script type="text/javascript">
    scheduler.config.xml_date = "%Y-%m-%d %H:%i:%s";
    scheduler.setLoadMode("day");//!

    scheduler.init("scheduler_here", new Date(2021, 11, 19), "week");

    scheduler.load("/api/recurringEvents", "json");//!
    var dp = new dataProcessor("/api/recurringEvents");//!
    dp.init(scheduler);
    dp.setTransactionMode("REST");
</script>
<script>
    $(function () {
      $('#datetimepicker1').datetimepicker();
   });
</script>
<script>
    $(function() {
    $("#datepicker").datepicker();
    } );
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.submit').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var route = $(this).data('route');
        var user_id = $('#user_id').val();
        var time_start = $(`#time_start_${id}`).val();
        var date_start = $(`#date_start_${id}`).val();
        var start_date =  `${date_start} ${time_start}`;

        var time_end = $(`#datetimepicker_${id}`).val();
        var date_end = $(`#datepicker_${id}`).val();
        var end_date = `${date_end} ${time_end}`;
        
        var text = $(`#text_${id}`).val();
        $.ajax({
            type: "post",
            url: "/api/create",
            data: {
                user_id,
                id,
                start_date,
                end_date,
                text
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if(response.status == 200 ){
                    toastr.success('Xếp lịch hẹn thành công !');
                    location.href = route
                }
            }
        });
    });
</script>

</html>