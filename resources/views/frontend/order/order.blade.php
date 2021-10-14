@extends('layouts.frontend')
@section('content')

<form action="" method="post">
 @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Họ tên</label>
                <input type="text" name="name" class="form-control" placeholder="Họ tên ...">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email ...">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại ...">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Giờ</label>
                        <input type="text" name="time" class="form-control" placeholder=" ...">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Ngày</label>
                        <input type="date" name="date" class="form-control" placeholder="Số điện thoại ...">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Ghi chú</label>
                <textarea name="note" class="form-control" name="" id="" rows="3" placeholder="Ghi chú ..."></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên thú cưng</label>
                <input type="text" name="phone" class="form-control" placeholder="Tên thú cưng ...">
            </div>
            <div class="form-group">
              <label for="">Chọn dịch vụ</label>
              <select class="form-control" name="servies" multiple>
                <option>Chọn dịch vụ</option>
                <option>Tắm</option>
                <option>Tỉa</option>
                <option>Abvc.</option>
              </select>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="" value="dog" checked>
                Chó
              </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="" value="cat">
                Mèo
              </label>
            </div>
            <div class="form-group">
                <label for="">Trọng lượng</label>
                <select class="form-control" name="weight" multiple>
                  <option>Chọn cân nặng</option>
                  <option>1kg - 2kg</option>
                  <option>2kg-5kg</option>
                  <option>>5kg</option>
                </select>
              </div>
        </div>
        <div class="col-12">
            <button type="submit">Đặt</button>
        </div>
    </div>
</form>

@endsection