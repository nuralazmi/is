<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    protected $fillable = [
        'product_id',
        'language_id',
        'name',
        'slug',
    ];
}
