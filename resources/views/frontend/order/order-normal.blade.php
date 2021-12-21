@extends('layouts.frontend')
@section('content')
@include('backend.components.alert')

<form role="form" action="" method="post" id="payment-form">
    @csrf
    @if (Session::has('message'))
        <div class="alert alert-danger text-center">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <input type="hidden" id="paymentPrice" name="pile" value="">
    <input type="hidden" name="total_price" id="totalPriceInput">
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
                                                    <input type="text" placeholder="Họ tên ... " value="{{ Auth::guard('customers')->user() ? Auth::guard('customers')->user()->name : ""  }}" name="name" id="name"
                                                        class="form-control input-form-service">
                                                    <span class="error_name text-danger"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phoneNumber" class="pt-4 pb-2 book-form-text">
                                                        Số điện thoại
                                                        *</label>
                                                    <div style="display:flex;width:100%;font-size:18px;border:1px solid black;border-radius:0.25em;padding: 2px;text-align: center;align-items: center;">
                                                        <img style="height: 1.75em;" src="{{ asset('frontend/images/225px-Flag_of_Vietnam.svg.webp') }}" alt="co viet nam">
                                                        <span style="
                                                        margin-left: 0.5em;
                                                        font-size: inherit;
                                                        line-height: 1.75em;
                                                    ">+84</span>
                                                        <input type="text" placeholder="969696969 ..." value="{{ Auth::guard('customers')->user() ? Auth::guard('customers')->user()->phone : ""  }}" style="width: 100%;border: none; flex: auto; outline: none;padding-left: 0.5em;" name="phone" id="phone">
                                                    </div>
                                                <span class="error_phone text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                        <label for="Name " class="pt-4 pb-2 book-form-text">Email của bạn
                                                            *</label>
                                                        <input type="text" placeholder="email@gmail.com ..." value="{{ Auth::guard('customers')->user() ? Auth::guard('customers')->user()->email : ""  }}" name="email" id="email"
                                                            class="form-control input-form-service">
                                                        <span class="error_email text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="Name" class="pt-5 pb-2 book-form-text">Giờ *</label>
                                                    <input type="time" id="datetimepicker5" name="time"
                                                        value="{{ old('time')}}" min="08:00" max="21:00"
                                                        class="form-control input-form-service time">
                                                        <span class="error_time text-danger"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phoneNumber" class="pt-5 pb-2 book-form-text">Ngày tháng
                                                        *</label>
                                                    <input type="text" name="date" value="{{ old('date')}}"
                                                        class="form-control input-form-service date" id="datepicker">
                                                        <span class="error_date text-danger"></span>
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
                                                <button type="button" class="btn btn-lg btn-info px-5" id="appointment" data-route="{{ route('frontend.order_services.checkValidateForm') }}" style="focus: none; outline: none;">
                                                    ĐẶT LỊCH
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="box_bookService" class="col-md-5 mt-4">
                                    <div id="box_quan"></div>
                                    <div class="float-right my-4 pr-2 d-flex">
                                        <button type="button" class="btn btn-info pl-3" id="clickAddForm" style="focus: none; outline: none;">Thêm thú
                                            cưng</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    <section id="popupBill" style="z-index: 999; display: none;">
        <section id="contentBill"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(121, 121, 121, 0.6);">
            <div
                style="border-radius: 14px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 620px; min-height: 320px; max-height: 610px; background: white; border: 1px solid aqua;">
                <div id="billDetail" style="padding: 0 38px 20px;">
                    <h3 class="text-center">Hóa đơn chi tiết</h3>
                    <div id="showService" style="max-height: 240px; overflow: auto;">
                    </div>
                    <div class="d-flex justify-content-end align-items-center" style="font-weight: bold; font-size: 20px; margin-top: 12px;">
                        <div>
                            Tổng tiền :
                        </div>
                        <div id="totalPrice" class="text-info text-right" style="min-width: 120px;"></div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center" style="font-weight: bold; font-size: 20px; display: none!important">
                        <div>
                            Số tiền cọc cho dịch vụ là 10% :
                        </div>
                        <div id="paymentCOC" class="text-danger text-right" style="min-width: 120px;"></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="margin: 20px 0px;">
                        <button type="submit" class="btn btn-sm btn-info" id="payment" style="margin-right: 12px; focus: none; outline: none;">Đồng ý</button>
                        <button type="button" class="btn btn-sm btn-danger" id="popupNone" style="focus: none; outline: none;">Quay lại</button>
                        <div class="d-flex justify-content-end" style="margin: 10px;">
                            <a href="#">Hủy không muốn đặt nữa</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>
</form>
@endsection
@section('js')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function bill () {
        document.querySelector("#appointment").addEventListener("click", function () {
            // console.log($('#datetimepicker5').val())
            var i = 1;
            var route = $(this).data('route');
            $.ajax({
                type: "POST",
                url: route,
                data: {
                    email: $('#email').val(),
                    name: $('#name').val(),
                    phone: $('#phone').val(),
                    time: $('.time').val(),
                    date: $('.date').val(),
                    pet_name: $(`#petName_${i}`).val(),
                    service_id: $(`#js-select-pet-${i}`).val(),
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        document.querySelector("#popupBill").style.display = "block";
                        // $("#clickAddForm").attr(attributeName);
                        // $('#clickAddForm').addClass('d-block');
                        $('.error_name').text("");
                        $('.error_email').text("");
                        $('.error_time').text("");
                        $('.error_date').text("");
                        $(`.error_pet_name_${i}`).text("");
                        $(`.error_pet_service_${i}`).text("");

                    } else if (response.status == 422) {
                        if(response.error.name){
                            $('.error_name').text(response.error.name);
                        }else{
                            $('.error_name').text("");
                        }

                        if(response.error.phone){
                            $('.error_phone').text(response.error.phone);
                        }else{
                            $('.error_phone').text("");
                        }
                        if(response.error.email){
                            $('.error_email').text(response.error.email);
                        }else{
                            $('.error_email').text("");
                        }
                        if(response.error.time){
                            $('.error_time').text(response.error.time);
                        }else{
                            $('.error_time').text("");
                        }

                        if(response.error.date){
                            $('.error_date').text(response.error.date);
                        }else{
                            $('.error_date').text("");
                        }

                        if(response.error.pet_name){
                            $(`.error_pet_name_${i}`).text(response.error.pet_name);
                        }else{
                            $(`.error_pet_name_${i}`).text("");
                        }
                        
                        if(response.error.service_id){
                            $(`.error_pet_service_${i}`).text(response.error.service_id);
                        }else{
                            $(`.error_pet_service_${i}`).text("");
                        }
                    }
                }
            });
        })
        document.querySelector("#popupNone").addEventListener("click", function () {
            document.querySelector("#popupBill").style.display = "none"
            document.querySelector("#showService").innerHTML = ""
            totalPrice = 0
        })
        document.querySelector("#payment").addEventListener("click", function () {
            document.querySelector("#billDetail").style.display = "none"
        })
    }

    $( function() {
        $("#datepicker").datepicker();
    } );

    // function add form
    let box = document.querySelector("#box_quan")
    var index = 1
    var totalPrice = 0
    const boxShowServie = document.querySelector("#showService")
    const childForm = {
        render(i) {
            return /*html*/`<div class="book-form-service" style="border: 1px solid #ccc; border-radius: 12px; margin: 0px 0px 28px; padding: 16px">
                <div class="book-form-title" style="position: relative">
                    <h2 class="text-center" style="margin-right: 20px">Thông tin thú cưng</h2>
                    <!-- <i class="fas fa-minus-square"></i> -->
                    <button type="buton" class="btn btn-danger btn-sm" id="removePet-${i}" style="position: absolute; top: 0; right: 0;">Xóa</button>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú cưng
                            *</label>
                        <input type="text" name="pet_name[${i}][]" id="petName_${i}" placeholder="Tên thú cưng ... "
                            class="form-control input-form-service">
                            <span class="error_pet_name_${i} text-danger"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Mã thú cưng
                            *</label>
                        <input type="text" name="code[${i}][]"
                            placeholder="Mã thú cưng ... "
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
                                <option value="{{ $service->id }}">
                                    {{ $service->id }}.{{ $service->service_name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="error_pet_service_${i} text-danger"></span>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <input type="hidden" id="price-${i}-{{ $service->id }}" value="{{ $service->price }}">
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú
                            cưng*</label>
                        <select id="petWeight_${i}" name="weight[${i}][]"
                            class="form-control input-form-service">
                            @foreach (Config::get('dataWeight.WEIGHT') as $key => $value)
                                <option value="{{$key}}" @if($key==old('weight')) selected @endif >{{$value}}</option>
                            @endforeach
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
                let petName = document.querySelector(`#petName_${i}`).value
                let serviceOfPet = document.querySelector(`#js-select-pet-${i}`).value
                let time = document.querySelector("#datetimepicker5").value
                let date = document.querySelector("#datepicker").value
                let username = document.querySelector("#name").value
                let phoneNumber = document.querySelector("#phone").value
                let email = document.querySelector("#email").value
                if (!petName || !serviceOfPet || !time || !date || !username || !phoneNumber || !email) {
                    console.log("rip")
                } else {
                    getInfoService(`#petName_${i}`, `#js-select-pet-${i}`, `#petWeight_${i}`, i)
                }

                // console.log(petName, serviceOfPet, time, date, username, phoneNumber, email)
            })
        }
    }

    function getInfoService (name, serv, weight, i) {
        const _name = document.querySelector(name).value
        const _weight = document.querySelector(weight).value
        const arrSer = checkService(`#select2-js-select-pet-${i}-container`, i)
        const result = {
            petName: _name,
            servicer: arrSer,
            weight: _weight
        }
        // console.log(result)
        totalPrice += result.servicer.reduce((acc, curr) => acc + parseInt(curr.price), 0) * parseInt(result.weight)
        // console.log("total price: ", totalPrice)
        document.querySelector("#totalPrice").innerHTML = `${totalPrice} VND`
        document.querySelector("#paymentCOC").innerHTML = `${totalPrice / 10} VND`
        document.querySelector('#totalPriceInput').value = totalPrice
        document.querySelector("#paymentPrice").value = totalPrice / 10


        const serlist = result.servicer.map(item => {
            return `<div>
                        Dịch vụ pet: <span id="servName" style="font-weight: bold; font-size: 20px; margin-left: 20px;">${item.name}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Giá tiền 
                        </div>
                        <div id="servPrice" style="font-weight: bold; font-size: 22px;" class="text-info">${parseInt(item.price) * parseInt(_weight)} VND</div>
                    </div>`
        }).join("")
        const element = {
            render() {
                return `<div style="margin-top: 12px">
                    <div style="margin-left: 50px; font-weight: bold; font-size: 22px;" class="text-info">Tên thú cưng: ${result.petName}</div>
                    ${serlist}
                </div>`
            }
        }
        const node = document.createElement("DIV")
        boxShowServie.appendChild(node)
        const lastE = document.querySelector("#showService").lastElementChild
        lastE.innerHTML = element.render()

    }

    function checkService (_cl, i) {
        const ele = document.querySelector(_cl)
        const arraySer = []
        Array.from(ele.childNodes).forEach(item => {
            const e = `price-${i}-${item.getAttribute("title").trim().split(".")[0]}`
            const price = document.querySelector(`#${e}`).value
            arraySer.push({
                name: item.getAttribute("title").trim(),
                price: price
            })
        })
        return arraySer
    }

    function action () {
        let node = document.createElement("DIV")
        node.setAttribute("class", "book-form")
        box.appendChild(node)
        const form = document.getElementById("box_quan").lastElementChild
        // isValid
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