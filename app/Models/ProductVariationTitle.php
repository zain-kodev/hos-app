<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationTitle extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'name', 'name_en', 'type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
