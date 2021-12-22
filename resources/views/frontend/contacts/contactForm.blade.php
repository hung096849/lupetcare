@extends('layouts.frontend')
@section('content')

    <section class="page_contact loading-page">
      <div class="container">
        <div class="contact">
          <div class="title mb-4">
            <h4 class="page_contact_title">LIÊN HỆ</h4> </div>
          <div class="main row">
            <div class=" col-12 col-lg-7 ">
              <div class="message">
                <div class="title">
                  <h4 class="mass_title">BẠN VUI LÒNG ĐỂ LẠI LỜI NHẮN !</h4> </div>
                  @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
                <form class="py-3"method="POST" action="{{ route('frontend.contact_sendmail.contact.send') }}">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Họ và tên *</label>
                      <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif </div>
                    <div class="mb-3col-12 col-md-6">
                      <label for="exampleInputPassword1" class="form-label">Số điện thoại *</label>
                      <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif </div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email *</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tiêu đề *</label>
                    <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Lời nhắn *</label>
                    <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                  </div>
                  <button type="submit" style=" background-color: #79B6D0; color:#fff; border-radius: 5px;padding: 10px 25px " class="btn  btn-lg button" onclick="this.classList.toggle('button--loading')"> <span class="button__text">GỬI NGAY</span> </button>

                </form>
              </div>

            </div>
            <div class=" col-12 col-lg-5 ">
              <div class="info">
                <div class="title border-bottom py-3" style="color: #529ebe">
                  <h5>THÔNG TIN LIÊN HỆ</h5> </div>
                <div class="content py-3">
                  <h6>CỬA HÀNG THÚ CƯNG LUPET CARE</h6> </div>
                <div class="row align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#529EBE" class="bi bi-pin-map col-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5
                          15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5
                          0
                          0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5
                            3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" /> </svg>
                  <h6 class="col-10">
                            Địa Chỉ: Số 1 Trịnh Văn Bô , Nam Từ Liêm , Hà Nội
                          </h6> </div>
                <div class="row align-items-center py-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#529EBE" class="bi bi-envelope col-2" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2
                              2H2a2
                              2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1
                              0
                              0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034
                              6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0
                              0
                              2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1
                              5.383v5.73z" /> </svg>
                  <h6 class="col-10">Email : lupetcare@gmail.com</h6> </div>
                <div class="row align-items-center py-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#529EBE" class="bi bi-telephone col-2" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605
                                2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0
                                4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211
                                1.286.033 1.77-.45l1.034-1.034a.678.678 0 0
                                0-.063-1.015l-2.307-1.794a.678.678 0 0
                                0-.58-.122l-2.19.547a1.745 1.745 0 0
1-1.657-.459L5.482
                                8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0
                                0
                                0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1
                                2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547
                                2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0
                                0
                                .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306
                                1.794c.829.645.905 1.87.163 2.611l-1.034
                                1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0
                                1-7.01-4.42 18.634 18.634 0 0
                                1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" /> </svg>
                  <h6 class="col-10">Số điện thoại : 0337082555</h6> </div>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

@endsection
