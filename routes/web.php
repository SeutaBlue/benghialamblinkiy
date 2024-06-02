<?php

use Illuminate\Support\Facades\Route;

// Route::get('/test', function () {
//         return view('testin');
//     });

// // FE
Route::get('/', 'App\Http\Controllers\HomeController@index'); // goi ham index trong HomeController, khi go localhost/blinky thi hien ra page luon
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index'); // Khi search localhost8080/blinky/trang-chu thì nó se hiện thị trang chủ

// Sảm phẩm FE
Route::get('/san-pham', 'App\Http\Controllers\HomeController@sanpham');
Route::get('/danh-muc-san-pham/{category_product_id}','App\Http\Controllers\CategoryProduct@show_category_product_home');
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@show_inside_product');


Route::post('/filter-products', 'App\Http\Controllers\ProductController@filterProducts');

//Giỏ hàng
Route::post('/add-to-cart', 'App\Http\Controllers\ProductController@add_to_cart');

Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');

// //BE 
// //admin
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard_login'); // phương thức của form là post
Route::get('/logout','App\Http\Controllers\AdminController@dashboard_logout'); // đăng xuất

//Danh mục Sản phẩm admin
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');
Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');
Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product');

//Sản phẩm
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');

Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');

Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');
Route::post('/save-product','App\Http\Controllers\ProductController@save_product');

//Chi tiết sản phẩm
Route::get('/show-product-details/{product_id}','App\Http\Controllers\ProductController@show_product_details');
Route::get('/edit-product-details/{product_id}','App\Http\Controllers\ProductController@edit_product_details');
Route::post('/update-product-details/{product_id}','App\Http\Controllers\ProductController@update_product_details');

//Gallery thư viện ảnh
Route::get('/add-gallery/{product_id}','App\Http\Controllers\GalleryController@add_Gallery');
Route::post('/insert-gallery/{product_id}','App\Http\Controllers\GalleryController@insert_Gallery');
Route::get('/delete-gallery/{gallery_id}','App\Http\Controllers\GalleryController@delete_Gallery');

//Giỏ hàng
Route::get('/gio-hang','App\Http\Controllers\CartController@shopping_cart');

// Danh muc bai viet 
Route::get('/add-category-post','App\Http\Controllers\CategoryPost@add_category_post');
Route::post('/save-category-post','App\Http\Controllers\CategoryPost@save_category_post');
Route::get('/all-category-post','App\Http\Controllers\CategoryPost@all_category_post');
Route::get('/danh-muc-bai-viet/{cate_post_slug}','App\Http\Controllers\CategoryPost@danh_muc_bai_viet');// khi gõ danh_muc_bai_viet/cate_post_slug thì trả về bài viết đó
Route::get('/edit-category-post/{category_post_id}','App\Http\Controllers\CategoryPost@edit_category_post');// khi gõ danh_muc_bai_viet/cate_post_slug thì trả về bài viết đó
Route::post('/update-category-post/{cate_id}','App\Http\Controllers\CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','App\Http\Controllers\CategoryPost@delete_category_post');

// Bai viet
Route::get('/add-post','App\Http\Controllers\PostController@add_post');
Route::post('/save-post','App\Http\Controllers\PostController@save_post');
Route::get('/all-post','App\Http\Controllers\PostController@all_post');
Route::get('/delete-post/{post_id}','App\Http\Controllers\PostController@delete_post'); // xoa theo id
Route::get('/edit-post/{post_id}','App\Http\Controllers\PostController@edit_post'); // xoa theo id
Route::post('/update-post/{post_id}','App\Http\Controllers\PostController@update_post'); // xoa theo id

//Hien thi danh muc bai viet
Route::get('/danh-muc-bai-viet/{cate_post_slug}','App\Http\Controllers\CategoryPost@danh_muc_bai_viet');// khi gõ danh_muc_bai_viet/cate_post_slug thì trả về bài viết đó
Route::get('/bai-viet/{post_slug}','App\Http\Controllers\PostController@bai_viet');

// login
Route::get('/login', 'App\Http\Controllers\CheckoutController@login');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');

// Register
Route::get('/register', 'App\Http\Controllers\CheckoutController@register');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');

// group này xác định các route cần có customer_id thì mới truy cập được
Route::group(['middleware' => 'customer'], function () {
    // update-profle
    Route::post('/update-customer/{customer_id}', 'App\Http\Controllers\CheckoutController@update_customer');
    // Các route yêu cầu đăng nhập
    Route::get('/ho-so', 'App\Http\Controllers\CheckoutController@personal_infor');

    // logout
    Route::get('/logout', 'App\Http\Controllers\CheckoutController@logout');

    // Đổi mật khẩu
    Route::get('/change_pass', 'App\Http\Controllers\CheckoutController@Change_pass');
    Route::post('/change_pass', 'App\Http\Controllers\CheckoutController@check_change_pass');

    Route::get('/order_management', 'App\Http\Controllers\CheckoutController@Order_management');
});

// Quên mật khẩu
Route::get('/forgot-password', 'App\Http\Controllers\CheckoutController@forgot_password');
Route::post('/forgot-password', 'App\Http\Controllers\CheckoutController@check_forgot_password');

Route::get('/reset-password', 'App\Http\Controllers\CheckoutController@reset_password');
Route::post('/reset-password', 'App\Http\Controllers\CheckoutController@check_reset_password'); 

?>