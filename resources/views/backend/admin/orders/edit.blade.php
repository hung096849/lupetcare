@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'add' => 'orders',
    'url' => route('backend.admin.orders.show')
    ])

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        {{-- <a href="{{ route('backend.admin.orders.create') }}" class="btn btn-success float-left mr-2"><i
                                class="fas fa-plus"></i>Thêm mới</a> --}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="form-book-service">
            <div class="container-fluid container-padding">
                <div class="content">
                    <form action="" method="POST">
                        {{-- {{ route('backend.admin.orders.store') }} --}}
                        @csrf
                        <div class="container">
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>

        @endsection
        @section('js')
        {{-- <script type="text/javascript">
            $(function() {
                    $("#datepicker").datepicker();
                });

                // function add form
                let box = document.querySelector("#box_quan")
                var index = 1
                const childForm = {
                    render(i) {
                        return `<div class="book-form-service" style="border: 1px solid #ccc; border-radius: 12px; margin: 0px 0px 28px; padding: 16px">
                        <div class="book-form-title" style="position: relative">
                            <h2 class="text-center" style="margin-right: 20px">Thông tin thú cưng ${i}</h2>
                            <!-- <i class="fas fa-minus-square"></i> -->
                            <button type="buton" class="btn btn-danger btn-sm" id="removePet-${i}" style="position: absolute; top: 0; right: 0;">Xoa</button>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="phoneNumber" class="pt-4 pb-2 book-form-text">Tên thú cưng
                                    *</label>
                                <input type="text" name="pet_name[${i}][]"
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
                                        <option value="{{ $service->id }}"> {{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="Name " class="pt-4 pb-2 book-form-text">Chọn cân nặng thú
                                    cưng*</label>
                                <select id="" name="weight[${i}][]"
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
                    }
                }

                function action() {
                    let node = document.createElement("DIV")
                    node.setAttribute("class", "book-form")
                    box.appendChild(node)
                    const form = document.getElementById("box_quan").lastElementChild
                    form.innerHTML = childForm.render(index)
                    $(document).ready(function() {
                        let idPet = `#js-select-pet-${index}`
                        $(idPet).select2();
                        removeFormPet()
                        index++
                    });
                }

                function removeFormPet() {
                    document.querySelector(`#removePet-${index}`).addEventListener("click", function(e) {
                        e.preventDefault();
                        this.parentElement.parentElement.remove()
                    })
                }

                const run = () => {
                    action()
                    document.querySelector("#removePet-1").style.display = "none"
                    document.querySelector("#clickAddForm").addEventListener("click", function() {
                        action()
                    })

                }

                window.addEventListener("DOMContentLoaded", run)
        </script> --}}

        <!-- /.content -->
    </div>

</div>


@endsection