  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.admin.dashboard.show') }}" class="brand-link">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light">Lupet</span>
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
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                  </button>
              </div>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('backend.admin.dashboard.show') }}" class="nav-link active">
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
                <li class="nav-item">
                    <a href="{{ route('backend.admin.slides.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Slides
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.admin.sms.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-sms"></i>
                        <p>
                            Tin nhắn
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
