<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'user_id', 'order_id', 'rating'
    ];

    protected $primaryKey = 'rating_user_id';
    protected $table = 'tbl_rating_user';
}
