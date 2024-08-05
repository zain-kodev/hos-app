<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'address',
        'phone',
        'note',
        'products',
        'discount',
        'sub_total',
        'total',
        'state',
        'latitude',
        'longitude',
        'delivery_address',
        'invoice_id',
        'paid',

    ];
    protected $casts = [
        'address' => 'string',
        'phone' => 'string',
        'note' => 'string',
        'products' => 'object',
        'discount' => 'object',
        'sub_total' => 'float',
        'total' => 'float',
        'invoice_id' => 'string',
        'paid' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'delivery_address' => 'string',
    ];
    protected $attributes = [
        'products' => "[]",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
