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
                                <input type="text" class="form-control input-form-service">
                                </div>
                                <div class="col-md-6">
                                <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Số điện thoại *</label>
                                <input type="text" class="form-control input-form-service">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="Name " class="pt-4 pb-2 book-form-text">Email của bạn *</label>
                                <input type="text" class="form-control input-form-service">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <label for="Name" class="pt-5 pb-2 book-form-text">Giờ *</label>
                                <input type="time" class="form-control input-form-service">
                                </div>
                                <div class="col-md-6">
                                <label for="phoneNumber" class="pt-5 pb-2 book-form-text">Ngày tháng *</label>
                                <input type="date" class="form-control input-form-service">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="ghichu" class="pt-4 pb-2 book-form-text">Ghi chú *</label>
                                <textarea class="form-control input-form-service" id="exampleFormControlTextarea1" rows="4"></textarea>
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
                                <input type="text" class="form-control input-form-service">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="Name " class="pt-4 pb-2 book-form-text">Chọn dịch vụ *</label>
                                <select id="inputState" class="form-control input-form-service">
                                    <option selected="">Tắm</option>
                                    <option>...</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú cưng*</label>
                                <select id="inputState" class="form-control input-form-service">
                                    <option selected=""> &lt;5kg </option>
                                    <option>5kg-8kg</option>
                                    <option>8kg-10kg</option>
                                    <option>&gt;10kg</option>
                                </select>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="pl-4 col-md-6 ">
                                <label for="Name " class="pt-2 pb-2 book-form-text">Chọn thú cưng của bạn:
                                </label>
                                </div>
                                <div class="pl-4 col-md-6">
                                <div class="row">
                                    <div class="col-md-3 text-center d-flex mr-5 pt-2">
                                    <input type="radio" class="mt-2">
                                    <label for="" class="pl-2 ">
                                        Chó
                                    </label>
                                    </div>
                                    <div class="col-md-3 text-center d-flex pt-2">
                                    <input type="radio" class="mt-2">
                                    <span for="" class="pl-2">Mèo</span>
                                    </div>
                                </div>

                                
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    <div class="book-form mt-4 ">
                        <div class="book-form-service">
                        <div class="book-form-title">
                            <h2 class="text-center">Thông tin thú cưng</h2>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú cưng *</label>
                            <input type="text" class="form-control input-form-service">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <label for="Name " class="pt-4 pb-2 book-form-text">Chọn dịch vụ *</label>
                            <select id="inputState" class="form-control input-form-service">
                                <option selected="">Tắm</option>
                                <option>...</option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú cưng*</label>
                            <select id="inputState" class="form-control input-form-service">
                                <option selected=""> &lt;5kg </option>
                                <option>5kg-8kg</option>
                                <option>8kg-10kg</option>
                                <option>&gt;10kg</option>
                            </select>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="pl-4 col-md-6 ">
                            <label for="Name " class="pt-2 pb-2 book-form-text">Chọn thú cưng của bạn:
                            </label>
                            </div>
                            <div class="pl-4 col-md-6">
                            <div class="row">
                                <div class="col-md-3 text-center d-flex mr-5 pt-2">
                                <input type="radio" class="mt-2">
                                <label for="" class="pl-2 ">
                                    Chó
                                </label>
                                </div>
                                <div class="col-md-3 text-center d-flex pt-2">
                                <input type="radio" class="mt-2">
                                <span for="" class="pl-2">Mèo</span>
                                </div>
                            </div>

                            
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
        
    </div>
  </section>

@endsection