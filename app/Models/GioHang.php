<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $table = 'gio_hang';

    protected $fillable = ['id_nguoidung','id_sanpham','gia','soluong'];

    public function prod(){
        return $this->hasOne(Product::class, 'product_id', 'id_sanpham');
    }

}
