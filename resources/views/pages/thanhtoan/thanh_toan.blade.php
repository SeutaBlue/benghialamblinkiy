<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rowdies:wght@400;700&family=Francois+One&family=Paytone+One&family=Sigmar&family=Tilt+Neon&family=Saira+Stencil+One&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/style_thanh_toan.css') }}">
    {{-- <link href="{{ asset('public/frontend/css/StyleHeaderOnly.css') }}" rel="stylesheet"> --}}

    <title>Thanh toán | Blinkiy</title>
</head>

<body>
    @include('Header')

    <div class="process">
        <div class="current"> Vận chuyển&nbsp; </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="color:#EF99A2"
            class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
        </svg>
        <div class="current"> &nbsp;Thông tin bổ sung&nbsp; </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="color:#EF99A2"
            class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
        </svg>
        <div class="current"> &nbsp;Thanh toán&nbsp; </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="confirm-container">
        <form method="POST" action="{{ route('submit_thanh_toan') }}" class="check_out">
            @csrf
            <div class="confirm">
                <p class="confirm_header">Xác nhận đơn hàng</p>
                <div class="confirm_info">
                    <p>Họ tên: <span id="hoten">{{ $hoten }}</span></p>
                    <p>Email: <span id="email">{{ $email }}</span></p>
                    <p>SĐT: <span id="dthoai">{{ $sdt }}</span></p>
                    <p>Địa chỉ:
                        @if ($apartment)
                            <span id="can_ho">{{ $apartment }}</span>,
                        @endif
                        <span id="dia_chi">{{ $address }}</span>,
                        @if (isset($huyen))
                            <span id="huyen">{{ $huyen }}</span>,
                        @endif
                        <span id="tinh">{{ $tinh }}</span>
                    </p>
                    @if ($note)
                        <p>Ghi chú: <span id="ghi_chu">{{ $note }}</span></p>
                    @endif
                    @if ($file)
                        <p>File mô tả: <span id="file_name">{{ $file }}</span></p>
                        <img src="{{ $file }}" alt="Uploaded File" style="max-width: 100%; height: auto;">
                    @else
                        <p>Không có ảnh nào được chọn</p>
                    @endif
                </div>
                <hr>
                <p class="payment_opt_header">Phương thức thanh toán</p>
                <div class="payment_opt">
                    <div class="opt">
                        <input type="radio" id="momo" name="pttt" value="1">
                        <label for="momo">Thanh toán bằng MoMo QR Code</label>
                    </div>
                    <div class="opt">
                        <input type="radio" id="bank" name="pttt" value="2">
                        <label for="bank">Thanh toán bằng MoMo ATM</label>
                    </div>
                    <div class="opt">
                        <input type="radio" id="tien_mat" name="pttt" value="3">
                        <label for="tien_mat">Thanh toán khi nhận hàng</label>
                    </div>
                </div>
            </div>

            <div class="info_container">
                <div class="info">
                    <p class="info_header" style="text-align: center">Thông tin đơn hàng</p>
                    <hr>
                    <div class="items_list">
                        {{-- <input type="text"> --}}
                        @foreach ($order as $item)
                            <div class="item" >
                                <p class="item_name">{{ $item['productName'] }}</p>
                                <p class="item_size">{{ $item['productDescription'] }}</p>
                                {{-- <p class="item_size">Kích cỡ: {{ $item['productSize'] }}</p> --}}
                                <p class="product_quantity">Số lượng: {{ $item['productQuantity'] }}</p>

                                <p class="item_total">
                                    {{ number_format($item['productPrice'] * $item['productQuantity'], 0, ',', '.') }}
                                    ₫</p>
                                {{-- <p></p> --}}
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    <div class="fees">
                        {{-- <hr> --}}
                        <div class="items_total">
                            <span class="total_header">Thành tiền</span>
                            <span class="total">{{ number_format($total, 0, ',', '.') }} ₫</span>
                        </div>
                        <div class="shipping_fee">
                            <span class="shipping_header">Phí giao hàng</span>
                            <span class="shipping">30.000</span>
                        </div>
                        <hr>
                    </div>
                    <div class="sum_container">
                        <span>Tổng tiền</span>
                        <span class="sum" name="sum">{{ number_format($total + 30000, 0, ',', '.') }} ₫</span>
                    </div>

                    <div class="pay">
                        <button type="submit" class="pay_button" name="submit_payment">Thanh toán</button>
                    </div>
                </div>
            </div>
            <br><br>
        </form>
    </div>
    <br><br>
    <input type="hidden" value="{{$cart}}" id="now">
    @include('Footer')
    <script>
        console.log(document.getElementById('now').value);
        </script>
</body>

</html>
