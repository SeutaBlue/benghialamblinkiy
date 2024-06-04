<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // sử dụng database
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Post;
use Session; // thu vien sdung session
use Illuminate\Support\Facades\Redirect; 
session_start();


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        $best_sellers=DB::table('tbl_product')->where('product_status','1')->limit(12)->inRandomOrder()->get();

        $new_products=DB::table('tbl_product')->where('product_status','1')
        // ->orderBy('created_at', 'desc')
        ->inRandomOrder()
        ->get();
        // $new_products=$new_products->inRandomOrder()->get();

        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get(); // k có phân trang nên mình lấy hết bằng hàm get
        $all_post = Post::where('post_status','1')->inRandomOrder()->limit(4)->get();

        $pro1=DB::table('tbl_product')->where('category_id','1')->where('product_status','1')->inRandomOrder()->first();
        $pro2=DB::table('tbl_product')->where('category_id','2')->where('product_status','1')->inRandomOrder()->first();
        $pro3=DB::table('tbl_product')->where('category_id','3')->where('product_status','1')->inRandomOrder()->first();
        $pro4=DB::table('tbl_product')->where('category_id','4')->where('product_status','1')->inRandomOrder()->first();
        $pro5=DB::table('tbl_product')->where('category_id','5')->where('product_status','1')->inRandomOrder()->first();

        return view('welcome')
        ->with('category',$category_product)
        ->with('category_post',$category_post)
        ->with('all_post',$all_post)
        ->with('best_sellers',$best_sellers)
        ->with('new_products',$new_products)
        ->with('pro1',$pro1)
        ->with('pro2',$pro2)
        ->with('pro3',$pro3)
        ->with('pro4',$pro4)
        ->with('pro5',$pro5);   
    }
    public function sanpham()
    {
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        //$all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','asc')->paginate(8);
        $all_product=DB::table('tbl_product')->where('product_status','1');

        $min_price=DB::table('tbl_product')->min('product_price');
        $max_price=DB::table('tbl_product')->max('product_price');

        $min_price_range=$min_price-200000;
        $max_price_range=$max_price+200000;

        $filter=[];
        $element=[];

        if(isset($_GET['filter']))
        {   
            $filter=$_GET['filter'];
            for($i=0; $i<count($filter); $i++)
            {
                if($i==0) $all_product=$all_product->where('product_color',$filter[$i]);
                else $all_product=$all_product->orWhere('product_color',$filter[$i]);
            }
            //$all_product=$all_product->orderby('product_id','asc')->get();
        }

        if(isset($_GET['price_from']) && ($_GET['price_from']) )
        {
            $min_price=$_GET['price_from'];
            $max_price=$_GET['price_to'];

            $all_product=$all_product->where('product_status','1')->whereBetween('product_price',[$min_price,$max_price]);
        }

        if(isset($_GET['element']))
        {   
            $element=$_GET['element'];
            for($i=0; $i<count($element); $i++)
            {
                if($i==0) $all_product=$all_product->where('product_element',$element[$i]);
                else $all_product=$all_product->orWhere('product_element',$element[$i]);
            }
        }

        $all_product=$all_product
        // ->orderby('created_at','desc')
        ->inRandomOrder()
        ->paginate(16);

        return view('pages.sanpham.sanpham')->with('category',$category_product)->with('product',$all_product)
        ->with('min_price_value',$min_price)->with('max_price_value',$max_price)
        ->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range)
        ->with('selectedColors',$filter)
        ->with('selectedElements',$element);
    }

    public function search(Request $request){

        // $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get(); // k có phân trang nên mình lấy hết bằng hàm get
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%') ;
        
        $min_price=DB::table('tbl_product')->min('product_price');
        $max_price=DB::table('tbl_product')->max('product_price');

        $min_price_range=$min_price-200000;
        $max_price_range=$max_price+200000;

        $filter=[];


        if(isset($_GET['filter']))
        {   
            $filter=$_GET['filter'];
            for($i=0; $i<count($filter); $i++)
            {
                if($i==0) $search_product=$search_product->where('product_color',$filter[$i]);
                else $search_product=$search_product->orWhere('product_color',$filter[$i]);
            }
            //$all_product=$all_product->orderby('product_id','asc')->get();
        }

        if(isset($_GET['price_from']) && ($_GET['price_from']) )
        {
            $min_price=$_GET['price_from'];
            $max_price=$_GET['price_to'];

            $search_product=$search_product->where('product_status','1')->whereBetween('product_price',[$min_price,$max_price]);
        }

        $search_product=$search_product
        ->inRandomOrder()
        ->paginate(16);

        return view('pages.sanpham.search')
        // ->with('this_category_product',$this_category_product)
        ->with('category',$cate_product)
        ->with('min_price_value',$min_price)->with('max_price_value',$max_price)
        ->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range)
        ->with('search_product',$search_product)
        ->with('selectedColors',$filter)
        ->with('keywords',$keywords);
    }
    

}
