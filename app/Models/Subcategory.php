<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategorys';
    protected $filable = [
      'category_id',
      'url',
      'name',
      'Description',
      'image',
      'priority',
      'status',
    ];
    public function Category(){
        return $this->belongsTo(Categories::class, 'category_id','id');
    }
    public function Products(){
        return $this->hasMany(Products::class, 'sub_category_id','id')->where('status','0');
    }
    use HasFactory;
}
