<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        if (Order::all()->count() > 0) {
            return;
        }

        $json = file_get_contents(database_path('seeders/data/orders.json'));
        $orders = json_decode($json, true);

        foreach ($orders as $order) {
            $order_created = Order::create([
                'id' => $order['id'],
                'user_id' => $order['customerId'],
                'subtotal' => $order['total'],
                'discount' => $order['discount'] ?? 0,
                'total' => $order['total'],
            ]);

            foreach ($order['items'] as $item) {
                $order_created->items()->create([
                    'product_id' => $item['productId'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unitPrice'],
                    'total' => $item['total'],
                ]);
            }
        }
    }
}
