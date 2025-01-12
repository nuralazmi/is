<?php

namespace App\Interfaces;

use App\Models\Order;

interface DiscountRule
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param Order $order
     * @param float $current_sub_total
     * @return array|null
     */
    public function calculate(Order $order, float $current_sub_total): array|null;
}
