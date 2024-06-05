<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@400;700&family=Francois+One&family=Paytone+One&family=Sigmar&family=Tilt+Neon&family=Saira+Stencil+One&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <link rel="stylesheet" href="{{ asset('public/frontend/css/style_van_chuyen.css') }}">
        <link href="{{asset('public/frontend/css/StyleHeaderOnly.css')}}" rel="stylesheet">

        <title>Vận chuyển | Blinkiy</title>

</head>
<body>

    @include('Header')

    <div class="process">
        <div class="current"> Vận chuyển&nbsp; </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        style="color:#EF99A2" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
        </svg>
        <div> &nbsp;Thông tin bổ sung&nbsp; </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        style="color:#EF99A2" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
        </svg>
        <div> &nbsp;Thanh toán&nbsp; </div>
    </div>
    <div class="details">
        <p class="header_details">Vận chuyển</p>
        <p class="instruction">Hãy điền địa chỉ của bạn hoặc <a class="login" href="#log_in">Đăng nhập</a></p>
        <form id="input_form" method="POST" action="{{ route('shipping.store') }}">
    @csrf
    <table class="input_container">
        <tr>
            <td colspan="2">
                <label for="name">Họ tên <span>*</span></label>
                <input type="text" class="input" id="name" name="name" placeholder="Nhập họ và tên..." required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email <span>*</span></label>
                <input type="text"  class="input" id="email" name="email"  placeholder="Nhập email..." required>
            </td>
            <td>
                <label for="phone_num">Điện thoại <span>*</span></label>
                <input type="tel"  class="input" id="phone_num" name="phone_num" placeholder="Nhập số điện thoại..." required>
            </td>
        </tr>
        <tr>
            <td>
                <select id="province" name="province" onchange="SelectProvince(this)"  required>
                    <option value="">Chọn tỉnh thành</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="district" name="district" required>
                    <option value="">Chọn quận, huyện</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="address">Số nhà, đường, phường, xã <span>*</span></label>
                <input type="text"  class="input" id="address" name="address" placeholder="Nhập số nhà, đường, phường, xã..." required>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="apartment">Số phòng, tòa </label>
                <input type="text"  class="input" id="apartment" name="apartment" placeholder="Nhập số phòng, tòa (nếu có)...">
            </td>
        </tr>
        <tr>
            <td class="submit_button" align="center" colspan="2">
                <input type="Submit"  class="submit" Value="Tiếp tục" name="Submit">
            </td>
        </tr>
    </table>
</form>
    <br><br>
    </div>

    @include('Footer')

    <script>
        // $(document).ready(function() {
        //     $('#province').change(function() {
        function SelectProvince(pro)
        {
                var province = $(pro).val();
                if (province) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('shipping.fetch_district') }}',
                        data: {
                            province: province,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('AJAX success response:', response);  // Log success response
                            $('#district').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);  // Log error details
                        }
                    });
                } else {
                    $('#district').html('<option value="">Chọn quận, huyện</option>');
                }
            }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>