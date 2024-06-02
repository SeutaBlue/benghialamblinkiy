<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang Chủ</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        {{-- <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style> --}}

        {{-- <style>
            body {
                /* font-family: 'Nunito', sans-serif; */
            }
        </style> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="{{asset('public/frontend/css/StyleHomePage.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/StyleHeader.css')}}" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <header>
            <div class="top-bar">
                <div class="logo">
                    <img class="logo-img" src="{{asset('public/frontend/images/Logo.jpg') }}"/>
                    <p class="logo-blinkiy">BLINKIY</p>
                    <p class="logo-phongthuy">PHONG THỦY</p>
                </div>
                <div class="search-bar">
                    <div class="search-bar-cover">
                        <i class="fas fa-search"></i>
                        <input type="input" class="search-bar-input" id="search-bar-input" name="search-bar-input" placeholder="Tìm kiếm"/>
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
                        <a class="menu-bar-title" href="{{URL::to('/trang-chu')}}">TRANG CHỦ</a>
                    </li>
                    <li class="mainmenu-li">
                        <a class="menu-bar-title" href="{{ URL::to('/san-pham') }}">SẢN PHẨM</a>
                        <ul class="product-submenu">
                            @foreach ($category as $key => $cate)
                                <li><a href="{{ URL::to('/danh-muc-san-pham/'.$cate->category_id) }}">{{ $cate->category_name }}</a></li>
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
                            <li><a href="">Chuyện thầm kín của Nghĩa</a></li>
                        </ul>
                    </li>
                    <li class="mainmenu-li">
                        <a class="menu-bar-title" href="">LIÊN HỆ</a>
                    </li>
                </ul> 
            </nav>
            <div class="slide-show">
                <div class="list-slider">
                    <img class="slider" src="{{asset('public/frontend/images/Slider1.jpg') }}">
                    <img class="slider" src="{{asset('public/frontend/images/Slider2.jpg') }}">
                    <img class="slider" src="{{asset('public/frontend/images/Slider3.jpg') }}">
                </div>
            </div>
    
    </header>
    
    <div class="background-img">
        <img src="{{asset('public/frontend/images/bgimg1.jpg') }}">
    </div>
    
    <section class="product-type-category">
        <div class="product-type-title">
            <hr>
            <p>XU HƯỚNG TÌM KIẾM</p>
            <hr>
        </div>
        <div class="product-type-slide">
            <div class="type-element">
                <img src="P1.jpg">
                <p>Vòng tay</p>
            </div>
            <div class="type-element">
                <img src="P1.jpg">
                <p>Dây chuyền</p>
            </div>
            <div class="type-element">
                <img src="P1.jpg">
                <p>Nhẫn</p>
            </div>
            <div class="type-element">
                <img src="P1.jpg">
                <p>Charm</p>
            </div>
            <div class="type-element">
                <img src="P1.jpg">
                <p>Dây đeo</p>
            </div>
        </div>
    
    </section>
    
    <section class="product-category">
        <div class="container-title">
            <p>SẢN PHẨM BÁN CHẠY</p>
            <hr>
        </div>
        <div class="card-container">
            <div class="pre-btn" ><i class="fa-solid fa-angle-left" ></i></div>
            
            <div class="carousel">
                <div class="list-product-card">
                @foreach($product as $key =>$pro)
                <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id) }}">
                    <div class="product_card" >
                        <div class="product-image">
                            <img class="product-img" src="{{ URL::to('public/uploads/product/'.$pro->product_image) }}">
                        </div>
                        <div class="product-content">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id) }}" class="product-name">{{ $pro->product_name }}</a>
                            <p>{{number_format ($pro->product_price) .' '.'VNĐ'}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
                    <div class="carousel-end"></div>
                </div>   
            </div>
            
            <div class="nxt-btn" ><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>
    
    <div class="background-img">
        <img src="{{asset('public/frontend/images/bgimg2.png') }}">
    </div>
    <section class="product-category">
        <div class="container-title">
            <p>SẢN PHẨM MỚI NHẤT</p>
            <hr>
        </div>
        <div class="card-container">
            <div class="pre-btn" ><i class="fa-solid fa-angle-left" ></i></div>
    
            <div class="carousel">
                <div class="list-product-card">
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P1.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P2.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P3.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P4.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P5.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P6.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P7.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>
                    <div class="product_card">
                        <div class="product-image">
                            <img class="product-img" src="P8.jpg">
                        </div>
                        <div class="product-content">
                            <a href="">Tên sản phẩm</a>
                            <p>100.000đ</p>
                        </div>
                    </div>       
                    <div class="carousel-end"></div>
                </div>   
            </div>
            
            <div class="nxt-btn" ><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>
    
    <div class="hotline">
        <p class="hotline-title">Hotline</p>
        <p class="phone-numbers">0123456789</p>
        <p class="slogan">“Your order was made with love”</p>
    </div>
    
    <section class="news-category">
        <div class="container-title">
            <p>THÔNG TIN MỚI NHẤT</p>
            <hr>
        </div>
        <div class="news-container">
            <div class="news-container-leftside">
                <img src="{{asset('public/frontend/images/newsimg.jpg') }}">
                <button class="see-more-button">Xem thêm</button>
            </div>
            <div class="news-container-rightside">
                <div class="a-news">
                    <img src="N1.jpg">
                    <a href="">Tiêu đề bài báo</a>
                    <p>Nội dung review bài báo</p>
                </div>
                <div class="a-news">
                    <img src="N2.jpg">
                    <a href="">Tiêu đề bài báo</a>
                    <p>Nội dung review bài báo</p>
                </div>
                <div class="a-news">
                    <img src="N3.jpg">
                    <a href="">Tiêu đề bài báo</a>
                    <p>Nội dung review bài báo aaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaa aaa aaaaaaaaaaaaa</p>
                </div>
                <div class="a-news">
                    <img src="N4.jpg">
                    <a href="">Tiêu đề bài báo</a>
                    <p>Nội dung review bài báo</p>
                </div>
            </div>
        </div>
    </section>
    
    <script type="text/javascript" src="{{asset('public/frontend/js/ScriptCardSlider.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/ScriptHomePage.js') }}"></script>
    </body>
</html>
