<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $fillable = ['product_variation_title_id', 'name', 'price', 'stock'];

    public function title()
    {
        return $this->belongsTo(ProductVariationTitle::class);
    }

}
