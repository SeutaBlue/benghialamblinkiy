<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer ('*', function($view)
        {
            $category_product_header=DB::table('tbl_category_product')->get();
            $category_post_header = DB::table('tbl_category_post')->orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get(); // k có phân trang nên mình lấy hết bằng hàm get
            
            $customer_id = Session::get('customer_id');

            // $min_price=DB::table('tbl_product')->min('product_price');
            // $max_price=DB::table('tbl_product')->max('product_price');
            // $min_price_range=$min_price-100000;
            // $max_price_range=$max_price+100000;

            // if(isset($_GET['price_from']) && ($_GET['price_from']) )
            // {
            //     $min_price=$_GET['price_from'];
            //     $max_price=$_GET['price_to'];
            //     $all_product=DB::table('tbl_product')->where('product_status','1')->whereBetween('product_price',[$min_price,$max_price])->orderby('product_price','asc')->get();
            // }
            // if($customer_id)
            // {

                // $cart=DB::table('tbl_cart')
                // ->where('customer_id', $customer_id)
                // ->join('tbl_product','tbl_product.product_id','=','tbl_cart.product_id')
                // ->join('tbl_size','tbl_size.size_id','=','tbl_cart.size_id')
                // ->join('tbl_product_details', function ($join) {
                //     $join->on('tbl_cart.product_id', '=', 'tbl_product_details.product_id')
                //         ->on('tbl_cart.size_id', '=', 'tbl_product_details.size_id');})
                // ->orderBy('tbl_cart.created_at', 'desc')
                // ->get();

            //     return view('ShoppingCart')->with('login',$customer_id)->with('ShoppingCart',$cart);
            //     $view
            //     ->with('category_product_header',$category_product_header)
            //     ->with('category_post_header',$category_post_header)
            //     ->with('my_customer',$customer_id )
            //     ->with('cart',$cart);
            // }
            // else 

            $view
            ->with('category_product_header',$category_product_header)
            ->with('category_post_header',$category_post_header)
            ->with('my_customer',$customer_id )
            // ->with('cart',$cart )
            ;
        });
    }

}
