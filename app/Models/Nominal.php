<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominal extends Model
{
    //
    protected $fillable = [
        'product_id',
        'nominal',
        'slug',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
