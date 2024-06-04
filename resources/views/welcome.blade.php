<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang Chủ | Blinkiy</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@400;700&family=Francois+One&family=Paytone+One&family=Sigmar&family=Tilt+Neon&family=Saira+Stencil+One&display=swap" rel="stylesheet">
        {{-- <style>
            body {
                font-family: 'Geologica', sans-serif;
            }
        </style> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="{{asset('public/frontend/css/StyleHomePage.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/StyleHeader.css')}}" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        {{-- <header> --}}
            <div class="top-bar">
                <a href="{{ URL::to('/trang-chu') }}">
                    <div class="logo">
                        <img class="logo-img" src="{{asset('public/frontend/images/Logo.jpg') }}"/>
                        <p class="logo-blinkiy">BLINKIY</p>
                        <p class="logo-phongthuy">PHONG THỦY</p>
                    </div>
                </a>
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
                            @foreach ($category_product_header as $key => $cate)
                                <li><a href="{{ URL::to('/danh-muc-san-pham/'.$cate->category_id) }}">{{ $cate->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="mainmenu-li">
                        <a class="menu-bar-title" href="">GIỚI THIỆU</a>
                    </li>
                    <li class="mainmenu-li">
                        <a class="menu-bar-title" href="{{ URL::to('/tat-ca-bai-viet') }}">BLOG</a>
                        <ul class="product-submenu">
                            @foreach ($category_post_header as $key => $cate)
                                <li><a href="{{ URL::to('/danh-muc-bai-viet/'.$cate->cate_post_slug) }}">{{ $cate->cate_post_name }}</a></li>
                            @endforeach
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
            <p>Xu hướng tìm kiếm</p>
            <hr>
        </div>
        <div class="product-type-slide">
            <div class="type-element">
                <a href="{{ URL::to('/danh-muc-san-pham/'.$pro1->category_id) }}" class="category_link">
                    <img  class="category_img"  src="{{asset('public/uploads/product/'.$pro1->product_image) }}">
                    <p class="category_name">Vòng tay</p>
                </a>
            </div>
            <div class="type-element">
                <a href="{{ URL::to('/danh-muc-san-pham/'.$pro2->category_id) }}" class="category_link">
                    <img class="category_img" src="{{asset('public/uploads/product/'.$pro2->product_image) }}">
                    <p class="category_name">Dây chuyền</p>
                </a>
            </div>
            <div class="type-element">
                <a href="{{ URL::to('/danh-muc-san-pham/'.$pro3->category_id) }}" class="category_link">
                    <img class="category_img" src="{{asset('public/uploads/product/'.$pro3->product_image) }}">
                    <p class="category_name">Bông tay</p>
                </a>
            </div>
            <div class="type-element">
                <a href="{{ URL::to('/danh-muc-san-pham/'.$pro5->category_id) }}" class="category_link">
                    <img class="category_img" src="{{asset('public/uploads/product/'.$pro4->product_image) }}">
                    <p class="category_name">Nhẫn</p>
                </a>
            </div>
            <div class="type-element">
                <a href="{{ URL::to('/danh-muc-san-pham/'.$pro5->category_id) }}" class="category_link">
                    <img class="category_img" src="{{asset('public/uploads/product/'.$pro5->product_image) }}">
                    <p class="category_name">Charm</p>
                </a>
            </div>
        </div>
    
    </section>
    
    <section class="product-category">
        <div class="container-title">
            <p>Sản phẩm bán chạy</p>
            <hr>
        </div>
        <div class="card-container">
            <div class="pre-btn" ><i class="fa-solid fa-angle-left" ></i></div>
            
            <div class="carousel">
                <div class="list-product-card">
                @foreach($best_sellers as $key =>$pro)
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
            <p>Sản phẩm mới nhất</p>
            <hr>
        </div>
        <div class="card-container">
            <div class="pre-btn" ><i class="fa-solid fa-angle-left" ></i></div>
    
            <div class="carousel">
                <div class="list-product-card">
                    @foreach($new_products as $key =>$pro)
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
                </div>
            </div>
            
            <div class="nxt-btn" ><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>
    
    <div class="hotline">
        {{-- <img src="{{ URL::to('public/frontend/images/footer.png') }}"> --}}
        <p class="hotline-title">Hotline</p>
        <p class="phone-numbers">0123456789</p>
        <p class="slogan">“Your order was made with love”</p>
    </div>
    
    <section class="news-category">
        <div class="container-title">
            <p>Thông tin mới nhất</p>
            <hr>
        </div>
        <div class="news-container">
            <div class="news-container-leftside">
                <img src="{{asset('public/frontend/images/newsimg.jpg') }}">
                <button type="submit" class="see-more-button" onclick="window.location.href='{{ URL::to('/tat-ca-bai-viet') }}'">Xem thêm</button>
            </div>
            <div class="news-container-rightside">
                @foreach($all_post as $key => $post)
                {{-- <a href="{{ URL::to('/bai-viet/'.$post->post_slug) }}"> --}}
                    <div class="a-news">
                        <a href="{{ URL::to('/bai-viet/'.$post->post_slug) }}"><img src="{{asset('public/uploads/post/'.$post->post_image) }}"></a>
                        <a class="post_title" href="{{ URL::to('/bai-viet/'.$post->post_slug) }}">{{ $post->post_title }}</a>
                        <a class="post_desc" href="{{ URL::to('/bai-viet/'.$post->post_slug) }}">{{ $post->post_desc }}</p></a>
                    </div>
                
                @endforeach
            </div>
        </div>
        <br><br>
    </section>
   
    @include('Footer')

    <script type="text/javascript" src="{{asset('public/frontend/js/ScriptCardSlider.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/ScriptHomePage.js') }}"></script>
    </body>
</html>
