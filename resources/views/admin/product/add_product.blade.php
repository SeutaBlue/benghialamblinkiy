@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message'); // hàm get để lấy biến có tên là 'message' ở bên AdminController
                    if ($message) {
                        // neu ton tai message
                        echo '<span class="text-alert">' . $message . '</span>'; // in ra tin nhan
                        Session::put('message', null); //cho hien thi 1 lan thoi
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-product') }}" method="POST"
                            enctype="multipart/form-data">{{-- enctype="multipart/form-data": để thêm ảnh --}}
                            {{ csrf_field() }}
                            {{-- token để bảo mật form --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Màu sắc</label>
                                <select name="product_color" class="form-control input-sm m-bot15">
                                    <option value="Hồng">Hồng</option>
                                    <option value="Xanh dương">Xanh dương</option>
                                    <option value="Vàng">Vàng</option>
                                    <option value="Xanh lục">Xanh lục</option>
                                    <option value="Đỏ">Đỏ</option>
                                    <option value="Cam">Cam</option>
                                    <option value="Tím">Tím</option>
                                    <option value="Nâu">Nâu</option>
                                    <option value="Trắng">Trắng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mệnh phong thủy</label>
                                <select name="product_element" class="form-control input-sm m-bot15">
                                    <option value="Kim">Kim</option>
                                    <option value="Mộc">Mộc</option>
                                    <option value="Thủy">Thủy</option>
                                    <option value="Hỏa">Hỏa</option>
                                    <option value="Thổ">Thổ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="cate_product" class="form-control input-sm m-bot15">
                                    @foreach ($category_product as $key => $cate)
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="5" name="product_desc" class="form-control" placeholder="Mô tả sản phẩm" id="noidung"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="5" name="product_content" class="form-control"
                                    placeholder="Nội dung sản phẩm" id="tomtat"></textarea>
                            </div>

                            @foreach ($size as $key => $size_val)
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng hàng Size
                                        {{ $size_val->size_value }}</label>
                                    <input type="number" name="product_size_sl[]" class="form-control" min="0"
                                        step="1" value="0">
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    @endsection
