<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface ProductInterface
{
    /**
     * @param int $id
     * @return User|null
     */
    public function getById(int $id): Model|null;
}
