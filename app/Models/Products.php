<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
            'name',
            'sub_category_id',
            'url',
            'small_description',
            'image',
            'p_highlight_heading',
            'p_highlights',
            'p_description_heading',
            'p_description',
            'p_details_heading',
            'p_details',
            'sale_tag',
            'original_price',
            'offer_price',
            'quantity',
            'priority',
            'new_arrival_products',
            'feature_products',
            'popular_products',
            'offers_products',
            'status',
            'meta_title',
            'meta_description',
            'meta_keyword',
    ];
    use HasFactory;

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'sub_category_id','id');
    }
}
