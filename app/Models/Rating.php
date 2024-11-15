<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'customer_id', 'order_id', 'rating'
    ];

    protected $primaryKey = 'rating_id';
    protected $table = 'tbl_rating';
}


