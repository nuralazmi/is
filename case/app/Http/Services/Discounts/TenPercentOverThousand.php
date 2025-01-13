<?php

namespace App\Http\Services\Discounts;

use App\Interfaces\DiscountRule;
use App\Models\Order;

class TenPercentOverThousand implements DiscountRule
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return '10_PERCENT_OVER_1000';
    }

    /**
     * @return string
     */
    public function getTranslatedName(): string
    {
        return trans('discount.'.$this->getName());
    }

    /**
     * @param Order $order
     * @param float $current_sub_total
     * @return array|null
     */
    public function calculate(Order $order,float $current_sub_total): array|null
    {
        if ($order->total >= 1000) {
            $discount = floor($order->total * 0.10 * 100) / 100;
            return [
                'discountReason' => $this->getName(),
                'discountName' => $this->getTranslatedName(),
                'discountAmount' => round($discount, 2),
                'subtotal' => round($current_sub_total - $discount, 2),
            ];
        }

        return null;
    }
}
