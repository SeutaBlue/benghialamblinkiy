<?php
    $connect = new mysqli('localhost','root','','Blinkiy'); 
    if($connect->errno !== 0) 
    { 
        die("Error: Could not connect to the database. An error ".$connect->error." ocurred."); 
    }  
    $connect->set_charset('utf8'); //csdl tiếng việt 


    echo"sdsdasad";
    // if(isset($_GET['filter_checked']))
    // {
    //     $filter_checked=$_GET['filter_checked'];

    //     $all_product = "SELECT * FROM tbl_product WHERE product_status = '1' AND (";

    //     for($i=0; $i<count($filter_checked); $i++)
    //     {
    //         if($i>0)
    //         {
    //             $all_product .= " OR ";
    //         }
    //         $all_product .= "product_color = '" .  $connect->real_escape_string($filter_checked[$i]) . "'";
    //     }

    //     if(isset($_GET['cate'])) $all_product .= "category_id = '" .  $connect->real_escape_string($cate) . "'";
    //     $all_product .= ") ORDER BY product_id";
    //     $product = mysqli_query($connect, $all_product);
    // }
    // else
    // {
    //     $all_product = "SELECT * FROM tbl_product WHERE product_status = '1' ORDER BY product_id";
    //     $product = mysqli_query($connect, $all_product);
    // }

    // if ($product !== false && mysqli_num_rows($product) > 0) 
    // {      
    //     while ($pro = mysqli_fetch_object($product)) {
    //         echo '<div class="product-card">';
    //         echo '<div class="product-image">';
    //         echo '<a href="{{ URL::to(\'/chi-tiet-san-pham/\'.$pro->product_id) }}">';
    //         echo '<img src="public/uploads/product/' . $pro->product_image . '" alt="">';
    //         echo '</a>';
    //         echo '</div>';
    //         echo '<div class="product-info">';
    //         echo '<a class="product-name" href="{{ URL::to(\'/chi-tiet-san-pham/\'.$pro->product_id) }}">' . $pro->product_name . '</a>';
    //         echo '<p class="product-price">' . number_format($pro->product_price) . ' VNĐ</p>';
    //         echo '</div>';
    //         echo '</div>';
    //     }
    // } 
?>

