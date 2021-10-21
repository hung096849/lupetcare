@extends('layouts.frontend')
@section('content')
<section class="form-book-service">
    <div class="container-fluid container-padding">

        <div class="page-title text-center">
            <h2 class="title">
            Mang đến dịch vụ tôt nhất dành cho thú cưng của bạn
            </h2>
            <p class="sub mt-3">
            KHUYẾN KHÍCH ĐẶT LỊCH HẸN TRƯỚC. XIN VUI LÒNG LIÊN HỆ VỚI CHÚNG TÔI
            NẾU QUÝ KHÁCH CÓ BẤT KỲ THẮC MẮC NÀO LIÊN QUAN ĐẾN CÁC GÓI DỊCH VỤ
            CỦA LUPET CARE
            </p>
        </div>

        <div class="content">
            <form action="" method="POST">
                @csrf
                <div class="container">
                    <div class="book-content">
                <div class="row">
                    <div class="col-md-7 mt-4">
                        <div class="book-form">
                            <div class="book-form-service">
                            <div class="book-form-title">
                                <h2 class="text-center">Thông tin chủ sở hữu</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                <label for="Name " class="pt-4 pb-2 book-form-text">Họ và tên *</label>
                                <input type="text" name="name" class="form-control input-form-service">
                                </div>
                                <div class="col-md-6">
                                <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Số điện thoại *</label>
                                <input type="text" name="phone" class="form-control input-form-service">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="Name " class="pt-4 pb-2 book-form-text">Email của bạn *</label>
                                <input type="text" name="email" class="form-control input-form-service">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <label for="Name" class="pt-5 pb-2 book-form-text">Giờ *</label>
                                {{-- <input type="time" name="time" value="{{ old('time')}}" class="form-control input-form-service"> --}}
                                <input type="time" id="datetimepicker5" name="time" value="{{ old('time')}}" class="form-control input-form-service">
                                </div>
                                <div class="col-md-6">
                                <label for="phoneNumber" class="pt-5 pb-2 book-form-text">Ngày tháng *</label>
                            {{-- <input type="date" name="date" value="{{ old('date')}}" class="form-control input-form-service"> --}}
                                <input type="text" name="date" value="{{ old('date')}}" class="form-control input-form-service" id="datepicker">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="note" class="pt-4 pb-2 book-form-text">Ghi chú *</label>
                                <textarea class="form-control input-form-service" name="note" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                                {{-- <a href="./book-service-cart.html"> --}}
                                <button type="submit" class="btn btn-lg btn-info px-5">
                                    ĐẶT LỊCH
                                </button>
                                {{-- </a> --}}
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 mt-4">
                        <div class="book-form">
                            <div class="book-form-service">
                                <div class="book-form-title">
                                    <h2 class="text-center">Thông tin thú cưng</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú cưng *</label>
                                    <input type="text" name="pet_name[1]" class="form-control input-form-service">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Mã thú cưng *</label>
                                    <input type="text" name="code[1]" placeholder="Nếu bạn tới lần đầu thì có thể để trống ... " class="form-control input-form-service">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn dịch vụ *</label>
                                        <select id="" class="form-control input-form-service js-select2" multiple name="service_id[1]">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"> {{ $service->service_name }} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú cưng*</label>
                                    <select id="" name="weight[1]" class="form-control input-form-service">
                                        <option value="1"> &lt;5kg </option>
                                        <option value="2">5kg-8kg</option>
                                        <option value="3">8kg-10kg</option>
                                        <option value="4">&gt;10kg</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn thú cưng của bạn</label>
                                    <select id="" name="type[1]" class="form-control input-form-service">
                                        <option value="1"> Chó </option>
                                        <option value="2">Mèo</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn giới tính</label>
                                    <select id="" name="gender[1]" class="form-control input-form-service">
                                        <option value="1"> Đực </option>
                                        <option value="2">Cái</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="book-form">
                            <div class="book-form-service">
                                <div class="book-form-title">
                                    <h2 class="text-center">Thông tin thú cưng</h2>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú cưng *</label>
                                    <input type="text" name="pet_name[2]" class="form-control input-form-service">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn dịch vụ *</label>
                                        <select id="" class="form-control input-form-service" name="service_id[2]">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"> {{ $service->service_name }} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú cưng*</label>
                                    <select id="" name="weight[2]" class="form-control input-form-service">
                                        <option value="1"> &lt;5kg </option>
                                        <option value="2">5kg-8kg</option>
                                        <option value="3">8kg-10kg</option>
                                        <option value="4">&gt;10kg</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn thú cưng của bạn</label>
                                    <select id="" name="type[2]" class="form-control input-form-service">
                                        <option value="1"> Chó </option>
                                        <option value="2">Mèo</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn giới tính</label>
                                    <select id="" name="gender[2]" class="form-control input-form-service">
                                        <option value="1">Đực</option>
                                        <option value="2">Cái</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right my-4 pr-2 d-flex add-form-pet">
                        <div class=""><i class="fas fa-plus-circle"></i></div>
                        <div class="pl-3">Thêm thú cưng</div></div>
                    </div>
                    
                </div>
                </div>
                </div>
            </form>
        </div>
        @if(Session::has('message'))
        <p class="alert alert-success">
            {{Session::get('message')}}
        </p>
        @endif
    </div>
  </section>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.js-select2').select2();
        });
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        jQuery('#datetimepicker5').datetimepicker({
            datepicker:false,
            allowTimes:[
            '12:00', '13:00', '15:00', 
            '17:00', '17:05', '17:20', '19:00', '20:00'
            ]
            });
    </script>
@endsection