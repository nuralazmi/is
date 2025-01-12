<?php

namespace App\Http\Services\Discounts;

use App\Interfaces\DiscountRule;
use App\Models\Order;

class TwoOrMoreItemsCategoryOneDiscount implements DiscountRule
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return '20_PERCENT_ON_CHEAPEST_ITEM';
    }

    /**
     * @param Order $order
     * @param float $current_sub_total
     * @return array|null
     */
    public function calculate(Order $order, float $current_sub_total): ?array
    {
        $category_id = 1;
        $items_in_category = [];

        foreach ($order->items as $item) {
            if ($item->product->category_id == $category_id) {
                $items_in_category[] = $item;
            }
        }
        if (count($items_in_category) >= 2) {
            $cheapest_item = min(array_map(function ($item) {
                return $item->unit_price;
            }, $items_in_category));
            $discount = floor($cheapest_item * 0.20 * 100) / 100;
            $newSubtotal = $current_sub_total - $discount;
            return [
                'discountReason' => '20_PERCENT_ON_CHEAPEST_ITEM',
                'discountAmount' => round($discount, 2),
                'subtotal' => round($newSubtotal, 2),
            ];
        }
        return null;
    }
}
