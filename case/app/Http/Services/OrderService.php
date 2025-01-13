<?php

namespace App\Http\Services;

use App\Jobs\SendEmailJob;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderService
{
    protected OrderRepository $order_repository;

    public function __construct(OrderRepository $order_repository)
    {
        $this->order_repository = $order_repository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = $this->order_repository->list(['id', 'user_id', 'subtotal', 'discount', 'total', 'created_at']);
        $response = ['orders' => $orders];
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    /**
     * @param array $payload
     * @return JsonResponse
     */
    public function store(array $payload): JsonResponse
    {
        $order = $this->order_repository->create(['user_id' => auth()->user()->id]);
        $order->items()->createMany($payload['items']);

        SendEmailJob::dispatch();
        return response()->json([
            'message' => trans('response.created'),
            'id' => $order->id,
        ], ResponseAlias::HTTP_CREATED);
    }


    /**
     * @param Order $order
     * @return JsonResponse
     */
    public function destroy(Order $order): JsonResponse
    {
        $this->order_repository->destroy($order->id);
        return response()->json([
            'message' => trans('response.deleted'),
        ], ResponseAlias::HTTP_OK);
    }
}
