<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'price',
        'stock',
    ];

    protected $appends = ['name'];


    /**
     * @return mixed
     */
    public function getNameAttribute(): mixed
    {
        return $this->names()->where('language_id', config('language.id'))->first()->name;
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     */
    public function names(): HasMany
    {
        return $this->hasMany(ProductName::class);
    }

}
