<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    /**
     * @return HasMany
     */
    public function names(): HasMany
    {
        return $this->hasMany(CategoryName::class);
    }

    public function name() :HasOne
    {
        return $this->hasOne(CategoryName::class)->where('language_id', config('language.id'));
    }
}
