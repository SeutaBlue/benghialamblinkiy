<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home | E-Shopper</title>

    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css"> --}}
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    

    {{-- HEADER --}}
    <link href="{{ asset('public/frontend/css/StyleHeaderOnly.css') }}" rel="stylesheet">

    {{-- PRODUCT --}}
    <link href="{{ asset('public/frontend/css/sanpham.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/base/jquery-ui.min.css">
        
    {{-- INSIDE-PRODUCT --}}
    <link href="{{ asset('public/frontend/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/lightslider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettify.css') }}" rel="stylesheet">

    {{-- BLOG --}}
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('public/frontend/css/blog_page.css') }}" rel="stylesheet">

    <style>
        body {
            /* font-family: 'Nunito', sans-serif; */
            font-family: "DM Sans";
        }
    </style>
</head><!--/head-->

<body>

    <header class="header">
        <div class="top-bar">
            <div class="logo">
                <img class="logo-img" src="{{ asset('public/frontend/images/Logo.jpg') }}">
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
                    <i class="fa-solid fa-user"></i>
                    <a class="top-bar-options-object-title" href="">Tài khoản</a>
                </div>
                <div class="top-bar-options-object">
                    <i class="fa-solid fa-heart"></i>
                    <a class="top-bar-options-object-title" href="">Yêu thích</a>
                </div>
                <div class="top-bar-options-object">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a class="top-bar-options-object-title" href="{{ URL::to('/gio-hang') }}">Giỏ hàng</a>
                </div>
            </div>
        </div>

        <nav class="menu-bar">
            <ul class="mainmenu">
                <li class="mainmenu-li">
                    <a href="{{ URL::to('/trang-chu') }}" class="menu-bar-title">TRANG CHỦ</a>
                </li>
                <li class="mainmenu-li"><a class="menu-bar-title" href="{{ URL::to('/san-pham') }}">SẢN PHẨM</a>
                    <?php
                    $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
                    ?>
                    <ul class="product-submenu">
                        @foreach ($category_product as $key => $cate)
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
                    <a class="menu-bar-title" href="#">BLOG</a>
                    <ul class="product-submenu">
                        {{-- @foreach ($category_post as $key => $danhmucbaiviet)
                        <li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a></li>
                        @endforeach --}}
                    </ul>
                </li>
                <li class="mainmenu-li">
                    <a class="menu-bar-title" href="">LIÊN HỆ</a>
                </li>
            </ul>
        </nav>
        <div>
            <img class="bg-menu-img" alt="" src="{{ asset('public/frontend/images/menu.jpg') }}">
        </div>
    </header>

@yield('product')
@yield('inside_product')
@yield('content2')

    {{-- FONT AWESOME --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> --}}

    <link href="https://cdn.jsdelivr.net/npm/nouislider@15.4.1/distribute/nouislider.min.css" rel="stylesheet">
    <!-- Link JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/nouislider@15.4.1/distribute/nouislider.min.js"></script>
    

    {{-- PRODUCT --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        {{-- <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"></script>
 
        <script>
            $(document).ready(function ()
            {
                $( "#slider-range" ).slider({
                orientation: "horizontal",//chiều ngang
                range: true,
                
                min: {{ $min_price_range}},
                max : {{ $max_price_range }},
                values: [ {{ $min_price_value }} , {{ $max_price_value}} ],
                step: 1000,

                slide: function( event, ui ) {
                    $( "#amount" ).val( addPlus(ui.values[ 0 ]) + " VNĐ" + " - " + addPlus(ui.values[ 1 ]) + " VNĐ" );//cộng/ trừ giá trị vào khi di chuyển
                    $('#price_from').val(ui.values[ 0 ]);
                    $('#price_to').val(ui.values[ 1 ]);
                }
                });
                $( "#amount" ).val( addPlus($( "#slider-range" ).slider( "values", 0 ))+" VNĐ" + " - " + addPlus($( "#slider-range" ).slider( "values", 1 ) )+" VNĐ" );//hiển thị ra bên ngoài
                //$( "#amount" ).val( addPlus($( "#slider-range" ).slider( "values", 0 ))+" VNĐ" + " - " + addPlus($( "#slider-range" ).slider( "values", 1 ) )+" VNĐ" );//hiển thị ra bên ngoài

            });
            function addPlus(nStr)//fromat định dạng tiền 
            {
                nStr += '';
                x = nStr.split(',');
                x1 = x[0];
                x2 = x.length > 1 ? ',' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
        </script>


    {{-- INSIDE PRODUCT --}}
        <script type="text/javascript" src="{{ asset('public/frontend/js/InsightProduct.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/frontend/js/ScriptCardSlider.js') }}"></script>

        <script type="text/javascript" src="{{ asset('public/frontend/js/lightgallery-all.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/frontend/js/lightslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/frontend/js/prettify.js') }}"></script>
    
        {{-- <script type="text/javascript" src="{{ asset('public/frontend/js/jquery.min.js') }}"></script> --}}
        <script lazy-load data-src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    

    {{-- BLOG --}}
        <script src="{{ asset('public/frontend/js/jquery.js') }}">
            < /scrip> 
            <script src = "{{ asset('public/frontend/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
        <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    
    {{-- ĐĐ <script src="{{ asset('public/frontend/js/main.js') }}"></script> ĐĐ--}}
    <script lazy-load data-src="{{ asset('public/frontend/js/main.js') }}"></script>

</body>

</html>
