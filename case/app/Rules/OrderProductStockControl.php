<?php

namespace App\Rules;

use App\Repositories\ProductRepository;
use Illuminate\Contracts\Validation\Rule;

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
        $this->attribute = $attribute;
        $attributeParts = explode('.', $attribute);
        $index = $attributeParts[1] ?? null;

        $product_repository = app(ProductRepository::class);
        $product = $product_repository->getById(request()->input("items.$index.product_id"));
        return $product && $product->stock > $value;
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return $this->attribute . ' ' . trans('response.quantity_error');
    }
}
