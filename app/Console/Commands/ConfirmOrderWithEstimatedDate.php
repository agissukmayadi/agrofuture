<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ConfirmOrderWithEstimatedDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:confirm-order-with-estimated-date';

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

        $orders = Order::with('shipment')->where('status', "SHIPPED")->get();
        foreach ($orders as $order) {
            $estimateDay = $order->shipment->largest_estimate;
            $estimateDate = Carbon::parse($order->created_at)->addDays($estimateDay + 7);

            if (Carbon::now()->greaterThan($estimateDate)) {
                $order->status = "SUCCESS";
                $order->success_at = now();
                $order->save();
            }
        }
    }
}