<?php

namespace App\Interfaces;

use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface OrderInterface
{
    /**
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function list(array $columns = ['*']): LengthAwarePaginator;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

}
