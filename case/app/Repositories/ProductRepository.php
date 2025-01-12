<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Interfaces\UserInterface;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductInterface
{
    /**
     * @var Product
     */
    protected Product $model;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): Model|null
    {
        return $this->model->find($id);
    }
}
