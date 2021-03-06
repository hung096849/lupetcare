@extends('layouts.backend')
@section('content')
<div class="wrapper">

  @include('backend.includes.navbar-top', [

  'url' => route('backend.admin.dashboard.show')
  ])

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
      width="60">
  </div>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              {{-- {{ route('frontend.homepage.show') }} --}}
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{ $orders->count() }}</h3>
                <p>Danh sách đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('backend.admin.orders.show') }}" class="small-box-footer">Xem thêm <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $customers->count() }}</h3>
                <p>Khách hàng đăng kí hệ thống</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('backend.admin.customers.show') }}" class="small-box-footer">Xem thêm <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $services->count() }}</h3>
                <p>Tổng số dịch vụ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('backend.admin.services.show') }}" class="small-box-footer">Xem thêm <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Danh sách nhân viên chăm nhất</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle text-center">
                  <thead>
                    <tr>
                      <th>Tên nhân viên</th>
                      <th>Tổng số đơn chăm sóc thú cưng</th>
                      <th>Số đơn theo thực tế</th>
                      <th>Doanh thu theo đơn hàng thành công</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>
                        <img src="{{ asset("/storage/avatars/$user->avatar") }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                        {{ $user->name }}
                      </td>
                      <td>
                        {{ $user->number_book }}
                      </td>
                      <td>
                        {{ $number }}
                      </td>
                      <td>
                        {{ $total }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="card bg-gradient-success" style="position: relative; left: 0px; top: 0px;">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">December 2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="11/28/2021" class="day old weekend">28</td><td data-action="selectDay" data-day="11/29/2021" class="day old">29</td><td data-action="selectDay" data-day="11/30/2021" class="day old">30</td><td data-action="selectDay" data-day="12/01/2021" class="day">1</td><td data-action="selectDay" data-day="12/02/2021" class="day">2</td><td data-action="selectDay" data-day="12/03/2021" class="day">3</td><td data-action="selectDay" data-day="12/04/2021" class="day weekend">4</td></tr><tr><td data-action="selectDay" data-day="12/05/2021" class="day weekend">5</td><td data-action="selectDay" data-day="12/06/2021" class="day">6</td><td data-action="selectDay" data-day="12/07/2021" class="day">7</td><td data-action="selectDay" data-day="12/08/2021" class="day">8</td><td data-action="selectDay" data-day="12/09/2021" class="day">9</td><td data-action="selectDay" data-day="12/10/2021" class="day">10</td><td data-action="selectDay" data-day="12/11/2021" class="day weekend">11</td></tr><tr><td data-action="selectDay" data-day="12/12/2021" class="day weekend">12</td><td data-action="selectDay" data-day="12/13/2021" class="day">13</td><td data-action="selectDay" data-day="12/14/2021" class="day">14</td><td data-action="selectDay" data-day="12/15/2021" class="day">15</td><td data-action="selectDay" data-day="12/16/2021" class="day">16</td><td data-action="selectDay" data-day="12/17/2021" class="day">17</td><td data-action="selectDay" data-day="12/18/2021" class="day weekend">18</td></tr><tr><td data-action="selectDay" data-day="12/19/2021" class="day weekend">19</td><td data-action="selectDay" data-day="12/20/2021" class="day">20</td><td data-action="selectDay" data-day="12/21/2021" class="day active today">21</td><td data-action="selectDay" data-day="12/22/2021" class="day">22</td><td data-action="selectDay" data-day="12/23/2021" class="day">23</td><td data-action="selectDay" data-day="12/24/2021" class="day">24</td><td data-action="selectDay" data-day="12/25/2021" class="day weekend">25</td></tr><tr><td data-action="selectDay" data-day="12/26/2021" class="day weekend">26</td><td data-action="selectDay" data-day="12/27/2021" class="day">27</td><td data-action="selectDay" data-day="12/28/2021" class="day">28</td><td data-action="selectDay" data-day="12/29/2021" class="day">29</td><td data-action="selectDay" data-day="12/30/2021" class="day">30</td><td data-action="selectDay" data-day="12/31/2021" class="day">31</td><td data-action="selectDay" data-day="01/01/2022" class="day new weekend">1</td></tr><tr><td data-action="selectDay" data-day="01/02/2022" class="day new weekend">2</td><td data-action="selectDay" data-day="01/03/2022" class="day new">3</td><td data-action="selectDay" data-day="01/04/2022" class="day new">4</td><td data-action="selectDay" data-day="01/05/2022" class="day new">5</td><td data-action="selectDay" data-day="01/06/2022" class="day new">6</td><td data-action="selectDay" data-day="01/07/2022" class="day new">7</td><td data-action="selectDay" data-day="01/08/2022" class="day new weekend">8</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month active">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

        </div>

      </div>
    </section>
  </div>
  <!-- Control Sidebar -->

</div>
@endsection