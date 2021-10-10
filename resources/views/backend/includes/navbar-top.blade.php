<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <ol class="breadcrumb float-sm-right breadcrumb-top-nav">
            <li class="breadcrumb-item"><a href="{{ route('backend.admin.dashboard.show') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            @if(isset($list))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $list ?? __('') }}</a></li>
            @endif
            @if(isset($show) && isset($id))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $show ?? __('') }}</a></li>
                <li class="breadcrumb-item active">{{ $id ?? __('') }}</li>
                <li class="breadcrumb-item active">View</li>
            @endif
            @if(isset($edit) && isset($id))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $edit ?? __('') }}</a></li>
                <li class="breadcrumb-item active">{{ $id ?? __('') }}</li>
                <li class="breadcrumb-item active">Edit</li>
            @endif
            @if(isset($add))
                <li class="breadcrumb-item active"><a href="{{ $url ?? __('') }}">{{ $add ?? __('') }}</a></li>
            @endif
        </ol>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="nav-icon fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Đổi mật khẩu
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Thông tin chi tiết
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i>Đăng xuất
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
