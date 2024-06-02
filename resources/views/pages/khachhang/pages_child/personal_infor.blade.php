@extends('pages.khachhang.personal_infor_format')

@section('content')

<!-- THÔNG TIN CÁ NHÂN -->
<div class="private_infor">
    <h2 class="inf_title">THÔNG TIN CÁ NHÂN</h2>
</div>
<!-- Các thành phần nhập thông tin  -->
<form action="{{ URL::to('/update-customer/'.$customer->customer_id) }}" method="POST">
    {{ csrf_field() }}
    <!-- Phần hiển thị thông cập nhật thành công -->
    @if(session()->has('success-update'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
            title: "Cập nhật thông tin thành công!",
            icon: "success",
            // button: "Blinkiyyy!",
        });
        // Tự động tắt sau 3 giây
        setTimeout(function() {
            swal.close();
        }, 1000);
    </script>
    @endif
    <div class="card_body">
        <div class="form-group">
            <label for="user-name" class="form-label">Tên đăng nhập:</label>
            <input type="text" class="form-control" id="user-name" name="user_name" value="{{ $customer->customer_name }}" placeholder="Blinkiy...">
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Ngày sinh: </label>
            <input type="date" class="form-control" id="form-label" name="user_date" value="{{ $customer->customer_date }}">
        </div>
        <div class="form-group">
            <label for="user-tel" class="form-label">Điện thoại: </label>
            <input type="text" class="form-control" id="user-tel" name="user_tel" value="{{ $customer->customer_phone }}" placeholder="09xxxxxxxxx">
        </div>
        <div class="form-group">
            <label for="user-email" class="form-label">Email: </label>
            <input type="email" class="form-control" id="user-email" name="user_email" value="{{ $customer->customer_email }}" placeholder="email@domain.com....">
        </div>
        <div class="form-group">
            <label for="user-city" class="form-label">Tỉnh/thành phố:</label>
            <input type="text" class="form-control" id="user-city" name="user_city" value="{{ $customer->customer_city }}" placeholder="Tỉnh/thành phố">
        </div>
        <div class="form-group">
            <label for="user-district" class="form-label">Quận/Huyện:</label>
            <input type="text" class="form-control" id="user-district" name="user_district" value="{{ $customer->customer_district }}" placeholder="Quận/huyện">
        </div>

        <!-- Nút cập nhật và quay lại -->
        <div class="Update-btn">
            <button type="submit" class="btn btn-update">Cập nhật</button>
            <a href="" class="btn btn-back">Quay lại</a>
        </div>
    </div>
</form>



@endsection