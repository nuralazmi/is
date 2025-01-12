<?php

namespace App\Http\Services\Discounts;

use App\Interfaces\DiscountRule;
use App\Models\Order;

class Buy5Get1Free implements DiscountRule
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'BUY_5_GET_1';
    }

    /**
     * @param Order $order
     * @param float $current_sub_total
     * @return array|null
     */
    public function calculate(Order $order, float $current_sub_total): ?array
    {
        $category_id = 2;
        $item_count = 0;
        $item_price = 0;

        foreach ($order->items as $item) {
            if ($item->product->category_id == $category_id) {
                $item_count += $item->quantity;
                $item_price = $item->unit_price;
            }
        }
        if ($item_count >= 6) {
            $free_items = floor($item_count / 6);
            $discount = $free_items * $item_price;
            return [
                'discountReason' => $this->getName(),
                'discountAmount' => round($discount, 2),
                'subtotal' => round($current_sub_total - $discount, 2),
            ];
        }

        return null;
    }
}
