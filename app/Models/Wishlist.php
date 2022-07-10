<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $fillables =[
             'user_id',
             'product_id',
             'status'
    ];
    use HasFactory;

    public function products(){
        return $this->belongsTo(products::class,'product_id','id')->where('status','0');
    }
}
