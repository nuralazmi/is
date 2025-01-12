<?php

namespace App\Rules;

use App\Repositories\ProductRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class OrderProductStockControl implements Rule
{
    protected array|null $items;
    protected string $attribute;

    public function __construct()
    {
        $this->items = request()->input('items');
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $item = Arr::first($this->items, fn($item) => $item['product_id'] === $value);
        $product_repository = app(ProductRepository::class);
        $product = $product_repository->getById($value);
        $this->attribute = $attribute;

        return $product && $product->stock >= $item['quantity'];
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return $this->attribute . ' ' . trans('response.quantity_error');
    }
}
