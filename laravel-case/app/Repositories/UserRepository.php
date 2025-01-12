<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserInterface
{

    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $email
     * @return Model|null
     */
    public function getByEmail(string $email): Model|null
    {
        return $this->model->where('email', $email)->first();
    }
}
