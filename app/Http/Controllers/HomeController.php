<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // sử dụng database
use App\Http\Requests;
use Session; // thu vien sdung session
use Illuminate\Support\Facades\Redirect; 
session_start();

use App\Models\CatePost;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','asc')->limit(12)->get();

        return view('welcome')->with('category',$category_product)->with('product',$all_product);   
    }
    public function sanpham()
    {
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        
        //$all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','asc')->paginate(8);
        $all_product=DB::table('tbl_product')->where('product_status','1');

        $min_price=DB::table('tbl_product')->min('product_price');
        $max_price=DB::table('tbl_product')->max('product_price');

        $min_price_range=$min_price-500000;
        $max_price_range=$max_price+500000;

        $filter=[];

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

        $all_product=$all_product
        // ->orderby('created_at','desc')
        ->inRandomOrder()
        ->paginate(16);

        return view('pages.sanpham.sanpham')->with('category',$category_product)->with('product',$all_product)
        ->with('min_price_value',$min_price)->with('max_price_value',$max_price)
        ->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range)
        ->with('selectedColors',$filter);
    }

    public function search(Request $request){
        // $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get(); // k có phân trang nên mình lấy hết bằng hàm get
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        
        return view('pages.sanpham.search')
        ->with('category',$cate_product)
        ->with('search_product',$search_product)
        // ->with('category_post',$category_post)
        ;
    }
    

}
