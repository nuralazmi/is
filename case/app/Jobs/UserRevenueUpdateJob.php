<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UserRevenueUpdateJob implements ShouldQueue
{
    use Queueable;

    private Order $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = $this->order->user;
        $user->update(['revenue' => $user->revenue + $this->order->total]);
    }
}
