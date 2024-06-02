<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use HasFactory;

    protected $table = 'tbl_product';

    // Khóa chính
    protected $primaryKey = 'product_id';

    // Các cột có thể được gán giá trị
    protected $fillable = [
        'category_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_color',
        'product_status',
    ];

    // Thiết lập mối quan hệ với model Category
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

}
