<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function getByEmail(string $email): Model|null;
}
