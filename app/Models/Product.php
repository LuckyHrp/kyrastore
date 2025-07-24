<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'company',
        'image',
        'category_id',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function nominal()
    {
        return $this->hasMany(Nominal::class);
    }
}
