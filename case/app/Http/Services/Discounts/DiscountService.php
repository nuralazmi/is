<?php

namespace App\Http\Services\Discounts;

use App\Models\Order;

class DiscountService
{
    /**
     * @var array
     */
    protected array $discount_rules = [];

    /**
     *
     */
    public function __construct()
    {
        $this->discount_rules = [
            new Buy5Get1Free(),
            new TenPercentOverThousand(),
            new TwoOrMoreItemsCategoryOneDiscount(),
        ];
    }

    /**
     * @param Order $order
     * @return array
     */
    public function calculate(Order $order): array
    {
        $current_sub_total = $order->total;
        $discounts = [];

        foreach ($this->discount_rules as $rule) {
            $discount_calculate = $rule->calculate($order, $current_sub_total);
            if ($discount_calculate) {
                $discounts[] = $discount_calculate;
                $current_sub_total = $discount_calculate['subtotal'];
            }
        }
        $discount = $order->total - $current_sub_total;

        return [
            'orderId' => $order->id,
            'discounts' => $discounts,
            'totalDiscount' => round($discount, 2),
            'discountedTotal' => round($current_sub_total, 2),
        ];
    }
}
