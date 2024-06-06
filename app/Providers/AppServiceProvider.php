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


                $cart=DB::table('tbl_cart')
                ->where('customer_id', $customer_id)
                ->distinct()->get();

            $view
            ->with('category_product_header',$category_product_header)
            ->with('category_post_header',$category_post_header)
            ->with('my_customer',$customer_id )
            ->with('cart',$cart )
            ;
        });
    }

}
