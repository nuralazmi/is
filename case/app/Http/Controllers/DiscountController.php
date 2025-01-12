<?php

namespace App\Http\Controllers;

use App\Http\Services\Discounts\DiscountService;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class DiscountController extends Controller
{
    /**
     * @var DiscountService
     */
    protected DiscountService $discount_service;

    /**
     * @param DiscountService $discount_service
     */
    public function __construct(DiscountService $discount_service)
    {
        $this->discount_service = $discount_service;
    }

    /**
     * @param Order $order
     * @return JsonResponse
     * @unauthenticated
     */
    public function calculate(Order $order): JsonResponse
    {
        return response()->json($this->discount_service->calculate($order));
    }
}
