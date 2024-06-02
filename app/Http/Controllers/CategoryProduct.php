<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // sử dụng database
use App\Http\Requests;
use Session; // thu vien sdung session
use Illuminate\Support\Facades\Redirect; 
session_start();

class CategoryProduct extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('admin.dashboard');

        }else
        {
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('admin.category_product.add_category_product');
    }
    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get(); //lấy tất cả dữ liệu từ table
        $manager_category_product = view('admin.category_product.all_category_product')->with('all_category_product',$all_category_product );
        return view('admin_layout')->with('admin.category_product.all_category_product',$manager_category_product) ;

    }
    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        $data=array();
        $data['category_name']=$request->category_product_name;
        // $data['category_product_name'] --> tên của cái cột trong database
        // $request->category_product_name; --> tên của cái name trong file blade.php
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        //trỏ đến table where có id phù hợp với $category_product_id chuyển vào và cập nhật
        Session::put('message','Không kích hoạt (ẩn) danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt (hiển thị) danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.category_product.edit_category_product')->with('edit_category_product',$edit_category_product );
        
        return view('admin_layout')->with('admin.category_product.edit_category_product',$manager_category_product) ;
    }
    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin();
        //Request chỉ cần có khi lấy dữ liệu
        $data = array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);//cập nhật dữ liệu cho đối tượng có id giống
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();//cập nhật dữ liệu cho đối tượng có id giống
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    //FE
    public function show_category_product_home($category_product_id)
    {
        // $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        // $product_by_category=DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('category_status','1')->where('tbl_product.category_id',$category_product_id);
        
        // $min_price=DB::table('tbl_product')->min('product_price');
        // $max_price=DB::table('tbl_product')->max('product_price');
        // $min_price_range=$min_price-100000;
        // $max_price_range=$max_price+100000;
        
        // if(isset($_GET['price_from']) && ($_GET['price_from']) )
        // {
        //     $min_price=$_GET['price_from'];
        //     $max_price=$_GET['price_to'];
            
        //     $product_by_category=$product_by_category->where('product_status','1')->whereBetween('product_price',[$min_price,$max_price])->orderby('product_price','asc')->get();
        // }
        // else $product_by_category=$product_by_category->get();

        // return view('pages.sanpham.show_category_product')->with('category',$category_product)->with('product',$product_by_category)
        // ->with('min_price_value',$min_price)->with('max_price_value',$max_price)
        // ->with('max_price_range',$max_price_range)->with('min_price_range',$max_price_range);
        
        //$all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','asc')->paginate(8);
        
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','asc')->get();
        
        $all_product=DB::table('tbl_product')->where('category_id',$category_product_id)->where('product_status','1');

        $min_price=DB::table('tbl_product')->min('product_price');
        $max_price=DB::table('tbl_product')->max('product_price');

        $min_price_range=$min_price-500000;
        $max_price_range=$max_price+500000;
        // $selectedColors;
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
        ->inRandomOrder()
        ->paginate(16);

        return view('pages.sanpham.show_category_product')
        ->with('category_product_id',$category_product_id)
        ->with('category',$category_product)->with('product',$all_product)
        ->with('min_price_value',$min_price)->with('max_price_value',$max_price)
        ->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range)
        ->with('selectedColors',$filter);
    }
}
