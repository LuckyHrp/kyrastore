<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominal extends Model
{
    //
    protected $fillable = [
        'product_id',
        'name',
        'image',
        'code',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
