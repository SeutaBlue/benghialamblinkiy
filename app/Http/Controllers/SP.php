<!--  -->
<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use DB; // sử dụng database
// use App\Http\Requests;
// use Session; // thu vien sdung session
// use Illuminate\Support\Facades\Redirect; 
// session_start();

// namespace App;
// use App\Models\DB;
use DB;

    if(isset($_GET['filter_checked']))
    {
        $filter_checked=$_GET['filter_checked'];
        
        $all_product=DB::table('tbl_product')->where('product_status','1')->where('product_color',$filter_checked[0]);

        // foreach($filter_checked as $value) 
        // {
        //     $all_product=$all_product->orWhere('product_color',$value);
        //     // echo $value . " ";
        // }

        for($i=1; $i<count($filter_checked); $i++)
        {
            $all_product=$all_product->orWhere('product_color',$filter_checked[$i]);
        }

        
    }

?>