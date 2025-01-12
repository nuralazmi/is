<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class OrderUniqueItems implements Rule
{
    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $product_id_list = array_column($value, 'product_id');
        return count($product_id_list) === count(array_unique($product_id_list));
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return trans('response.order_item_unique');
    }
}
