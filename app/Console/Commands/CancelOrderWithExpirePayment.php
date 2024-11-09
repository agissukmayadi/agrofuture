<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schedule;

class CancelOrderWithExpirePayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-order-with-expire-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Category::create([
            'name' => 'Cancel Order With Expire Payment',
        ]);

        Schedule::call(function () {
            $orders = Order::with([
                'orderDetails' => function ($query) {
                    $query->with([
                        'product' => function ($query) {
                            $query->withTrashed();
                        }
                    ]);
                }
            ])->where('status', 'PENDING')
                ->where('created_at', '<', now()->subDays())->get();

            foreach ($orders as $order) {
                foreach ($order->orderDetails as $item) {
                    $product = $item->product;
                    $product->stock += $item->quantity;
                    $product->save();
                }

                $order->cancelled_at = now();
                $order->note_cancelled = "Payment : Order Payment is expired";
                $order->status = 'CANCELLED';
                $order->save();
            }
        });

    }
}