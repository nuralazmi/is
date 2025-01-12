<?php

namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements OrderInterface
{
    protected Order $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function list(array $columns = ['*']): LengthAwarePaginator
    {
        return $this->model->query()
            ->with(['user','items.product.category.name'])
            ->select($columns)
            ->paginate(12);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->model->destroy($id);
    }

}
