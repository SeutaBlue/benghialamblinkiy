{{-- @section('Header') --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('public/frontend/css/StyleHeaderOnly.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <header class="Header">
        <div class="top-bar">
            <div class="logo">
                <img class="logo-img" src="{{ asset('public/frontend/images/Logo.jpg') }}">
                {{-- <img class="logo-img" src="Logo.jpg"> --}}
                <p class="logo-blinkiy">BLINKIY</p>
                <p class="logo-phongthuy">PHONG THỦY</p>
            </div>
            <div class="search-bar">
                <div class="search-bar-cover">
                    <i class="fas fa-search"></i>
                    <input type="input" class="search-bar-input" id="search-bar-input" name="search-bar-input"
                        placeholder="Tìm kiếm" />
                </div>
            </div>
            <div class="top-bar-options">
                <div class="top-bar-options-object">
                    <a href="{{ URL::to('/ho-so') }}">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a class="top-bar-options-object-title" href="{{ URL::to('/ho-so') }}">Tài khoản</a>
                </div>
                <div class="top-bar-options-object">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                    <a class="top-bar-options-object-title" href="">Yêu thích</a>
                </div>
                <div class="top-bar-options-object">
                    <a href="{{ URL::to('/gio-hang') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a class="top-bar-options-object-title" href="{{ URL::to('/gio-hang') }}">Giỏ hàng</a>
                </div>
            </div>
        </div>

        <nav class="menu-bar">
            <ul class="mainmenu">
                <li class="mainmenu-li">
                    <a href="{{ URL::to('/trang-chu') }}" class="menu-bar-title">TRANG CHỦ</a>
                </li>
                <li class="mainmenu-li">
                    <a class="menu-bar-title" href="{{ URL::to('/san-pham') }}">SẢN PHẨM</a>
                    <ul class="product-submenu">
                        @foreach ($category_product_header as $key => $cate)
                            <li><a
                                    href="{{ URL::to('/danh-muc-san-pham/' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="mainmenu-li">
                    <a class="menu-bar-title" href="">GIỚI THIỆU</a>
                </li>
                <li class="mainmenu-li">
                    <a class="menu-bar-title" href="">BLOG</a>
                    <ul class="product-submenu">
                        <li><a href="">Cung-Mệnh</a></li>
                        <li><a href="">Cẩm nang Blinkiy</a></li>
                    </ul>
                </li>
                <li class="mainmenu-li">
                    <a class="menu-bar-title" href="">LIÊN HỆ</a>
                </li>
            </ul>
        </nav>
        <div class="bg-menu">
            {{-- <img class="bg-menu-img" src="menu.jpg"> --}}
            <img class="bg-menu-img" alt="" src="{{ asset('public/frontend/images/menu.jpg') }}">
        </div>

    </header>

{{-- @endsection --}}
{{-- @extends('ShoppingCard') --}}

{{-- 
</body>
</html> --}}
