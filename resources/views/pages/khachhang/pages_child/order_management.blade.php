@extends('pages.khachhang.order_management_format')

@section('content')

<!-- PHẦN QUẢN LÝ ĐƠN HÀNG -->

<div class="wrap_input">
    <div class="private_infor">
        <h1 class="inf_title">ĐƠN HÀNG CỦA BẠN</h1>
    </div>
    <!-- Các thành của đơn hàng  -->
    <div class="table_inf">
        <table class="table table-cart" id="my-orders-table">
            <thead class="thead-default">
                <tr>
                    <th>Đơn hàng</th>
                    <th>Ngày</th>
                    <th>Địa chỉ</th>
                    <th>Giá trị đơn hàng</th>
                    <th>TT Thanh Toán</th>
                    <th>TT Vận Chuyển</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        <p>Không có đơn hàng nào.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>


@endsection