<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryName extends Model
{
    protected $fillable = [
        'category_id',
        'language_id',
        'name',
        'slug',
    ];
}
