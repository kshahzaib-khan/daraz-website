<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
        protected $table = 'categories';
        protected $fillable = [
            'group_id',
            'name',
            'url',
            'Description',
            'image',
            'icon',
            'status',
        ];
        //   BelongsTo Relation in Laravel
          public function group(){
              return $this->belongsTo(Groups::class, 'group_id','id');
          }
    use HasFactory;
}
