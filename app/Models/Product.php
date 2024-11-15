<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    public $fillable = [
        'product_name', 'category_id', 'product_qty', 'product_sold', 'product_desc', 'product_content', 'product_price', 'product_image', 'product_status', 'product_deadline', 'id_nguoi_ban', 'don_vi_sp'
    ];

    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
