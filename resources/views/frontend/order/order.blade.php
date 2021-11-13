@extends('layouts.frontend')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form role="form" action="{{ route('frontend.payment.postPayment') }}" method="post" class="require-validation"
    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
    @csrf
    <input type="hidden" id="paymentPrice" name="total" value="">
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
            @if(Session::has('total'))
            <p class="alert alert-success">
                {{Session::get('total')}}
            </p>
            @endif
            <div class="content">
                {{-- <form action="" method="POST">
                    @csrf --}}
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
                                                    <label for="Name " class="pt-4 pb-2 book-form-text">Họ và tên
                                                        *</label>
                                                    <input type="text" name="name"
                                                        class="form-control input-form-service">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Số điện
                                                        thoại
                                                        *</label>
                                                    <input type="text" name="phone"
                                                        class="form-control input-form-service">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="Name " class="pt-4 pb-2 book-form-text">Email của bạn
                                                        *</label>
                                                    <input type="text" name="email"
                                                        class="form-control input-form-service">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="Name" class="pt-5 pb-2 book-form-text">Giờ *</label>
                                                    <input type="time" id="datetimepicker5" name="time"
                                                        value="{{ old('time')}}"
                                                        class="form-control input-form-service">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phoneNumber" class="pt-5 pb-2 book-form-text">Ngày tháng
                                                        *</label>
                                                    <input type="text" name="date" value="{{ old('date')}}"
                                                        class="form-control input-form-service" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="note" class="pt-4 pb-2 book-form-text">Ghi chú *</label>
                                                    <textarea class="form-control input-form-service" name="note"
                                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                                                <button type="button" class="btn btn-lg btn-info px-5" id="appointment">
                                                    ĐẶT LỊCH
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="box_bookService" class="col-md-5 mt-4">
                                    <div id="box_quan"></div>
                                    {{-- <div class="book-form">
                                        <div class="book-form-service">
                                            <div class="book-form-title">
                                                <h2 class="text-center">Thông tin thú cưng</h2>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú
                                                        cưng
                                                        *</label>
                                                    <input type="text" name="pet_name[1][]"
                                                        class="form-control input-form-service">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Mã thú
                                                        cưng
                                                        *</label>
                                                    <input type="text" name="code[1][]"
                                                        placeholder="Nếu bạn tới lần đầu thì có thể để trống ... "
                                                        class="form-control input-form-service">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Mã thú
                                                        cưng
                                                        *</label>
                                                    <input type="text" name="code[2][]"
                                                        placeholder="Nếu bạn tới lần đầu thì có thể để trống ... "
                                                        class="form-control input-form-service">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn dịch vụ
                                                        *</label>
                                                    <select id="" class="form-control input-form-service js-select2"
                                                        multiple name="service_id[1][]">
                                                        @foreach ($services as $service)
                                                        <option value="{{ $service->id }}"> {{ $service->service_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng
                                                        thú
                                                        cưng*</label>
                                                    <select id="" name="weight[1][]"
                                                        class="form-control input-form-service">
                                                        <option value="1"> &lt;5kg </option>
                                                        <option value="2">5kg-8kg</option>
                                                        <option value="3">8kg-10kg</option>
                                                        <option value="4">&gt;10kg</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn thú cưng
                                                        của
                                                        bạn</label>
                                                    <select id="" name="type[1][]"
                                                        class="form-control input-form-service">
                                                        <option value="1"> Chó </option>
                                                        <option value="2">Mèo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="Name " class="pt-4 pb-2 book-form-text">Chọn giới
                                                        tính</label>
                                                    <select id="" name="gender[1][]"
                                                        class="form-control input-form-service">
                                                        <option value="1"> Đực </option>
                                                        <option value="2">Cái</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="float-right my-4 pr-2 d-flex add-form-pet">
                                        <button type="button" class="btn btn-primary pl-3" id="clickAddForm">Thêm thú
                                            cưng</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--
                </form> --}}
            </div>
            @if(Session::has('success'))
            <p class="alert alert-success">
                {{Session::get('success')}}
            </p>
            @endif
        </div>
    </section>
    <section id="popupBill" style="z-index: 999; display: none;">
        <section id="contentBill"
            style="position: fixed; top: 0; width: 100%; height: 100%; background: rgba(121, 121, 121, 0.6);">
            <div
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 500px; height: 250px; background: white; border: 1px solid aqua;">
                <div id="billDetail">
                    <h2>Hóa đơn chi tiết</h2>
                    <hr>
                    <div>
                        <div>
                            Dịch vụ pet: <span id="servName"></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                Giá tiền :
                            </div>
                            <div id="servPrice"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Tổng tiền :
                        </div>
                        <div id="totalPrice"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Số tiền bạn phải cọc cho dịch vụ là 10% :
                        </div>
                        <div id="paymentCOC"></div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-info" id="payment">Đồng ý</button>
                        <button type="button" class="btn btn-sm btn-danger" id="popupNone">Quay lại</button>
                    </div>
                </div>
                <div id="formBanking" style="display: none;">
                    {{-- <div class="col-md-6 col-md-offset-3"> --}}
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <h3 class="panel-title display-td">Thanh toán </h3>
                                    <div class="display-td">
                                        <img class="img-responsive pull-right"
                                            src="http://i76.imgup.net/accepted_c22e0.png">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">

                                @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                                @endif

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Tên chủ thẻ</label> <input class='form-control'
                                            size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Số thẻ</label> <input autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>Số CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Nhập tháng</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Nhập năm</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Thanh
                                            toán</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                        {{--
                    </div> --}}
                    <div class="">
                        <a type="button" href="javascript:void(0)" class="btn btn-sm btn-warning" id="backTo">Quay lại
                            hóa đơn</a>
                        <a href="#">Hủy không muốn đặt nữa</a>
                    </div>
                </div>
            </div>

        </section>
    </section>
</form>
@endsection
@section('js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    function bill () {
        document.querySelector("#appointment").addEventListener("click", function () {
            document.querySelector("#popupBill").style.display = "block"
        })
        document.querySelector("#popupNone").addEventListener("click", function () {
            document.querySelector("#popupBill").style.display = "none"
        })
        document.querySelector("#payment").addEventListener("click", function () {
            document.querySelector("#billDetail").style.display = "none"
            document.querySelector("#formBanking").style.display = "block"
        })
        document.querySelector("#backTo").addEventListener("click", function () {
            document.querySelector("#formBanking").style.display = "none"
            document.querySelector("#billDetail").style.display = "block"
        })
    }

    $(function() {
    var $form = $(".require-validation");
    
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
            }
        });
    
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    
    });
    
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
    
    });

    $( function() {
        $("#datepicker").datepicker();
    } );

    // function add form
    let box = document.querySelector("#box_quan")
    var index = 1
    const childForm = {
        render(i) {
            return /*html*/`<div class="book-form-service" style="border: 1px solid #ccc; border-radius: 12px; margin: 0px 0px 28px; padding: 16px">
                <div class="book-form-title" style="position: relative">
                    <h2 class="text-center" style="margin-right: 20px">Thông tin thú cưng ${i}</h2>
                    <!-- <i class="fas fa-minus-square"></i> -->
                    <button type="buton" class="btn btn-danger btn-sm" id="removePet-${i}" style="position: absolute; top: 0; right: 0;">Xoa</button>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú cưng
                            *</label>
                        <input type="text" name="pet_name[${i}][]" id="petName_${i}"
                            class="form-control input-form-service">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Mã thú cưng
                            *</label>
                        <input type="text" name="code[${i}][]"
                            placeholder="Nếu bạn tới lần đầu thì có thể để trống ... "
                            class="form-control input-form-service">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn dịch vụ
                            *</label>
                        <select id="js-select-pet-${i}" class="form-control input-form-service"
                            multiple name="service_id[${i}][]">
                            @foreach ($services as $service)
                                <option id="option-{{ $service->id }}" value="{{ $service->id }}" data-price="{{ $service->price }}"> {{ $service->service_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú
                            cưng*</label>
                        <select id="petWeight_${i}" name="weight[${i}][]"
                            class="form-control input-form-service">
                            <option value="1"> &lt;5kg </option>
                            <option value="2">5kg-8kg</option>
                            <option value="3">8kg-10kg</option>
                            <option value="4">&gt;10kg</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn thú cưng của
                            bạn</label>
                        <select id="" name="type[${i}][]" class="form-control input-form-service">
                            <option value="1"> Chó </option>
                            <option value="2">Mèo</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn giới
                            tính</label>
                        <select id="" name="gender[${i}][]"
                            class="form-control input-form-service">
                            <option value="1"> Đực </option>
                            <option value="2">Cái</option>
                        </select>
                    </div>
                </div>
            </div>`
        },
        afterRender(i) {
            document.querySelector("#appointment").addEventListener("click", function () {
                getInfoService(`#petName_${i}`, `#js-select-pet-${i}`, `#petWeight_${i}`)

            })
        }
    }

    function getInfoService (name, serv, weight) {
        const _name = document.querySelector(name).value
        const _serv = document.querySelector(serv)
        const price = _serv.options[_serv.selectedIndex].dataset.price
        const _weight = document.querySelector(weight).value
        // console.log(_name, _weight, price)
        document.querySelector("#servName").innerHTML = _serv.value
        document.querySelector("#paymentPrice").value = `${price*_weight/10}`
        document.querySelector("#servPrice").innerHTML = price
        document.querySelector("#totalPrice").innerHTML = price*_weight
        document.querySelector("#paymentCOC").innerHTML = price*_weight/10
    }

    function action () {
        let node = document.createElement("DIV")
        node.setAttribute("class", "book-form")
        box.appendChild(node)
        const form = document.getElementById("box_quan").lastElementChild
        form.innerHTML = childForm.render(index)
        childForm.afterRender(index)
        $(document).ready(function () {
            let idPet = `#js-select-pet-${index}`
            $(idPet).select2();
            removeFormPet()
            index++
        });
    }
    function removeFormPet () {
        document.querySelector(`#removePet-${index}`).addEventListener("click", function (e) {
            e.preventDefault();
            this.parentElement.parentElement.remove()
        })
    }

    const run = () => {
        action()
        bill()
        document.querySelector("#removePet-1").style.display = "none"
        document.querySelector("#clickAddForm").addEventListener("click", function () {
            action()
        })
        
    }
    
    window.addEventListener("DOMContentLoaded", run)
</script>
@endsection