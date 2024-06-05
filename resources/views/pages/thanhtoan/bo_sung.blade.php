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

        <link rel="stylesheet" href="{{ asset('public/frontend/css/style_bo_sung.css') }}">
        <link href="{{asset('public/frontend/css/StyleHeaderOnly.css')}}" rel="stylesheet">

        <title>Thông tin bổ sung | Blinkiy</title>

</head>
<html>
@include('Header')

<div class="process">
    <div class="current"> Vận chuyển&nbsp; </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    style="color:#EF99A2" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
    </svg>
    <div class="current"> &nbsp;Thông tin bổ sung&nbsp; </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    style="color:#EF99A2" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
    </svg>
    <div> &nbsp;Thanh toán&nbsp; </div>
</div>
<div class="addition">
    <p class="addition_header">Thông tin bổ sung</p>
    <form class="addition_form" method="POST" action="{{ route('bo-sung.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="bonus">
            <div id="header_1">Hãy cho chúng tôi biết yêu cầu đặc biệt của bạn về chiếc vòng nhé!</div>
            <textarea id="mo_ta" name="mo_ta" rows="10" cols="100" placeholder="Chi tiết sản phẩm"></textarea><br>
        </div>
        
        <div class="file">
            <span id="header_2">Hình ảnh chi tiết yêu cầu của bạn</span>
            <div class="img_input">
                <label for="file_input" class="custom-file-upload">Chọn ảnh</label>
                <input type="file" id="file_input" name="file_input">
                <a href="#" id="file_link"><p id="file_name">Chưa có ảnh nào được chọn</p></a>
            </div>
        </div>

        <div class="submit_container">
            <input type="Submit" class="submit" Value="Tiếp tục" name="Submit">
        </div>
        <div class="return_container">
            <span><a href="{{ route('shipping.index') }}" class="return"><i class="fa-solid fa-angles-left" ></i>  Quay lại</a></span>
        </div>
            
    </form>
</div>

@include('Footer')

<script src="{{ asset('public/frontend/js/file_upload_handling.js') }}"></script>
<script>
$(document).ready(function() {
    $('#file_input').on('change', function() {
        const fileInput = this;
        const fileNameSpan = $('#file_name');
        const fileLink = $('#file_link');

        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            fileNameSpan.text(file.name);
            fileLink.off('click').on('click', function(e) {
                e.preventDefault();
                const fileURL = URL.createObjectURL(file);
                // Mở fileDisplay.blade.php trong một cửa sổ mới
                const newWindow = window.open('{{ route("fileDisplay") }}' + `?fileURL=${fileURL}&fileType=${file.type}&fileName=${file.name}`);
            });
        } else {
            fileNameSpan.text('Chưa có ảnh nào được chọn');
            fileLink.attr('href', '#');
        }
    });
});
</script>
{{-- @endsection --}}

</html>
</body>