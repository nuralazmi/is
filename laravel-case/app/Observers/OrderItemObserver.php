<?php

namespace App\Observers;

use App\Models\OrderItem;

class OrderItemObserver
{
    /**
     * @param OrderItem $order_item
     * @return void
     */
    public function creating(OrderItem $order_item): void
    {
        $product = $order_item->product;
        $order_item->unit_price = $product->price;
        $order_item->total = $order_item->quantity * $order_item->unit_price;
    }

    /**
     * @param OrderItem $order_item
     * @return void
     */
    public function created(OrderItem $order_item): void
    {
        $order = $order_item->order;
        $subtotal = $order->items->sum(function ($item) {
            return $item->total;
        });
        $discount = $order->discount ?? 0;
        $total = $subtotal - $discount;
        $order->subtotal = $subtotal;
        $order->total = $total;
        $order->save();

        $product = $order_item->product;
        $product->update(['stock' => $product->stock - $order_item->quantity]);

        $user = $order->user;
        $user->update(['revenue' => $user->revenue + $order->total]);
    }
}
